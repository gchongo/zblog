<?php echo'404';die();?>
<div id="header">
	<div class="mlogo">
		<a href="{$host}" title="{$name}"><img src="{if $zbp->Config( 'ydtu' )->mlogo}{$zbp->Config( 'ydtu' )->mlogo}{else}{$host}zb_users/theme/{$theme}/style/images/mlogo.png{/if}" alt="{$name}"></a>
	</div>
	<div id="nav" class="mnavs"><i class="fa fa-bars"></i></div>
	<div id="search"><i class="fa fa-search"></i></div>
	<div id="monavber" class="nav" data-type="{$type}" data-infoid="{if $type=='category'}{if $category.RootID}{$category.RootID}{else}{$category.ID}{/if}{/if}{if $type=='article'}{if $article.Category.RootID}{$article.Category.RootID}{else}{$article.Category.ID}{/if}{/if}{if $type=='page'}{$article.ID}{/if}{if $type=='tag'}{$tag.ID}{/if}">
		<ul class="navbar">
			{if $zbp->Config('ydtu')->home}<li id="nvabar-item-index"><a href="{$host}">首页</a></li>{/if}
			{if $zbp->Config('ydtu')->catalog}{module:catalog}{/if}
			{if $zbp->Config('ydtu')->navbar}{module:navbar}{/if}
			{if $zbp->Config('ydtu')->nav}{$zbp->Config('ydtu')->navhtml}{/if}
		</ul>
	</div>
	{if $zbp->Config('ydtu')->search}
	<div class="search">
		<form name="search" method="get" action="{$host}search.php?act=search">
			<input type="text" name="q" placeholder="输入关键词"/>
			<button type="submit" class="submit" value="搜索"><i class="fa fa-search"></i></button>
		</form>
	</div>
	{/if}
</div>