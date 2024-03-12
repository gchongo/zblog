<?php echo'404';die();?>{template:header}
<body>
<div id="wrap" class="container">
	<div class="mainright">
		{template:post-nav}
		{if $zbp->Config( 'ydtu' )->ad4off}
		<div class="navbottom">
		{$zbp->Config( 'ydtu' )->ad4}
		</div>
		{/if}
		<div class="mainbody">
			{if $zbp->Config('ydtu')->slider&&$type=='index'&&$page=='1'}{template:post-slider}{/if}
			<div class="imgbody">
				<ul {if $zbp->Config('ydtu')->wxjz}id="divMain"{/if}>
					{if $zbp->Config('ydtu')->indexdiyid&&$type=='index'&&$page=='1'}
					{php}$array = explode(',',$zbp->Config('ydtu')->indexdiyid);{/php}
					{foreach $array as $key=>$id}
					{$post=GetPost((int)$id);}
					{template:post-post}
					{/foreach}
					{/if}
					{foreach $articles as $key=>$article}
					{if $article.IsTop}{template:post-istop}{else}{template:post-multi}{/if}{/foreach}
				</ul>
			</div>
		</div>
		{template:pagebar}
{template:footer}