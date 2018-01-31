<?php
/**
 * ������� �����
 *
 * @return array
 * @param string domain
 */


//
$domain = $arguments['domain'];
$result = array(
	'ru' => NULL,
	'soundex' => NULL,
	'200ok' => NULL,
	'php' => NULL,
	'php_version' => NULL,
	'cms' => NULL,
	'alexa_g' => NULL,
	'alexa_l' => NULL,
	'title' => NULL,
	'desc' => NULL,
);

// ru
$result['ru'] = preg_match('/\.ru$/ism', $domain);
if (!$result['ru']) {
	return $result;
}

// soundex
$result['soundex'] = soundex($domain);

// 200 OK
$p = array('url' => $domain);
$html = call('transport', 'get_page', $p);
$result['200ok'] = $p['status'] == 200;
if (!$result['200ok']) {
	return $result;
}

// PHP
$result['php'] = preg_match('/(X-Powered-By:\s*PHP|PHPSESSID)/ism', $p['headers']);

// PHP MAJOR VERSION
preg_match('#X-Powered-By:\s*PHP/(\d)#ism', $p['headers'], $match);
$result['php_version'] = $match[1];

// CMS

$cms = array(
"3dcart" => array('Software by <a href="http://www.3dcart.com">3dcart</a>','!--START: 3dcart stats--','!--END: 3dcart stats--'),
                "ABO CMS" => array("Design and programming (for ABO.CMS)","ABO.CMS"),	
                "AdVantShop.NET" => array('�������� �� <a data-cke-saved-href="http://www.advantshop.net" href="http://www.advantshop.net"'),	
                "Amiro CMS" => array("/amiro_sys_css.php?","/amiro_sys_js.php?","-= Amiro.CMS (c) =-","�������� �� Amiro.CMS"),	
                "Bigcommerce" => array('shortcut icon" href="http://cdn2.bigcommerce.com/',"'platform':'bigcommerce'",'link rel="shortcut icon" href="http://cdn3.bigcommerce.com','link rel="shortcut icon" href="http://cdn4.bigcommerce.com','link rel="shortcut icon" href="http://cdn1.bigcommerce.com/'),	
                "Bitrix" => array("/bitrix/templates/", "/bitrix/js/", "/bitrix/admin/"),	
                "BLOX CMS" => array('div id="blox-html-container"','Powered by <a href="http://bloxcms.com" title="BLOX Content Management System"'),	
                "BM Shop 5" => array('���������� ����� � <a href="http://renua.ru" target="_blank">Renua</a><br/> ������ <a href="http://bmshop5.ru" target="_blank">bmshop5','�������� ��������-��������� <a href="http://bmshop.ru" target="_blank">BmShop'),	
				"CMS BS" => array('meta name="GENERATOR" content="CMS-BS"'),	
				"Cotonti" => array('meta name="generator" content="Cotonti http://www.cotonti.com'),	
				"CMS Made Simple" => array("Released under the GPL - http://cmsmadesimple.org",),	
                "Concrete CMS" => array("/concrete/js/", "concrete5 - 5.","/concrete/css/"),	
                "Contao" => array("This website is powered by Contao Open Source CMS", "tl_files"),	
                "CS Cart" => array("/skins/basic/customer/addons/","/skins/basic/customer/images/icons/favicon.ico","/auth-loginform?return_url=index.php","/index.php?dispatch=auth.recover_password","cm-popup-box hidden","cm-popup-switch hand cart-list-icon","cart-list hidden cm-popup-box cm-smart-position","index.php?dispatch=checkout.cart","cm-notification-container","/index.php?dispatch=pages.view&page_id="),	
                "Danneo CMS" => array("Danneo ������� CMS", 'content="CMS Danneo'),	
                "Demandware" => array("Demandware Analytics code", 'shortcut icon" type="image/png" href="http://demandware.edgesuite.net/','link rel="stylesheet" href="http://demandware.edgesuite.net/','img src="http://demandware.edgesuite.net/'),	
                "DataLife Engine" => array("DataLife Engine", "/engine/", "DataLife Engine (http://dle-news.ru)", "index.php?do=lostpassword", "/engine/ajax/dle_ajax.js","/engine/opensearch.php","/index.php?do=feedback","/index.php?do=rules","/?do=lastcomments"),	
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
                "Hotlist.biz SaaS" => array("hotengine-hotlist_logo","������ � �������� �������� �������� Hotlist.biz","hotengine-hotcopyright","hotlist.biz/ru/?action=logout","hotengine-dialog-email","hotengine-shop-cart-message-empty-cart","hotengine-footer-copyright","hotengine-counters"),	
                "Howbay SaaS" => array("http://rtty.howbay.ru/","howbay-snapprodnamehldr","������ ������ �������� howbay.ru"),	
                "inDynamic" => array("������� ���������� ������ � ���������� (cms) - inDynamic",'���������� ������ � <a href="http://www.indynamic.ru/">inDynamic'),	
                "InSales SaaS" => array("InSales.formatMoney", ".html(InSales.formatMoney","http://assets3.insales.ru/assets/","http://assets2.insales.ru/assets/","http://static12.insales.ru","Insales.money_format"),	
                "InstantCMS" => array("InstantCMS - www.instantcms.ru","/templates/instant/css/popalas.css","/templates/instant/css/siplim.css",'link href="/templates/_default_/css/styles.css"'),	
                "Image CMS" => array('meta name="generator" content="ImageCMS"','name="cms_token" />'),	
                "IP.Board" => array("!--ipb.javascript.start--","IBResouce\invisionboard.com"),	
                "Joomla!" => array("/css/template_css.css", "Joomla! 1.5 - Open Source Content Management",'src="/templates/marshgreen/js/', "/templates/system/css/system.css", "Joomla! - the dynamic portal engine and content management system","/templates/system/css/system.css","/media/system/js/caption.js","/templates/system/css/general.css","/index.php?option=com_content&task=view",'name="generator" content="Joomla! - Open Source Content Management"'),	
                "Kentico" => array("CMSListMenuLI","CMSListMenuUL","Lvl2CMSListMenuLI","/CMSPages/GetResource.ashx"),	
                "Kwimba SaaS" => array("Kwimba.ru - ��-���� ������ ��� �������� ��������-��������"),	
                "Lark.ru SaaS" => array("/user_login.lm?back=%2F","http://lark.ru/gb.lm?u=", "http://lark.ru/news.lm?u="),	
                "Liferay CMS" => array("var Liferay={Browser:",'Liferay.currentURL="','var themeDisplay=Liferay.','Liferay.Portlet.onLoad','comboBase:Liferay','Liferay.AUI.getFilter','Liferay.Portlet.runtimePortletIds','Liferay.Util.evalScripts','Liferay.Publisher.register','Liferay.Publisher.deliver','Liferay.Popup.center'),	
                "LiveStreet" => array("LIVESTREET_SECURITY_KEY","Free social engine"),	
                "Magento" => array("cms-index-index","___store=eng&___from_store=rus"),	
                "MaxSite CMS" => array("/application/maxsite/shared/","/application/maxsite/templates/","/application/maxsite/common/","/application/maxsite/plugins/"),	
                "MediaWiki" => array("/common/wikibits.js","/common/images/poweredby_mediawiki_"),	
                "Megagroup CMS/Hosting SaaS" => array("https://cabinet.megagroup.ru/client.", "https://counter.megagroup.ru/loader.js","�������� ������ � ������ ��������","�������� ������</a> � ������ ��������.",">���������.��</a>","������������ �������� ��������</a> - ������� � megagroup.ru","���� �������</a> �� �������� ��������","���������� ������</a>: megagroup.ru","��� ������ exclusive.megagroup.ru"),	
                "Melbis Shop" => array('meta name="generator" content="Melbis Shop'),	
                "Miva Merchant" => array("merchant.mvc", "admin.mvc"),	
                "MODx" => array('var MODX_MEDIA_PATH = "media";', 'modxmenu.css', 'modx.css','assets/templates/modxhost/','/assets/js/jquery.colorbox-min.js','/assets/js/jquery-1.3.2.min.js','/assets/components/ajaxform/css/default.css','/assets/components/ajaxform/js/config.js','/assets/components/ajaxform/js/default.js','/assets/components/ajaxform/js/lib/jquery.min.js','/assets/components/minifyx/cache/','img src="assets/images/catalog/','src="/manager/includes/','/manager/includes/veriword.php','link href="/assets/templates/css/style.css','My MODx Site" />','img src="/image.php?src=/assets/images/catalog/','javascript" src="/assets/components/minishop/js/web/minishop.js"','src="/manager/templates/','- My MODx Site" />','link href="/assets/templates/css/style.css"','img src="assets/images/','text/javascript" src="assets/js/jquery-1.4.1.min.js','rel="stylesheet" href="assets/templates/','/image.php?src=assets/images/','meta name="modxru" content=','src="/assets/components/','type="text/css" rel="stylesheet" href="assets/templates/','"shortcut icon" href="/template/images/favicon.ico','link href="assets/templates/site/menu.css','link href="assets/templates/site/style.css','/assets/templates/mosint/js/jquery.tinycarousel.min.js'),	
                "MoinMoin" => array('link rel="stylesheet" type="text/css" href="/moin_static','This website is based on <a href="/wiki/MoinMoin">MoinMoin','This site uses the MoinMoin Wiki software.">MoinMoin Powered','rel="Start" href="/cgi-bin/moin.cgi/MainPage">','a href="/cgi-bin/moin.cgi/MainPage"','a href="http://moinmo.in/">MoinMoin Powered</a>'),	
                "Monolit.CMS" => array('�������� ����� � IT ������ "<a target="_blank" href="http://peredovik.ru/">��������� ����� ��','templates/_shablon/CFW/CFW_styles.css'),	
                "Movable Type" => array('meta name="generator" content="Movable Type','Powered by<br /><a href="http://www.sixapart.jp/movabletype/">Movable Type'),	
                "Mozello SaaS" => array("//cache.mozello.com/designs/","//cache.mozello.com/libs/js/jquery/jquery.js","Mozello</a> - ����� ������� ������ ������������� ������","mz_component mz_wysiwyg mz_editable","moze-wysiwyg-editor","//cache.mozello.com/mozello.ico"),	
				"myBB SaaS" => array("http://bs.mybb.ru/adverification?","Mybb_Brown_Assembly","mybb-counter","mybb.ru/userlist.php","mybb.ru/search.php?action=show_recent","unescape(mybb_ad4)"),	
                "NetDo SaaS" => array("��� ���� �� ������������ ������ netdo.ru","http://netdo.ru/min/g/web.js", "http://netdo.ru/engine/css/layout/", "http://netdo.ru/engine/template/style/"),	
                "NetCat" => array("/netcat_template/","/netcat_files/"),	
                "Nethouse" => array('data-ng-app="Nethouse"','data-host="nethouse.ru"','����������� ������<br/><a href="http://www.nethouse.ru/?footer"'),	
                "Ning" => array('import url(http://api.ning.com:80','src="http://api.ning.com:80/files/','href="http://static.ning.com/socialnetworkmain/'),	
                "Nubex CMS" => array('name="copyright" content="Powered by Nubex"','�����������&nbsp;������&nbsp;<a href="http://nubex.ru"','href="/_nx/plain/css/'),	
                "Nucleus CMS" => array('content="Nucleus CMS v3.24"'),	
                "Open CMS" => array('/system/modules/com.gridnine.opencms.modules'),	
                "Open Text" => array('published by Open Text Web Solutions'),	
                "OpenCart (ocStore)" => array('<div class="cart-add-wrap"><input type="button" class="cart-add"','type="button" class="cart-add" value="������" onclick="addToCart',"catalog/view/theme/default/stylesheet/","catalog/view/javascript/jquery/colorbox/jquery","catalog/view/theme/default/stylesheet/stylesheet.css", "index.php?route=account/account", "index.php?route=account/login","index.php?route=account/simpleregister"),	
                "Shopify" => array('var Shopify = Shopify','Shopify.theme = {"name":"','//cdn.shopify.com/s/files/'),	
                "Parallels Presence Builder" => array('meta name="generator" content="Parallels Presence Builder'),	
                "phpBB" => array("phpBB style name: prosilver", "The phpBB Group : 2006", "linked to www.phpbb.com. If you refuse","_phpbbprivmsg","������� ��������� phpBB","below including the link to www.phpbb.com"),	
                "PHP-Fusion" => array("Powered by <noindex><a href='http://www.php-fusion.co.uk'>PHP-Fusion</a>","Powered by <a href='http://www.php-fusion.co.uk'>PHP-Fusion</a>","script src='infusions/","language='javascript' src='infusions/","background-image: url('infusions/"),	
                "PHP Link Directory" => array('<a href="http://www.phplinkdirectory.com" title="PHP Link Directory">PHP Link Directory</a>','Powered By <a href="http://www.phplinkdirectory.com/">PHPLD</a>','meta name="generator" content="Internet Directory One Running on PHP Link Directory','href="/profile.php?mode=register" title="Register">Register to PHPLD</a>','<a href="http://www.phplinkdirectory.com" title="PHP Link Directory">PHP LD</a>'),	
                "PHP-Nuke" => array('META NAME="GENERATOR" CONTENT="PHP-Nuke - Copyright by http://phpnuke.org"','META NAME="GENERATOR" CONTENT="PHP-Nuke Copyright','Powered by PHP-Nuke Platinum','META NAME="GENERATOR" CONTENT="PHP-Nuke'),	
                "PhpShop" => array("/phpshop/templates/",'������ ��������-�������� PHPShop','PHPShop Software 2005-','META name="engine-copyright" content="PHPSHOP.RU','href="http://phpshopcms.ru/">PHPShopCMS</a>'),	
                "Pligg" => array('Pligg is an open source content management system that lets you easily','Pligg <a href="http://www.pligg.com/" target="_blank">Content Management System','name="description" content="Pligg is an open source content management system that lets you easily','var my_pligg_base='),	
                "Plone" => array('generator" content="Plone - http://plone.org"','template-homepage_f8_view portaltype-homepagef8 site-en'),	
                "PrestaShop" => array("/themes/prestashop/cache/","/themes/prestashop/","Prestashop 1.5"." || Presta-Module.com",'meta name="generator" content="PrestaShop"'),	
                "cubiQue" => array("http://www.laconix.net/cubiQue"),	
                "SETUP.ru SaaS" => array("������� �� SETUP.ru"),	
                "SharePoint" => array('meta name="GENERATOR" content="Microsoft SharePoint','"ProgId" content="SharePoint.WebPartPage.Document','=== STARTER: Core SharePoint CSS ==','STARTER: SharePoint Reqs this for adding colu','xmlns:SharePoint="Microsoft.SharePoint.WebControls'),	
                "Shopware" => array('stylesheet" href="/engine/Shopware/Plugins','div class="shopware_footer"'),	
                "Squarespace" => array('itemscope itemtype="http://schema.org/Thing" class="squarespace-cameron"','http://static.squarespace.com/static/','Squarespace.afterBodyLoad(Y);','Squarespace.Constants.CORE_APPLICATION_DOMAIN = "squarespace.com"','div id="squarespace-powered"','alt="Powered by Squarespace"'),	
                "SilverStripe" => array('meta name="generator" content="SilverStripe - http://silverstripe.org"'),	
                "Simpla CMS" => array("design/default/css/main.css","design/default/images/favicon.ico","tooltip='section' section_id="),	
                "Simple Machines Forum" => array('<a href="http://www.simplemachines.org/" title="Simple Machines Forum" target="_blank" class="new_win">Powered by SMF</a>','alt="Simple Machines Forum" title="Simple Machines Forum"','a href="http://www.simplemachines.org" title="Simple Machines"','title="Simple Machines" target="_blank" class="new_win">Simple Machines</a>'),	
                "SiteDNK" => array('http://company.nn.ru/sitednk/" target="_blank"><img src="/img/sdnk.gif"'),	
				"Shop2You" => array('href="http://www.shop2you.ru/" target=_blank>�������� ��������-��������</A>','href="http://www.shop2you.ru/" target=_blank>�������� ��������-��������</a>','�������� �����: ��������� ������, <a href="http://www.shop2you.ru/"','A href="http://www.shop2you.ru/" target=_blank>������ �� �������� ��������-���������</A>: ��������� ������','href="http://www.shop2you.ru/" target=_blank>�������� ��������-��������</A>: ��������� ������'),	
				"ShopOS" => array('meta name="generator" content="(c) by ShopOS , http://www.shopos.ru"','Telerik.Sitefinity.Services.Search.Web.UI.Public.SearchBox'),	
                "SMF" => array("var smf_images_url","PHP, MySQL, bulletin, board, free, open, source, smf, simple, machines, forum","Simple Machines Forum","Powered by SMF"),	
                "SPIP CMS" => array('meta name="generator" content="SPIP','href="prive/spip_style.css"','id="searchform" name="search" action="spip.php"','<!-- SPIP-CRON -->',"img class='spip_logos'"),	
                "Storeland SaaS" => array("storeland.net/favicon.ico","http://storeland.ru/?utm_source=powered_by_link&amp;utm_medium=","StoreLand.Ru: ������ �������� ��������-���������",'src="http://statistics3.storeland.ru/stat.js?site_id=','src="http://statistics2.storeland.ru/stat.js?site_id=','src="http://statistics1.storeland.ru/stat.js?site_id='),	
                "Telerik Sitefinity" => array('<meta name="Generator" content="Sitefinity','class="RadMenu RadMenu_Sitefinity"','src="/Sitefinity/WebsiteTemplates/','Telerik.Sitefinity.Resources'),	
                "TextPattern" => array("/textpattern/index.php"),	
				"Timelabs CMS" => array("X-Powered-By: TimeLabs CMS"),	
				"Tiu.ru" => array('href="http://tiu.ru/" class="b-head-control-panel__logo','data-propopup-url="http://tiu.ru/util/ajax_get_pro_popup_new','���� ������ �� ��������� Tiu.ru</a>','href="http://tiu.ru/how_to_order?source_id='),	
				"Trac" => array('rel="help" href="/wiki/TracGuide"','/wiki/WikiStart?format=txt" type="text/x-trac-wiki','������� �� <a href="/about"><strong>Trac','owered by <a href="/about"><strong>Trac'),	
                "Tumblr" => array('arning: Never enter your Tumblr password unless \u201chttps://www.tumblr.com/login','background-image: url(http://static.tumblr.com','href="android-app://com.tumblr/tumblr/','BEGIN TUMBLR FACEBOOK OPENGRAPH TAGS'),	
                "TypePad" => array('meta name="generator" content="http://www.typepad.com/"','application/rsd+xml" title="RSD" href="http://www.typepad.com'),	
                "TYPO 3" => array("This website is powered by TYPO3","typo3temp/"),	
                "Twilight CMS" => array('<A HREF="http://www.twl.ru" target="_blank" >������� ���������� ������ TWL CMS</A>','<link rel="stylesheet" href="Sites/','<link rel="stylesheet" href="/Sites/'),	
                "uCoz" => array("cms-index-index","U1BFOOTER1Z","U1DRIGHTER1Z","U1CLEFTER1","U1AHEADER1Z","U1TRAKA1Z","U1YANDEX1Z"),	
                "Umbraco" => array('xmlns:umbraco.library="urn:umbraco.library','/umbraco/imageGen.ashx','uComponents: Multipicker','umbraco:Item field=','umbraco:macro alias='),	
                "UMI CMS" => array('xmlns:umi="http://www.umi-cms.ru/',"umi:element-id=", "umi:field-name=","umi:method=", "umi:module=",'<!-- ���������� title, description � keywords -->'),	
                "Ural CMS" => array('<meta name="author" content="Ural-Soft"','uss-copyright_logo" href="http://www.ural-soft.ru/','http://www.ural-soft.ru/" target="_blank" title="�������� ������ ������������'),	
                "VamShop" => array("templates/vamshop/css/","templates/vamshop/img","templates/vamshop/buttons"),	
                "vBulletin" => array("vbulletin_css", "vbulletin_important.css","clientscript/vbulletin_read_marker.js", "Powered by vBulletin", "Main vBulletin Javascript Initialization","var vb_disable_ajax = parseInt","vbmenu_control"),	
                "WebAsyst" => array("/published/SC/","/published/publicdata/","aux_page=","auxpages_navigation","auxpage_","?show_aux_page="),	
                "Webs" => array('thumbServer: "http://thumbs.webs.com',"if(typeof(webs)==='undefined')",'<link rel="stylesheet" type="text/css" href="http://static.websimages.com/','text/javascript" src="http://static.websimages.com/JS/','webs.theme.style = {','webs-allow-nav-wrap'),	
                "Web Canape CMS" => array('Web-canape - <a href="http://www.web-canape.','a href="http://www.web-canape.ru/seo/?utm_source=copyright">�����������</a>','/themes/canape1/css/ie/main.ie.css'),	
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
                "������ ���� CMS" => array('<a title="�������� ������" href="http://www.yalstudio.ru/services/corporativ/">�������� ������</a> � ������ ��','http://www.yalstudio.ru/services/complex/" title="����������� ������','title="����������� ������" href="http://www.yalstudio.ru/services/complex/">����������� ������','<a href="http://www.yalstudio.ru/services/complex/">����������� ������</a>')
);

