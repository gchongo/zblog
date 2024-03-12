<?php
require '../../../../zb_system/function/c_system_base.php';
require $blogpath . 'zb_users/theme/ydtu/admin/header.php';
?>
<!--主题配置开始-->
<div class="SubMenu">
<?php ydtu_SubMenu(2);?>
</div>
<div id="divMain2">
<!--首页设置-->
	<?php
	if(count($_POST)>0){
		$zbp->Config( 'ydtu' )->jiangefu = $_POST[ 'jiangefu' ];//间隔符
		$zbp->Config( 'ydtu' )->hometitle = $_POST[ 'hometitle' ];
		$zbp->Config( 'ydtu' )->homekeywords = $_POST[ 'homekeywords' ];
		$zbp->Config( 'ydtu' )->homedescription = $_POST['homedescription'];
		if(GetVars('seo')){//开关
			$zbp->Config('ydtu')->seo = $_POST['seo'];
		}else{
			$zbp->Config('ydtu')->seo = '';
		}
		if(GetVars('seo_cat')){//开关
			$zbp->Config('ydtu')->seo_cat = $_POST['seo_cat'];
		}else{
			$zbp->Config('ydtu')->seo_cat = '';
		}
		if(GetVars('seo_art')){//开关
			$zbp->Config('ydtu')->seo_art = $_POST['seo_art'];
		}else{
			$zbp->Config('ydtu')->seo_art = '';
		}
		if(GetVars('seo_tag')){//开关
			$zbp->Config('ydtu')->seo_tag = $_POST['seo_tag'];
		}else{
			$zbp->Config('ydtu')->seo_tag = '';
		}
		if(GetVars('Seo_Article_CateNameOn')){//开关
			$zbp->Config('ydtu')->Seo_Article_CateNameOn = $_POST['Seo_Article_CateNameOn'];
		}else{
			$zbp->Config('ydtu')->Seo_Article_CateNameOn = '';
		}
		
		$zbp->SaveConfig( 'ydtu' );
		$zbp->ShowHint( 'good' );
	}
	?>
	<form id="form2" name="form2" method="post">
		<div class="lbadmin">
			<!--///-->
			<h3>SEO</h3>
			<div class="lbimport">
				<span>模板自带SEO(非插件)</span>
				<input type="checkbox" name="seo" id="seo" value="true" <?php if($zbp->Config('ydtu')->seo) echo 'checked="checked"'?> />
				<i class="red">使用了SEO插件，并且开启了标题优化，需关闭这里的模块自带SEO！<br>注：模板自带SEO数据只在当前模板有效！</i>
			</div>
			<!--///-->

			
			<div class="lbimport">
				<span>标题分隔符</span>
				<input type="text" style="width: 60px" name="jiangefu" value="<?php echo $zbp->Config('ydtu')->jiangefu;?>">
				<i>间隔符可以设置为“ - ”，也可以设置其他，包括加空格，如果留空则默认为“ _ ”</i>
			</div>
			<div class="lbimport">
				<span>文章页title带分类名</span>
				<label><input type="checkbox" name="Seo_Article_CateNameOn" value="true" <?php if($zbp->Config('ydtu')->Seo_Article_CateNameOn) echo 'checked="checked"'?> />
					</label>
				<i class="red">文章页title是否包含分类名，不懂可以不开启</i>
			</div>

			<!--///-->

			<div class="lbimport">
				<span>首页标题</span>
				<input type="text" name="hometitle" id="hometitle" value="<?php echo $zbp->Config('ydtu')->hometitle;?>">
			</div>
			<!--///-->
			<div class="lbimport">
				<span>首页关键词</span>
				<input type="text" name="homekeywords" id="homekeywords" value="<?php echo $zbp->Config('ydtu')->homekeywords;?>">
			</div>
			<!--///-->
			<div class="lbimport">
				<span>首页描述</span>
				<textarea style="text" name="homedescription" id="homedescription" rows="4"><?php echo $zbp->Config('ydtu')->homedescription;?></textarea>
			</div>

			<div class="lbimport">
				<span>关闭分类tdk自定义</span>
				<input type="checkbox" name="seo_cat" id="seo_cat" value="true" <?php if($zbp->Config('ydtu')->seo_cat) echo 'checked="checked"'?> />
				<i class="red">关闭添加分类时自定义标题关键词描述功能</i>
			</div>


			<div class="lbimport">
				<span>关闭tag的tdk自定义</span>
				<input type="checkbox" name="seo_tag" id="seo_tag" value="true" <?php if($zbp->Config('ydtu')->seo_tag) echo 'checked="checked"'?> />
				<i class="red">关闭tag标签的自定义标题关键词描述自定义功能。</i>
			</div>


			<!--///-->
			<input name="" type="Submit" class="button" value="保存"/>
		</div>
		
	</form>
<!---->
</div>
<?php require $blogpath . 'zb_users/theme/ydtu/admin/footer.php'; ?>