<html>
  <head>
    <link href="http://xtoolza.info/q/style.css" rel="stylesheet"/>
    <link href="http://xtoolza.info/q/css.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../style.css" type="text/css"  />
  </head>
  <body>
<h3>Подсчет колличества ног</h3>
<form action="1.php" method="GET" name="form">
  <input type="text" placeholder="Введите ваше имя" required name="name" style="width:200px; height:30px;" size="10px">
  <input type="submit" value="OK" class="btn-success btn" style="margin-top: -10px;">
</form>
<script>
  document.addEventListener('DOMContentLoaded', onDomReady);
  var name = getUrlVars()["name"];
  var name = decodeURIComponent(name);
  var rndcount = Math.floor(Math.random() * (100 - 2 + 1)) + 2;
  // alert(name);
  function onDomReady() {
    if (name != "undefined") {
      document.getElementById('Hello').innerHTML='Привет, ' + name + '!';
      var amount = document.getElementById('amount');
      (function iterate(i) {
          amount.innerHTML = i;
          if (i < rndcount) {
              setTimeout(function() { iterate(i + 1); }, 10);
          } else
            document.getElementById('amount').innerHTML='';
            document.getElementById('Hello').innerHTML='Всё, ' + name + ', ты ' + i + '-ножка! &#9786';
      })(0);
    }
  }

  function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
  }
</script>

<span id="amount"></span><br>
<span id="Hello"></span>

<script>
  var i = 0, c = [], ctx = [];

if (isCanvasSupported()) {
    $('.wrap_link').each(function() {
        var canvas = 'html5_price_' + i;

        $('<canvas />', {
            height : 100,
            id     : canvas,
            width  : 200
        }).appendTo($(this));

        c[i]   = document.getElementById(canvas);
        ctx[i] = c[i].getContext('2d');

        ctx[i].fillStyle = '#ff0000';
        ctx[i].beginPath();
        ctx[i].arc(70, 18, 15, 0, Math.PI * 2, true);
        ctx[i].closePath();
        ctx[i].fill();

        i++;
    });
}
</script>

</body>
</html>
