<?php echo'404';die();?>
{if $module.FileName=='nav'}
<div class="widget widget_navbar">
	<ul>
		{if $zbp->Config('ydtu')->navbar2}{module:navbar}{/if}
		{if $zbp->Config('ydtu')->nav2}{$zbp->Config('ydtu')->navhtml2}{/if}
	</ul>
</div>
{elseif $module.FileName=='contact'}
<div class="widget widget_contact">
	{if $zbp->Config( 'ydtu' )->weibo}
	<div class="contact_box">
		<a href="{$zbp->Config( 'ydtu' )->weibo}" target="_blank">
			<i class="fa fa-weibo"></i>
			<span>Weibo</span>
		</a>
	</div>
	{/if}
	{if $zbp->Config( 'ydtu' )->wechat}
	<div class="contact_box">
		<i class="fa fa-weixin"></i>
		<span>WeChat</span>
		<img src="{$zbp->Config( 'ydtu' )->wechat}" alt="wechat">
	</div>
	{/if}
</div>
{else}

{if $module.Type=='ul'}
<div class="widget widget_{$module.FileName}">
	{if (!$module.IsHideTitle)&&($module.Name)}<h3>{$module.Name}</h3>{/if}
	<ul>{$module.Content}</ul>
</div>
{/if}
{if $module.Type=='div'}
<div class="widget widget_{$module.FileName}">
	{if (!$module.IsHideTitle)&&($module.Name)}<h3>{$module.Name}</h3>{/if}
	<div class="widget_div">{$module.Content}</div>
</div>
{/if}

{/if}