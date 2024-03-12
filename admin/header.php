<?php
require '../../../../zb_system/function/c_system_admin.php';
$zbp->Load();
$action = 'root';
if ( !$zbp->CheckRights( $action ) ) {
	$zbp->ShowError( 6 );
	die();
}
if ( !$zbp->CheckPlugin( 'ydtu' ) ) {
	$zbp->ShowError( 48 );
	die();
}
$blogtitle = '主题配置';
require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';
?>
<link rel="stylesheet" type="text/css" href="<?php echo $bloghost?>zb_users/theme/ydtu/admin/css/style.css?v={$zbp->themeapp->version}">
<script type="text/javascript" src="<?php echo $bloghost?>zb_users/theme/ydtu/admin/js/common.js?v={$zbp->themeapp->version}"></script>
<?php
	if(count($_POST)>0){
		$zbp->Config('ydtu')->ydtu_zbptheme = 'Theme By <a href="https://www.ylefu.com/" target="_blank">前端老白</a>';
	}
?>
<div id="divMain">
	<div class="divHeader">
		<?php echo $blogtitle;?>
	</div>
	