<?php
require '../../../../zb_system/function/c_system_base.php';
require $blogpath . 'zb_users/theme/ydtu/admin/header.php';
?>
<!--主题配置开始-->
<div class="SubMenu">
<?php ydtu_SubMenu(11);?>
</div>
<script type="text/javascript" src="<?php echo $bloghost?>zb_users/theme/ydtu/admin/color/farbtastic.js"></script>
<link rel="stylesheet" href="<?php echo $bloghost?>zb_users/theme/ydtu/admin/color/farbtastic.css" type="text/css" />
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
    	$('#picker').farbtastic('#color');
		$('#picker2').farbtastic('#color2');
	});
</script>
<div id="divMain2">
<!--首页设置-->
	<?php
	if(count($_POST)>0){
		$zbp->Config( 'ydtu' )->color = $_POST[ 'color' ];
		$zbp->Config( 'ydtu' )->color2 = $_POST[ 'color2' ];

		$ydtu_css = @file_get_contents($zbp->path.'zb_users/theme/ydtu/style/style.css');
		$ydtu_css = str_replace("#888", $zbp->Config('ydtu')->color, $ydtu_css);
		$ydtu_css = str_replace("#a98752", $zbp->Config('ydtu')->color2, $ydtu_css);
//		$ydtu_css = str_replace("#FF6360", $zbp->Config('ydtu')->color3, $ydtu_css);
//		if($zbp->Config('ydtu')->searchright=='true'){
//		$ydtu_css .='';//自定义css
//		}
		@file_put_contents($zbp->path.'zb_users/theme/ydtu/style/style.ok.css', $ydtu_css);
		
		if(GetVars('coloroff')){//开关
			$zbp->Config('ydtu')->coloroff = $_POST['coloroff'];
		}else{
			$zbp->Config('ydtu')->coloroff = '';
		}
		$zbp->SaveConfig( 'ydtu' );
		$zbp->ShowHint( 'good' );
	}
	?>
	<form id="form2" name="form2" method="post">
		<div class="lbadmin" id="lbcolor">
			<!--///-->
			<h3>主题配色(如果开启，修改CSS文件后，请到这里点下保存更新CSS)</h3>
			<div class="lbimport">
				<span>自定义配色</span>
				<input type="checkbox" name="coloroff" id="coloroff" value="true" <?php if($zbp->Config('ydtu')->coloroff) echo 'checked="checked"'?> />
				<i class="red">自定义配色，默认不用开启<br>如果修改CSS文件，请修zb_user/theme/ydtu/style/style.css</i>
			</div>
			<!--///-->
			<div class="lbimport">
				<span>主要字体颜色</span>
				<input type="text" name="color" id="color" value="<?php echo $zbp->Config('ydtu')->color;?>">
				<div id="picker"></div>
				<i>改变后保存，自行判断</i>
			</div>
			<!--///-->
			<div class="lbimport">
				<span>触发高亮色</span>
				<input type="text" name="color2" id="color2" value="<?php echo $zbp->Config('ydtu')->color2;?>">
				<div id="picker2"></div>
				<i>改变后保存，自行判断</i>
			</div>
			<!--///-->
			<input name="" type="Submit" class="button" value="保存"/>
		</div>
		
	</form>
<!---->
</div>
<?php require $blogpath . 'zb_users/theme/ydtu/admin/footer.php'; ?>