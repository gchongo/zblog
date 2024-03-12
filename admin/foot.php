<?php
require '../../../../zb_system/function/c_system_base.php';
require $blogpath . 'zb_users/theme/ydtu/admin/header.php';
?>
<!--主题配置开始-->
<div class="SubMenu">
<?php ydtu_SubMenu(10);?>
</div>
<div id="divMain2">
<!--菜单-->
<?php
	if(count($_POST)>0){

		$zbp->Config( 'ydtu' )->foothtml = $_POST[ 'foothtml' ];//foothtml
		//大页脚开关
		if(GetVars('foot')){//开关
			$zbp->Config('ydtu')->foot = $_POST['foot'];
		}else{
			$zbp->Config('ydtu')->foot = '';
		}
		
		$zbp->SaveConfig( 'ydtu' );
		$zbp->ShowHint( 'good' );
	}
?>
	<form id="form2" name="form2" method="post">
		<div class="lbadmin">
			<h3>页脚设置</h3>
			
			<div class="lbimport">
				<span>页脚菜单</span>
				<input type="checkbox" name="foot" id="foot" value="true" <?php if($zbp->Config('ydtu')->foot) echo 'checked="checked"'?> />
				<i>页脚菜单是否需要开启</i>
			</div>
			<!--////-->
			<div class="lbimport">
				<span>页脚自定义菜单</span>
				<textarea name="foothtml" type="text" id="foothtml" rows="6"><?php echo $zbp->Config('ydtu')->foothtml;?></textarea>
				<i>按既有格式修改</i>
			</div>
			<!--///-->
			<input name="" type="Submit" class="button" value="保存"/>
		</div>
	</form>
<!---->
</div>
<?php require $blogpath . 'zb_users/theme/ydtu/admin/footer.php'; ?>