<html>
<head>
<style type="text/css">
  #d_clip_button {
    text-align:center; 
    border:1px solid black; 
    background-color:#ccc; 
    margin:10px; padding:10px; 
  }
  /* Указываем свои стили для пседо-саб-классов */
  #d_clip_button.hover { background-color:#eee; }
  #d_clip_button.active { background-color:#aaa; }
</style>
</head>
<body>
<script type="text/javascript" src="zeroclipboard/ZeroClipboard.js"></script>

  Copy to Clipboard: <input type="text" id="clip_text" size="40" value="Copy me!"/><br/><br/> 

  <div id="d_clip_button">Copy To Clipboard</div>

  <script language="JavaScript">
    var clip = new ZeroClipboard.Client();
    // clip.setMoviePath( 'ZeroClipboard.swf' ); // укажем путь к флешке
    clip.setText( '' ); // onМouseDown будет копировать нужный текст
    clip.setHandCursor( true ); // делаем курсор в виде руки
    clip.setCSSEffects( true ); // разрешаем CSS эффекты
    
    clip.addEventListener( 'load', function(client) {
      // alert( "Загрузилась флешка " );
    });
    
    clip.addEventListener( 'complete', function(client, text) {
      alert("Скопирован текст: " + text );
    });
    
    clip.addEventListener( 'mouseOver', function(client) {
      // alert("Навели мышку на флешку"); 
    });
    
    clip.addEventListener( 'mouseOut', function(client) { 
      // alert("Убрали мышку с флешки"); 
    });
    
    clip.addEventListener( 'mouseDown', function(client) { 
      // alert("Нажали мышкой по флешке"); 
      // Копируем нужный текст, в данном случае значение инпута 'clip_text'
      clip.setText( document.getElementById('clip_text').value );
    });
    
    clip.addEventListener( 'mouseUp', function(client) { 
      // alert("Отжали мышку"); 
    });
    // Приклеили к кнопке с айди 'd_clip_button'
    clip.glue( 'd_clip_button' );
  </script>
</body>
</html>