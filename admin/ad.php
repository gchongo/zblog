<?php
require '../../../../zb_system/function/c_system_base.php';
require $blogpath . 'zb_users/theme/ydtu/admin/header.php';
?>
<!--主题配置开始-->
<div class="SubMenu">
<?php ydtu_SubMenu(5);?>
</div>
<div id="divMain2">
<!---->
	<?php
	if(count($_POST)>0){
		//$zbp->Config( 'ydtu' )->ad1 = $_POST[ 'ad1' ];
		$zbp->Config( 'ydtu' )->ad2 = $_POST[ 'ad2' ];
		$zbp->Config( 'ydtu' )->ad3 = $_POST[ 'ad3' ];
		$zbp->Config( 'ydtu' )->mad2 = $_POST[ 'mad2' ];
		$zbp->Config( 'ydtu' )->mad3 = $_POST[ 'mad3' ];
		$zbp->Config( 'ydtu' )->ad4 = $_POST[ 'ad4' ];

		if(GetVars('ad2off')){//开关
			$zbp->Config('ydtu')->ad2off = $_POST['ad2off'];
		}else{
			$zbp->Config('ydtu')->ad2off = '';
		}
		if(GetVars('ad3off')){//开关
			$zbp->Config('ydtu')->ad3off = $_POST['ad3off'];
		}else{
			$zbp->Config('ydtu')->ad3off = '';
		}
		if(GetVars('mad2off')){//开关
			$zbp->Config('ydtu')->mad2off = $_POST['mad2off'];
		}else{
			$zbp->Config('ydtu')->mad2off = '';
		}
		if(GetVars('mad3off')){//开关
			$zbp->Config('ydtu')->mad3off = $_POST['mad3off'];
		}else{
			$zbp->Config('ydtu')->mad3off = '';
		}
		if(GetVars('ad4off')){//开关
			$zbp->Config('ydtu')->ad4off = $_POST['ad4off'];
		}else{
			$zbp->Config('ydtu')->ad4off = '';
		}
		$zbp->SaveConfig( 'ydtu' );
		$zbp->ShowHint( 'good' );
	}
	?>
	<form id="form2" name="form2" method="post">
		<div class="lbadmin">
			<!--///-->
			<h3>广告位设置</h3>

			<!-------------///-------->
			<div class="lbimport">
				<span>菜单+搜索下广告位</span>
				<input type="checkbox" name="ad4off" id="ad4off" value="true" <?php if($zbp->Config('ydtu')->ad4off) echo 'checked="checked"'?> />
			</div>
			<div class="lbimport">
				<span>&nbsp;</span>
				<textarea style="text" name="ad4" id="ad4" rows="3"><?php echo $zbp->Config('ydtu')->ad4;?></textarea>
				<i class="red">需要输入HTML代码，比如图片需要用到<br>&lt;img src="图片地址" &gt;<br>图片带链接需要加a标签<br>
				&lt;a href="链接网址"&gt;&lt;img src="图片地址" &gt;&lt;/a&gt;
				</i>
			</div>
			<!-------------///-------->
			<div class="lbimport">
				<span>文章页内容上广告位</span>
				<input type="checkbox" name="ad2off" id="ad2off" value="true" <?php if($zbp->Config('ydtu')->ad2off) echo 'checked="checked"'?> />
			</div>
			<div class="lbimport">
				<span>&nbsp;</span>
				<textarea style="text" name="ad2" id="ad2" rows="3"><?php echo $zbp->Config('ydtu')->ad2;?></textarea>
				<i>同上</i>
			</div>

			<div class="lbimport">
				<span>内容上广告位（手机端）</span>
				<input type="checkbox" name="mad2off" value="true" <?php if($zbp->Config('ydtu')->mad2off) echo 'checked="checked"'?> />
			</div>
			<div class="lbimport">
				<span>&nbsp;</span>
				<textarea style="text" name="mad2" rows="3"><?php echo $zbp->Config('ydtu')->mad2;?></textarea>
				<i>同上</i>
			</div>
			<!-------------///-------->
			<div class="lbimport">
				<span>文章页内容下广告位</span>
				<input type="checkbox" name="ad3off" id="ad3off" value="true" <?php if($zbp->Config('ydtu')->ad3off) echo 'checked="checked"'?> />
			</div>
			<div class="lbimport">
				<span>&nbsp;</span>
				<textarea style="text" name="ad3" id="ad3" rows="3"><?php echo $zbp->Config('ydtu')->ad3;?></textarea>
				<i>同上</i>
			</div>
			<div class="lbimport">
				<span>内容下广告位（手机端）</span>
				<input type="checkbox" name="mad3off" value="true" <?php if($zbp->Config('ydtu')->mad3off) echo 'checked="checked"'?> />
			</div>
			<div class="lbimport">
				<span>&nbsp;</span>
				<textarea style="text" name="mad3" rows="3"><?php echo $zbp->Config('ydtu')->mad3;?></textarea>
				<i>同上</i>
			</div>
			<!--///-->
			<!--///-->
			<input name="" type="Submit" class="button" value="保存"/>
		</div>
		
	</form>
<!---->
</div>
<?php require $blogpath . 'zb_users/theme/ydtu/admin/footer.php'; ?>