function build_map() {

	var lim = 15; //количество потоков

	$.ajax({
		type: "POST",
		url: "site.php",
		async: true,
		cache: false,
		data: { site: $("#broken_site").attr("value") },
		success: function(data){
			if (data != "c") {
				if (data != "") {
					$("#broken_site").blur();
					alert(data);
				}
			}
			else {
				$("#show_map").html("<img src='http://xtoolza.info/q/broken/ajax-loader.gif'>");
				$("#show_map").fadeIn();

				var url = $("#broken_site").attr("value");
				var host = url;
				if (host.substr(0, 7) == "http://")
					host = host.replace("http://", "");
				if (host.substr(0, 4) == "www.")
					host = host.replace("www.", "");

				if (url.indexOf("http://") == -1)
					url = "http://" + url;

				var links = [url];
				var links2 = [url];

				var go = 1;
				var buff = [];
				var buff2 = [];
				var external = [];
				var external2 = [];
				var broken = [];
				var broken2 = [];
				for (var i = 0; i < links.length; i++) {
					$("#info").html('Обработка: ' + (i + 1) + ' стр. из ' + links.length + '.');

					if (go < lim && i + 1 != links.length) {
						buff.push(links[i]);
						buff2.push(links2[i]);
						go++;
					} else if (go == lim || i + 1 == links.length) {
						buff.push(links[i]);
						buff2.push(links2[i]);

						$.ajax({
							type: "POST",
							url: "map.php",
							async: false,
							cache: false,
							data: { pages: buff.join(","), pages2: buff2.join(","), links: links.join(","), links2: links2.join(","), external: external.join(","), external2: external2.join(","), broken: broken.join(","), broken2: broken2.join(","), hostname: host },
							complete: function(data) {
								answ = data.responseText.split("|");
								links = answ[0].split(",");
								links2 = answ[1].split(",");
								external = answ[2].split(",");
								external2 = answ[3].split(",");
								broken = answ[4].split(",");
								broken2 = answ[5].split(",");

								if (i + 1 == links.length) {
									$("#info").html('Обработано ' + links.length + ' стр.');
									out = '<table border="1" style="BORDER-COLLAPSE: collapse;" width="100%" cellpadding="3"><td><b>Внешняя ссылка</b></td><td><b>Страница</b></td></tr>';
									for (var j = 0; j < external.length; j++)
										if (external[j] != "")
											out = out + '<tr><td><a href="' + external[j] + '" target="_blank">' + external[j] + '</a></td><td><a href="' + external2[j] + '" target="_blank">' + external2[j] + '</a></td></tr>';
									out = out + '</table>';
									out2 = '<table border="1" style="BORDER-COLLAPSE: collapse;" width="100%" cellpadding="3"><tr><td><b>Битая ссылка</b></td><td><b>Страница</b></td></tr>';
									for (var k = 0; k < broken.length; k++)
										if (broken[k] != "")
											out2 = out2 + '<tr><td><a href="' + broken[k] + '" target="_blank">' + broken[k] + '</a></td><td><a href="' + broken2[k] + '" target="_blank">' + broken2[k] + '</a></td></tr>';
									out2 = out2 + '</table>';
									$("#show_map").html(out + "<br><br>" + out2);
								}
							}
						});

						go = 1;
						buff = [];
						buff2 = [];
					}
				}
			}
		}
	});
}