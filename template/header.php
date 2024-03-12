<?php echo'404';die();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="generator" content="{$zblogphp}">
<meta name="viewport" content="width=device-width,initial-scale=1">{if $zbp->Config('ydtu')->seo}{template:post-header-seo}{else}<title>{$name}-{$title}</title>{/if}
<link href="{$host}zb_users/theme/{$theme}/style/css/font-awesome.min.css" rel="stylesheet">
<link href="{$host}zb_users/theme/{$theme}/style/css/swiper.min.css" rel="stylesheet">
{if $zbp->Config('ydtu')->coloroff}
<link rel="stylesheet" type="text/css" href="{$host}zb_users/theme/{$theme}/style/style.ok.css?v={$zbp->themeapp->version}" />
{else}
<link rel="stylesheet" type="text/css" href="{$host}zb_users/theme/{$theme}/style/style.css?v={$zbp->themeapp->version}" />
{/if}
<script src="{$host}zb_system/script/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="{$host}zb_system/script/zblogphp.js" type="text/javascript"></script>
<script src="{$host}zb_system/script/c_html_js_add.php" type="text/javascript"></script>
{if $zbp->Config( 'ydtu' )->favicon}
<link rel="apple-touch-icon" href="{$zbp->Config( 'ydtu' )->favicon}">
<link rel="shortcut icon" href="{$zbp->Config( 'ydtu' )->favicon}" type="image/x-icon">
<link rel="icon" href="{$zbp->Config( 'ydtu' )->favicon}" type="image/x-icon">
{/if}
{if $type=='index'&&$page=='1'}
<link rel="alternate" type="application/rss+xml" href="{$feedurl}" title="{$name}" />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="{$host}zb_system/xml-rpc/?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="{$host}zb_system/xml-rpc/wlwmanifest.xml" />
{/if}
{if $zbp->Config('ydtu')->head}{$zbp->Config('ydtu')->headhtml}{/if}
<style>
{if $zbp->Config('ydtu')->bgimg} body,.nav ul ul{background:url({$zbp->Config('ydtu')->bgimg});} {/if}
{if $zbp->Config('ydtu')->sidebarstyle=='2'} .mainleft{float:right;}.mainright{float: left;} {/if}
{if $zbp->Config('ydtu')->bgimg}@media screen and (max-width: 980px) {#header,#header .nav,#header .search{ background:url({$zbp->Config('ydtu')->bgimg});} }{/if}
</style>
{$header}
</head>