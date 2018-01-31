<?
header('Content-Type: text/html; charset=utf-8');
ignore_user_abort(true);
set_time_limit(0);
error_reporting( E_ALL );
ini_set('display_errors', 1);




function getfile(){
$list = file('http://xtoolza.info/q/cms/logs/domains.txt');
	foreach ($list as $line) {
	$liner[] = trim(str_replace("\r\n", "", $line));
		
	}
	return $liner;
}
$mass = getfile();
// $mass = array(
// 'q-page.ru',
// 'txdom.ru',
// 'www.napinfo.ru',
// 'medocenter.ru',
// 'new-note.ru',
// 'www.avto-kontrakt1.ru'
// );

// var_dump ($massfile);

function cmscheck($mass) {
	foreach ($mass as $siter) {
	echo $siter. chr(9). check(grab($siter)). '<br>';
	$log .= $siter . chr(9). check(grab($siter)) . PHP_EOL;
	
	}
	return $log;
}
// cmscheck($sites);
$loger = cmscheck($mass);

function mylog($data){
    $data = $data . PHP_EOL;
	file_put_contents('/var/xtoolza.info/q/cms/logs/cmslogernew.txt', $data);
    // var_dump (file_put_contents('logs/statuslogs.txt', $data));
}
mylog($loger);


function grab($host) {
		if (function_exists('mb_detect_encoding')){
			if(mb_detect_encoding($host) != "ASCII"){ //если сайт в кириллице переводим в punycode
				include_once('idna_convert.class.php');
				$IDN = new idna_convert(array('idn_version' => '2008'));
				$host=$IDN->encode($host);
			}
		}
        $ch = curl_init();
		$user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36";
        curl_setopt($ch, CURLOPT_URL, $host);
        curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        $data = curl_exec($ch); /* curl_exec($ch); */
        curl_close($ch);
        if ($data)
            return $data;
        else
            return FALSE;
}

