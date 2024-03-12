<?php echo'404';die();?> <!-- 作者链接不可去除，否则模板不要使用，谢谢 -->
{if $type=='index'&&$page=='1'}{if $zbp->Config('ydtu')->homelink}<div class="homelink"><ul>{module:link}</ul></div>{/if}{/if}

<div class="footer">
	{$copyright}&nbsp;Powered By {$zblogphpabbrhtml} {$zbp->Config('ydtu')->ydtu_zbptheme}
</div>

	</div>
	<div class="mainleft">
		{template:post-sidebar}
	</div>
</div>
{if $zbp->Config( 'ydtu' )->gotop}
<div class="bottom_tools">
	<a id="scrollUp" href="javascript:;" title="返回顶部"><i class="fa fa-angle-up"></i></a> {if $zbp->Config('ydtu')->goqrcode}
	<div class="qr_tool"><i class="fa fa-qrcode"></i>
	</div>
	<div class="qr_img"><img src="{if $zbp->Config( 'ydtu' )->goqrcodeimg}{$zbp->Config( 'ydtu' )->goqrcodeimg}{else}{$host}zb_users/theme/{$theme}/style/images/qr.jpg{/if}" alt="二维码" />
	</div>{/if} {if $type=='article'||$type=='page'}{if $zbp->Config('ydtu')->gocomment}<a class="topcomment" href="#comments" title="评论"><i class="fa fa-commenting"></i></a>{/if}{/if}
</div>
{/if}
<script src="{$host}zb_users/theme/{$theme}/script/common.js?v={$zbp->themeapp->version}" type="text/javascript"></script>
{if $zbp->Config('ydtu')->wxjz}<script type="text/javascript" src="{$host}zb_users/theme/{$theme}/script/wx.js?v={$zbp->themeapp->version}"></script>{/if}
{if $zbp->Config('ydtu')->slider&&$type=='index'&&$page=='1'}
<script src="{$host}zb_users/theme/{$theme}/script/swiper.jq.min.js" type="text/javascript"></script>
<script>
	var swiper = new Swiper( '.swiper-container', {
		loop:true,
		pagination: '.swiper-pagination',
		nextButton: '.swiper-button-next',
		prevButton: '.swiper-button-prev',
		paginationClickable: true,
		spaceBetween: 30,
		centeredSlides: true,
		autoplay: 2500,
		autoplayDisableOnInteraction: false
	} );
</script>
{/if}
{if $zbp->Config('ydtu')->side_gensui}
<script src="{$host}zb_users/theme/{$theme}/script/ResizeSensor.min.js" type="text/javascript"></script>
<script src="{$host}zb_users/theme/{$theme}/script/theia-sticky-sidebar.min.js?v={$zbp->themeapp->version}" type="text/javascript"></script>
<script>jQuery(document).ready(function($) {jQuery('.mainleft').theiaStickySidebar({ additionalMarginTop: 0,});});</script>
{/if}
{if $type=='article'||$type=='page'}{if $zbp->Config( 'ydtu' )->share}
<!-- 二维码 -->
<script type="text/javascript" src="{$host}zb_users/theme/{$theme}/script/jquery.qrcode.min.js"></script>
<script>
$("#code").qrcode({ 
//    render: "table", //table方式 
    width: 110, //宽度
    height:110, //高度
    text: "{$article.Url}" //任意内容 
}); 
</script>
{/if}{/if}
{$footer}
</body>
</html>