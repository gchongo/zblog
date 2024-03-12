<?php
require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'functions/Add_Filter_Plugin.php';
require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'functions/Common.php';
require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'functions/RegBuildModule.php';
require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'functions/thumb2/Thumb.php';

RegisterPlugin("ydtu","ActivePlugin_ydtu");
function ActivePlugin_ydtu(){
	global $zbp;
	Add_Filter_Plugin('Filter_Plugin_Admin_TopMenu','ydtu_AddMenu');//主题配置选项
	Add_Filter_Plugin('Filter_Plugin_Zbp_BuildModule','ydtu_rebuild_Main');//重新加载边栏
	Add_Filter_Plugin('Filter_Plugin_Admin_Header','zbp_BuildTemplate');
	if ($zbp->Config('ydtu')->seo=="true"){
		if (!$zbp->Config('ydtu')->seo_cat) {
			Add_Filter_Plugin('Filter_Plugin_Category_Edit_Response','ydtu_cate_seo');//分类自定义字段
		}
		if (!$zbp->Config('ydtu')->seo_tag) {
			Add_Filter_Plugin('Filter_Plugin_Tag_Edit_Response','ydtu_tag_seo');//tag自定义字段
		}
	}
	Add_Filter_Plugin('Filter_Plugin_ViewList_Template','ydtu_tags_set');//hdp
}

function ydtu_AddMenu(&$m){
	global $zbp;
	array_unshift($m, MakeTopMenu("root",'主题配置',$zbp->host . "zb_users/theme/$zbp->theme/admin/relevant.php","","topmenu_ydtu"));
}

function ydtu_SubMenu($id){
	$arySubMenu = array(		
		0 => array('主题说明', 'relevant', 'left', false),
	    1 => array('基本设置', 'config', 'left', false),
		3 => array('首页设置', 'index', 'left', false),
		//8 => array('分类页', 'category', 'left', false),
		4 => array('文章页', 'article', 'left', false),
		6 => array('顶部菜单', 'nav', 'left', false),
		12 => array('侧栏菜单', 'nav2', 'left', false),
		7 => array('幻灯片', 'slide', 'left', false),
		13 => array('缩略图', 'thumb2', 'left', false),
		2 => array('SEO', 'seo', 'left', false),
		//9 => array('特有', 'special', 'left', false),
		11 => array('主题配色', 'color', 'left', false),
		//10 => array('页脚', 'foot', 'left', false),
		5 => array('广告', 'ad', 'left', false),
		
		
	);
	foreach($arySubMenu as $k => $v){
		echo '<a href="'.$v[1].'.php" '.($v[3]==true?'target="_blank"':'').'><span class="m-'.$v[2].' '.($id==$k?'m-now':'').'">'.$v[0].'</span></a>';
	}
}

function InstallPlugin_ydtu(){
	global $zbp;
	if(!$zbp->Config('ydtu')->HasKey('Version')){
		$zbp->Config('ydtu')->Version = '1.0';
		$zbp->Config('ydtu')->weibo = 'http://weibo.com/';
		$zbp->Config('ydtu')->sidebarstyle = '1';
		$zbp->Config('ydtu')->timestyle = '1';
		$zbp->Config('ydtu')->side_gensui = 'true';
		$zbp->Config('ydtu')->infotitle = 'true';
		$zbp->Config('ydtu')->infotag = 'true';
		$zbp->Config('ydtu')->infotime = 'true';
		$zbp->Config('ydtu')->indexdiyid = '3,4,5';
		$zbp->Config('ydtu')->slider = 'true';
		$zbp->Config('ydtu')->thumb2 = 'true';
		$zbp->Config('ydtu')->noimgstyle2 = '2';
		$zbp->Config('ydtu')->homelink = 'true';
		$zbp->Config('ydtu')->gotop = 'true';
		$zbp->Config('ydtu')->copyrighthtml = '<h5>版权声明</h5>
<p>本文仅代表作者观点，不代表XX立场。<br>本文系作者授权XXXX发表，未经许可，不得转载。</p>';
		$zbp->Config('ydtu')->posttitle = 'true';
		$zbp->Config('ydtu')->postinfo = 'true';
		$zbp->Config('ydtu')->copyrightoff = 'true';
		$zbp->Config('ydtu')->share = 'true';
		$zbp->Config('ydtu')->postrelated = 'true';
		$zbp->Config('ydtu')->postcategory = 'true';
		$zbp->Config('ydtu')->postnew = 'true';
		$zbp->Config('ydtu')->search = 'true';
		$zbp->Config('ydtu')->navbar = 'true';
		$zbp->Config('ydtu')->navhtml = '<li id="nvabar-item-index"><a href="http://www.ylefu.com/">首页</a></li>
<li id="navbar-category-16"><a href="http://www.ylefu.com/zblog/">zblog模板制作</a></li>
<li id="navbar-category-17"><a href="http://www.ylefu.com/zblog/">zblogphp主题模板</a></li>
<li id="navbar-category-18"><a href="http://www.ylefu.com/zblogfree/">zblog免费模板</a></li>
<li id="navbar-category-28"><a href="http://www.ylefu.com/qianduan/">前端技术</a></li>';
		$zbp->Config('ydtu')->nav2 = 'true';
		$zbp->Config('ydtu')->navhtml2 = '<li><a href="#">關於</a></li>
<li><a href="#">活版工藝</a></li>';
		$zbp->Config('ydtu')->seo = 'true';
		$zbp->Config('ydtu')->jiangefu = ' - ';
		$zbp->Config('ydtu')->hometitle = '';
		$zbp->Config('ydtu')->coloroff = '';
		$zbp->Config('ydtu')->color = '#888';
		$zbp->Config('ydtu')->color2 = '#a98752';
		$zbp->Config('ydtu')->ad2 = '<a href="链接网址"><img src="图片地址" ></a>';
		$zbp->Config('ydtu')->ad3 = '<a href="链接网址">文字文字文字文字</a>';
		$zbp->Config('ydtu')->ad4 = '<a href="链接网址"><img src="图片地址" ></a>';
		$zbp->Config('ydtu')->ydtu_clearSetting ='';//清配置
		$zbp->Config('ydtu')->ydtu_zbptheme = 'Theme By <a href="https://www.ylefu.com/" target="_blank">前端老白</a>';
		$zbp->SaveConfig('ydtu');
	}
	if(!$zbp->Config('ydtu')->Haskey("ydtu_zbptheme")){
    	$zbp->Config('ydtu')->ydtu_zbptheme = 'Theme By <a href="https://www.ylefu.com/" target="_blank">前端老白</a>';
    	$zbp->SaveConfig('ydtu');
    }
}

//应用升级时执行
function UpdatePlugin_ydtu()
{
    global $zbp;
	if(!$zbp->Config('ydtu')->Haskey("ydtu_zbptheme")){
    	$zbp->Config('ydtu')->ydtu_zbptheme = 'Theme By <a href="https://www.ylefu.com/" target="_blank">前端老白</a>';
    	$zbp->SaveConfig('ydtu');
    }
    if(!$zbp->Config('ydtu')->Haskey("Version")){
        $zbp->Config('ydtu')->Version = '1.5';
        $zbp->SaveConfig('ydtu');
    }
}

//旧版兼容
function ydtu_Updated()
{
    UpdatePlugin_ydtu();
}

function UninstallPlugin_ydtu(){
	global $zbp;
	//清空主题配置
	if ($zbp->Config('ydtu')->ydtu_clearSetting){
		$zbp->DelConfig('ydtu');		
	}
	$zbp->SetHint('good','OK');
}


?>