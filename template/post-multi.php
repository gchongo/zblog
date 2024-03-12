<?php echo'404';die();?>
<li class="listpost_li">
	<div class="img">
		<a href="{$article.Url}" title="{$article.Title}"{if $zbp->Config('ydtu')->target} target="_blank"{/if}><img src="{if $zbp->Config('ydtu')->thumb2}{ydtu_thumb2($article,380,300,0)}{else}{ydtu_thumbnail($article)}{/if}" alt="{$article.Title}"></a>
	</div>
	{if $zbp->Config('ydtu')->infotitle}<h2><a href="{$article.Url}" title="{$article.Title}"{if $zbp->Config('ydtu')->target} target="_blank"{/if}>{$article.Title}</a></h2>{/if}
	<div class="info">
		{if $zbp->Config('ydtu')->infotag}<div class="tag">{if $article.Tags}{foreach $article.Tags as $tag}<a href="{$tag.Url}"{if $zbp->Config('ydtu')->target} target="_blank"{/if}>{$tag.Name}</a>{/foreach}{/if}</div>{/if}
		{if $zbp->Config('ydtu')->infotime}<span><a href="{$article.Category.Url}"{if $zbp->Config('ydtu')->target} target="_blank"{/if}>{$article.Category.Name}</a><i>{if $zbp->Config('ydtu')->timestyle == '1'}{$article.Time('Y-m-d')}{else}{ydtu_TimeAgo($article.Time())}{/if}</i></span>{/if}
	</div>
</li>