function check($host) {
        $cms = array(
				"3dcart" => array('Software by <a href="http://www.3dcart.com">3dcart</a>','!--START: 3dcart stats--','!--END: 3dcart stats--'),
				"a5 SaaS" => array('!-- siteByName_','img src="/img/zones/a5.ru/site_copyright.png','Создано на конструкторе сайтов - A5.ru'),	
                "ABO CMS" => array("Design and programming (for ABO.CMS)","ABO.CMS"),	
                "Adobe CQ5" => array('$CQ.getScript(','$CQ(function()','"jquery": "../CQ/main"','/js/CQ/main.js"','/cq5/css/main.css','/cq5/css/print.css'),	
                "AdVantShop.NET" => array('Работает на <a data-cke-saved-href="http://www.advantshop.net" href="http://www.advantshop.net"'),	
                "AsciiDoc" => array('meta name="generator" content="AsciiDoc'),	
                "Altedit SaaS" => array('name="altedit_widget_header_menu','class="altedit_widget"','name="altedit_region','class="altedit-row"','Разработано на платформе &quot;<a href="http://altedit.ru"','.alteditBlockWrapper'),	
                "Ametys" => array('meta content="Ametys','div id="ametys-cms-zone'),	
                "Amiro CMS" => array("/amiro_sys_css.php?","/amiro_sys_js.php?","-= Amiro.CMS (c) =-","Работает на Amiro.CMS",'Сайт работает на Amiro.CMS'),	
                "Apache Lenya" => array('<alt="Built with Apache Lenya"','content="Apache Lenya'),	
                "AxCMS" => array('Build and published by AxCMS.net','content="Axinom'),	
				"Bigcommerce" => array('shortcut icon" href="http://cdn2.bigcommerce.com/',"'platform':'bigcommerce'",'link rel="shortcut icon" href="http://cdn3.bigcommerce.com','link rel="shortcut icon" href="http://cdn4.bigcommerce.com','link rel="shortcut icon" href="http://cdn1.bigcommerce.com/','link rel="shortcut icon" href="http://cdn2.bigcommerce.com/','link href="http://cdn1.bigcommerce.com/','link href="http://cdn3.bigcommerce.com/'),	
                "Bigace" => array('Работает на BIGACE','Site is running BIGACE','meta name="generator" content="BIGACE'),	
                "Bitrix" => array("/bitrix/templates/", "/bitrix/js/", "/bitrix/admin/"),	
                "BLOX CMS" => array('div id="blox-html-container"','Powered by <a href="http://bloxcms.com" title="BLOX Content Management System"'),	
                "BM Shop 5 SaaS" => array('Разработка сайта — <a href="http://renua.ru" target="_blank">Renua</a><br/> проект <a href="http://bmshop5.ru" target="_blank">bmshop5','Создание интернет-магазинов <a href="http://bmshop.ru" target="_blank">BmShop'),	
				"Cargo" => array('type="text/javascript" src="a/js/cargo.js','meta name="cargo_title" content=','Cargo.IncludeSocialMedia({','type="application/rss+xml" title="Cargo feed"','Running on <a href="http://cargocollective.com">Cargo</a>'),
				"CMS BS" => array('meta name="GENERATOR" content="CMS-BS"'),
				"Bricolage" => array('meta name="generator" content="Bricolage','is powered by Bricolage'),
				"BrowserCMS" => array('meta name="generator" content="BrowserCMS'),
				"Business Catalyst" => array('rel="stylesheet" href="/CatalystStyles/','src="/CatalystScripts','businesscatalyst.com/favicon.ico"'),
				"Chameleon" => array('meta name="generator" content="Chameleon Content Management System - chameleon-cms.com'),
				"CMSimple" => array('meta name="generator" content="CMSimple','Сайт работает на CMSimple','Powered by CMSimple','www.cmsimplewebsites.com">Designed By CmSimpleWebsites.com'),	
				"CMS Made Simple" => array("Released under the GPL - http://cmsmadesimple.org",),	
				"CommonSpot" => array('var emptyimg = "/commonspot/','Powered by CommonSpot','commonspot.csPage'),					
				"Cotonti" => array('meta name="generator" content="Cotonti'),	
                "Concrete5" => array("/concrete/js/", "concrete5 - 5.","/concrete/css/",'IMAGE_PATH="/concrete/','meta name="generator" content="concrete5'),	
                "Contao" => array("This website is powered by Contao Open Source CMS", 'link rel="stylesheet" href="system/contao.css','src="tl_files/','a href="tl_files/'),	
                "Contenido CMS" => array('meta name="generator" content="CMS CONTENIDO','meta name="generator" content="CMS Contenido'),	
                "Contensis CMS" => array('meta name="GENERATOR" content="Contensis CMS'),	
                "Convio" => array('CONVIO.pageUserName','CONVIO.pageSessionID'),	
                "CoreMedia" => array('content="CoreMedi'),	
                "CPG Dragonfly" => array('meta name="generator" content="CPG Dragonfly CMS'),	
                "CS Cart" => array("/skins/basic/customer/addons/","/skins/basic/customer/images/icons/favicon.ico","/auth-loginform?return_url=index.php","/index.php?dispatch=auth.recover_password","cm-popup-box hidden","cm-popup-switch hand cart-list-icon","cart-list hidden cm-popup-box cm-smart-position","index.php?dispatch=checkout.cart","cm-notification-container","/index.php?dispatch=pages.view&page_id="),	
                "Danneo CMS" => array("Danneo Русская CMS", 'content="CMS Danneo','META NAME="GENERATOR" CONTENT="Danneo CMS','meta name="generator" content="CMS Danneo'),	
                "Demandware" => array("Demandware Analytics code", 'shortcut icon" type="image/png" href="http://demandware.edgesuite.net/','link rel="stylesheet" href="http://demandware.edgesuite.net/','img src="http://demandware.edgesuite.net/'),	
                 "DataLife Engine" => array("DataLife Engine Copyright", "index.php?do=lostpassword", "/engine/ajax/dle_ajax.js","engine/opensearch.php","/index.php?do=feedback","/index.php?do=rules","/?do=lastcomments",'meta name="generator" content="DataLife Engine','/engine/editor/css/default.css','/engine/editor/scripts/webfont.js'),
                 "diafan.CMS" => array('http://www.diafan.ru/'),	
                "Discuz!" => array('- Powered by Discuz!</title>','meta name="generator" content="Discuz!','meta name="author" content="Discuz! Team and Comsenz UI Team"','<p>Powered by <b>Discuz!</b>','div id="discuz_bad_','Powered by <strong><a href="http://www.discuz.net"',"discuz_uid = '0'"),	
                "Divolta CMS" => array('Разработка сайта <a href="http://divolta.com.ua'),	
                "Django CMS" => array('meta name="generator" content="Django-CMS'),	
                "Drupal" => array("Drupal.settings","Drupal 7 (http://drupal.org)","misc\/drupal.js","drupal_alter_by_ref","/sites/default/files/css/css_","/sites/all/files/css/css_",'text/javascript" src="/misc/drupal.js'),	
                "DokuWiki" => array("DokuWiki Release"),	
                "DotNetNuke" => array('meta id="MetaGenerator" name="GENERATOR" content="DotNetNuke','by DotNetNuke Corporation','meta id="MetaDescription" name="DESCRIPTION" content=','name="COPYRIGHT" content="Copyright 2015 by DotNetNuke Corporation'),	
                "Dynamicweb" => array('meta name="Generator" content="Dynamicweb','meta name="generator" content="Dynamicweb'),	
                "e107" => array("This site is powered by e107","text/javascript' src='/content_files/e107.js","stylesheet' href='/content_files/e107.css",'Powered by e107 website system','/e107_files/e107.css','/e107_files/e107.js','img src="/e107_themes'),	
                "Edicy SaaS" => array("http://stats.edicy.com:8000/tracker.js","http://static.edicy.com/assets/site_search/"),	
                "Ektron" => array("EktronClientManager","Ektron.PBSettings","ektron.modal.css","Ektron/Ektron.WebForms.js","EktronSiteDataJS","/Workarea/java/ektron.js","Amend the paths to reflect the ektron system"),	
                "Ekwid SaaS" => array("ecwid_product_browser_scroller","push-menu-trigger ecwid-icons-menu","ecwid-starter-site-links","ecwid-loading loading-start",'var ecwid_ProductBrowserURL','script type="text/javascript" src="http://app.ecwid.com/script.js'),	
                "EPiServer CMS" => array('meta name="generator" content="EPiServer','meta name="EPi.ID','!-- EPi metatags --','meta name="generator" content="http://www.episerver.com','meta name="Author-Template" content="EPiServer CSS design','meta name="EPi.Description','meta name="EPi.Keywords'),	
                "eSyndiCat" => array('meta name="generator" content="eSyndiCat','Powered by <a href="http://www.esyndicat.com/">eSyndiCat Directory Software'),	
                "Explay CMS" => array('meta name="generator" content="Explay CMS','Engine &copy; <a href="http://www.explay.su/">Explay CMS','meta name="generator" content="EXPLAY Engine CMS"','alt="Explay Engine CMS"'),	
                "Express Site" => array('"http://www.expresssite.ru">изготовление сайтов - www.expresssite.ru</a>'),
                "ExpressionEngine" => array('"http://www.expresssite.ru">изготовление сайтов - www.expresssite.ru</a>','alt="Expression Engine"border="0"/></a>'),
                "eZ Publish" => array('img src="/var/ezflow_site','img src="/design/ezflow','meta name="generator" content="eZ Publish','import url(/extension/ezwebin/design/','link rel="stylesheet" type="text/css" href="/var/ezflow_site'),	
                "FlexCMP" => array("meta name='generator' content='FlexCMP",'FlexCMP - CMS per Siti Accessibili'),	
                "Flexcore CMS" => array("<!-- Oliwa-pro service -->"),	
                "Fo.ru SaaS" => array("MLP_NAVIGATION_MENU_ITEM_START","MLP_WINDOW_HEAD","/MLP_WINDOW_END","MLP_NAVIGATION_MENU_ITEM_END","window.location.replace('http://fo.ru/signup"),
                "Gamburger CMS" => array('<span class="web"><a href="http://gamburger.ru/" target="_blank">','/templates/default/images/gamburger.png'),	
                "GD SiteManager" => array("name='generator' content='GD SiteManager'"),	
                "Geeklog" => array('var geeklog = {'),	
                "GetSimple" => array('meta name="generator" content="GetSimple','Powered by  GetSimple'),	
                "GitHub Pages" => array('Powered by <a href="http://pages.github.com">GitHub Pages</a>','a href="https://github.com/bip32/bip32.github.io">GitHub Repository</a>'),	
                "Google Sites" => array('class="powered-by"><a href="http://sites.google.com','\u003dhttps://sites.google.com/','meta itemprop="image" content="https://sites.google.com/','meta property="og:image" content="https://sites.google.com/'),	
                "Gollos SaaS" => array('<meta name="generator" content="Gollos.com, <script src="http://s4.golloscdn.com/'),	
                "Government Site Builder" => array('content="Government Site Builder'),	
                "Graffiti CMS" => array('meta name="generator" content="Graffiti','a title="Powered by Graffiti CMS" href="http://graffiticms.com'),
                "GX WebManager" => array('meta name="generator" content="GX WebManager','meta name="Generator" content="GX WebManager'),
                "Homestead" => array('meta name="generator" content="Homestead SiteBuilder','link rel="stylesheet" href="http://www.homestead.com'),	
                "HostCMS" => array("/hostcmsfiles/",'<!-- HostCMS Counter -->','type="application/rss+xml" title="HostCMS RSS Feed"'),	
				"Hotaru CMS" => array('meta name="generator" content="Hotaru'),	
                "Hotlist.biz SaaS" => array("hotengine-hotlist_logo","Аренда и Создание интернет магазина Hotlist.biz","hotengine-hotcopyright","hotlist.biz/ru/?action=logout","hotengine-dialog-email","hotengine-shop-cart-message-empty-cart","hotengine-footer-copyright","hotengine-counters",'class="hotengine-seo-likeit"','class="hotengine-footer-copyright"','Powered by <img class="hotengine-hotcopyright'),	
                "Howbay SaaS" => array("http://rtty.howbay.ru/","howbay-snapprodnamehldr","Аренда онлайн магазина howbay.ru"),	
                "IBM WebSphere Portal" => array('section class="ibmPortalControl',':ibmCfg.portalConfig.',"var pageMenuURL = '/wps/portal/",'href="/wps/portal/'),	
				"Indexhibit" => array("Built with <a href='http://www.indexhibit.org/'>Indexhibit",'you must provide a link to Indexhibit on your site someplace','Visit Indexhibit.org for more information!'),
                "inDynamic" => array("Система управления сайтом и контекстом (cms) - inDynamic",'Управление сайтом — <a href="http://www.indynamic.ru/">inDynamic'),	
                "Infopark" => array("meta content='https://www.infopark.com/"),	
                "InSales SaaS" => array("InSales.formatMoney", ".html(InSales.formatMoney","http://assets3.insales.ru/assets/","http://assets2.insales.ru/assets/","http://static12.insales.ru","Insales.money_format",'--InsalesCounter --'),	
                "InstantCMS" => array("InstantCMS - www.instantcms.ru","/templates/instant/css/popalas.css","/templates/instant/css/siplim.css",'link href="/templates/_default_/css/styles.css"','href="http://www.instantcms.ru/" title="Работает на InstantCMS"','meta name="generator" content="InstantCMS'),	
                "Introweb" => array('href="http://introweb.ru/">Создание сайтов</a>','<a href="http://www.introweb.ru">Создание сайта - introweb.ru</a>'),	
                "Imperia CMS" => array('meta name="generator" content="IMPERIA'),	
                "ImpressCMS" => array('meta name="generator" content="ImpressCMS"'),	
                "Image CMS" => array('meta name="generator" content="ImageCMS"','name="cms_token" />'),	
                "ImpressPages" => array('/ip_cms/','ip_themes','ip_libs','ip_plugins','class="ipWidget ipWidget-Html','class="ipWidget ipWidget-Image','content="ImpressPages'),	
                "IP.Board" => array("!--ipb.javascript.start--","IBResouce\invisionboard.com",'/forum/index.php?act=boardrules','Powered By IP.Board'),	
                "Jadu" => array('powered by Jadu CMS','content="http://www.jadu.net','content="Jadu.net'),	
                "Jalios CMS" => array('meta name="Generator" content="Jalios JCMS'),	
                "Jimdo SaaS" => array('var jimdoData = ','link href="http://u.jimdo.com','link rel="shortcut icon" href="http://u.jimdo.com'),	
                "Joomla!" => array("/css/template_css.css", "Joomla! 1.5 - Open Source Content Management",'src="/templates/marshgreen/js/', "/templates/system/css/system.css", "Joomla! - the dynamic portal engine and content management system","/templates/system/css/system.css","/media/system/js/caption.js","/templates/system/css/general.css","/index.php?option=com_content&task=view",'name="generator" content="Joomla! - Open Source Content Management"','href="/components/com_rsform/assets/css/front.css','"stylesheet" href="/media/jui/css/bootstrap.min.css','script src="/modules/mod_slideshowck/assets/camera.min.js','src="/modules/mod_slideshowck/assets/jquery.mobile.customized.min.js','/templates/yoo_digit/css/bootstrap','link rel="stylesheet" href="/templates/yoo_glass/css/','link rel="stylesheet" href="/media/zoo/elements/','script src="/media/system/js/modal.js"','script src="/templates/yoo_nano3/warp/','meta name="generator" content="Joomla!','/css/joomla.css'),	
                "Joostina" => array('Joostina CMS','Работает на Joostina'),	
                "Kentico" => array("CMSListMenuLI","CMSListMenuUL","Lvl2CMSListMenuLI","/CMSPages/GetResource.ashx"),	
				"Kernel Video Sharing: KVS" => array("/js/KernelTeamVideoSharingSystem"),	
				"Komodo" => array('Developed by: Komodo CMS','content="Komodo CMS','a href="/komodo-cms'),	
				"Koobi CMS" => array('meta name="generator" content="(c) Koobi',"expires: 30,path: '/koobi7",'meta name="generator" content="KOOBI'),	
                "Kwimba SaaS" => array("Kwimba.ru - он-лайн сервис для создания Интернет-магазина",'a title="Kwimba.ru - он-лайн сервис для создания Интернет-магазина" href="http://kwimba.ru'),	
                "LEPTON CMS" => array('/templates/lepton/css/template.css" media="screen,projection"','/templates/lepton/css/print.css" media="print"'),	
                "Lark.ru SaaS" => array("/user_login.lm?back=%2F","http://lark.ru/gb.lm?u=", "http://lark.ru/news.lm?u="),	
                "Limb CMS" => array("!-- POWERED BY limb",'!-- POWERED BY limb | HTTP://WWW.LIMB-PROJECT.COM/ --'),	
                "LightMon Engine" => array('meta name="copyright" content="Powered by LightMon','!-- Lightmon Engine Copyright'),	
                "Liferay CMS" => array("var Liferay={Browser:",'Liferay.currentURL="','var themeDisplay=Liferay.','Liferay.Portlet.onLoad','comboBase:Liferay','Liferay.AUI.getFilter','Liferay.Portlet.runtimePortletIds','Liferay.Util.evalScripts','Liferay.Publisher.register','Liferay.Publisher.deliver','Liferay.Popup.center'),	
                "LiveStreet" => array("LIVESTREET_SECURITY_KEY","Free social engine"),	
                "Limbo (Lite mambo)" => array('meta name="GENERATOR" content="Limbo - Lite Mambo'),	
                "Magento" => array("cms-index-index","___store=eng&___from_store=rus"),	
                "Magnolia" => array('http://www.magnolia-cms.com/'),	
                "Mambo" => array('meta name="Generator" content="Mambo'),	
                "MaxSite CMS" => array("/application/maxsite/shared/","/application/maxsite/templates/","/application/maxsite/common/","/application/maxsite/plugins/",'meta name="generator" content="MaxSite CMS'),	
                "MediaWiki" => array("/common/wikibits.js","/common/images/poweredby_mediawiki_",'Powered by MediaWiki','mediawiki.page.startup'),	
                "Megagroup SaaS" => array("https://cabinet.megagroup.ru/client.", "https://counter.megagroup.ru/loader.js","создание сайтов в студии Мегагруп","создание сайтов</a> в студии Мегагруп.",">Мегагрупп.ру</a>","изготовление интернет магазина</a> - сделано в megagroup.ru","сайт визитка</a> от компании Мегагруп","Разработка сайтов</a>: megagroup.ru","веб студия exclusive.megagroup.ru"),	
                "Melbis Shop" => array('meta name="generator" content="Melbis Shop'),
                "Merchium SaaS" => array('a class="bottom-copyright" href="http://www.merchium.ru'),
                "Methode CMS" => array('<!-- Methode uuid:'),
                "Microsoft SharePoint" => array('meta name="GENERATOR" content="Microsoft SharePoint"','meta name="progid" content="SharePoint.','id="MSOWebPartPage_Shared"'),
                "Miva Merchant" => array("merchant.mvc", "admin.mvc"),	
                "MODx" => array('var MODX_MEDIA_PATH = "media";', 'modxmenu.css', 'modx.css','assets/templates/modxhost/','/assets/js/jquery.colorbox-min.js','/assets/js/jquery-1.3.2.min.js','/assets/components/ajaxform/css/default.css','/assets/components/ajaxform/js/config.js','/assets/components/ajaxform/js/default.js','/assets/components/ajaxform/js/lib/jquery.min.js','/assets/components/minifyx/cache/','img src="assets/images/catalog/','src="/manager/includes/','/manager/includes/veriword.php','link href="/assets/templates/css/style.css','My MODx Site" />','img src="/image.php?src=/assets/images/catalog/','javascript" src="/assets/components/minishop/js/web/minishop.js"','src="/manager/templates/','- My MODx Site" />','link href="/assets/templates/css/style.css"','img src="assets/images/','text/javascript" src="assets/js/jquery-1.4.1.min.js','rel="stylesheet" href="assets/templates/','/image.php?src=assets/images/','meta name="modxru" content=','src="/assets/components/','type="text/css" rel="stylesheet" href="assets/templates/','"shortcut icon" href="/template/images/favicon.ico','link href="assets/templates/site/menu.css','link href="assets/templates/site/style.css','/assets/templates/mosint/js/jquery.tinycarousel.min.js','script type="text/javascript" src="assets/fancybox/jquery.mousewheel-3.0.4.pack.js','javascript" src="assets/fancybox/jquery.fancybox-1.3.4.pack.js','/assets/plugins/qm/js/jquery.colorbox-min.js"></script>','link href="assets/template/js/fancy_box/source/jquery.fancybox.css','script type="text/javascript" src="assets/templates/'),	
                "Moguta CMS" => array('/mg-templates/"','/mg-core/','/mg-plugins/'),	
				"MoinMoin" => array('link rel="stylesheet" type="text/css" href="/moin_static','This website is based on <a href="/wiki/MoinMoin">MoinMoin','This site uses the MoinMoin Wiki software.">MoinMoin Powered','rel="Start" href="/cgi-bin/moin.cgi/MainPage">','a href="/cgi-bin/moin.cgi/MainPage"','a href="http://moinmo.in/">MoinMoin Powered</a>'),	
                "mojoPortal" => array('content="http://www.mojoportal.com','var mojoPageTracker'),
                "Monolit.CMS" => array('Создание сайта – IT Группа "<a target="_blank" href="http://peredovik.ru/">Передовик точка ру','templates/_shablon/CFW/CFW_styles.css'),
                "Movable Type" => array('meta name="generator" content="Movable Type','Powered by<br /><a href="http://www.sixapart.jp/movabletype/">Movable Type'),	
                "Mozello SaaS" => array("//cache.mozello.com/designs/","//cache.mozello.com/libs/js/jquery/jquery.js","Mozello</a> - самым удобным онлайн конструктором сайтов","mz_component mz_wysiwyg mz_editable","moze-wysiwyg-editor","//cache.mozello.com/mozello.ico"),	
				"Mura CMS" => array('meta name="generator" content="Mura'),	
				"myBB SaaS" => array("http://bs.mybb.ru/adverification?","Mybb_Brown_Assembly","mybb-counter","mybb.ru/userlist.php","mybb.ru/search.php?action=show_recent","unescape(mybb_ad4)"),	
                "NetDo SaaS" => array("Мой сайт на конструкторе сайтов netdo.ru","http://netdo.ru/min/g/web.js", "http://netdo.ru/engine/css/layout/", "http://netdo.ru/engine/template/style/"),	
                "NetCat" => array("/netcat_template/","/netcat_files/"),	
                "Nethouse" => array('data-ng-app="Nethouse"','data-host="nethouse.ru"','Конструктор сайтов<br/><a href="http://www.nethouse.ru/?footer"'),	
                "Ning" => array('import url(http://api.ning.com:80','src="http://api.ning.com:80/files/','href="http://static.ning.com/socialnetworkmain/'),	
                "NQcontent" => array('content="nqcontent'),	
                "Nubex CMS" => array('name="copyright" content="Powered by Nubex"','Конструктор&nbsp;сайтов&nbsp;<a href="http://nubex.ru"','href="/_nx/plain/css/'),	
                "Nucleus CMS" => array('content="Nucleus CMS v3.24"'),	
                "ocPortal" => array('Powered by ocPortal'),	
                "Open CMS" => array('/system/modules/com.gridnine.opencms.modules'),	
                "OpenText Web Solutions" => array('published by Open Text Web Solutions'),	
                "OpenCart (ocStore)" => array('<div class="cart-add-wrap"><input type="button" class="cart-add"','type="button" class="cart-add" value="Купить" onclick="addToCart',"catalog/view/theme/default/stylesheet/","catalog/view/javascript/jquery/colorbox/jquery","catalog/view/theme/default/stylesheet/stylesheet.css", "index.php?route=account/account", "index.php?route=account/login","index.php?route=account/simpleregister",'class="jcarousel-skin-opencart"'),	
				"osCommerce" => array('osCommerce Template &copy;','Powered by <a href="http://www.oscommerce.ru" target="_blank">osCommerce','/index.php?osCsid=','shopping_cart.php?osCsid=','/shipping.php?osCsid=','/account.php?osCsid=','/products_new.php?osCsid=','&amp;osCsid='),	
                "Shopify SaaS" => array('var Shopify = Shopify','Shopify.theme = {"name":"','//cdn.shopify.com/s/files/'),
                "Shopium SaaS" => array('link rel="stylesheet" href="//cdn2.shopium.ua','meta property= content="http://cdn2.shopium.ua/','img src="//cdn2.shopium.ua','script type="text/javascript" src="//cdn1.shopium.ua'),
                "Parallels Presence Builder" => array('meta name="generator" content="Parallels Presence Builder'),	
                "Percussion CMS" => array('meta content="Percussion CM System" name="generator','meta name="generator" content="Percussion',"var evergageAccount = 'percussion"),	
                "Perspektiva.CMS" => array("name='generator' content='Perspektiva.CMS'",'class="footer-perspektiva"'),	
                "phpBB" => array("phpBB style name: prosilver", "The phpBB Group : 2006", "linked to www.phpbb.com. If you refuse","_phpbbprivmsg","Русская поддержка phpBB","below including the link to www.phpbb.com",'Движется на пхпББ'),	
                "PHP-Fusion" => array("Powered by <noindex><a href='http://www.php-fusion.co.uk'>PHP-Fusion</a>","Powered by <a href='http://www.php-fusion.co.uk'>PHP-Fusion</a>","script src='infusions/","language='javascript' src='infusions/","background-image: url('infusions/","alt='PHP-Fusion' title='PHP-Fusion'","Powered by <a href='http://www.php-fusion.co.uk'"),	
                "PHP Link Directory" => array('<a href="http://www.phplinkdirectory.com" title="PHP Link Directory">PHP Link Directory</a>','Powered By <a href="http://www.phplinkdirectory.com/">PHPLD</a>','meta name="generator" content="Internet Directory One Running on PHP Link Directory','href="/profile.php?mode=register" title="Register">Register to PHPLD</a>','<a href="http://www.phplinkdirectory.com" title="PHP Link Directory">PHP LD</a>'),	
                "PHP-Nuke" => array('META NAME="GENERATOR" CONTENT="PHP-Nuke - Copyright by http://phpnuke.org"','META NAME="GENERATOR" CONTENT="PHP-Nuke Copyright','Powered by PHP-Nuke Platinum','META NAME="GENERATOR" CONTENT="PHP-Nuke'),	
                "PhpShop" => array("/phpshop/templates/",'Скрипт интернет-магазина PHPShop','PHPShop Software 2005-','META name="engine-copyright" content="PHPSHOP.RU','href="http://phpshopcms.ru/">PHPShopCMS</a>','content="PHPSHOP.RU','content="PHPShop Enterprise"','type="text/javascript" src="/java/phpshop.js','script src="/phpshop/templates'),		
                "phpSQLiteCMS" => array('meta name="generator" content="phpSQLiteCMS'),	
                "Pligg" => array('Pligg is an open source content management system that lets you easily','Pligg <a href="http://www.pligg.com/" target="_blank">Content Management System','name="description" content="Pligg is an open source content management system that lets you easily','var my_pligg_base=','meta name="generator" content="Pligg'),	
                "Plone" => array('generator" content="Plone','template-homepage_f8_view portaltype-homepagef8 site-en'),	
                "Posterous" => array('class="posterous_autopost','class="posterous_bookmarklet_entry','class="posterous_short_quote'),	
                "PrestaShop" => array("/themes/prestashop/cache/","/themes/prestashop/","Prestashop 1.5"." || Presta-Module.com",'meta name="generator" content="PrestaShop"'),	
                "cubiQue" => array("http://www.laconix.net/cubiQue"),	
                "Rainbow" => array('meta name="generator" content="rainbow-cms'),
                "RiteCMS" => array('meta name="generator" content="RiteCMS'),
                "RCMS" => array('meta name="generator" content="RCMS','link href="//rcms-r-production'),
                "RBS Change" => array('<body xmlns:change="http://www.rbs.fr','meta name="generator" content="RBS Change'),	
                "Sequnda" => array('alt="Работает на CMS Sequnda"','img src="/i/2sun.gif','2Sun. Web-дизайн и реклама в интернете','href="/images/2sun/'),	
                "Sense/Net" => array('content="Sense/Net','Powered by Sense/Net'),	
                "Serendipity" => array('meta name="Powered-By" content="Serendipity','div id="serendipity_banner"','meta name="generator" content="Serendipity'),	
                "SETUP.ru SaaS" => array("Сделано на SETUP.ru"),	
                "S.Builder" => array('<a href="/techine/Sbuilder_sites.php">'),	
                "SharePoint" => array('meta name="GENERATOR" content="Microsoft SharePoint','"ProgId" content="SharePoint.WebPartPage.Document','=== STARTER: Core SharePoint CSS ==','STARTER: SharePoint Reqs this for adding colu','xmlns:SharePoint="Microsoft.SharePoint.WebControls'),	
                "Shopware" => array('stylesheet" href="/engine/Shopware/Plugins','div class="shopware_footer"'),	
                "Squiz Matrix" => array('Running Squiz Matrix','Developed by Squiz'),	
                "Squarespace" => array('itemscope itemtype="http://schema.org/Thing" class="squarespace-cameron"','http://static.squarespace.com/static/','Squarespace.afterBodyLoad(Y);','Squarespace.Constants.CORE_APPLICATION_DOMAIN = "squarespace.com"','div id="squarespace-powered"','alt="Powered by Squarespace"'),	
                "SilverStripe" => array('meta name="generator" content="SilverStripe'),	
                "Sing CMS" => array('Сайт управляется <b><a href="http://sing-cms.ru"','Сайт управляется <a href="http://sing-cms.ru"'),	
                "Simpla CMS" => array("design/default/css/main.css","design/default/images/favicon.ico","tooltip='section' section_id=",'Slider_Simpla_Module'),
                "SimpleSite SaaS" => array('content="SimpleSite.com"','"text/css" href="http://css.simplesite.com/','"text/javascript" src="http://css.simplesite.com/','Сайт создан с помощью SimpleSite'),
                "Simple Machines Forum" => array('<a href="http://www.simplemachines.org/" title="Simple Machines Forum" target="_blank" class="new_win">Powered by SMF</a>','alt="Simple Machines Forum" title="Simple Machines Forum"','a href="http://www.simplemachines.org" title="Simple Machines"','title="Simple Machines" target="_blank" class="new_win">Simple Machines</a>','gaq.push(["_setDomainName", "simplemachines.org"'),	
                "SiteDNK" => array('http://company.nn.ru/sitednk/" target="_blank"><img src="/img/sdnk.gif"'),	
                "SiteEdit" => array('meta name="generator" content="CMS EDGESTILE SiteEdit"','Сайт разработан и работает на CMS SiteEdit'),	
				"Shop2You" => array('href="http://www.shop2you.ru/" target=_blank>Создание интернет-магазина</A>','href="http://www.shop2you.ru/" target=_blank>Создание интернет-магазина</a>','Создание сайта: Александр Фролов, <a href="http://www.shop2you.ru/"','A href="http://www.shop2you.ru/" target=_blank>Услуги по созданию интернет-магазинов</A>: Александр Фролов','href="http://www.shop2you.ru/" target=_blank>Создание интернет-магазина</A>: Александр Фролов'),	
				"ShopOS" => array('meta name="generator" content="(c) by ShopOS , http://www.shopos.ru"','Telerik.Sitefinity.Services.Search.Web.UI.Public.SearchBox'),	
                "Skynell SaaS" => array('<meta property="og:image" content="http://skynell.com"/>','href="http://skynell.com/promo/shop.php" class','href="http://skynell.com/promo/crm.php','href="http://skynell.com/company/','skynell.biz" class="theme_show_logo'),
                "SMF" => array("var smf_images_url","PHP, MySQL, bulletin, board, free, open, source, smf, simple, machines, forum","Simple Machines Forum","Powered by SMF"),
                "sNews" => array('meta name="Generator" content="sNews','meta name="generator" content="sNews'),
                "Squarespace SaaS" => array('Squarespace.Constants','CORE_APPLICATION_DOMAIN = "squarespace.com"','onclick="Squarespace.Interaction.shareLink','Squarespace.Constants.WEBSITE_TITLE','Squarespace.Constants.SS_AUTHKEY','Squarespace.Constants.ADMINISTRATION_UI','Squarespace.Constants.WEBSITE_ID'),
                "SPIP CMS" => array('meta name="generator" content="SPIP','href="prive/spip_style.css"','id="searchform" name="search" action="spip.php"','<!-- SPIP-CRON -->',"img class='spip_logos'"),	
                "Strikingly SaaS" => array('"host_suffix": "strikingly.com"','"pages_show_static_path": "//assets.strikingly.com/assets/','"show_strikingly_logo"','<meta content="//assets.strikingly.com"','<div id="strikingly-navigation-menu">','<div class="strikingly-footer-spacer"','Rendered by Strikingly','Powered by Strikingly'),	
                "Storeland SaaS" => array("storeland.net/favicon.ico","http://storeland.ru/?utm_source=powered_by_link&amp;utm_medium=","StoreLand.Ru: Сервис создания интернет-магазинов",'src="http://statistics3.storeland.ru/stat.js?site_id=','src="http://statistics2.storeland.ru/stat.js?site_id=','src="http://statistics1.storeland.ru/stat.js?site_id='),	
                "Subrion CMS" => array('meta name="generator" content="Subrion'),	
                "swift.engine" => array('uralweb_d=document','uralweb_s.colorDepth:uralweb_s'),	
                "Telerik Sitefinity" => array('<meta name="Generator" content="Sitefinity','class="RadMenu RadMenu_Sitefinity"','src="/Sitefinity/WebsiteTemplates/','Telerik.Sitefinity.Resources'),	
                "TextPattern" => array('meta name="generator" content="Textpattern','CMS Textpattern'),	
                "Tiki Wiki CMS Groupware" => array('meta name="generator" content="Tiki Wiki CMS Groupware','#tiki-center','body class="tiki tiki_wiki_page','action="tiki-login.php"','a href="tiki-remind_password.php"'),	
				"Timelabs CMS" => array("X-Powered-By: TimeLabs CMS"),	
				"Tiu.ru SaaS" => array('href="http://tiu.ru/" class="b-head-control-panel__logo','data-propopup-url="http://tiu.ru/util/ajax_get_pro_popup_new','Сайт создан на платформе Tiu.ru</a>','href="http://tiu.ru/how_to_order?source_id='),	
				"Trac" => array('rel="help" href="/wiki/TracGuide"','/wiki/WikiStart?format=txt" type="text/x-trac-wiki','аботает на <a href="/about"><strong>Trac','owered by <a href="/about"><strong>Trac'),	
                "Tumblr" => array('arning: Never enter your Tumblr password unless \u201chttps://www.tumblr.com/login','background-image: url(http://static.tumblr.com','href="android-app://com.tumblr/tumblr/','BEGIN TUMBLR FACEBOOK OPENGRAPH TAGS'),	
                "TypePad" => array('meta name="generator" content="http://www.typepad.com/"','application/rsd+xml" title="RSD" href="http://www.typepad.com'),	
                "TYPO 3" => array("This website is powered by TYPO3","typo3temp/",'meta name="generator" content="TYPO3','src="/typo3conf/','--TYPO3SEARCH_end'),	
                "Twilight CMS" => array('<A HREF="http://www.twl.ru" target="_blank" >Система управления сайтом TWL CMS</A>','<link rel="stylesheet" href="Sites/','<link rel="stylesheet" href="/Sites/','<link rel="stylesheet" href="/Sites/','<img src="/Sites/'),	
                "uCoz SaaS" => array("cms-index-index","U1BFOOTER1Z","U1DRIGHTER1Z","U1CLEFTER1","U1AHEADER1Z","U1TRAKA1Z","U1YANDEX1Z"),	
                "UkroCMS" => array('target="_blank" href="http://ukro.in.ua">UkroCMS</a>'),	
                "Umbraco" => array('xmlns:umbraco.library="urn:umbraco.library','/umbraco/imageGen.ashx','uComponents: Multipicker','umbraco:Item field=','umbraco:macro alias=','html xmlns:umbraco="http://umbraco.org'),	
                "UMI CMS" => array('xmlns:umi="http://www.umi-cms.ru/',"umi:element-id=", "umi:field-name=","umi:method=", "umi:module=",'<!-- Подключаем title, description и keywords -->'),	
                "Ural CMS" => array('<meta name="author" content="Ural-Soft"','uss-copyright_logo" href="http://www.ural-soft.ru/','http://www.ural-soft.ru/" target="_blank" title="создание сайтов Екатеринбург'),	
                "VamShop" => array("templates/vamshop/css/","templates/vamshop/img","templates/vamshop/buttons"),	
                "uWeb SaaS" => array('Хостинг от <a href="http://www.uweb.ru/" title="Создать сайт">uWeb'),	
                "vBulletin" => array("vbulletin_css", "vbulletin_important.css","clientscript/vbulletin_read_marker.js", "Powered by vBulletin", "Main vBulletin Javascript Initialization","var vb_disable_ajax = parseInt","vbmenu_control"),	
                "Vignette" => array('begCacheTok=com.vignette','link href="/vgn-ext-templating'),	
                "Vivvo CMS" => array('meta name="generator" content="Vivvo','new vivvoTicker','VIVVO CMS'),	
                "WebAsyst" => array("/published/SC/","/published/publicdata/","aux_page=","auxpages_navigation","auxpage_","?show_aux_page=",'/wa-data/public/shop/themes/'),	
                "webEdition" => array('meta name="generator" content="webEdition"'),
                "WebGUI" => array('meta name="generator" content="WebGUI','function getWebguiProperty','content="WebGUI'),
				"Website Baker" => array('meta name="generator" content="CMS: Website Baker'),
                "Webs" => array('thumbServer: "http://thumbs.webs.com',"if(typeof(webs)==='undefined')",'<link rel="stylesheet" type="text/css" href="http://static.websimages.com/','text/javascript" src="http://static.websimages.com/JS/','webs.theme.style = {','webs-allow-nav-wrap'),
				"WebSite X5" => array('generator" content="Incomedia WebSite X5'),
				"WebsPlanet" => array('meta name="generator" content="WebsPlanet Core'),
                "Web Canape CMS" => array('Web-canape - <a href="http://www.web-canape.','a href="http://www.web-canape.ru/seo/?utm_source=copyright">продвижение</a>','/themes/canape1/css/ie/main.ie.css'),	
                "Weebly SaaS" => array("Weebly.Commerce = Weebly.Commerce","Weebly.setup_rpc","editmysite.com/js/site/main.js","editmysite.com/css/sites.css","editmysite.com/editor/libraries","weebly-footer-signup-container","link weebly-icon"),	
                "Wix SaaS" => array("static.wix.com/client/","X-Wix-Published-Version", "X-Wix-Renderer-Server","X-Wix-Meta-Site-Id",'http-equiv="X-Wix-Application-Instance-Id"'),	
                "Wolf CMS" => array('href="http://www.wolfcms.org/">Wolf CMS</a> Inside','title="Wolf CMS" target=_blank>Wolf CMS</a> Inside','href="http://www.wolfcms.org">Wolf CMS Inside</a>'),
                "WordPress" => array("/wp-includes/", "wp-content/", "/wp-admin/", "/wp-login/",'meta name="generator" content="WordPress'),
                "WYSIWYG Web Builder" => array('name="generator" content="WYSIWYG Web Builder'),
                "XenForo" => array('html id="XenForo" lang="','link rel="stylesheet" href="css.php?css=xenforo','script src="js/xenforo/xenforo.js','src="styles/default/xenforo/','Forum software by XenForo&trade; <span>','action="login/login" method="post" class="xenForm"'),
                "XOOPS" => array('meta name="generator" content="XOOPS','meta name="author" content="XOOPS"','/include/xoops.js'),
				"XpressEngine" => array('meta name="Generator" content="XpressEngine"'),	
                "xt:Commerce" => array('meta name="generator" content="xt:Commerce','alt="xt:Commerce Payments','div class="copyright">xt:Commerce','This OnlineStore is brought to you by XT-Commerce'),
                "xToolza" => array('type="image/ico" href="http://xtoolza.info/favicon.ico'),
                "Yahoo! Small Business" => array('(new Image).src="http://store.yahoo.net/cgi-bin/refsd?e='),
                "Yu CMS" => array('(new Image).src="http://store.yahoo.net/cgi-bin/refsd?e='),
                "Zen Cart" => array('meta name="generator" content="shopping cart program by Zen Cart','meta name="author" content="The Zen Cart&trade; Team and others"','greybox 1: greybox for zencart',"n&amp;zenid="),
                "ZMS" => array('generator" content="ZMS http://www.zms-publishing.com"'),
                "Просто Сайт CMS" => array('<a title="создание сайтов" href="http://www.yalstudio.ru/services/corporativ/">создание сайтов</a> — Студия ЯЛ','http://www.yalstudio.ru/services/complex/" title="продвижение сайтов','title="продвижение сайтов" href="http://www.yalstudio.ru/services/complex/">Продвижение сайтов','<a href="http://www.yalstudio.ru/services/complex/">продвижение сайтов</a>'),
                "Мультимедиа компания «КСК» CMS" => array('Сделано в КСК','rev="made" href="http://www.cural.ru/"','link rev="cural" href=','name="author" content="http://www.cural.ru/')
        );
        if (empty($host)){
				return 'Сайт недоступен!';
				} else {
        foreach ($cms as $name => $rules) {
            $c = count($rules);
            for ($i = 0; $i < $c; $i++) {
                if (stripos($host, $rules[$i]) !== FALSE) {
                    return ($name);
					}
                }
			
        }
        return "Не определено"; }
}



?>