<?php echo'404';die();?>
<body>
{if $zbp->Config( 'ydtu' )->ad1off}
<div class="navtop container">
	{$zbp->Config( 'ydtu' )->ad1}
</div>
{/if}
<div id="wrap" class="container">
	<div class="mainright">
		{template:post-nav}
		<div class="mainbody">
			<div class="post">
				<div class="title">
					{if $zbp->Config('ydtu')->posttitle}<h1>{$article.Title}</h1>{/if}
					{if $zbp->Config('ydtu')->postinfo}
					<div class="info">
						<span>作者：{$article.Author.StaticName}</span>
						<span>时间：{if $zbp->Config('ydtu')->timestyle == '1'}{$article.Time('Y-m-d')}{else}{ydtu_TimeAgo($article.Time())}{/if}</span>
						<span>阅读：{$article.ViewNums}</span>
					</div>
					{/if}
				</div>
				<div class="article_content">
					{$article.Content}
				</div>
				{if $zbp->Config( 'ydtu' )->copyrightoff}
				<div class="rights">
					{$zbp->Config( 'ydtu' )->copyrighthtml}
				</div>
				{/if}
				{if $zbp->Config( 'ydtu' )->share}
				<div id="share">
					<div class="sharel">
						<p>分享：</p>
						<div class="bdsharebuttonbox">
							<a href="#" class="bds_weixin_icon" data-cmd="weixin" title="分享到微信"></a>
							<a href="#" class="bds_tsina_icon" data-cmd="tsina" title="分享到新浪微博"></a>
							<a href="#" class="bds_sqq_icon" data-cmd="sqq" title="分享到QQ好友"></a>
							<a href="#" class="bds_qzone_icon" data-cmd="qzone" title="分享到QQ空间"></a>
							<a href="#" class="bds_more_icon" data-cmd="more"></a>
						</div><script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
					</div>
					<div class="sharer">
						<i></i>
						<div class="qrimg">
							<img src="http://www.gbtags.com/gb/qrcode?t={$article.Url}&s=300"  alt="扫一扫二维码">
							<p>扫一扫在手机阅读、分享本文</p>
						</div>
					</div>
				</div>
				{/if}
				{if !$article.IsLock}{template:comments}{/if}
			</div>
			<div class="imgbody">
				<ul>
					{if $zbp->Config('ydtu')->postrelated}
					{$array=GetList(10,null,null,null,$article->Tags,null,array('is_related'=>$article->ID));}
					{foreach $array as $related}
					{php}IMAGE::getPics($related,190,150,4){/php}
					{template:post-related}
					{/foreach}
					{/if}
					{if $zbp->Config('ydtu')->postcategory}
					{$cid=$article.Category.ID}
					{foreach GetList(10,$cid) as $related}
					{php}IMAGE::getPics($related,190,150,4){/php}
					{template:post-related}
					{/foreach}
					{/if}
					{if $zbp->Config('ydtu')->postnew}
					{foreach GetList(10) as $related}
					{php}IMAGE::getPics($related,190,150,4){/php}
					{template:post-related}
					{/foreach}
					{/if}
				</ul>
			</div>
		</div>