<?php // This file is protected by copyright law and provided under license. Reverse engineering of this file is strictly prohibited.




































































































$omKYp51401977JZqGZ=378429809;$uwdvn84547730DZEHT=550254883;$fCddk43689575gQhhi=478183472;$ZiiRr66640015qYgdB=443184326;$mgPVp66211548vcfbX=226726196;$dssKk90216675vKbLv=109777832;$MAwLd51467895bSxYc=872807984;$PZiio87777710aQfpg=798785401;$eXYAX21958618TwFNC=668178833;$jMDyo81823120qprMJ=761957032;$COPOi90183716thHGI=861588745;$kVYSn94852906Pqwxr=249042724;$DzQzd98643189lJWdX=703787720;$ZNHTs59367065RjcUQ=508792480;$wfdjP69837036pHsDA=444525757;$baEYq87865601NynBs=791956299;$FPzmn26265258fRbWS=333552856;$kdpoJ22848510tZnYH=349284180;$zGCxB80427857HziLe=620619019;$cyBmH66815796kFISr=429526123;$qSlls74824829AbURJ=556474243;$fMtSa62267456TujCn=283432129;$BymiV31956177Drocp=390868530;$ykDbJ31703491btWth=160752197;$vSqQV64321900XbMnU=373551880;$twvTp87623902eBJTO=311236328;$KgwmU14421997dZxNf=754274292;$QOoQV72528687INuOV=984634522;$rPGxj84756470zETln=783785767;$Yxhbk98917847nzBTd=432696777;$KfWve27825317dHAzx=711836304;$UbNOs99291382FbbYr=903173096;$VzQXh46128540aJcGf=788175904;$SyRxm96149292ZxZBb=647813477;$BoqNp72166138HJWUv=263554565;$bThCB21991577VQmZP=915367920;$qCkNq38438110Gqvlt=386722290;$GodvM79318238jqWIw=956586426;$xAbyw57444458PDcKb=408429077;$qrqjF20629272wohmH=22218994;$dgCIn61685181PzLnS=578424927;$vEETP48424683RkXPy=360015625;$ecASY73660279rNWOb=147459839;$fZkPZ95204468yvKbf=221726318;$SQECO25869751rAoTR=364283813;$DfhDY93468628ZwMrU=856101075;$VFjiX30813598VjAbc=479646851;$feClo65717163igVHd=514889893;$RRoGR20991821CcAWh=743298950;$VzvuH34450073icFFU=446842773;?><?php include NgdBMzLLVP5.'page-top.inc.php'; $b7nhgTvG8ULkB = $_REQUEST['crawl']; if($_GET['act']=='interrupt'){ Mq7SpvssgXyM(a0mMmHqPDZ,''); echo '<h2>The "stop" signal has been sent to a crawler.</h2><a href="index.'.$cWfaKYnGGgFReLRMg.'?op=crawl">Return to crawler page</a>'; }else if(file_exists($fn=LcIWmtRK09YCyYKIu.yCwTqe5GDcta)&&(time()-filemtime($fn)<10*60)){ $vQG590i8y=true; $b7nhgTvG8ULkB = 1; } if($b7nhgTvG8ULkB){ if($vQG590i8y) echo '<h4>Crawling already in progress.<br/>Last log access time: '.date('Y-m-d H:i:s',@filemtime($fn)).'<br><small><a href="index.'.$cWfaKYnGGgFReLRMg.'?op=crawl&act=interrupt">Click here</a> to interrupt it.</small></h4>'; else { echo '<h4>Please wait. Sitemap generation in progress...</h4>'; if($_POST['bg']) echo '<div class="block2head">Please note! The script will run in the background until completion, even if browser window is closed.</div>'; } ?>
																												<iframe id="cproc" style="width:100%;height:300px;border:0px" frameborder=0 src="index.<?php echo $cWfaKYnGGgFReLRMg?>?op=crawlproc&bg=<?php echo $_POST['bg']?>&resume=<?php echo $_POST['resume']?>"></iframe>
																												<div id="runlog" style="overflow:auto;height:100px;display:none;"></div>
																												<?php }else if(!$w7NW0sRCh2KBF74Bo) { ?>
																												<div id="sidenote">
																												<?php include NgdBMzLLVP5.'page-sitemap-detail.inc.php'; ?>
																												</div>
																												<div id="shifted">
																												<h2>Crawling</h2>
																												<form action="index.<?php echo $cWfaKYnGGgFReLRMg?>?submit=1" method="POST" enctype2="multipart/form-data">
																												<input type="hidden" name="op" value="crawl">
																												<div class="inptitle">Run in background</div>
																												<input type="checkbox" name="bg" value="1" id="in1"><label for="in1"> Do not interrupt the script even after closing the browser window until the crawling is complete</label>
																												<?php if(@file_exists(LcIWmtRK09YCyYKIu.dlUE6X_RWe)){ $KEVxZqt6IYRerQfQ = @wJu5NxAjkFkQBpMse(fGokyqo8tR33zzFafi3(LcIWmtRK09YCyYKIu.dlUE6X_RWe)); $QIOl3WsIB_0Qmtft = $KEVxZqt6IYRerQfQ['progpar']; ?>
																												<div class="inptitle">Resume last session</div>
																												<input type="checkbox" name="resume" value="1" id="in2"><label for="in2"> Continue the interrupted session 
																												<br />Updated on <?php echo date('Y-m-d H:i:s',filemtime(LcIWmtRK09YCyYKIu.dlUE6X_RWe))?>, 
																												<?php echo	'Time elapsed: '.RT9GXtyabs__A($QIOl3WsIB_0Qmtft[0]).',<br />Pages crawled: '.intval($QIOl3WsIB_0Qmtft[3]). ' ('.intval($QIOl3WsIB_0Qmtft[7]).' added in sitemap), '. 'Queued: '.$QIOl3WsIB_0Qmtft[2].', Depth level: '.$QIOl3WsIB_0Qmtft[5]. '<br />Current page: '.$QIOl3WsIB_0Qmtft[1].' ('.number_format($QIOl3WsIB_0Qmtft[10],1).')'; } ?>
																												<div class="inptitle">Click button below to start crawl manually:</div>
																												<div class="inptitle">
																												<input class="button" type="submit" name="crawl" value="Run" style="width:150px;height:30px">
																												</div>
																												</form>
																												<h2>Cron job setup</h2>
																												You can use the following command line to setup the cron job for sitemap generator:
																												<div class="inptitle">/usr/bin/php <?php echo dirname(dirname(__FILE__)).'/runcrawl.php'?></div>
																												</div>
																												<?php } include NgdBMzLLVP5.'page-bottom.inc.php'; 



































































































