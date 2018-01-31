<html>
  <head>

  </head>
  <body>
    <script>
document.addEventListener('DOMContentLoaded', onDomReady);
function onDomReady() {
    var amount = document.getElementById('amount');
    (function iterate(i) {
        amount.innerHTML = "Оксана - " + i + "-ножка";
        if (i < 100500) {
            setTimeout(function() { iterate(i + 1); }, 10);
        }
    })(0);
}</script>
<div id="amount"></div>
</body>
</html>
