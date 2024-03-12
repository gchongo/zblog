<?php echo "404";die();?>
{if $pagebar}
<div class="pagebar">
	{foreach $pagebar.buttons as $k=>$v}
	{if $pagebar.PageNow==$k}
	<a href="javascript:void(0);" class="on">{$k}</a>
	{elseif $k=="‹‹" and $pagebar.PageNow==$pagebar.PageFirst}
	{elseif $k=="››" and $pagebar.PageNow==$pagebar.PageLast}
	{elseif $k=="‹"}
	<a href="{$v}">‹</a>
	{elseif $k=="›"}
	<a href="{$v}" class="next">›</a>
	{else}
	<a href="{$v}">{$k}</a>
	{/if} {/foreach}
</div>
{/if}