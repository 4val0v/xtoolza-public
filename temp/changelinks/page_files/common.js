var iOver="#e2e2e2"; // Цвет при наведении курсора
var iOut="#eee"; // Цвет при ненаведённом курсоре
var selection;
var userhash;
var ajaxDivId;

jQuery.browser = {};
jQuery.browser.mozilla = /mozilla/.test(navigator.userAgent.toLowerCase()) && !/webkit/.test(navigator.userAgent.toLowerCase());
jQuery.browser.webkit = /webkit/.test(navigator.userAgent.toLowerCase());
jQuery.browser.opera = /opera/.test(navigator.userAgent.toLowerCase());
jQuery.browser.msie = /msie/.test(navigator.userAgent.toLowerCase());

function rand(from, to) {
    return Math.floor(Math.random() * (to-from+1))+from;
}

function expandImg(itm, id, Height){
	newHeight = Height+2;
	$(itm).hide();
  $('#img_'+id).css('height',newHeight+'px');
  return false;
}

function fixImg(itm){
	var isIE = $.browser.msie;
	$(itm).css('max-width', itm.clientWidth || itm.width || itm.scrollWidth);

	if ( itm.complete || itm.readyState == 'complete' ) {
		$(itm)[0].maxWidth = itm.clientWidth || itm.width || itm.scrollWidth;
		if (isIE){
			if (itm.clientWidth || itm.width || itm.scrollWidth) {
			  if ($(itm.parentNode).is('a')){
			    $(itm).addClass('ie6ImageResizeA');
			  }
			  else {
		        $(itm).addClass('ie6ImageResize');
			  }
			}
		}
		else {
			itm.style.width = '100%';
		}
	}
}

function switchTop(itm, type){
	$("div#top-switcher > a").attr("style", "");
	$(itm).css("font-weight", "bold");
	$("#list-views").hide();
	$("#list-rank").hide();
	$("#list-posts").hide();
	$("#list-"+type).show();
	return false;
}

function ins(name){
	if (document.REPLIER) {
	var input=document.REPLIER.Post;
	input.value=input.value+"[b]"+name+"[/b]"+" \n";
	}
}

function Insert(text){
	if (text!="") paste("[quote]"+text+"[/quote]\n", 0);
}

function paste(text, flag){
	if (document.REPLIER) {
	if ((document.selection)&&(flag)) {
		document.REPLIER.Post.focus();
		document.REPLIER.document.selection.createRange().text = text;
	} else document.REPLIER.Post.value += text;
	}
}

function get_selection() {
   if (document.getSelection){

		if(typeof(window.getSelection)!="undefined")
		{
			selection=window.getSelection().toString();
		}
		else
		{
			selection=document.getSelection();
		}

	selection = selection.replace(/\r\n\r\n/gi, "_doublecaret_");
	//selection = selection.replace(/\r\n/gi, " ");
       while (selection.indexOf("  ") !=-1) selection = selection.replace(/  /gi, "");
	selection = selection.replace(/_doublecaret_/gi, "\r\n\r\n");
  } else
	selection=document.selection.createRange().text;
}


function PopUp(url, name, width,height,center,resize,scroll,posleft,postop) {
    if (posleft != 0) { x = posleft }
    if (postop  != 0) { y = postop  }

    if (!scroll) { scroll = 1 }
    if (!resize) { resize = 1 }

    if ((parseInt (navigator.appVersion) >= 4 ) && (center)) {
      X = (screen.width  - width ) / 2;
      Y = (screen.height - height) / 2;
    }
    if (scroll != 0) { scroll = 1 }

    var Win = window.open( url, name, 'width='+width+',height='+height+',top='+Y+',left='+X+',resizable='+resize+',scrollbars='+scroll+',location=no,directories=no,status=no,menubar=no,toolbar=no');
}

function ShowHide(id1, id2) {
  if (id1 != '') expMenu(id1);
  if (id2 != '') expMenu(id2);
  return false;
}

function showHideComment(obj, pid){
	if ($('table#p_row_'+pid+' tr.collapsebox').css("display") == "none") {
		$('table#p_row_'+pid+' tr.collapsebox').show();
		$(obj).text('скрыть');
	}
	else{
		$('table#p_row_'+pid+' tr.collapsebox').hide();
		$(obj).text('показать');
	}
	return false;
}

function expMenu(id) {
  var itm = null;
  if (document.getElementById) {
    itm = document.getElementById(id);
  } else if (document.all){
    itm = document.all[id];
  } else if (document.layers){
    itm = document.layers[id];
  }

  if (!itm) {
   // do nothing
  }
  else if (itm.style) {
    if (itm.style.display == "none") { itm.style.display = ""; }
    else { itm.style.display = "none"; }
  }
  else { itm.visibility = "show"; }
}

