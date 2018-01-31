<html>
<head>

<title>Проверка копирования в буфер обмена ZeroClipboard</title>

<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">

<style type="text/css">
.clip_btn { width:250px; text-align:center;
 border:1px solid black; background-color:#ccc;
 margin:10px; padding:10px;}
.clip_btn.hover { background-color:#eee; }
.clip_btn.active { background-color:#aaa; }
</style>

<script type="text/javascript" src="zeroclipboard/ZeroClipboard.js"></script>

<script language="JavaScript">
var clip = null;
function $(id) { return document.getElementById(id); }
function init() {
clip = new ZeroClipboard.Client();
clip.setHandCursor( true );
clip.addEventListener('load', function (client) {});
clip.addEventListener('mouseOver', function (client) {clip.setText( $('fe_text').value );});
clip.addEventListener('complete', function (client, text) {});
clip.glue( 'copy_btn' );
}
</script>

</head>

<body onLoad="init()">

<h3>Проверка копирования<br/>
  в буфер обмена</h3>
<textarea id="fe_text" cols=50 rows=4>Копируй меня!</textarea>

<div id="copy_btn" class="clip_btn"><b>Копировать в буфер обмена...</b></div>

</body>
</html>
