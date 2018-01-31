<?php
header('Content-type: text/html; charset=utf-8');
ignore_user_abort(true);
set_time_limit(0);
include('grab.php');
function check($html) {
        $cms = array(
				"ActiveTalk" => array('<!-- Begin of activetalk script -->','cdn.active-talk.com/js/script.js'),
				"Cackle" => array('cackle_widget = window.cackle_widget','://cackle.me/widget.js'),
				"Call2client" => array('callback_link = "showCall2client"','s.src = "//code.call2client.ru/script/call2client/'),
				"call51" => array('href="http://call51.ru/css/notation.css"','src="http://call51.ru/js/notation_ru.js'),
				"Callbackhunter" => array('href="//cdn.callbackhunter.com/widget2/tracker.css','text/javascript" src="//cdn.callbackhunter.com/widget2/tracker.js','var hunter_code='),
				"CallBaska" => array('<!-- Callbaska -->','src="https://my.callbaska.ru/callback.js"'),
				"callKeeper" => array('src="//callkeeper.ru/modules/widget/db/?callkeeper_code','src="//callkeeper.ru/modules/widget/callkeeper.js'),
				"Callpy" => array('!-- BEGIN CALLPY CODE','o.getItem("callpy_data")'),
				"Chaser" => array("w.CH_SERVER_NAME = '//chaser.ru'",'/widget/1.1/js/chaser.js'),
				"Chatfocus" => array('src="http://chatfocus.com/client.php?'),
				"Chatra" => array('src="http://chatfocus.com/client.php?',"+ '//chat.chatra.io/chatra.js';"),
				"Chat help" => array("https://cdn.chathelp.ru/js.min/ch-base.js",'new ChatHelpJS(siteId);}}'),
				"Chatovod" => array('Чат предоставлен сервисом <a href="http://www.chatovod.ru/'),
				"Cleversite" => array('<!-- Сleversite chat button -->','//cleversite.ru/cleversite/widget_new.php'),
				"ClickDesk" => array('<!-- ClickDesk Live Chat Service for websites -->','http://my.clickdesk.com/clickdesk-ui/browser/'),
				"ClientCaller" => array('<script src="http://cache.clientcaller.ru/'),
				"Сloudim" => array('BEGIN cloudim code',"src='//static.cloudim.ru/js/chat.js",'Cloudim.Chat.init({uid:'),
				"CoMagic" => array('src="//app.comagic.ru/static/cs.min.js'),
				"HookMyVisit" => array('src="http://hookmyvisit.com/api/lib/'),
				"GoTalk" => array('src="//www.gotalk.ru/invite?action=invitejs&account_id','var gotalk_img = (dtalk_online_operators > 0)'),
				"iZvonok" => array('src="http://izvonok.com/callback_api'),
				"JivoSite" => array('//code.jivosite.com/script/widget/',),
				"Krible" => array('//cdn.krible.com/loader?code=',),				
				"LeadHacker" => array('class="leadhacker-async-script-loader"',"+ '//www.leadhacker.ru/t/' + t + '/lhw.js'","(window, document, 'leadhacker_callbacks'"),
				"LiveAgent" => array("s=d.createElement('script');s.id='la_"),
				"Live2Support" => array('!-- live2support codes starts --','var l2sdialogofftxt="Live Chat Offline'),
				"Livetex.ru" => array("window['li'+'ve'+'Tex'] = true,","window['li'+'v'+'eTe'+'x'+'ID']","window['liv'+'eTe'+'x'+'_o'+'b'+'jec'+'t']","t.src = '//cs'+'15.l'+'ivet'+'ex.r'+'u'+'/js/cli'+'ent.js';"),
				"LiveZilla" => array("!-- LiveZilla Chat Button Link Code  --",'!-- LiveZilla Tracking Code --','!-- http://www.LiveZilla.net Chat Button Link Code --'),
				"Marva" => array("/js/marva_code.js.php?login"),
				"ME-TALK" => array("s.src = 'https://lcab.talk-me.ru/support",'if (!callback.done && (!state || /loaded|complete/.test(state)))'),
				"MiLService" => array('href="http://milservice.ru" id="milsite_online_a','type="text/javascript" src="http://milservice.ru/url.ajx'),
				"NETROX SC" => array('!-- NETROXSC CODE','src="http://code.netroxsc.ru/'),
				"Olark" => array('!-- begin olark code --','static.olark.com/jsclient/loader0.js'),
				"Onicon" => array('http://cp.onicon.ru/js/simple_loader.js?site_id='),
				"OnlineAdviser" => array("s0.src = 'http://onlineadviser.ru/js/client/latest.js",'<!--OnlineAdviser-->'),
				"Online Butterfly" => array('<!-- Online Butterfly','ob.src = "http://system.online-butterfly.ru/channel/js/'),
				"OnlineSeller" => array('!-- OnlineSeller.ru','http://onlinesaler.ru/assets/templates/'),
				"P3chat" => array('var p3chat = p3chat',"p3chat.push(['_setAccount'",'e.src = "//p3chat.com/dist/p3.js'),
				"Perezvoni" => array('src="//perezvoni.com/files/widgets/'),
				"QuickChat" => array('<!-- BEGIN QUICKCHAT CODE -->',"s.src = 'https://quickchat.pro/script/widget?"),
				"RedHelper" => array("<!-- RedHelper -->",'src="https://web.redhelper.ru/service/main.js?'),
				"RoboCall" => array("src='http://rbcall.com/script.php?s",'href="http://rbcall.com/css/modal.css"'),
				"RocketCallback" => array("href='//cdn.rocketcallback.com/style/tracker_css/static.css","href='//cdn.rocketcallback.com/style/tracker_css/user_css","src='//cdn.rocketcallback.com/loader.js'"),
				"SalesGrow" => array('javascript" src="http://salesgrow.ru/tracker/'),
				"SiteHeart" => array("<!-- Start SiteHeart code -->",'var url ="widget.siteheart.com/widget/sh/'),
				"SiteHelp" => array("sitehelp_s.type = 'text/javascript'","top.location.protocol + '//c.sitehelp.im/code.cgi"),
				"SmartCallBack" => array('<!--SCB-->','http://smartcallback.ru/api/SmartCallBack.js','<!--END SCB-->'),
				"Smartsupp" => array('!-- SmartSupp Live Chat script','var _smartsupp = _smartsupp',"c.src='//www.smartsuppchat.com/loader.js"),
				"SPEXE" => array('<!-- begin spexe code -->','<!-- end spexe code -->','md:"https://www.spexe.com",cd:".spexe.net"'),
				"StreamWood" => array('https://clients.streamwood.ru/StreamWood/sw.js','swQ(document).ready(function(){',"swQ('body').SW('load');"),
				"TalkDriver" => array('http://talkdriver.ru/?sid=".$sid."&user=','$src = "http://talkdriver.ru/newmes.php?s'),
				"UpToCall" => array("var CallBaseUrl = '//uptocall.com';"),
				"WebConsult" => array('<script type="text/javascript" src="http://consultsystems.ru/script/"'),
				"WebConsultant" => array('callcons/js/callcons.js'),
				"Webim" => array("<!-- /webim button -->",'webim_button'),
				"wtfConsult" => array('!-- wtfConsult','var wtfconsult_widget_id',"http://wtfconsult.ru/consult/widget/'+wtfconsult_widget_id+"),
				"Zopim" => array("<!--Start of Zopim Live Chat Script-->",'window.$zopim'),

        );
		// $logfile = 'logs/contextlogs.txt';
		
        if (empty($html)){
				$datetoday = date("Y-m-d H:m:s");
				$sname = $_POST['url'] . chr(9) .'Сайт недоступен' .chr(9). $datetoday. PHP_EOL;
				file_put_contents('logs/contextlogs.txt',$sname);
				exit('Сайт недоступен!');
				} else {
				$datetoday = date("Y-m-d H:m:s");
        foreach ($cms as $name => $rules) {
            $c = count($rules);
            for ($i = 0; $i < $c; $i++) {
                if (stripos($html, $rules[$i]) !== FALSE) {
				$nname = $_POST['url'] . chr(9) .$name .chr(9). $datetoday. PHP_EOL;
				file_put_contents('logs/contextlogs.txt',$nname);
                    exit($name);
					}
                }
			
        }
		
		$mname = $_POST['url'] . chr(9).'Не найдено' .chr(9). $datetoday. PHP_EOL;
		file_put_contents('logs/contextlogs.txt',$mname);
        exit("Не найдено"); }
}

$result = check(grab($_POST['url']));


$loger = checkcmsresult($result);
// var_dump($loger);
function mylog($data) {
    $data = $data . PHP_EOL;
    file_put_contents('logs/contextlogs.txt', $data);
    // var_dump (file_put_contents('/logs/contextlogs.txt', $data));
}
mylog($loger);


?>