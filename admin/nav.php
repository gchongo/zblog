<?php
require '../../../../zb_system/function/c_system_base.php';
require $blogpath . 'zb_users/theme/ydtu/admin/header.php';
?>
<!--主题配置开始-->
<div class="SubMenu">
<?php ydtu_SubMenu(6);?>
</div>
<div id="divMain2">
<!--菜单-->
<?php
	if(count($_POST)>0){
		$zbp->Config( 'ydtu' )->navhtml = $_POST[ 'navhtml' ];
		//search
		if(GetVars('search')){
			$zbp->Config('ydtu')->search = $_POST['search'];
		}else{
			$zbp->Config('ydtu')->search = '';
		}
		
		if(GetVars('catalog')){
			$zbp->Config('ydtu')->catalog = $_POST['catalog'];
		}else{
			$zbp->Config('ydtu')->catalog = '';
		}
		if(GetVars('home')){
			$zbp->Config('ydtu')->home = $_POST['home'];
		}else{
			$zbp->Config('ydtu')->home = '';
		}
		if(GetVars('navbar')){
			$zbp->Config('ydtu')->navbar = $_POST['navbar'];
		}else{
			$zbp->Config('ydtu')->navbar = '';
		}
		if(GetVars('nav')){
			$zbp->Config('ydtu')->nav = $_POST['nav'];
		}else{
			$zbp->Config('ydtu')->nav = '';
		}
		$zbp->SaveConfig( 'ydtu' );
		$zbp->ShowHint( 'good' );
	}
?>
	<form id="form2" name="form2" method="post">
		<div class="lbadmin">
			<h3>顶部导航菜单区域设置</h3>
			
			<div class="lbimport">
				<span>导航右侧搜索</span>
				<input type="checkbox" name="search" id="search" value="true" <?php if($zbp->Config('ydtu')->search) echo 'checked="checked"'?> />
			</div>
			
			<h3>菜单选择(可多选)</h3>
			<div class="lbimport">
				<span>首页</span>
				<input type="checkbox" name="home" id="home" value="true" <?php if($zbp->Config('ydtu')->home) echo 'checked="checked"'?> />
			</div>
			<div class="lbimport">
				<span>下拉分类</span>
				<input type="checkbox" name="catalog" id="catalog" value="true" <?php if($zbp->Config('ydtu')->catalog) echo 'checked="checked"'?> />
				<i class="red">如果要开启下拉菜单，需要有子分类，且去设置：后台 - 模块管理 - 网站分类 - UL嵌套 - 保存</i>
			</div>
			<div class="lbimport">
				<span>导航栏</span>
				<input type="checkbox" name="navbar" id="navbar" value="true" <?php if($zbp->Config('ydtu')->navbar) echo 'checked="checked"'?> />
				<i>使用导航栏的话，需要设置：分类管理 - 编辑分类 - 加入导航栏，页面也是</i>
			</div>
			<div class="lbimport">
				<span>使用DIY自定义</span>
				<input type="checkbox" name="nav" id="nav" value="true" <?php if($zbp->Config('ydtu')->nav) echo 'checked="checked"'?> />
				<i>导航菜单加入自定义代码，可单独或者配合使用，选择后请修改下方代码框内代码！</i>
			</div>
			<!--///-->
			<div class="lbimport">
				<span>DIY导航菜单代码</span>
				<textarea name="navhtml" type="text"  id="navhtml" rows="12"><?php echo $zbp->Config('ydtu')->navhtml;?></textarea>
				<i>请按格式修改，不懂的话，就选择其它项，前台得到代码，复制粘贴过来自行修改</i>
			</div>
			<!--///-->
			<input name="" type="Submit" class="button" value="保存"/>
		</div>
	</form>
<!---->
</div>
<?php require $blogpath . 'zb_users/theme/ydtu/admin/footer.php'; ?>