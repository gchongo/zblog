<?php
require '../../../../zb_system/function/c_system_base.php';
require $blogpath . 'zb_users/theme/ydtu/admin/header.php';
?>
<!--主题配置开始-->
<div class="SubMenu">
<?php ydtu_SubMenu(13);?>
</div>
<!--UEditor提醒-->
<?php if (!$zbp->CheckPlugin('UEditor')) {echo '<div class="tixing"><p><b class="red">温馨提示：</b>您可以不使用<a href="'.$zbp->host.'zb_users/plugin/AppCentre/main.php?id=228" target="_blank">UEditor编辑器</a>，关闭它，但一定不要删除，否则可能影响图片上传。</p></div>';} ?>
<!--@ UEditor提醒-->
<?php
if(isset($_GET['order']) &&  $_GET['order']== 'delthumb' ){	
	ydtu_thumb2del();	
	$zbp->SetHint('good','所有缩略图删除成功');
	Redirect('./thumb2.php');
	exit;
}
?>
<div id="divMain2">
<!--菜单-->
<?php
	if(count($_POST)>0){
		$zbp->Config( 'ydtu' )->noimg2 = $_POST[ 'noimg2' ];
		
		if(GetVars('thumb2')){
			$zbp->Config('ydtu')->thumb2 = $_POST['thumb2'];
		}else{
			$zbp->Config('ydtu')->thumb2 = '';
		}
		if(GetVars('noimgstyle2')){
			$zbp->Config('ydtu')->noimgstyle2 = $_POST['noimgstyle2'];
		}else{
			$zbp->Config('ydtu')->noimgstyle2 = '';
		}
		$zbp->SaveConfig( 'ydtu' );
		$zbp->ShowHint( 'good' );
	}
?>
	<form method="post" action="thumb2.php?order=delthumb">
		<div class="laobai_wrap">
			<input type="submit" value="清空缩略图" />
		</div>
	</form>
	<form id="form2" name="form2" method="post">
		<div class="lbadmin">
			<h3>缩略图设置</h3>
			<div class="lbimport">
				<span>开启缩略图</span>
				<input type="checkbox" name="thumb2" id="navbar2" value="true" <?php if($zbp->Config('ydtu')->thumb2) echo 'checked="checked"'?> />
				<i>不开启缩略图则调取原图</i>
			</div>

			<div class="lbimport">
				<span>文章无图的时候</span>
				<div class="radios">
					<label>
						<input type="radio" name="noimgstyle2" value="1" <?php if($zbp->Config('ydtu')->noimgstyle2 == '1') echo 'checked'?> />指定一张无图标识图片
					</label>
					<label>
						<input type="radio" name="noimgstyle2" value="2" <?php if($zbp->Config('ydtu')->noimgstyle2 == '2') echo 'checked'?> />随机调取几张图(可FTP替换)
					</label>
				</div>
			</div>

			<div class="lbimport">
				<span>指定一张无图标识图片</span>
				<input type="text" name="noimg2" class="uplod_img" placeholder="点我！点我！！点我！！！" value="<?php echo $zbp->Config('ydtu')->noimg2;?>">
				<i class="red">上方单选，选择无图指定图片的时候，请上传图片</i>
			</div>


			<!--///-->
			<input name="" type="Submit" class="button" value="保存"/>
		</div>
	</form>
<!---->
</div>

<script type="text/javascript" src="<?php echo $bloghost?>zb_users/plugin/UEditor/ueditor.config.php"></script>
<script type="text/javascript" src="<?php echo $bloghost?>zb_users/plugin/UEditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="<?php echo $bloghost?>zb_users/theme/ydtu/admin/js/lib.upload.js"></script>
<?php require $blogpath . 'zb_users/theme/ydtu/admin/footer.php'; ?>