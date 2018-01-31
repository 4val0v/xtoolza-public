function check_cms() {
  var c, d;
  if ("" == $("#site_list").attr("value")) {
    alert("\u041d\u0435 \u0432\u0432\u0435\u0434\u0435\u043d\u044b \u0441\u0430\u0439\u0442\u044b \u0434\u043b\u044f \u043f\u0440\u043e\u0432\u0435\u0440\u043a\u0438 !");
  } else {
    var b = $("#site_list").val().split(/[\n\r]+/);
    c = b.length;
    4E3 >= c ? $("#cms").fadeOut(function() {
      $("#show_cms").html("<tr bgcolor='#00FA9A' id='one'><td>\u0421\u0430\u0439\u0442</td><td>Инет-магазин?</td></tr>");
      for (var a = d = 0;a < c;a++) {
        "" != $.trim(b[a]) && (d++, $("#show_cms").append('<tr id="one"><td><b><a href="http://' + b[a].replace("http://", "") + '" target="_blank">' + b[a] + '</a></b></td><td id="cms_' + a + '"><img src="http://xtoolza.info/q/cms/ajax-loader.gif"></td></tr>'));
      }
      $("#show_cms").append('<tr><td><a onClick=\'$("#show_cms").fadeOut( function() { $("#cms").fadeIn(); $("#site_list").focus(); });\' style=\'text-decoration:underline; background-color:yellow;\'><b>\u041a \u0441\u043f\u0438\u0441\u043a\u0443 \u0441\u0430\u0439\u0442\u043e\u0432</b></a></td><td></td></tr>');
      $("#show_cms").fadeIn();
      for (a = 0;a < c;a++) {
        "" != $.trim(b[a]) && show_cms_result(a, b[a], d);
      }
    }) : alert("\u041e\u0433\u0440\u0430\u043d\u0438\u0447\u0435\u043d\u0438\u0435 \u0432 4000 \u0441\u0430\u0439\u0442\u043e\u0432.");
  }
}
function show_cms_result(c, d, b) {
  $.post("cms.php", {url:d}, function(a) {
    $("#cms_" + c).html(a);
    b == c + 1 && alert("\u041e\u043f\u0440\u0435\u0434\u0435\u043b\u0435\u043d\u0438\u0435 CMS \u0437\u0430\u0432\u0435\u0440\u0448\u0435\u043d\u043e.");
  });
}
;
