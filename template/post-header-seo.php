<?php echo'404';die();?>
{if $type=='article'}
<title>{$title}{ydtu_JianGeFu()}{if $zbp->Config('ydtu')->Seo_Article_CateNameOn}{$article.Category.Name}{ydtu_JianGeFu()}{/if}{$name}</title>
{php}
$aryTags = array();
foreach($article->Tags as $key){$aryTags[] = $key->Name;}
if(count($aryTags)>0){$keywords = implode(',',$aryTags);} else {$keywords = $zbp->name;}
$description = trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),135)).'...';
{/php}
<meta name="keywords" content="{$keywords}" />
<meta name="description" content="{$description}" />
<meta name="author" content="{$article.Author.StaticName}" />
{if $article.Prev}<link rel='prev' title='{$article.Prev.Title}' href='{$article.Prev.Url}'/>{/if}
{if $article.Next}<link rel='next' title='{$article.Next.Title}' href='{$article.Next.Url}'/>{/if}
<link rel="canonical" href="{$article.Url}"/>
<link rel='shortlink' href='{$article.Url}'/>
{elseif $type=='page'}
<title>{$title}{ydtu_JianGeFu()}{$name}{ydtu_JianGeFu()}{$subname}</title>
<meta name="keywords" content="{$title},{$name}" />
{php}
$description = trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),135)).'...';
{/php}
<meta name="description" content="{$description}" />
<meta name="author" content="{$article.Author.StaticName}" />
{elseif $type=='index'}
<title>{if $zbp->Config('ydtu')->hometitle&&$page=='1'}{$zbp->Config('ydtu')->hometitle}{else}{$name}{if $page>'1'}{ydtu_JianGeFu()}第{$pagebar.PageNow}页{/if}{ydtu_JianGeFu()}{$subname}{/if}</title>
{if $zbp->Config('ydtu')->homekeywords}<meta name="Keywords" content="{$zbp->Config('ydtu')->homekeywords}" />{/if}
{if $zbp->Config('ydtu')->homedescription}<meta name="description" content="{$zbp->Config('ydtu')->homedescription}" />{/if}
<meta name="author" content="{$zbp.members[1].StaticName}" />
{elseif $type=='tag'}
<title>{if $tag->Metas->ydtu_tagtitle}{$tag.Metas.ydtu_tagtitle}{if $page>'1'}{ydtu_JianGeFu()}第{$pagebar.PageNow}页{/if}{else}{$tag.Name}{ydtu_JianGeFu()}{$name}{if $page>'1'}{ydtu_JianGeFu()}第{$pagebar.PageNow}页{/if}{ydtu_JianGeFu()}{$subname}{/if}</title>
<meta name="Keywords" content="{if $tag->Metas->ydtu_tagkeywords}{$tag.Metas.ydtu_tagkeywords}{else}{$tag.Name}{/if}">
{if $tag.Intro || $tag->Metas->ydtu_tagdescription}<meta name="description" content="{if $tag->Metas->ydtu_tagdescription}{$tag.Metas.ydtu_tagdescription}{else}{$tag.Intro}{/if}">{/if}
{elseif $type=='category'}
<title>{if $category->Metas->ydtu_catetitle}{$category->Metas->ydtu_catetitle}{if $page>'1'}{ydtu_JianGeFu()}第{$pagebar.PageNow}页{/if}{else}{$title}{ydtu_JianGeFu()}{$name}{/if}</title>
<meta name="Keywords" content="{if $category->Metas->ydtu_catekeywords}{$category.Metas.ydtu_catekeywords}{else}{$title},{$name}{/if}" />
<meta name="description" content="{if $category->Metas->ydtu_catedescription}{$category.Metas.ydtu_catedescription}{else}{$title}{ydtu_JianGeFu()}{$name}{/if}" />
{else}
<title>{$title}{ydtu_JianGeFu()}{$name}</title>
<meta name="Keywords" content="{$title},{$name}" />
<meta name="description" content="{$title}{ydtu_JianGeFu()}{$name}{if $page>'1'}{ydtu_JianGeFu()}当前是第{$pagebar.PageNow}页{/if}" />
{/if}