function check_context() {
 var wl, kwl;

 if ($("#site_list").attr("value") == "")
    alert("�� ������� ����� ��� �������� !");
 else {
    var url = $("#site_list").val().split(/[\n\r]+/);
    wl = url.length;
    if (wl <= 5000) {

    $("#context").fadeOut(function() {

    $("#show_context").html("<tr bgcolor='#00FA9A' id='one'><td>����</td><td>context</td></tr>");

    kwl=0;
    for(var i = 0; i < wl; i++){
       if ($.trim(url[i]) != "") {
        kwl++;
        $("#show_context").append('<tr id="one"><td><b><a href="http://'+ url[i].replace('http://', '') + '" target="_blank">' + url[i] + '</a></b></td><td id="context_'+ i +'"><img src="http://xtoolza.info/q/context/ajax-loader.gif"></td></tr>');
       }
    }
    $("#show_context").append("<tr><td><a onClick='$(\"#show_context\").fadeOut( function() { $(\"#context\").fadeIn(); $(\"#site_list\").focus(); });' style='text-decoration:underline; background-color:yellow;'><b>� ������ ������</b></a></td><td></td></tr>");

    $("#show_context").fadeIn();

    for (var i = 0; i < wl; i++) {
       if ($.trim(url[i]) != "")
          show_context_result(i, url[i], kwl);
    }

    });

    }
    else alert("����������� � 5000 ������.");
 }

}

function show_context_result(i, site, kwl) {
 $.post("context.php", { url: site }, function(data) {
    $("#context_" + i).html(data);
    if (kwl == i+1)
    alert("����������� context ���������.");
    });
}