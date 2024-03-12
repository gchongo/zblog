<?php
// 加载获取文章图片数量
function ydtu_thumb2num( $article) {
    global $zbp;
    $pattern='/<img.*?src="(.*?)(?=")/';
    $content = $article->Content;
    preg_match_all($pattern,$content,$matchContent);
    //判断数量用
    $arr = array();
    if(isset($matchContent[1][0])){foreach($matchContent[1] as $url){$arr[]=$url;}   }
    $article->thumb2=$arr;
    $article->thumb2_count=count($arr);
    if($article->thumb2_count>0){
        $article->thumb2_First=$arr[0];
    }else{
        $article->thumb2_First=null;
    }
}

// 模板内调用代码(尝试重写)
function ydtu_thumb2( $article, $width = '', $height = '',$num = '' ) {
    global $zbp;
    $Urls = '';

    $pattern = "/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/";
    $content = $article->Content;
    preg_match_all( $pattern, $content, $matchContent );

    if ( isset( $matchContent[ 1 ][ $num ] ) ) {
        $imgurl=$matchContent[ 1 ][ $num ];
        if( strrchr($matchContent[ 1 ][ $num ],'.')=='.bmp' || strrchr($matchContent[ 1 ][ $num ],'.')=='.BMP'){
            $Urls = $matchContent[ 1 ][ $num ];
        }else{

            $Imgs= './thumb/'.'thumb-' . $article->ID . '-' . $width . '-' . $height . '-' . $num.'-' .pathinfo($imgurl,PATHINFO_BASENAME);

            $oldimgs = pathinfo($imgurl,PATHINFO_BASENAME); // 获取原图文件名
            $newimgmini = $zbp->host.'thumb/'.'thumb-' . $article->ID . '-' . $width . '-' . $height . '-' . $num.'-' .pathinfo($imgurl,PATHINFO_BASENAME); // 获取文件名URL
            $newimgs = pathinfo($newimgmini,PATHINFO_BASENAME); // 获取缩略图文件名

            if ( file_exists( $Imgs ) ){ //如果已经存在缩略图
                
                if ( $oldimgs = $newimgs ){
                    $Urls = $zbp->host.'thumb/'.'thumb-' . $article->ID . '-' . $width . '-' . $height . '-' . $num.'-' .pathinfo($imgurl,PATHINFO_BASENAME);
                }else{
                    $Urls = $zbp->host . 'zb_users/theme/'.$zbp->theme.'/functions/thumb2/get.php?id=' . $article->ID . '&width=' . $width . '&height=' . $height . '&num=' . $num;
                }

            }else{ // 不存在缩略图时get
                $Urls = $zbp->host . 'zb_users/theme/'.$zbp->theme.'/functions/thumb2/get.php?id=' . $article->ID . '&width=' . $width . '&height=' . $height . '&num=' . $num;
            }

        }
    }else{
        if ($zbp->Config('ydtu')->noimgstyle2=='1'){
            $Urls = $zbp->Config( 'ydtu' )->noimg2;
        }else{
            $randtemp=mt_rand(1,10);
            $Urls=$zbp->host . "zb_users/theme/" .$zbp->theme. "/include/random/" .$randtemp. ".jpg";
        }
    }
    
    return $Urls;
}

// 创建 thumb /
function ydtu_thumb2_folders( $dir ) {
    global $blogpath;
    return is_dir( $dir )or( ydtu_thumb2_folders( dirname( $dir ) )and mkdir( $dir, 0777 )and @file_put_contents( $blogpath . 'thumb/index.html', '' ) );
}
// 生成缩略图
function ydtu_thumb2_url( $article, $width = '', $height = '',$num = '' ) {
    global $zbp, $blogpath;
    $Urls = '';

    // 创建 thumb /
    $hostdir = $blogpath . "thumb/";
    ydtu_thumb2_folders( $hostdir );
    // 
    $pattern = "/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/";
    $content = $article->Content;
    preg_match_all( $pattern, $content, $matchContent );
    if ( isset( $matchContent[ 1 ][ $num ] ) ) {
        $imgurl=$matchContent[ 1 ][ $num ];

        $miniurl=$blogpath . 'thumb/'.'thumb-' . $article->ID . '-' . $width . '-' . $height . '-' . $num.'-' .pathinfo($imgurl,PATHINFO_BASENAME);
        // $miniurl=$zbp->config('Tcbymt')->Dir.'mini_'.pathinfo($imgurl,PATHINFO_BASENAME);
        if ( file_exists( $miniurl ) ){
            $Urls = $miniurl;
        }else{
            /*判断是否存在*/
            $ydtu_get = Network::Create();
            if ( !$ydtu_get ) {
                throw new Exception( '主机没有开启网络功能' );
            }
            $ydtu_get->open( 'GET', $imgurl );
            $ydtu_get->send();

            if ( $ydtu_get->status == "200" ) {
                ydtu_minimg($imgurl, $miniurl, $width, $height, $num); //原图 缩略图 宽 高 裁切开关
                $Urls = $imgurl;
            }
        }
    } else {
        if ($zbp->Config('ydtu')->noimgstyle2=='1'){
            $Urls = $zbp->Config( 'ydtu' )->noimg2;
        }else{
            $randtemp=mt_rand(1,10);
            $Urls=$zbp->host . "zb_users/theme/" .$zbp->theme. "/include/random/" .$randtemp. ".jpg";
        }
    }

    return $Urls;
}

