<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Сделать хорошо</title>
        <link rel="apple-touch-icon" href="http://xtoolza.info/favicon.png" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/font-awesome.css" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300' rel='stylesheet' type='text/css' />
		<link href="http://xtoolza.info/temp/menu3/bootstrap/css/bootstrap.css" rel="stylesheet"/>
		<style>
@-webkit-keyframes ok {
 10% { transform: scale(1, 1) rotate(80deg); }
 20% { transform: scale(0, 0) rotate(160deg); }
 100% { transform: scale(0, 0) rotate(0deg); }
}
@keyframes ok {
 10% { transform: scale(1, 1) rotate(80deg); }
 20% { transform: scale(0, 0) rotate(160deg); }
 100% { transform: scale(0, 0) rotate(0deg); }
}
#ok {
  position: relative;
  display: inline-block;
  color: #000000;
  text-shadow: 0 0 10px #3d7a97;
  background: none;
}
#ok:after, #ok:before {
  content: "";
  position: absolute; top: 0; left: 0;
  display: block;
  width: 100px;
  height: 100px;
  background-image: 
    radial-gradient(rgba(255,255,255,1), rgba(255,255,255,0) 30%),
    linear-gradient(45deg, rgba(0,0,0,0) 49%, rgba(255,255,255,.4) 50%, rgba(0,0,0,0) 51%),
    linear-gradient(135deg, rgba(0,0,0,0) 49%, rgba(255,255,255,.4) 50%, rgba(0,0,0,0) 51%);
  -webkit-animation: ok 10s linear infinite;
  animation: ok 10s linear infinite;
  transform: scale(0, 0) rotate(0deg);
}
#ok:before {
  top: 0%;
  right: 0; left: auto;
  -webkit-animation-delay: 5s;
  animation-delay: 5s;
}
		</style>
    </head>
<body style="background-color: #00B32D;">
<script type="text/javascript">	
function changeLink()
{
document.getElementById('ok').innerHTML="Ну вот, всё хорошо! ^_^";
}
</script>	
<div style="margin-left: 30px">
	
        <div class="container">
		
			<section class="main">
				
				<div class="switch demo4">
					<input type="checkbox" onclick="changeLink()">
					<label><i class='icon-off'></i></label>
				</div>
				<center>
				<h1 id="ok">СДЕЛАТЬ ХОРОШО!</h1>
				<h1 style='display:none' id="ok" >Ну вот, всё хорошо!</h1>
				</center>
			</section>
			
        </div>
		<br><br>
<a class="btn-success btn" href="http://xtoolza.info" rel="nofollow">На главную</a>
<? include ('../../yandex_metrika.php'); ?>
</div>

    </body>
</html>