function delete_post(theURL) {
   if (confirm('Вы действительно хотите удалить это сообщение?')) {
      window.location.href=theURL;
   }
   else {
      alert ('Не хотите, как хотите :)');
   }
}

function mod_change(elem){
  var w2m;
  if (document.getElementById){
      w2m=document.getElementById('w2m');
  } else if (document.all){
      w2m=document.all['w2m'];
  } else if (document.layers){
      w2m=document.layers['w2m'];
  }
  if (elem.value=='67') {w2m.style.display='';}
  else {w2m.style.display='none';}
}

function collect_pidz(){
  for (var i in document.collect.elements){
    if (i.indexOf('pozt')!=-1){
      var ne=document.createElement("input");
      ne.name=document.collect[i].name;
      ne.type='text';
      ne.style.display='none';
        if (document.collect[i].checked.toString()=='true') ne.value=1; else ne.value=0;
     document.modform.appendChild(ne);
    }
  }
}

function check_poll(itm, max)
{
   var el;
   var cnt=0;
   for (i=0;i<document.forms['pollform'].elements.length;i++)
   {
      el = document.forms['pollform'].elements[i];
      if (el.type == "checkbox")
      {
         if (el.checked)
         {
             cnt++;
         }
      }
   }
   if (cnt > max)
   {
       itm.checked = false;
       alert('Выбрано больше '+max+' вариант(ов)');
       return false;
   }
}

function bookmarksite() {
   var title='Я Плакалъ - развлекательный портал';
   var url = 'http://www.yaplakal.com';
   if (window.sidebar) // firefox
   window.sidebar.addPanel(title, url, "");
   else if (window.opera && window.print) { // opera
        var elem = document.createElement('a');
        elem.setAttribute('href',url);
        elem.setAttribute('title',title);
        elem.setAttribute('rel','sidebar');
        elem.click();
   } else if (document.all)// ie
   window.external.AddFavorite(url, title);
   return false;
}

function getBounds(element)
{
  var left = element.offsetLeft;
  var top = element.offsetTop;
  for (var parent = element.offsetParent; parent; parent = parent.offsetParent)
  {
    left += parent.offsetLeft;
    top += parent.offsetTop;
  }
  return {left: left, top: top, width: element.offsetWidth, height: element.offsetHeight};
}

function ShowModForm(Layer, obj, pid){
	expMenu(Layer);
	get_selection();
	var bounds = getBounds(obj);
	document.getElementById(Layer).style.top  = bounds.top;
	document.getElementById(Layer).style.left = bounds.left;
	document.mod_form.p.value=pid;
	document.mod_form.comment.value=selection;
	document.mod_form.fault.value=rand(1,30);

	if (selection!='') {
		document.mod_form.skip_post.checked=false;
	}
	else{
		document.mod_form.skip_post.checked=true;
	}

	return false;
}

function CheckModForm(){
	if(document.mod_form.reason[0].checked || document.mod_form.reason[1].checked || document.mod_form.reason[2].checked || document.mod_form.reason[3].checked || document.mod_form.reason[4].checked || document.mod_form.reason[5].checked || document.mod_form.reason[6].checked || document.mod_form.reason[7].checked || document.mod_form.reason[8].checked){
		document.mod_form.send_f.disabled=true;
		return true;
	}
	else{
		alert("Не выбрана причина наказания");
		return false;
	}
}

function doRatePost(val, topic, post, new_topic){
	ajaxDivId = new_topic == 1 ? 'div[rel="rating"]' : 'div#p_rank_'+post;
	$(ajaxDivId).css("opacity", "0.2");
	AJAJLoad(ajaxDivId, base_url+'/index.php', { act: 'ST', t: topic, p: post, CODE: 'vote_post', n: new_topic, rank : val, rand: Math.random() },
  function(obj){
	  if (obj.status == 1) {
			if ( !new_topic && ($('table#p_row_'+post+' tr.collapsebox').css("display") == "none" && obj.rank > -10 || $('table#p_row_'+post+' tr.collapsebox').css("display") != "none" && obj.rank <= -10) ){
				$('#pb_'+post).show();
				showHideComment($('#pb_'+post+' a'), post);
			}
	  }
	  else{
	  	if (typeof(obj.error) != "undefined") {
	  		alert(obj.error);
	  	}
	  }
		$(ajaxDivId).html(obj.html);
		ajaxEmptyLoader();
	});
	return false;
}

function pickSearchType(id, title){
	document.forms['search_form'].search_in.value = id;
	$("#search-type-selector").text(title);
  $("ul.cat-list > li[rel^='s_'] > a").attr("class", "");
  $("ul.cat-list > li[rel='s_"+id+"'] > a").attr("class", "active");
	$('#type-list').hide();
	return false;
}


function AHAHLoad(DivId, url, params){
	ajaxDivId = DivId;
	//$(ajaxDivId + '-img').html(ajaxLoadImg);
	$(ajaxDivId).css("opacity", "0.2");
	$.get(url, params, onAjaxSuccess);
	return false;
}