foreach ($cms as $name => $rules) {
    $c = count($rules);
    for ($i = 0; $i < $c; $i++) {
        if (stripos($html, $rules[$i]) !== FALSE) {
            $result['cms'] = $name;
            break;
        }
    }
}

// ALEXA

$alexa_data = call('transport', 'get_page', $p = array('url' => 'http://data.alexa.com/data?cli=10&dat=snbamz&url='.$domain));
preg_match('#<POPULARITY URL="[^"]*" TEXT="(\d+)" SOURCE="[^"]*"/>#ism', $alexa_data, $match_g);
preg_match('#<COUNTRY CODE="[^"]*" NAME="[^"]*" RANK="(\d+)"/>#ism', $alexa_data, $match_l);
$result["alexa_g"] = $match_g[1];
$result["alexa_l"] = $match_l[1];

// TITLE-DESC
preg_match('#<title>(.*?)</title>#ism', $html, $match_t);
preg_match('#<meta\s*name="description"\s*content="(.*?)"#ism', $html, $match_d);
$result['title'] = trim($match_t[1]);
$result['desc'] = trim($match_d[1]);

// LEMM
$result['title_lemm'] = lemmatise(trim($match_t[1]));
$result['desc_lemm'] = lemmatise(trim($match_d[1]));

return $result;

?>