<!DOCTYPE html>
<? header('Content-type: text/html; charset=utf-8');
ini_set('display_errors', 0);
error_reporting(0);
?>
<html>
<?
$start_time = microtime();
$start_array = explode(" ",$start_time);
$start_time = $start_array[1] + $start_array[0];
?>
<head>
    <title>Анализ сайта <? $host= ($_GET['site']); echo $host;?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <meta name="robots" content="noindex, follow" />
    <link href="/q/style.css" rel="stylesheet"/>
    <script src="/q/modernize.js"></script>
    <script src="/q/seotext.js"></script>
    <link href="/q/css.css" rel="stylesheet"/>
</head>
<body>

<table cellpadding="5"><tr><td><img src="http://xtoolza.info/q/images/sitemapcreate.png" width="90"></td><td><h1>Анализ сайта <? echo $host; ?> </h1></td></tr></table>
<? // Поможет при длительном выполнении скрипта
set_time_limit(0);
$host= 'http://'.($_GET['site']);
require_once('idna_convert.class.php');
function converttopuny($host) {
	$idn = new idna_convert(array('idn_version'=>2008));
	$punycode=isset($_REQUEST['punycode']) ? stripslashes($_REQUEST['punycode']) : '';
	$punycode=(stripos($punycode, 'xn--')!==false) ? $idn->decode($punycode) : $idn->encode($punycode);
	return $punycode;
	}

?>

<h3 style="color:black">Тех. аудит</h3>
<table>


