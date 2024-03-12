<?php
require '../../../../zb_system/function/c_system_base.php';
require $blogpath . 'zb_users/theme/ydtu/admin/header.php';
?>
<!--主题配置开始-->
<div id="admin-header" class="SubMenu">
	<?php ydtu_SubMenu(1);?>
</div>
<div id="divMain2">
<!--基本设置-->
<?php
	if(count($_POST)>0){
		//==========================config
		$zbp->Config( 'ydtu' )->logo = $_POST[ 'logo' ];
		$zbp->Config( 'ydtu' )->mlogo = $_POST[ 'mlogo' ];
		$zbp->Config( 'ydtu' )->wechat = $_POST[ 'wechat' ];
		$zbp->Config( 'ydtu' )->weibo = $_POST[ 'weibo' ];
		$zbp->Config( 'ydtu' )->bgimg = $_POST[ 'bgimg' ];
		$zbp->Config( 'ydtu' )->favicon = $_POST[ 'favicon' ];
		
		$zbp->Config( 'ydtu' )->sidebarstyle = $_POST[ 'sidebarstyle' ];
		$zbp->Config( 'ydtu' )->timestyle = $_POST[ 'timestyle' ];
		
		//跟随
		if(GetVars('side_gensui')){
			$zbp->Config('ydtu')->side_gensui = $_POST['side_gensui'];
		}else{
			$zbp->Config('ydtu')->side_gensui = '';
		}
		
		//返回顶部
		if(GetVars('gotop')){
			$zbp->Config('ydtu')->gotop = $_POST['gotop'];
		}else{
			$zbp->Config('ydtu')->gotop = '';
		}
		if(GetVars('goqrcode')){
			$zbp->Config('ydtu')->goqrcode = $_POST['goqrcode'];
		}else{
			$zbp->Config('ydtu')->goqrcode = '';
		}
		$zbp->Config( 'ydtu' )->goqrcodeimg = $_POST[ 'goqrcodeimg' ];
		
		if(GetVars('gocomment')){
			$zbp->Config('ydtu')->gocomment = $_POST['gocomment'];
		}else{
			$zbp->Config('ydtu')->gocomment = '';
		}
		
		if(GetVars('infotitle')){//开关
			$zbp->Config('ydtu')->infotitle = $_POST['infotitle'];
		}else{
			$zbp->Config('ydtu')->infotitle = '';
		}
		if(GetVars('infotag')){//开关
			$zbp->Config('ydtu')->infotag = $_POST['infotag'];
		}else{
			$zbp->Config('ydtu')->infotag = '';
		}
		if(GetVars('infotime')){//开关
			$zbp->Config('ydtu')->infotime = $_POST['infotime'];
		}else{
			$zbp->Config('ydtu')->infotime = '';
		}
		
		if(GetVars('target')){//开关
			$zbp->Config('ydtu')->target = $_POST['target'];
		}else{
			$zbp->Config('ydtu')->target = '';
		}
		if(GetVars('wxjz')){//开关
			$zbp->Config('ydtu')->wxjz = $_POST['wxjz'];
		}else{
			$zbp->Config('ydtu')->wxjz = '';
		}
		
		
		if(GetVars('head')){//开关
			$zbp->Config('ydtu')->head = $_POST['head'];
		}else{
			$zbp->Config('ydtu')->head = '';
		}
		$zbp->Config( 'ydtu' )->headhtml = $_POST[ 'headhtml' ];//headhtml
		if(GetVars('ydtu_clearSetting')){//开关
			$zbp->Config('ydtu')->ydtu_clearSetting = $_POST['ydtu_clearSetting'];
		}else{
			$zbp->Config('ydtu')->ydtu_clearSetting = '';
		}
		//==========================
		$zbp->SaveConfig( 'ydtu' );
		$zbp->ShowHint( 'good' );
	}
