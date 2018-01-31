<!DOCTYPE HTML PUBLIC "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html><head>


<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<title>Keyword Ninja</title>
<script type="text/javascript" src="index_files/jquery-1.js"></script>
<script language="javascript">
// Removes leading whitespaces
function LTrim( value ) {
	
	var re = /\s*((\S+\s*)*)/;
	return value.replace(re, "$1");
	
}

// Removes ending whitespaces
function RTrim( value ) {
	
	var re = /((\s*\S+)*)\s*/;
	return value.replace(re, "$1");
	
}

// Removes leading and ending whitespaces
function trim( value ) {
	
	return LTrim(RTrim(value));
	
}

var magic = 1;
function fetch_keywords(){
	magic = 1;
	var i=0;
	var flag = 0;
	var search_engines='';
	var keyword = document.getElementById("keyword").value;
	for(i=1;i<=4;i++){
		if(document.getElementById("search_engines"+i).checked){
			search_engines = search_engines+','+i;
			flag++;
		}
	}
	if(flag==0){
		alert("Please select atleast one search engine");
		return false;
	}
	if(trim(keyword)==''){
		alert("Please enter your keyword to search");
		return false;
	}
	
	var second_level = 0;
	if(document.getElementById("second_level").checked){
		second_level = 1;
	}
	
	
	$("#result_div").html('&nbsp;<img src="images/loading_new.gif" />&nbsp;Please wait, Result file will be load in a short while ');
	inner_fill();
	$.post("ajax_page.php",{action:"fetch_keywords", search_engines:search_engines, keyword:keyword, second_level:second_level},function(data){
		$("#result_div").html(data);
		magic = 0;
	});
}

function inner_fill(){
	setTimeout("inner_fill1()",500);
}

function inner_fill1(){
	var inner = $("#result_div").html();
	if(magic>20){
		inner = '&nbsp;<img src="images/loading_new.gif" />&nbsp;Please wait, Result file will load in a short while ';
		magic = 1;
	}
	if(magic!='0'){
		inner = inner+"&nbsp;.";
		$("#result_div").html(inner);
		inner_fill();
		magic++;
	}
}

function change_tab(tab){
	if(document.getElementById("tab"+tab).className=='tabinact'){
		document.getElementById("tab1").className='tabinact';
		document.getElementById("tab3").className='tabinact';
		document.getElementById("tab"+tab).className='tabact';
		document.getElementById("tabCont1").style.display='none';
		document.getElementById("tabCont3").style.display='none';
		document.getElementById("tabCont"+tab).style.display='block';
	}
}

function fetch_competition(){
	magic1 = 1;
	var keyword_comp = document.getElementById("keyword_comp").value;
	if(trim(keyword_comp)==''){
		alert("Please enter your keyword");
		return false;
	}
	var exact = 0;
	if(document.getElementById("exact").checked){
		exact = 1;
	}
	document.getElementById("rst_btn").style.display = 'none';
	$("#competition_result_div").html('&nbsp;<img src="images/loading_new.gif" />&nbsp;Please wait, Result will load in a short while ');
	inner_fill_s();
	$.post("ajax_page.php",{action:"competition", keyword:keyword_comp, exact:exact},function(data){
		$("#competition_result_div").html(data);
		magic1 = 0;
		document.getElementById("rst_btn").style.display = 'block';
	});
}

function inner_fill_s(){
	setTimeout("inner_fill1_s()",500);
}

function inner_fill1_s(){
	var inner = $("#competition_result_div").html();
	if(magic1>20){
		inner = '&nbsp;<img src="images/loading_new.gif" />&nbsp;Please wait, Result will load in a short while ';
		magic1 = 1;
	}
	if(magic1!='0'){
		inner = inner+"&nbsp;.";
		$("#competition_result_div").html(inner);
		inner_fill_s();
		magic1++;
	}
}

function toExact(i){
	var resultCt = document.getElementById('resultCt').value;
	if(i<=resultCt){
		$("#res_div"+i).html('<img src="images/loading_new.gif" />');
		var keyword = trim($("#kew_div"+i).html());
		$.post("ajax_page.php",{action:"get_res_count", keyword:keyword},function(data){
			$("#res_div"+i).html(data);
			var link_val = document.getElementById("link_div"+i).href;
			var link_valA = link_val.split('search?q=');
			link_val = link_valA[0]+'search?q="'+link_valA[1]+'"';
			document.getElementById("link_div"+i).href = link_val;
			var j = parseInt(i)+1;
			$("#res_div"+j).html('<img src="images/loading_new.gif" />');
			var k = parseInt(j)+5000;
			setTimeout("toExact("+j+")",k);
		});
	}
	
}

function reset_page(){
	document.getElementById("keyword_comp").value = '';
	document.getElementById("exact").checked = false;
	document.getElementById("competition_result_div").innerHTML = '';
	magic1 = 0;
}
</script>
<link type="text/css" href="css/style.css" rel="stylesheet" />
</head>
<body onload="window.defaultStatus='css Zen Garden: The Beauty in CSS Design';" id="css-zen-garden">
<div id="box" class="box">
	<div id="logo_div" class="logo_div">
	<img src="http://keywordninja.com/images/68_Keyword-Ninja-Header3-FD.jpg" width="680" />
	</div>
	<div id="main_div" class="main_div">
		<div id="tab1" class="tabact" onclick="change_tab('1');">Keyword Suggestions</div>
		<div class="space_div">&nbsp;</div>
	
		<div id="tab3" class="tabinact" onclick="change_tab('3');">Support</div>
		<div class="last_div">&nbsp;</div>
	</div>
	<div id="tabCont1" class="container_div">
		<table>
			<tr>
				<td><strong>Search Engines</strong></td>
			</tr>
			<tr>
				<td style="padding-left:5px">
				<input id="search_engines1" name="search_engines[]" type="checkbox" value="1"  class="inpt" />&nbsp;Google
				&nbsp;&nbsp;&nbsp;&nbsp;<input id="second_level" name="second_level" type="checkbox" value="1"  class="inpt" />&nbsp;2nd Level
				<br /><input id="search_engines2" name="search_engines[]" type="checkbox" value="2"  class="inpt" />&nbsp;Yahoo
				<br /><input id="search_engines3" name="search_engines[]" type="checkbox" value="3"  class="inpt" />&nbsp;YouTube
				<br /><input id="search_engines4" name="search_engines[]" type="checkbox" value="4"  class="inpt" />&nbsp;Amazon				
				</td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
		  </tr>
			<tr>
				<td>Keywords (1 per line)</td>
			</tr>
			<tr>
			  <td><textarea rows="5" cols="60" name="keyword" id="keyword"  class="inpt" ></textarea></td>
		  </tr>
			<tr>
			  <td><input value="Submit" type="button" onclick="fetch_keywords();"  class="inpt" /></td>
		  </tr>
			<tr>
			  <td>&nbsp;</td>
		  </tr>
			<tr>
			  <td id="result_div">&nbsp;</td>
		  </tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
		</table>
	</div>
	
	<div id="tabCont3" class="container_div" style="display:none">
		<table width="650" cellpadding="6" cellspacing="6">
			<tr>
				<td><strong>Support</strong></td>
			</tr>
			<tr>
			  <td>
			   <iframe src="http://www.keywordninja.com/support2.php" scrolling="auto" width="560" height="400" frameborder="0"></iframe>
			  </td>
		  </tr>
		</table>
	</div>
	</div>
	<p style="text-align: center"><a href="http://www.keywordninja.com">Keyword Tool</a></p>
</div>
</body></html>
