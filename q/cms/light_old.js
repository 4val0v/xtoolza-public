function check_cms() {
 var wl, kwl;

 if ($("#site_list").attr("value") == "")
    alert("�� ������� ����� ��� �������� !");
 else {
    var url = $("#site_list").val().split(/[\n\r]+/);
    wl = url.length;
    if (wl <= 4000) {

    $("#cms").fadeOut(function() {

    $("#show_cms").html("<tr bgcolor='#00FA9A' id='one'><td>����</td><td>CMS</td></tr>");

    kwl=0;
    for(var i = 0; i < wl; i++){
       if ($.trim(url[i]) != "") {
        kwl++;
        $("#show_cms").append('<tr id="one"><td><b><a href="http://'+ url[i].replace('http://', '') + '" target="_blank">' + url[i] + '</a></b></td><td id="cms_'+ i +'"><img src="http://xtoolza.info/q/cms/ajax-loader.gif"></td></tr>');
       }
    }
    $("#show_cms").append("<tr><td><a onClick='$(\"#show_cms\").fadeOut( function() { $(\"#cms\").fadeIn(); $(\"#site_list\").focus(); });' style='text-decoration:underline; background-color:yellow;'><b>� ������ ������</b></a></td><td></td></tr>");

    $("#show_cms").fadeIn();

    for (var i = 0; i < wl; i++) {
       if ($.trim(url[i]) != "")
          show_cms_result(i, url[i], kwl);
    }

    });

    }
    else alert("����������� � 4000 ������.");
 }

}

function show_cms_result(i, site, kwl) {
 $.post("cms.php", { url: site }, function(data) {
    $("#cms_" + i).html(data);
    if (kwl == i+1)
    alert("����������� CMS ���������.");
    });
}