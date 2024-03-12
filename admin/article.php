<?php
require '../../../../zb_system/function/c_system_base.php';
require $blogpath . 'zb_users/theme/ydtu/admin/header.php';
?>
<!--主题配置开始-->
<div class="SubMenu">
<?php ydtu_SubMenu(4);?>
</div>
<div id="divMain2">
<!---->
<?php
	if(count($_POST)>0){
		$zbp->Config( 'ydtu' )->copyrighthtml = $_POST[ 'copyrighthtml' ];//copyrighthtml
		//share
		if(GetVars('posttitle')){
			$zbp->Config('ydtu')->posttitle = $_POST['posttitle'];
		}else{
			$zbp->Config('ydtu')->posttitle = '';
		}
		
		if(GetVars('postinfo')){
			$zbp->Config('ydtu')->postinfo = $_POST['postinfo'];
		}else{
			$zbp->Config('ydtu')->postinfo = '';
		}
		
		if(GetVars('copyrightoff')){
			$zbp->Config('ydtu')->copyrightoff = $_POST['copyrightoff'];
		}else{
			$zbp->Config('ydtu')->copyrightoff = '';
		}
		if(GetVars('share')){
			$zbp->Config('ydtu')->share = $_POST['share'];
		}else{
			$zbp->Config('ydtu')->share = '';
		}
		
		if(GetVars('postrelated')){
			$zbp->Config('ydtu')->postrelated = $_POST['postrelated'];
		}else{
			$zbp->Config('ydtu')->postrelated = '';
		}
		if(GetVars('postcategory')){
			$zbp->Config('ydtu')->postcategory = $_POST['postcategory'];
		}else{
			$zbp->Config('ydtu')->postcategory = '';
		}
		if(GetVars('postnew')){
			$zbp->Config('ydtu')->postnew = $_POST['postnew'];
		}else{
			$zbp->Config('ydtu')->postnew = '';
		}

		$zbp->SaveConfig( 'ydtu' );
		$zbp->ShowHint( 'good' );
	}
?>
	<form id="form2" name="form2" method="post">
		<div class="lbadmin">
			<h3>文章页设置</h3>
			<div class="lbimport">
				<span>文章标题</span>
				<input type="checkbox" name="posttitle" id="posttitle" value="true" <?php if($zbp->Config('ydtu')->posttitle) echo 'checked="checked"'?> />
				<i>可开启/关闭</i>
			</div>
			<div class="lbimport">
				<span>标题下作者时间分类等</span>
				<input type="checkbox" name="postinfo" id="postinfo" value="true" <?php if($zbp->Config('ydtu')->postinfo) echo 'checked="checked"'?> />
				<i>可开启/关闭</i>
			</div>
			<div class="lbimport">
				<span>版权声明</span>
				<input type="checkbox" name="copyrightoff" id="copyrightoff" value="true" <?php if($zbp->Config('ydtu')->copyrightoff) echo 'checked="checked"'?> />
			</div>
			<div class="lbimport">
				<span>&nbsp;</span>
				<textarea type="text" name="copyrighthtml" id="copyrighthtml" rows="3"><?php echo $zbp->Config('ydtu')->copyrighthtml;?></textarea>
				<i class="red">文字换行需要用到&lt;br&gt;</i>
			</div>
			<div class="lbimport">
				<span>分享图标+二维码</span>
				<input type="checkbox" name="share" id="share" value="true" <?php if($zbp->Config('ydtu')->share) echo 'checked="checked"'?> />
			</div>
			
			<h3>文章页多图片调用(可多选)</h3>
			<div class="lbimport">
				<span>同tag标签相关</span>
				<input type="checkbox" name="postrelated" id="postrelated" value="true" <?php if($zbp->Config('ydtu')->postrelated) echo 'checked="checked"'?> />
				<i>调用相同tag标签的相关文章，最多10篇</i>
			</div>
			<div class="lbimport">
				<span>调用同分类文章</span>
				<input type="checkbox" name="postcategory" id="postcategory" value="true" <?php if($zbp->Config('ydtu')->postcategory) echo 'checked="checked"'?> />
				<i>调用同一个分类下的其它最新文章，最多10篇</i>
			</div>
			<div class="lbimport">
				<span>调用本站最新文章</span>
				<input type="checkbox" name="postnew" id="postnew" value="true" <?php if($zbp->Config('ydtu')->postnew) echo 'checked="checked"'?> />
				<i>调用本站最新文章10篇</i>
			</div>
			<!--///-->
			<input name="" type="Submit" class="button" value="保存"/>
		</div>
	</form>
<!---->
</div>
<?php require $blogpath . 'zb_users/theme/ydtu/admin/footer.php'; ?>