?>
	<form id="form2" name="form2" method="post">
		<div class="lbadmin">
			<h3>图片上传</h3>
			<!--///-->
			<div class="lbimport">
				<span>LOGO上传</span>
				<input type="text" name="logo" id="logo" class="uplod_img" placeholder="点我！点我！！点我！！！" value="<?php echo $zbp->Config('ydtu')->logo;?>">
				<i class="red">logo图片尺寸 160*84px最佳，留空显示默认</i>
			</div>
			<div class="lbimport">
				<span>移动端LOGO</span>
				<input type="text" name="mlogo" id="mlogo" class="uplod_img" placeholder="点我！点我！！点我！！！" value="<?php echo $zbp->Config('ydtu')->mlogo;?>">
				<i class="red">logo图片高度50px最佳，留空显示默认</i>
			</div>
			<!--///-->
			
			<div class="lbimport">
				<span>favicon</span>
				<input type="text" name="favicon" id="favicon" class="uplod_img" placeholder="点我！点我！！点我！！！" value="<?php echo $zbp->Config('ydtu')->favicon;?>">
				<i>打开网站后，浏览器上显示的小图标，正方形即可</i>
			</div>
			<div class="lbimport">
				<span>网站背景图片</span>
				<input type="text" name="bgimg" id="bgimg" class="uplod_img" placeholder="点我！点我！！点我！！！" value="<?php echo $zbp->Config('ydtu')->bgimg;?>">
				<i class="red">如需自定义可上传,留空则按默认显示，留空显示默认</i>
			</div>
			<!--///-->
			<h3>侧栏contact模块</h3>
			<div class="lbimport">
				<span>二维码</span>
				<input type="text" name="wechat" id="wechat" class="uplod_img" placeholder="点我！点我！！点我！！！" value="<?php echo $zbp->Config('ydtu')->wechat;?>">
				<i class="red">正方形二维码，显示在侧栏联系模块，需设置：模块管理 - contact - 拖拽到对应侧栏</i>
			</div>
			<div class="lbimport">
				<span>微博</span>
				<input type="text" name="weibo" id="weibo" value="<?php echo $zbp->Config('ydtu')->weibo;?>">
				<i class="red">输入微博网址即可</i>
			</div>
			<!--///-->
			<h3>整体布局</h3>
			<div class="lbimport">
				<span>左右栏互换位置</span>
				<div class="radios">
					<label>
						<input type="radio" id="sidebarstyle" name="sidebarstyle" value="1" <?php if($zbp->Config('ydtu')->sidebarstyle == '1') echo 'checked'?> />窄栏居左
					</label>
					<label>
						<input type="radio" id="sidebarstyle" name="sidebarstyle" value="2" <?php if($zbp->Config('ydtu')->sidebarstyle == '2') echo 'checked'?> />窄栏居右
					</label>
				</div>
			</div>
			<!--///-->
			<!--///-->
			<h3>其它全局</h3>
			<div class="lbimport">
				<span>侧栏下拉跟随置顶</span>
				<input type="checkbox" name="side_gensui" id="side_gensui" value="true" <?php if($zbp->Config('ydtu')->side_gensui) echo 'checked="checked"'?> />
				<i>开启了下拉跟随后，建议侧栏就不要添加过多模块了</i>
			</div>
			<div class="lbimport">
				<span>图片列表新窗口打开</span>
				<input type="checkbox" name="target" id="target" value="true" <?php if($zbp->Config('ydtu')->target) echo 'checked="checked"'?> />
			</div>
			<div class="lbimport">
				<span>文章列表下拉无限加载</span>
				<input type="checkbox" name="wxjz" id="wxjz" value="true" <?php if($zbp->Config('ydtu')->wxjz) echo 'checked="checked"'?> />
				<i>开启后，首页、分类等文章列表显示“查看更多”无限下拉加载</i>
			</div>
			
			<h3>返回顶部</h3>
			<div class="lbimport">
				<span>是否开启</span>
				<input type="checkbox" name="gotop" id="gotop" value="true" <?php if($zbp->Config('ydtu')->gotop) echo 'checked="checked"'?> />
				<i>可关闭模板自带，去使用返回顶部插件！</i>
			</div>
			<div class="lbimport">
				<span>二维码</span>
				<div class="sub">
					<span>开关二维码</span>
					<input type="checkbox" name="goqrcode" id="goqrcode" value="true" <?php if($zbp->Config('ydtu')->goqrcode) echo 'checked="checked"'?> /><br><br>
					<span>上传二维码</span>
					<input type="text" name="goqrcodeimg" id="goqrcodeimg" class="uplod_img" placeholder="点我！点我！！点我！！！" value="<?php echo $zbp->Config('ydtu')->goqrcodeimg;?>">
				</div>
				<i>可以关闭掉二维码功能</i>
			</div>
			<div class="lbimport">
				<span>评论快捷</span>
				<input type="checkbox" name="gocomment" value="true" <?php if($zbp->Config('ydtu')->gocomment) echo 'checked="checked"'?> />
				<i>返回顶部文章页的第三个快捷回复</i>
			</div>
			
			
			<!--///-->
			<h3>时间格式</h3>
			<div class="lbimport">
				<span>所有文章时间格式</span>
				<div class="radios">
					<label>
						<input type="radio" id="timestyle" name="timestyle" value="1" <?php if($zbp->Config('ydtu')->timestyle == '1') echo 'checked'?> />传统格式
					</label>
					<label>
						<input type="radio" id="timestyle" name="timestyle" value="2" <?php if($zbp->Config('ydtu')->timestyle == '2') echo 'checked'?> />"多久前"格式
					</label>
				</div>
			</div>
			<!--///-->
			<h3>图片列表下信息栏(关闭会遇到对齐问题，关闭幻灯片解决)</h3>
			<div class="lbimport">
				<span>显示标题行</span>
				<input type="checkbox" name="infotitle" id="infotitle" value="true" <?php if($zbp->Config('ydtu')->infotitle) echo 'checked="checked"'?> />
				<i>首页、分类、文章页中图片下是否显示标题，开启/关闭</i>
			</div>
			<div class="lbimport">
				<span>显示标签行</span>
				<input type="checkbox" name="infotag" id="infotag" value="true" <?php if($zbp->Config('ydtu')->infotag) echo 'checked="checked"'?> />
				<i>首页、分类、文章页中图片列表标题下是否显示标签，开启/关闭</i>
			</div>
			<div class="lbimport">
				<span>显示分类+时间</span>
				<input type="checkbox" name="infotime" id="infotime" value="true" <?php if($zbp->Config('ydtu')->infotime) echo 'checked="checked"'?> />
				<i>首页、分类、文章页中图片下是否显示分类和时间行，开启/关闭</i>
			</div>
			<!--///-->
			<!--///-->
			<h3>Head</h3>
			<div class="lbimport">
				<span>Head加入代码</span>
				<input type="checkbox" name="head" id="head" value="true" <?php if($zbp->Config('ydtu')->head) echo 'checked="checked"'?> />
				<i class="red">需要在head中加入代码的开启，慎重！</i>
			</div>
			<!--///-->
			<div class="lbimport">
				<span>加入head的代码</span>
				<textarea name="headhtml" type="text" id="headhtml" rows="6"><?php echo $zbp->Config('ydtu')->headhtml;?></textarea>
			</div>
			<!--///-->
			
			<div class="lbimport">
				<span>清空主题配置内设置</span>
				<input type="checkbox" name="ydtu_clearSetting" id="ydtu_clearSetting" value="true" <?php if($zbp->Config('ydtu')->ydtu_clearSetting) echo 'checked="checked"'?> />
				<i class="red">不要选！不到万不得已不要选这里，否则，切换其它主题后，当前主题的配置将恢复初始状态！不开玩笑的！</i>
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