function AJAJLoad(DivId, url, params, func){
	ajaxDivId = DivId;
	$(ajaxDivId + '-img').html(ajaxLoadImg);
	$.getJSON(url, params, func);
	return false;
}

function onAjaxSuccess(obj){
  $(ajaxDivId).html(obj);
	$(ajaxDivId + '-img').empty();
	$(ajaxDivId).css("opacity", "1");
	return true;
}

function ajaxEmptyLoader(){
	$(ajaxDivId + '-img').empty();
	$(ajaxDivId).css("opacity", "1");
}

function getPM(n, t){
	if (n) {
		return AHAHLoad('#pm-alert', base_url+'/index.php', { act: 'Msg', CODE: 33, num: n, total: t, rand: Math.random() }, onAjaxSuccess);
	}
	else{
		return false;
	}
}

function readPM(){
	return AJAJLoad('#pm-alert', base_url+'/index.php', { act: 'Msg', CODE: 34, rand: Math.random() }, function(obj){ $("#pm-alert").hide(); ajaxEmptyLoader(); });
}

function collapseBox(id, sticky, direction){
	if ($(id).css('display')=='none') {
		if (direction=='horizontal') {
			$(id).animate({width: 'show'}, 1000);
		}
		else{
			$(id).animate({height: 'show'}, 1000);
		}

		if (sticky) {
			$.cookie('hide_'+$(id).attr('id'), '', { expires: -1, path: '/', domain: '.yaplakal.com' });
		}
	}
	else{
		if (direction=='horizontal') {
			$(id).animate({width: 'hide'}, 1000);
		}
		else{
			$(id).animate({height: 'hide'}, 1000);
		}

		if (sticky) {
			$.cookie('hide_'+$(id).attr('id'), '1', { path: '/', domain: '.yaplakal.com' });
		}
	}
	return false;
}

function showLoginForm(){
	$('#login-box').animate({ left: 0 }, 500);
	$('#welcome-box').animate({ left: -320 }, 500);
	document.forms[0].user_key.value = user_key;
	return false;
}

function link_to_topic(forum, topic)
{
    var link = "http://www.yaplakal.com/forum"+forum+"/topic"+topic+".html";
		if(prompt( "Отправь эту ссылку другу", link)){
			location.href=link;
		}
    return false;
}

function ShowFavourites()
{
  AHAHLoad('#FavList', base_url+'/index.php', { act: 'UserCP', CODE: 10 });
}

function AddFavourite(item, st, type)
{
  AHAHLoad('#FavList', base_url+'/index.php', { act: 'UserCP', CODE: 11, item: item, type: type, st: st });
}

function RemoveFavourite(id)
{
  AHAHLoad('#FavList', base_url+'/index.php', { act: 'UserCP', CODE: 12, id: id });
}

function buddy_pop() {
	window.open(base_url+'/index.php?act=buddy','BrowserBuddy','width=250,height=500,resizable=yes,scrollbars=yes');
}

function multi_page_jump( url_bit, cur_st, total_posts, per_page, url_end, slash )
{
	pages = 1;
	cur_page  = 1;
	if ( total_posts % per_page == 0 ) { pages = total_posts / per_page; }
  else { pages = Math.ceil( total_posts / per_page ); }
	msg = "Введите номер страницы, к которой хотите перейти." + " " + pages;
	if ( cur_st > 0 ) { cur_page = cur_st / per_page; cur_page = cur_page -1; }
	show_page = 1;
	if ( cur_page < pages )  { show_page = cur_page + 1; }
	if ( cur_page >= pages ) { show_page = cur_page - 1; }
	 else { show_page = cur_page + 1; }
	userPage = prompt( msg, show_page );
	if ( userPage > 0  ) {
    if ( userPage < 1 )     {    userPage = 1;  }
    if ( userPage > pages && 0) { userPage = pages; }
    if ( userPage == 1 )    {     start = 0;    }
    else { start = (userPage - 1) * per_page; }
      if (slash){
        window.location = url_bit + "/st/" + start + url_end;
      }
      else{
        window.location = url_bit + "&st=" + start + url_end;
      }
	}
	return false;
}

function selectUrl(){
	$('#upload_image_link').addClass('float-layer');
	$('#upload_image_link').removeClass('active');
	$('#url_image_link').removeClass('float-layer');
	$('#url_image_link').addClass('active');
	document.forms['image_search_form'].reset();
	return false;
}

function selectFile(val){
	if (val) {
		document.forms['image_search_form'].image_url.value=val;
		$('#url_image_link').addClass('float-layer');
		$('#url_image_link').removeClass('active');
		$('#upload_image_link').removeClass('float-layer');
		$('#upload_image_link').addClass('active');
		//$.modal.close();
	}
	return false;
}
