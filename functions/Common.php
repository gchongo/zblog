<?php

// 间隔符
function ydtu_JianGeFu(){
    global $zbp;
    $str = '';
    // $array = $zbp->Config('ydlinux')->jiangefu;
    if ($zbp->Config('ydtu')->jiangefu) {
        $str .= $zbp->Config('ydtu')->jiangefu;
    }else{
        $str .='_';
    }
    return $str;
}


//调取图片
function ydtu_thumbnail($related) {
    global $zbp;	
	$temp=mt_rand(1,10);
	$pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/";
	$content = $related->Content; 
	preg_match_all($pattern,$content,$matchContent);
	if(isset($matchContent[1][0])){
		$thumb=$matchContent[1][0]; 
	}else{		
		$thumb=$zbp->host . "zb_users/theme/" .$zbp->theme. "/include/random/" .$temp. ".jpg";
	}
    return $thumb;
}

//判断手机端{if ydtu_is_mobile()} m {else} pc {/if}
function ydtu_is_mobile() {
    if ( empty($_SERVER['HTTP_USER_AGENT']) ) {
        $is_mobile = false;
    } elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false // many mobile devices (all iPhone, iPad, etc.)
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mobi') !== false ) {
            $is_mobile = true;
    } else {
        $is_mobile = false;
    }
 
    return $is_mobile;
}
//摘要
function ydtu_intro($as,$type,$long,$other) {
    global $zbp;
    $str = '';
    if ($type=='0') {
	$str .= trim(SubStrUTF8(TransferHTML($as->Intro,'[nohtml]'),$long)).$other;
    } else {
	$str .= trim(SubStrUTF8(TransferHTML($as->Content,'[nohtml]'),$long)).$other;
    }
    return $str;
}

//主题缓存
function zbp_BuildTemplate() {
    global $zbp;
    $st = '';
    $cacheThemeFileydtu = $zbp->usersdir . 'cache/cacheThemeFileydtu.txt';
    if (file_exists($cacheThemeFileydtu)){
    } else {
    $zbp->Config('ydtu')->ydtu_zbptheme = 'Theme By <a href="https://www.ylefu.com/" target="_blank">前端老白</a>';
    $zbp->SaveConfig('ydtu');
    //重建缓存
    $zbp->template->BuildTemplate();
    $st = '';
    file_put_contents($cacheThemeFileydtu, $st);
    }
}

//友好时间
function ydtu_TimeAgo( $ptime ) {
    $ptime = strtotime($ptime);
    $etime = time() - $ptime;
    if($etime < 1) return '刚刚';
    $interval = array (
        //12 * 30 * 24 * 60 * 60  =>  '年前 ('.date('Y-m-d', $ptime).')',
        //30 * 24 * 60 * 60       =>  '个月前 ('.date('m-d', $ptime).')',
        //7 * 24 * 60 * 60        =>  '周前 ('.date('m-d', $ptime).')',
		12 * 30 * 24 * 60 * 60  =>  '年前',
        30 * 24 * 60 * 60       =>  '个月前',
        7 * 24 * 60 * 60        =>  '周前',
        24 * 60 * 60            =>  '天前',
        60 * 60                 =>  '小时前',
        60                      =>  '分钟前',
        1                       =>  '秒前'
    );
    foreach ($interval as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return $r . $str;
        }
    };
}

?>