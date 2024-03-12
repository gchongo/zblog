<?php echo'404';die();?>
<div class="compost">
	<form id="frmSumbit" target="_self" method="post" action="{$article.CommentPostUrl}">
		<input type="hidden" name="inpId" id="inpId" value="{$article.ID}"/>
		<input type="hidden" name="inpRevID" id="inpRevID" value="0"/>
		<div class="com_name">
			{if $user.ID>0}{$user.StaticName}{/if} <a rel="nofollow" id="cancel-reply" href="#comments" style="display:none;">取消回复</a>
		</div>
		<div class="com_box">
			<textarea placeholder="你的评论可以一针见血" class="textarea" name="txaArticle" id="txaArticle" cols="100%" rows="5" tabindex="1"></textarea>
		</div>
		<div class="com_info">
			{if $user.ID>0}
			<input type="hidden" name="inpName" id="inpName" value="{$user.StaticName}" />
			<input type="hidden" name="inpEmail" id="inpEmail" value="{$user.Email}" />
			<input type="hidden" name="inpHomePage" id="inpHomePage" value="{$user.HomePage}" />
			{else}
			<ul>
				<li>
					<label class="hide" for="author"></label>
					<input class="ipt" type="text" name="inpName" id="inpName" value="访客" tabindex="2" placeholder="昵称(必填)">
				</li>
				<li>
					<label class="hide" for="author"></label>
					<input class="ipt" type="text" name="inpEmail" id="inpEmail" value="" tabindex="3" placeholder="邮箱">
				</li>
				<li>
					<label class="hide" for="author"></label>
					<input class="ipt" type="text" name="inpHomePage" id="inpHomePage" value="" tabindex="4" placeholder="网址">
				</li>
				{if $option['ZC_COMMENT_VERIFY_ENABLE']}
				<li>
					<label class="hide" for="author"></label>
					<input class="ipt" type="text" name="inpVerify" id="inpVerify" tabindex="4" placeholder="输入验证码">
					<span><img src="{$article.ValidCodeUrl}" class="verifyimg" onclick="javascript:this.src='{$article.ValidCodeUrl}&amp;tm='+Math.random();" /></span>
				</li>
				{/if}
			</ul>
			{/if}
			<button name="sumbit" type="submit" id="submit" tabindex="5" onclick="return zbp.comment.post()">提交评论</button>
		</div>
	</form>
</div>