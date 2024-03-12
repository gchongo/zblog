<?php
require '../../../../zb_system/function/c_system_base.php';
require $blogpath . 'zb_users/theme/ydtu/admin/header.php';
?>
<!--主题配置开始-->
<div class="SubMenu">
<?php ydtu_SubMenu(12);?>
</div>
<div id="divMain2">
<!--菜单-->
<?php
	if(count($_POST)>0){
		$zbp->Config( 'ydtu' )->navhtml2 = $_POST[ 'navhtml2' ];
		//search
		
		if(GetVars('navbar2')){
			$zbp->Config('ydtu')->navbar2 = $_POST['navbar2'];
		}else{
			$zbp->Config('ydtu')->navbar2 = '';
		}
		if(GetVars('nav2')){
			$zbp->Config('ydtu')->nav2 = $_POST['nav2'];
		}else{
			$zbp->Config('ydtu')->nav2 = '';
		}
		$zbp->SaveConfig( 'ydtu' );
		$zbp->ShowHint( 'good' );
	}
?>
	<form id="form2" name="form2" method="post">
		<div class="lbadmin">
			<h3>侧栏菜单设置(可自由搭配)</h3>
			<div class="lbimport">
				<span>导航栏</span>
				<input type="checkbox" name="navbar2" id="navbar2" value="true" <?php if($zbp->Config('ydtu')->navbar2) echo 'checked="checked"'?> />
				<i>使用导航栏的话，需要设置：分类管理 - 编辑分类 - 加入导航栏，页面也是</i>
			</div>
			<div class="lbimport">
				<span>使用DIY自定义</span>
				<input type="checkbox" name="nav2" id="nav2" value="true" <?php if($zbp->Config('ydtu')->nav2) echo 'checked="checked"'?> />
				<i>侧栏菜单加入自定义代码，可单独或者配合使用，选择后请修改下方代码框内代码！</i>
			</div>
			<!--///-->
			<div class="lbimport">
				<span>DIY导航菜单代码</span>
				<textarea name="navhtml2" type="text"  id="navhtml2" rows="12"><?php echo $zbp->Config('ydtu')->navhtml2;?></textarea>
				<i>请按格式修改，不懂的话，就选择其它项，前台得到代码，复制粘贴过来自行修改</i>
			</div>
			<!--///-->
			<input name="" type="Submit" class="button" value="保存"/>
		</div>
	</form>
<!---->
</div>
<?php require $blogpath . 'zb_users/theme/ydtu/admin/footer.php'; ?>