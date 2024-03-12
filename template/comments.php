<?php echo'404';die();?>
{if $socialcomment}
{$socialcomment}
{else}
<div id="comment">
	<h4>评论</h4>
	{if !$article.IsLock}{template:commentpost}{/if}
	<div class="comlist">
		<div class="title"><span>精彩评论</span><i></i></div>
		<label id="AjaxCommentBegin"></label>
			{foreach $comments as $key => $comment}
				{template:comment}
			{/foreach}
			{template:pagebar}
		<label id="AjaxCommentEnd"></label>
	</div>
</div>
{/if}