<?php
require '../../../../zb_system/function/c_system_base.php';
require $blogpath . 'zb_users/theme/ydtu/admin/header.php';
?>
<!--主题配置开始-->
<div class="SubMenu">
<?php ydtu_SubMenu(3);?>
</div>
<div id="divMain2">
<!--首页设置-->
	<?php
	if(count($_POST)>0){
		$zbp->Config( 'ydtu' )->indexdiyid = $_POST[ 'indexdiyid' ];
		
		if(GetVars('slider')){//幻灯片
			$zbp->Config('ydtu')->slider = $_POST['slider'];
		}else{
			$zbp->Config('ydtu')->slider = '';
		}
		if(GetVars('homelink')){
			$zbp->Config('ydtu')->homelink = $_POST['homelink'];
		}else{
			$zbp->Config('ydtu')->homelink = '';
		}
		
		$zbp->SaveConfig( 'ydtu' );
		$zbp->ShowHint( 'good' );
	}
	?>
	<form id="form2" name="form2" method="post">
		<div class="lbadmin">
			<!--///-->
			<h3>首页设置</h3>
			<!--///-->
			<div class="lbimport">
				<span>幻灯片</span>
				<input type="checkbox" name="slider" id="slider" value="true" <?php if($zbp->Config('ydtu')->slider) echo 'checked="checked"'?> />
				<i class="red">请到 <a href="slide.php">幻灯片</a> 项去设置图片！</i>
			</div>
			

			<div class="lbimport">
				<span>首页增加自定义文章ID</span>
				<input type="text" name="indexdiyid" id="indexdiyid" value="<?php echo $zbp->Config('ydtu')->indexdiyid;?>">
				<i>排在图片列表最前，输入文章ID，英文小逗号隔开，不限ID个数，留空则不增加</i>
			</div>

			<div class="lbimport">
				<span>首页底部友情链接</span>
				<input type="checkbox" name="homelink" value="true" <?php if($zbp->Config('ydtu')->homelink) echo 'checked="checked"'?> />
				<i class="red">如果不选择底部显示，也可以拖拽友情链接模块到默认侧栏</i>
			</div>
			<!--///-->
			<input name="" type="Submit" class="button" value="保存"/>
		</div>
		
	</form>
<!---->
</div>
<?php require $blogpath . 'zb_users/theme/ydtu/admin/footer.php'; ?>