</table>
<?
function getpage($host) {
	if(mb_detect_encoding($host) != "ASCII"){ //если сайт в кириллице переводим в punycode
		include_once("idna_convert.class.php");
		$IDN = new idna_convert(array('idn_version' => '2008'));
		$host=$IDN->encode($host);
		}

	$user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2062.124 Safari/537.36";
	$temp = curl_init();

	curl_setopt($temp, CURLOPT_URL,$host);
	curl_setopt($temp, CURLOPT_USERAGENT, $user_agent);
	curl_setopt($temp, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($temp, CURLOPT_VERBOSE, false);
	curl_setopt($temp, CURLOPT_TIMEOUT, 30);
	curl_setopt($temp, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($temp, CURLOPT_SSLVERSION, 3);
	curl_setopt($temp, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($temp, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($temp, CURLOPT_HEADER, 1);

	$page = curl_exec($temp);
	$info = curl_getinfo($temp);
	$GLOBALS['httpcode'] = curl_getinfo($temp, CURLINFO_HTTP_CODE);

	curl_close($temp);
	$headers = substr($page,0,$info['header_size']-4);
    $headersgot = preg_split('#\r\n#',$headers);
	// var_dump($headersgot);
	foreach($headersgot as $h){
				if(stripos($h, 'X-Powered-By:') !== false){
				$loc = 'X-Powered-By:';
				$GLOBALS['phpver'] = (str_replace($loc,'',$h));
				} else $phpver = 'not found';
			}
	foreach($headersgot as $s){
		if(stripos($s, 'Server:') !== false){
		$ser = 'Server:';
		$GLOBALS['server'] = (str_replace($ser,'',$s));
		} else $server = 'not found';
	}
	foreach($headersgot as $cha){
	// var_dump($cha);
			if(stripos($cha, 'Content-Type: text/html; charset=') !== false){
			$chars = 'charset=';
			$GLOBALS['char'] = (str_replace($chars,'',$cha));
			} else $GLOBALS['char'] = 'not found';
		}
	if (preg_match('|<\!DOCTYPE(.*)\">|i',$page,$doctypematch)) {
	$GLOBALS['doctypematched'] = "DOCTYPE ".($doctypematch[1]);
	} else $GLOBALS['doctypematched'] = 'not found';





}

?>

<?
getpage($host).'<br>';
echo "<tr><td>Платформа:</td><td> $phpver;</td></tr><br>";
echo "<tr><td>Веб-сервер:</td><td> $server;</td></tr><br>";
echo cmscheck();
echo "<tr><td>Кодировка:</td><td> $char;</td></tr><br>";
echo "<tr><td>Разметка:</td><td> $doctypematched;</td></tr><br>";
echo "<tr><td>Статус-код:</td><td> $httpcode;</td></tr><br>";

?>

<h3 style="color:black">Поисковые системы</h3>
<?

function check($html) {
        $cms = array(
				"3dcart" => array('Software by <a href="http://www.3dcart.com">3dcart</a>','!--START: 3dcart stats--','!--END: 3dcart stats--'),
                "ABO CMS" => array("Design and programming (for ABO.CMS)","ABO.CMS"),
                "AdVantShop.NET" => array('Работает на <a data-cke-saved-href="http://www.advantshop.net" href="http://www.advantshop.net"'),
                "Amiro CMS" => array("/amiro_sys_css.php?","/amiro_sys_js.php?","-= Amiro.CMS (c) =-","Работает на Amiro.CMS"),
                "Bigcommerce" => array('shortcut icon" href="http://cdn2.bigcommerce.com/',"'platform':'bigcommerce'",'link rel="shortcut icon" href="http://cdn3.bigcommerce.com','link rel="shortcut icon" href="http://cdn4.bigcommerce.com','link rel="shortcut icon" href="http://cdn1.bigcommerce.com/'),
                "Bitrix" => array("/bitrix/templates/", "/bitrix/js/", "/bitrix/admin/"),
                "BLOX CMS" => array('div id="blox-html-container"','Powered by <a href="http://bloxcms.com" title="BLOX Content Management System"'),
                "BM Shop 5" => array('Разработка сайта — <a href="http://renua.ru" target="_blank">Renua</a><br/> проект <a href="http://bmshop5.ru" target="_blank">bmshop5','Создание интернет-магазинов <a href="http://bmshop.ru" target="_blank">BmShop'),
				"CMS BS" => array('meta name="GENERATOR" content="CMS-BS"'),
				"Cotonti" => array('meta name="generator" content="Cotonti http://www.cotonti.com'),
				"CMS Made Simple" => array("Released under the GPL - http://cmsmadesimple.org",),
                "Concrete CMS" => array("/concrete/js/", "concrete5 - 5.","/concrete/css/"),
                "Contao" => array("This website is powered by Contao Open Source CMS", "tl_files"),
                "CS Cart" => array("/skins/basic/customer/addons/","/skins/basic/customer/images/icons/favicon.ico","/auth-loginform?return_url=index.php","/index.php?dispatch=auth.recover_password","cm-popup-box hidden","cm-popup-switch hand cart-list-icon","cart-list hidden cm-popup-box cm-smart-position","index.php?dispatch=checkout.cart","cm-notification-container","/index.php?dispatch=pages.view&page_id="),
                "Danneo CMS" => array("Danneo Русская CMS", 'content="CMS Danneo'),
                "Demandware" => array("Demandware Analytics code", 'shortcut icon" type="image/png" href="http://demandware.edgesuite.net/','link rel="stylesheet" href="http://demandware.edgesuite.net/','img src="http://demandware.edgesuite.net/'),
                 "DataLife Engine" => array("DataLife Engine", "DataLife Engine (http://dle-news.ru)", "index.php?do=lostpassword", "/engine/ajax/dle_ajax.js","/engine/opensearch.php","/index.php?do=feedback","/index.php?do=rules","/?do=lastcomments"),
                "Discuz!</title>" => array('- Powered by Discuz!</title>','meta name="generator" content="Discuz!','meta name="author" content="Discuz! Team and Comsenz UI Team"','<p>Powered by <b>Discuz!</b>','div id="discuz_bad_','Powered by <strong><a href="http://www.discuz.net"',"discuz_uid = '0'"),
                "Django CMS" => array('meta name="generator" content="Django-CMS'),
                "Drupal" => array("Drupal.settings","Drupal 7 (http://drupal.org)","misc\/drupal.js","drupal_alter_by_ref","/sites/default/files/css/css_","/sites/all/files/css/css_",'text/javascript" src="/misc/drupal.js'),
                "DokuWiki" => array("DokuWiki Release"),
                "e107" => array("This site is powered by e107"),
                "Edicy SaaS" => array("http://stats.edicy.com:8000/tracker.js","http://static.edicy.com/assets/site_search/"),
                "Ektron" => array("EktronClientManager","Ektron.PBSettings","ektron.modal.css","Ektron/Ektron.WebForms.js","EktronSiteDataJS","/Workarea/java/ektron.js","Amend the paths to reflect the ektron system"),
                "Ekwid SaaS" => array("ecwid_product_browser_scroller","push-menu-trigger ecwid-icons-menu","ecwid-starter-site-links","ecwid-loading loading-start"),
                "eSyndiCat" => array('meta name="generator" content="eSyndiCat','Powered by <a href="http://www.esyndicat.com/">eSyndiCat Directory Software'),
                "Explay CMS" => array('meta name="generator" content="Explay CMS','Engine &copy; <a href="http://www.explay.su/">Explay CMS','meta name="generator" content="EXPLAY Engine CMS"','alt="Explay Engine CMS"'),
                "eZ Publish" => array('img src="/var/ezflow_site','img src="/design/ezflow'),
                "Flexcore CMS" => array("<!-- Oliwa-pro service -->"),
                "Fo.ru SaaS" => array("MLP_NAVIGATION_MENU_ITEM_START","MLP_WINDOW_HEAD","/MLP_WINDOW_END","MLP_NAVIGATION_MENU_ITEM_END"),
                "Gamburger CMS" => array('<span class="web"><a href="http://gamburger.ru/" target="_blank">','/templates/default/images/gamburger.png'),
                "GD SiteManager" => array("name='generator' content='GD SiteManager'"),
                "GitHub Pages" => array('Powered by <a href="http://pages.github.com">GitHub Pages</a>','a href="https://github.com/bip32/bip32.github.io">GitHub Repository</a>'),
                "Homestead" => array('meta name="generator" content="Homestead SiteBuilder','link rel="stylesheet" href="http://www.homestead.com'),
                "HostCMS" => array("/hostcmsfiles/",'<!-- HostCMS Counter -->','type="application/rss+xml" title="HostCMS RSS Feed"'),
                "Hotlist.biz SaaS" => array("hotengine-hotlist_logo","Аренда и Создание интернет магазина Hotlist.biz","hotengine-hotcopyright","hotlist.biz/ru/?action=logout","hotengine-dialog-email","hotengine-shop-cart-message-empty-cart","hotengine-footer-copyright","hotengine-counters"),
                "Howbay SaaS" => array("http://rtty.howbay.ru/","howbay-snapprodnamehldr","Аренда онлайн магазина howbay.ru"),
                "inDynamic" => array("Система управления сайтом и контекстом (cms) - inDynamic",'Управление сайтом — <a href="http://www.indynamic.ru/">inDynamic'),
                "InSales SaaS" => array("InSales.formatMoney", ".html(InSales.formatMoney","http://assets3.insales.ru/assets/","http://assets2.insales.ru/assets/","http://static12.insales.ru","Insales.money_format"),
                "InstantCMS" => array("InstantCMS - www.instantcms.ru","/templates/instant/css/popalas.css","/templates/instant/css/siplim.css",'link href="/templates/_default_/css/styles.css"'),
                "Image CMS" => array('meta name="generator" content="ImageCMS"','name="cms_token" />'),
                "IP.Board" => array("!--ipb.javascript.start--","IBResouce\invisionboard.com",'/forum/index.php?act=boardrules','Powered By IP.Board'),
                "Joomla!" => array("/css/template_css.css", "Joomla! 1.5 - Open Source Content Management",'src="/templates/marshgreen/js/', "/templates/system/css/system.css", "Joomla! - the dynamic portal engine and content management system","/templates/system/css/system.css","/media/system/js/caption.js","/templates/system/css/general.css","/index.php?option=com_content&task=view",'name="generator" content="Joomla! - Open Source Content Management"','href="/components/com_rsform/assets/css/front.css','"stylesheet" href="/media/jui/css/bootstrap.min.css','script src="/modules/mod_slideshowck/assets/camera.min.js','src="/modules/mod_slideshowck/assets/jquery.mobile.customized.min.js','/templates/yoo_digit/css/bootstrap'),
                "Kentico" => array("CMSListMenuLI","CMSListMenuUL","Lvl2CMSListMenuLI","/CMSPages/GetResource.ashx"),
                "Kwimba SaaS" => array("Kwimba.ru - он-лайн сервис для создания Интернет-магазина"),
                "Lark.ru SaaS" => array("/user_login.lm?back=%2F","http://lark.ru/gb.lm?u=", "http://lark.ru/news.lm?u="),
                "Liferay CMS" => array("var Liferay={Browser:",'Liferay.currentURL="','var themeDisplay=Liferay.','Liferay.Portlet.onLoad','comboBase:Liferay','Liferay.AUI.getFilter','Liferay.Portlet.runtimePortletIds','Liferay.Util.evalScripts','Liferay.Publisher.register','Liferay.Publisher.deliver','Liferay.Popup.center'),
                "LiveStreet" => array("LIVESTREET_SECURITY_KEY","Free social engine"),
                "Magento" => array("cms-index-index","___store=eng&___from_store=rus"),
                "MaxSite CMS" => array("/application/maxsite/shared/","/application/maxsite/templates/","/application/maxsite/common/","/application/maxsite/plugins/"),
                "MediaWiki" => array("/common/wikibits.js","/common/images/poweredby_mediawiki_"),
                "Megagroup CMS/Hosting SaaS" => array("https://cabinet.megagroup.ru/client.", "https://counter.megagroup.ru/loader.js","создание сайтов в студии Мегагруп","создание сайтов</a> в студии Мегагруп.",">Мегагрупп.ру</a>","изготовление интернет магазина</a> - сделано в megagroup.ru","сайт визитка</a> от компании Мегагруп","Разработка сайтов</a>: megagroup.ru","веб студия exclusive.megagroup.ru"),
                "Melbis Shop" => array('meta name="generator" content="Melbis Shop'),
                "Miva Merchant" => array("merchant.mvc", "admin.mvc"),
                "MODx" => array('var MODX_MEDIA_PATH = "media";', 'modxmenu.css', 'modx.css','assets/templates/modxhost/','/assets/js/jquery.colorbox-min.js','/assets/js/jquery-1.3.2.min.js','/assets/components/ajaxform/css/default.css','/assets/components/ajaxform/js/config.js','/assets/components/ajaxform/js/default.js','/assets/components/ajaxform/js/lib/jquery.min.js','/assets/components/minifyx/cache/','img src="assets/images/catalog/','src="/manager/includes/','/manager/includes/veriword.php','link href="/assets/templates/css/style.css','My MODx Site" />','img src="/image.php?src=/assets/images/catalog/','javascript" src="/assets/components/minishop/js/web/minishop.js"','src="/manager/templates/','- My MODx Site" />','link href="/assets/templates/css/style.css"','img src="assets/images/','text/javascript" src="assets/js/jquery-1.4.1.min.js','rel="stylesheet" href="assets/templates/','/image.php?src=assets/images/','meta name="modxru" content=','src="/assets/components/','type="text/css" rel="stylesheet" href="assets/templates/','"shortcut icon" href="/template/images/favicon.ico','link href="assets/templates/site/menu.css','link href="assets/templates/site/style.css','/assets/templates/mosint/js/jquery.tinycarousel.min.js','script type="text/javascript" src="assets/fancybox/jquery.mousewheel-3.0.4.pack.js','javascript" src="assets/fancybox/jquery.fancybox-1.3.4.pack.js','/assets/plugins/qm/js/jquery.colorbox-min.js"></script>'),
                "MoinMoin" => array('link rel="stylesheet" type="text/css" href="/moin_static','This website is based on <a href="/wiki/MoinMoin">MoinMoin','This site uses the MoinMoin Wiki software.">MoinMoin Powered','rel="Start" href="/cgi-bin/moin.cgi/MainPage">','a href="/cgi-bin/moin.cgi/MainPage"','a href="http://moinmo.in/">MoinMoin Powered</a>'),
                "Monolit.CMS" => array('Создание сайта – IT Группа "<a target="_blank" href="http://peredovik.ru/">Передовик точка ру','templates/_shablon/CFW/CFW_styles.css'),
                "Movable Type" => array('meta name="generator" content="Movable Type','Powered by<br /><a href="http://www.sixapart.jp/movabletype/">Movable Type'),
                "Mozello SaaS" => array("//cache.mozello.com/designs/","//cache.mozello.com/libs/js/jquery/jquery.js","Mozello</a> - самым удобным онлайн конструктором сайтов","mz_component mz_wysiwyg mz_editable","moze-wysiwyg-editor","//cache.mozello.com/mozello.ico"),
				"myBB SaaS" => array("http://bs.mybb.ru/adverification?","Mybb_Brown_Assembly","mybb-counter","mybb.ru/userlist.php","mybb.ru/search.php?action=show_recent","unescape(mybb_ad4)"),
                "NetDo SaaS" => array("Мой сайт на конструкторе сайтов netdo.ru","http://netdo.ru/min/g/web.js", "http://netdo.ru/engine/css/layout/", "http://netdo.ru/engine/template/style/"),
                "NetCat" => array("/netcat_template/","/netcat_files/"),
                "Nethouse" => array('data-ng-app="Nethouse"','data-host="nethouse.ru"','Конструктор сайтов<br/><a href="http://www.nethouse.ru/?footer"'),
                "Ning" => array('import url(http://api.ning.com:80','src="http://api.ning.com:80/files/','href="http://static.ning.com/socialnetworkmain/'),
                "Nubex CMS" => array('name="copyright" content="Powered by Nubex"','Конструктор&nbsp;сайтов&nbsp;<a href="http://nubex.ru"','href="/_nx/plain/css/'),
                "Nucleus CMS" => array('content="Nucleus CMS v3.24"'),
                "Open CMS" => array('/system/modules/com.gridnine.opencms.modules'),
                "Open Text" => array('published by Open Text Web Solutions'),
                "OpenCart (ocStore)" => array('<div class="cart-add-wrap"><input type="button" class="cart-add"','type="button" class="cart-add" value="Купить" onclick="addToCart',"catalog/view/theme/default/stylesheet/","catalog/view/javascript/jquery/colorbox/jquery","catalog/view/theme/default/stylesheet/stylesheet.css", "index.php?route=account/account", "index.php?route=account/login","index.php?route=account/simpleregister"),
				"osCommerce" => array('osCommerce Template &copy;','Powered by <a href="http://www.oscommerce.ru" target="_blank">osCommerce','/index.php?osCsid=','shopping_cart.php?osCsid=','/shipping.php?osCsid=','/account.php?osCsid=','/products_new.php?osCsid=','&amp;osCsid='),
                "Shopify" => array('var Shopify = Shopify','Shopify.theme = {"name":"','//cdn.shopify.com/s/files/'),
                "Parallels Presence Builder" => array('meta name="generator" content="Parallels Presence Builder'),
                "phpBB" => array("phpBB style name: prosilver", "The phpBB Group : 2006", "linked to www.phpbb.com. If you refuse","_phpbbprivmsg","Русская поддержка phpBB","below including the link to www.phpbb.com",'Движется на пхпББ'),
                "PHP-Fusion" => array("Powered by <noindex><a href='http://www.php-fusion.co.uk'>PHP-Fusion</a>","Powered by <a href='http://www.php-fusion.co.uk'>PHP-Fusion</a>","script src='infusions/","language='javascript' src='infusions/","background-image: url('infusions/"),
                "PHP Link Directory" => array('<a href="http://www.phplinkdirectory.com" title="PHP Link Directory">PHP Link Directory</a>','Powered By <a href="http://www.phplinkdirectory.com/">PHPLD</a>','meta name="generator" content="Internet Directory One Running on PHP Link Directory','href="/profile.php?mode=register" title="Register">Register to PHPLD</a>','<a href="http://www.phplinkdirectory.com" title="PHP Link Directory">PHP LD</a>'),
                "PHP-Nuke" => array('META NAME="GENERATOR" CONTENT="PHP-Nuke - Copyright by http://phpnuke.org"','META NAME="GENERATOR" CONTENT="PHP-Nuke Copyright','Powered by PHP-Nuke Platinum','META NAME="GENERATOR" CONTENT="PHP-Nuke'),
                "PhpShop" => array("/phpshop/templates/",'Скрипт интернет-магазина PHPShop','PHPShop Software 2005-','META name="engine-copyright" content="PHPSHOP.RU','href="http://phpshopcms.ru/">PHPShopCMS</a>'),
                "Pligg" => array('Pligg is an open source content management system that lets you easily','Pligg <a href="http://www.pligg.com/" target="_blank">Content Management System','name="description" content="Pligg is an open source content management system that lets you easily','var my_pligg_base='),
                "Plone" => array('generator" content="Plone - http://plone.org"','template-homepage_f8_view portaltype-homepagef8 site-en'),
                "PrestaShop" => array("/themes/prestashop/cache/","/themes/prestashop/","Prestashop 1.5"." || Presta-Module.com",'meta name="generator" content="PrestaShop"'),
                "cubiQue" => array("http://www.laconix.net/cubiQue"),
                "SETUP.ru SaaS" => array("Сделано на SETUP.ru"),
                "SharePoint" => array('meta name="GENERATOR" content="Microsoft SharePoint','"ProgId" content="SharePoint.WebPartPage.Document','=== STARTER: Core SharePoint CSS ==','STARTER: SharePoint Reqs this for adding colu','xmlns:SharePoint="Microsoft.SharePoint.WebControls'),
                "Shopware" => array('stylesheet" href="/engine/Shopware/Plugins','div class="shopware_footer"'),
                "Squarespace" => array('itemscope itemtype="http://schema.org/Thing" class="squarespace-cameron"','http://static.squarespace.com/static/','Squarespace.afterBodyLoad(Y);','Squarespace.Constants.CORE_APPLICATION_DOMAIN = "squarespace.com"','div id="squarespace-powered"','alt="Powered by Squarespace"'),
                "SilverStripe" => array('meta name="generator" content="SilverStripe - http://silverstripe.org"'),
                "Simpla CMS" => array("design/default/css/main.css","design/default/images/favicon.ico","tooltip='section' section_id="),
                "Simple Machines Forum" => array('<a href="http://www.simplemachines.org/" title="Simple Machines Forum" target="_blank" class="new_win">Powered by SMF</a>','alt="Simple Machines Forum" title="Simple Machines Forum"','a href="http://www.simplemachines.org" title="Simple Machines"','title="Simple Machines" target="_blank" class="new_win">Simple Machines</a>'),
                "SiteDNK" => array('http://company.nn.ru/sitednk/" target="_blank"><img src="/img/sdnk.gif"'),
				"Shop2You" => array('href="http://www.shop2you.ru/" target=_blank>Создание интернет-магазина</A>','href="http://www.shop2you.ru/" target=_blank>Создание интернет-магазина</a>','Создание сайта: Александр Фролов, <a href="http://www.shop2you.ru/"','A href="http://www.shop2you.ru/" target=_blank>Услуги по созданию интернет-магазинов</A>: Александр Фролов','href="http://www.shop2you.ru/" target=_blank>Создание интернет-магазина</A>: Александр Фролов'),
				"ShopOS" => array('meta name="generator" content="(c) by ShopOS , http://www.shopos.ru"','Telerik.Sitefinity.Services.Search.Web.UI.Public.SearchBox'),
                "SMF" => array("var smf_images_url","PHP, MySQL, bulletin, board, free, open, source, smf, simple, machines, forum","Simple Machines Forum","Powered by SMF"),
                "SPIP CMS" => array('meta name="generator" content="SPIP','href="prive/spip_style.css"','id="searchform" name="search" action="spip.php"','<!-- SPIP-CRON -->',"img class='spip_logos'"),
                "Storeland SaaS" => array("storeland.net/favicon.ico","http://storeland.ru/?utm_source=powered_by_link&amp;utm_medium=","StoreLand.Ru: Сервис создания интернет-магазинов",'src="http://statistics3.storeland.ru/stat.js?site_id=','src="http://statistics2.storeland.ru/stat.js?site_id=','src="http://statistics1.storeland.ru/stat.js?site_id='),
                "Telerik Sitefinity" => array('<meta name="Generator" content="Sitefinity','class="RadMenu RadMenu_Sitefinity"','src="/Sitefinity/WebsiteTemplates/','Telerik.Sitefinity.Resources'),
                "TextPattern" => array("/textpattern/index.php"),
				"Timelabs CMS" => array("X-Powered-By: TimeLabs CMS"),
				"Tiu.ru" => array('href="http://tiu.ru/" class="b-head-control-panel__logo','data-propopup-url="http://tiu.ru/util/ajax_get_pro_popup_new','Сайт создан на платформе Tiu.ru</a>','href="http://tiu.ru/how_to_order?source_id='),
				"Trac" => array('rel="help" href="/wiki/TracGuide"','/wiki/WikiStart?format=txt" type="text/x-trac-wiki','аботает на <a href="/about"><strong>Trac','owered by <a href="/about"><strong>Trac'),
                "Tumblr" => array('arning: Never enter your Tumblr password unless \u201chttps://www.tumblr.com/login','background-image: url(http://static.tumblr.com','href="android-app://com.tumblr/tumblr/','BEGIN TUMBLR FACEBOOK OPENGRAPH TAGS'),
                "TypePad" => array('meta name="generator" content="http://www.typepad.com/"','application/rsd+xml" title="RSD" href="http://www.typepad.com'),
                "TYPO 3" => array("This website is powered by TYPO3","typo3temp/"),
                "Twilight CMS" => array('<A HREF="http://www.twl.ru" target="_blank" >Система управления сайтом TWL CMS</A>','<link rel="stylesheet" href="Sites/','<link rel="stylesheet" href="/Sites/'),
                "uCoz" => array("cms-index-index","U1BFOOTER1Z","U1DRIGHTER1Z","U1CLEFTER1","U1AHEADER1Z","U1TRAKA1Z","U1YANDEX1Z"),
                "Umbraco" => array('xmlns:umbraco.library="urn:umbraco.library','/umbraco/imageGen.ashx','uComponents: Multipicker','umbraco:Item field=','umbraco:macro alias='),
                "UMI CMS" => array('xmlns:umi="http://www.umi-cms.ru/',"umi:element-id=", "umi:field-name=","umi:method=", "umi:module=",'<!-- Подключаем title, description и keywords -->'),
                "Ural CMS" => array('<meta name="author" content="Ural-Soft"','uss-copyright_logo" href="http://www.ural-soft.ru/','http://www.ural-soft.ru/" target="_blank" title="создание сайтов Екатеринбург'),
                "VamShop" => array("templates/vamshop/css/","templates/vamshop/img","templates/vamshop/buttons"),
                "vBulletin" => array("vbulletin_css", "vbulletin_important.css","clientscript/vbulletin_read_marker.js", "Powered by vBulletin", "Main vBulletin Javascript Initialization","var vb_disable_ajax = parseInt","vbmenu_control"),
                "WebAsyst" => array("/published/SC/","/published/publicdata/","aux_page=","auxpages_navigation","auxpage_","?show_aux_page=",'/wa-data/public/shop/themes/'),
                "Webs" => array('thumbServer: "http://thumbs.webs.com',"if(typeof(webs)==='undefined')",'<link rel="stylesheet" type="text/css" href="http://static.websimages.com/','text/javascript" src="http://static.websimages.com/JS/','webs.theme.style = {','webs-allow-nav-wrap'),
                "Web Canape CMS" => array('Web-canape - <a href="http://www.web-canape.','a href="http://www.web-canape.ru/seo/?utm_source=copyright">продвижение</a>','/themes/canape1/css/ie/main.ie.css'),
                "Weebly SaaS" => array("Weebly.Commerce = Weebly.Commerce","Weebly.setup_rpc","editmysite.com/js/site/main.js","editmysite.com/css/sites.css","editmysite.com/editor/libraries","weebly-footer-signup-container","link weebly-icon"),
                "Wix SaaS" => array("static.wix.com/client/","X-Wix-Published-Version", "X-Wix-Renderer-Server","X-Wix-Meta-Site-Id"),
                "WordPress" => array("/wp-includes/", "wp-content/", "/wp-admin/", "/wp-login/"),
                "XenForo" => array('html id="XenForo" lang="','link rel="stylesheet" href="css.php?css=xenforo','script src="js/xenforo/xenforo.js','src="styles/default/xenforo/','Forum software by XenForo&trade; <span>','action="login/login" method="post" class="xenForm"'),
                "XOOPS" => array('meta name="generator" content="XOOPS"','meta name="author" content="XOOPS"','/include/xoops.js'),
				"XpressEngine" => array('meta name="Generator" content="XpressEngine"'),
                "xt:Commerce" => array('meta name="generator" content="xt:Commerce','alt="xt:Commerce Payments','div class="copyright">xt:Commerce','This OnlineStore is brought to you by XT-Commerce'),
                "Yahoo! Small Business" => array('(new Image).src="http://store.yahoo.net/cgi-bin/refsd?e='),
                "Zen Cart" => array('meta name="generator" content="shopping cart program by Zen Cart','meta name="author" content="The Zen Cart&trade; Team and others"','greybox 1: greybox for zencart',"n&amp;zenid="),
                "ZMS" => array('generator" content="ZMS http://www.zms-publishing.com"'),
                "Просто Сайт CMS" => array('<a title="создание сайтов" href="http://www.yalstudio.ru/services/corporativ/">создание сайтов</a> — Студия ЯЛ','http://www.yalstudio.ru/services/complex/" title="продвижение сайтов','title="продвижение сайтов" href="http://www.yalstudio.ru/services/complex/">Продвижение сайтов','<a href="http://www.yalstudio.ru/services/complex/">продвижение сайтов</a>')
        );
        foreach ($cms as $name => $rules) {
            $c = count($rules);
            for ($i = 0; $i < $c; $i++) {
				if (function_exists('stripos')) {
					if (stripos($html, $rules[$i]) !== FALSE) {
						return 'CMS: '.$name . '<br>';
						}
					}
                }
        }
        return "CMS: not defined<br>";
}

function grab($site) {
		if (function_exists('mb_detect_encoding')){
			if(mb_detect_encoding($site) != "ASCII"){ //если сайт в кириллице переводим в punycode
				include("http://xtoolza.info/q/cms/idna_convert.class.php");
				$IDN = new idna_convert(array('idn_version' => '2008'));
				$site=$IDN->encode($site);
			}
		}
        $ch = curl_init();
		$user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2062.124 Safari/537.36";
        curl_setopt($ch, CURLOPT_URL, $site);
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

function cmscheck() {
	$host= ($_GET['site']);
	echo check(grab($host));
}


function getcy($host) {
	//считываем XML-файл с данными
	$xml = file_get_contents(
		'http://bar-navig.yandex.ru/u?ver=2&show=32&url='.$host
	);
	//если XML файл прочитан, то возвращаем значение параметра value,
	//иначе возвращаем false - ошибка
	return $xml ? (int) substr(strstr($xml, 'value="'), 7) : false;
}
function getyaca($host) {
	$xml = file_get_contents('http://bar-navig.yandex.ru/u?ver=2&show=32&url='.$host);
	preg_match('|<textinfo>(.*)</textinfo>|ism', $xml, $links);
		foreach ($links as $link){
			$res = iconv("Windows-1251", "UTF-8", $link);

		}
	if ($rez === '') {
	$res = "NULL";
	} else return $res;
}
function getdmoz($narray) {
	$xml = file_get_contents(
		'http://search.dmoz.org/cgi-bin/search?search=u:'.$narray
	);
	if(preg_match('#DMOZ Sites#ui',$xml)){
		return 'В каталоге';
	} else {
		return 'Нет в каталоге';
	}
}

function getpagerank($url) {
	$fp = fsockopen("toolbarqueries.google.com", 80, $errno, $errstr, 30);
	if (!$fp) {
		}
	else {
		$out = "GET /tbr?client=navclient-auto&ch=".CheckHash(HashURL($url))
		."&features=Rank&q=info:".$url."&num=100&filter=0 HTTP/1.1\r\n";
		$out .= "Host: toolbarqueries.google.com\r\n";
		$out .= "User-Agent: Mozilla/4.0 (compatible; GoogleToolbar 2.0.114-big; Windows XP 5.1)\r\n";
		$out .= "Connection: Close\r\n\r\n";
		fwrite($fp, $out);
		while (!feof($fp)) {
			$data = fgets($fp, 128);
			$pos = strpos($data, "Rank_");
			if($pos === false)
				{
                }
			else {
				$pagerank = substr($data, $pos + 9);
				}
			}
		fclose($fp);
    }
	$pagerank = (strlen($pagerank) > 0) ? $pagerank : -1;
	$pagerank = intval($pagerank);
	if ($pagerank == -1) {
			$pagerank = '0';
		}
	return $pagerank;
}
function StrToNum($Str, $Check, $Magic) {
	$Int32Unit = 4294967296;
	$length = strlen($Str);
	for ($i = 0; $i < $length; $i++) {
		$Check *= $Magic;
		if ($Check >= $Int32Unit) {
			$Check = ($Check - $Int32Unit * (int) ($Check / $Int32Unit));
			$Check = ($Check < -2147483648) ? ($Check + $Int32Unit) : $Check;
			}
	$Check += ord($Str{$i});
    }
	return $Check;
}

function HashURL($String) {
	$Check1 = StrToNum($String, 0x1505, 0x21);
	$Check2 = StrToNum($String, 0, 0x1003F);
	$Check1 >>= 2;
	$Check1 = (($Check1 >> 4) & 0x3FFFFC0 ) | ($Check1 & 0x3F);
	$Check1 = (($Check1 >> 4) & 0x3FFC00 ) | ($Check1 & 0x3FF);
	$Check1 = (($Check1 >> 4) & 0x3C000 ) | ($Check1 & 0x3FFF);
	$T1 = (((($Check1 & 0x3C0) << 4) | ($Check1 & 0x3C)) <<2 ) | ($Check2 & 0xF0F );
	$T2 = (((($Check1 & 0xFFFFC000) << 4) | ($Check1 & 0x3C00)) << 0xA) | ($Check2 & 0xF0F0000 );
	return ($T1 | $T2);
}

function CheckHash($Hashnum) {
	$CheckByte = 0;
	$Flag = 0;
	$HashStr = sprintf('%u', $Hashnum) ;
	$length = strlen($HashStr);
	for ($i = $length - 1;  $i >= 0;  $i --) {
		$Re = $HashStr{$i};
		if (1 === ($Flag % 2)) {
			$Re += $Re;
			$Re = (int)($Re / 10) + ($Re % 10);
			}
		$CheckByte += $Re;
		$Flag ++;
		}
	$CheckByte %= 10;
	if (0 !== $CheckByte) {
		$CheckByte = 10 - $CheckByte;
		if (1 === ($Flag % 2) ) {
			if (1 === ($CheckByte % 2)) {
				$CheckByte += 9;
				}
			$CheckByte >>= 1;
			}
		}
	return '7'.$CheckByte.$HashStr;
}

echo "тИЦ: ". getcy($host)."<br>";
echo "Яндекс.Каталог: ". getyaca($host)."<br>";
echo "DMOZ: ". getdmoz($host)."<br>";
echo "PR: ". getpagerank($host)."<br>";

?>


<br />
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info">На главную</a>
<div style="text-align: center; bottom:10px; position: relative;"><br>
<?   //generate time
$end_time = microtime();
$end_array = explode(" ",$end_time);
$end_time = $end_array[1] + $end_array[0];
$time = $end_time - $start_time;
printf("Страница сгенерирована за %f секунд",$time);
?>
</div>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter25643246 = new Ya.Metrika({id:25643246,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/25643246" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>