// 主函数
function ydtu_minimg($src_img, $dst_img, $width, $height){
    global $zbp;
    $cut=1;
    $types = 'jpg|jpeg|gif|png|bmp'; 
    $ot = pathinfo($src_img, PATHINFO_EXTENSION);
    if(stripos($types,$ot)===FALSE){
        // $zbp->SetHint('bad','图片“'.$src_img.'”是不支持的图片格式,请检查并修改！！(::>_<::)');
        return false;
    }
    $otfunc = 'image' . ($ot == 'jpg' ? 'jpeg' : $ot);
    if(substr($src_img, 0, 1) == '/') {
        $src_img = $zbp->host.$src_img;  
    }
    $srcinfo = getimagesize($src_img);
    if($srcinfo === FALSE) {
        // $zbp->SetHint('bad','图片“'.$src_img.'”不存在或无法获取，请检查并重试！(^人^)');
        return false;
    }
    $src_w = $srcinfo[0];
    $src_h = $srcinfo[1];
    $type  = strtolower(substr(image_type_to_extension($srcinfo[2]), 1));
    $createfun = 'imagecreatefrom' . ($type == 'jpg' ? 'jpeg' : $type);
    $dst_h = $height;
    $dst_w = $width;
    $x = $y = 0;
    if($cut != -1 && $width >= $src_w && $height >= $src_h) return false;
    if($width> $src_w) $dst_w = $width = $src_w;
    if($height> $src_h) $dst_h = $height = $src_h; 
    if(!$width && !$height) return false;
    if($cut == 0){
        if($dst_w && $dst_h){
            if($dst_w/$src_w> $dst_h/$src_h){
                $dst_w = $src_w * ($dst_h / $src_h);
                $x = 0 - ($dst_w - $width) / 2;
            }else{
                $dst_h = $src_h * ($dst_w / $src_w);
                $y = 0 - ($dst_h - $height) / 2;
            }
        }else{
            if($dst_w xor $dst_h){
                if($dst_w && !$dst_h){  //有宽无高                
                    $propor = $dst_w / $src_w;
                    $height = $dst_h  = $src_h * $propor;
                }else{
                    if(!$dst_w && $dst_h){  //有高无宽                
                        $propor = $dst_h / $src_h;
                        $width  = $dst_w = $src_w * $propor;
                    }
                }
            } 
        }
    }else{  
        if(!$dst_h) $height = $dst_h = $dst_w; //裁剪时无高
        if(!$dst_w) $width = $dst_w = $dst_h; //裁剪时无宽           
        $propor = min(max($dst_w / $src_w, $dst_h / $src_h), 1);
        $dst_w = (int)round($src_w * $propor);
        $dst_h = (int)round($src_h * $propor);
        $x = ($width - $dst_w) / 2;
        $y = ($height - $dst_h) / 2;
    }
    $src = $createfun($src_img);
    $dst = imagecreatetruecolor($width ? $width : $dst_w, $height ? $height : $dst_h);
    $white = imagecolorallocate($dst, 255, 255, 255);
    imagefill($dst, 0, 0, $white);
    if(function_exists('imagecopyresampled'))  imagecopyresampled($dst, $src, $x, $y, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
    else imagecopyresized($dst, $src, $x, $y, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
    $otfunc($dst, $dst_img);
    imagedestroy($dst);
    imagedestroy($src);
    return true;
}

function ydtu_thumb2del() {
    global $zbp;
    //先删除目录下的文件：
    $dir = $GLOBALS[ 'blogpath' ] . "thumb";
    if ( is_dir( $dir ) ) {
        $dh = opendir( $dir );
        while ( $file = readdir( $dh ) ) {
            if ( $file != "." && $file != ".." ) {
                $fullpath = $dir . "/" . $file;
                if ( !is_dir( $fullpath ) ) {
                    unlink( $fullpath );
                } else {
                    ydtu_thumb2del( $fullpath );
                }
            }
        }
        closedir( $dh );
        //删除当前文件夹：
        if ( rmdir( $dir ) ) {
            return true;
        } else {
            return false;
        }
    }
}


?>
