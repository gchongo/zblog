<?php echo'404';die();?>
<!DOCTYPE html>
<html>
<head>
	<title>404 Not Found</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<style type="text/css">
	.center{text-align:center;}
	</style>
</head>
<body>
	<table border=0 cellpadding=0 cellspacing=0 width="100%" height="100%">
		<tr><td align="center" style="padding-top:100px;font-size:4em;">404 Not Found</td></tr>
		<tr><td align="center" style="padding-top:10px;font-size:4em;">Fuck</td></tr>
		<tr><td align="center" style="padding-top:20px;font-size:4em;">此页面为404错误页面</td></tr>
		<tr>
			<form name=loading>
				<td align=center>
					<p><font color=gray>正在载入首页，请稍候.......</font></p>
					<p>
					<input type=text name=chart size=46 style="font-family:Arial;font-weight:bolder; color:gray;background-color:white; padding:0px; border-style:none;">
					</br>
					<input type=text name=percent size=46 style="font-family:Arial;color:gray; text-align:center;border-width:medium; border-style:none;">
						<script>var bar = 0
						var line = "||"
						var amount ="||"
						count()
						function count(){
						bar= bar+2
						amount =amount + line
						document.loading.chart.value=amount
						document.loading.percent.value=bar+"%"
						if (bar<99)
						{setTimeout("count()",200);}//这里修改载入时间
						else
						{window.location = "{$host}";}//这里改成你的网站地址
						}
						</script>
					</p>
				</td>
			</form>
		</tr>
	</table>
</body>
</html>