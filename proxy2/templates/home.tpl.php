<!DOCTYPE html>
<html>
<head>
<title>xToolza Proxy 2</title>
<meta name="robots" content="noindex, nofollow" />
	<link href="/q/style.css" rel="stylesheet"/>
	<script src="/q/modernize.js"></script>
	<script src="/q/seotext.js"></script>
	<link href="/q/css.css" rel="stylesheet"/>
	<link rel="canonical" href="http://xtoolza.info/proxy2/">
<style type="text/css">
html body {
	font-family: Arial,Helvetica,sans-serif;
	font-size: 12px;
	background: #0b1933;
}

#container {
	width:500px;
	margin:0 auto;
	margin-top:150px;
}

#error {
	color:red;
	font-weight:bold;
}

#frm {
	padding:10px 15px;
	background-color:#7373FF;

	border:1px solid #818181;

	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
	border-radius: 8px;
}

#footer {
	text-align:center;
	font-size:10px;
	margin-top:35px;
	clear:both;
	color:white;
}
</style>
</head>
<body>
<div id="container">
	<div style="text-align:center;">
		<h1 style="color:white;">xToolza Proxy 2</h1><br><br>
		 <br><br>
	</div>

	<div id="error">
		<p><?=@$error_msg;?></p>
	</div>

	<div id="frm">

	<!-- I wouldn't touch this part --->

		<form action="<?=$script_base;?>" method="post" style="margin-bottom:0;">
			<input name="url" type="text" style="width:400px;" autocomplete="off" placeholder="http://" />
			<input type="submit" value="Go" />
		</form>

		<script type="text/javascript">
			document.getElementsByName("url")[0].focus();
		</script>

	<!-- [END] -->

	</div>
<div><br><a class="btn-success btn" href="http://xtoolza.info">На главную</a>&nbsp;&nbsp;<a class="btn-success btn" href="http://xtoolza.info/proxy/">Прокси</a>&nbsp;&nbsp;<a class="btn-success btn" href="http://xtoolza.info/proxy3/">Прокси 3</a>&nbsp;&nbsp;<br><br></div>
</div>
<div id="footer">
	Powered by <a href="//xtoolza.info/" target="_blank">xToolza</a>
</div>
</body>
</html>
