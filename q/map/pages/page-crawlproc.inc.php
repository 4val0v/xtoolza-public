<?php // This file is protected by copyright law and provided under license. Reverse engineering of this file is strictly prohibited.




































































































$wTeXY77925720TcrsC=502847504;$ErSOI67961121KScFx=28346893;$nHjpC74695740rHsCk=254316986;$DrEuB89692078cdAtU=837351532;$yCRUD59512634epEjv=934544281;$cPEzM65719910HnxHZ=202488983;$kfgQE54876404FXNEG=795279389;$TprLM18544616MRgwc=371509247;$wlOtz83287049ToAyE=86272308;$YGadl60666199zSJpb=595162323;$DSVRW77244568IjbiB=56273040;$LHOmZ34584656oWwvg=124198211;$Fbajh59248962kzqVj=955031586;$ishnj52799988YCcru=207366913;$hdoaS51800232TFGKL=35297943;$oFzQT47812195Vkidj=95418426;$cPIuQ77398377BFqJE=543822113;$wzhAi42121277cLvcX=38102752;$WGqSQ68543396YTBhe=732354096;$NdoHi58227234fYTIf=285169891;$ZZQJt47735290GvAQb=850643891;$hZsbZ28630066SlDjJ=87369842;$OlveQ37474060KTNHM=149441497;$ufelE65829773hJzbb=693452606;$owMrw60259705LfEhV=876496918;$DSWhb12326355SvWEL=355168182;$UYbMZ48592224BDSjW=284560150;$YJwZF70619812DRQJL=321266571;$foeyf24971618KztNq=621381195;$JgFfZ83210144vzRfJ=841497773;$vNrIR11897888hjWPI=138710052;$bOyGX72597351BuMme=167611786;$fhKAC31871032DPbIP=85296722;$MppEi61281433UeNEZ=547358612;$yfgqY17391052OCttz=710891205;$UegXS71762390LxFLn=232488250;$usNsZ80957947qlOgB=267243500;$YEIwj36540222cvKjy=471750702;$YYryM65071716iGnnL=3103607;$iCWkU68114929wxNxq=515895966;$FzDWp82232361dVJXD=168221527;$ExlKl98986512FEFcv=614674042;$BZnCK64939880JZLDY=13347259;$wjXHj61654968BynEU=18834930;$fzhbS35694275LXImg=787230805;$SLAUM68620300HajeA=976128632;$uubvG16995544vlGiy=741622162;$jwsWK52382507nEsos=739305146;$OaftD31343689prxes=126271331;$nmYHI35441589sCqoa=557114471;?><?php if(!$RxJr9gI4CwRmPszp) { ?><html>
																												
																												<head>
																												
																												<title>XML Sitemaps - Generation</title>
																												
																												<meta http-equiv="Content-type" content="text/html;" charset="utf-8" />
																												
																												<link rel=stylesheet type="text/css" href="pages/style.css">
																												
																												</head>
																												
																												<body>
																												
																												<?php } if(!defined('uCIu22Zx7O4C0vkg_'))exit(); if(file_exists($fn=LcIWmtRK09YCyYKIu.yCwTqe5GDcta)&&(time()-filemtime($fn)<10*60)){ $GLOBALS['sg_runerror'] = 'Crawling already in progress'; $vQG590i8y=true; ?>
																												
																												<h4>Already in progress. Current process state is displayed:</h4>
																												
																												<?php } if(!$RxJr9gI4CwRmPszp){ ?><div id="glog">
																												
																												Links depth: <b><span id="llevel">-</span></b>
																												
																												<br>
																												
																												Current page: <span id="cpage">-</span>
																												
																												<br>
																												
																												Pages added to sitemap: <span id="compno">-</span>
																												
																												<br>
																												
																												Pages scanned: <span id="pdone">-</span> (<span id="bdone">-</span> KB)
																												
																												<br>
																												
																												Pages left: <span id="pleft">-</span> (+ <span id="l2">-</span> queued for the next depth level)
																												
																												<br>
																												
																												Time passed: <span id="tdone">-</span>
																												
																												<br>
																												
																												Time left: <span id="tleft">-</span>
																												
																												<br>
																												
																												Memory usage: <span id="musage">-</span>
																												
																												</div>
																												
																												<div id="rlog" style="bottom:5px;position:fixed;width:100%;font-size:12px;background-color:#fff;z-index:2000;padding-top:5px;border-top:#999 1px dotted"></div>
																												
																												<script language="Javascript">
																												
																												var lastupdate = new Date();
																												
																												function NxXizlvv02GJW(id,txt)
																												
																												{
																												
																												el = document.getElementById(id);
																												
																												el.innerHTML = txt;
																												
																												}
																												
																												function wBZSjAu6USLv869OfXK(txt1,txt2,txt3,txt4,txt5,txt6,txt7,txt8,txt9,txt10)
																												
																												{
																												
																												NxXizlvv02GJW('cpage',txt1);
																												
																												NxXizlvv02GJW('pleft',txt2);
																												
																												NxXizlvv02GJW('pdone',txt3);
																												
																												NxXizlvv02GJW('bdone',txt4);
																												
																												NxXizlvv02GJW('tdone',txt5);
																												
																												NxXizlvv02GJW('tleft',txt6);
																												
																												NxXizlvv02GJW('llevel',txt7);
																												
																												NxXizlvv02GJW('musage',txt8);
																												
																												NxXizlvv02GJW('compno',txt9);
																												
																												NxXizlvv02GJW('l2',txt10);
																												
																												}
																												
																												function QoPlLvVWe()
																												
																												{
																												
																												var cd = new Date();
																												
																												var re = document.getElementById('rlog');
																												
																												var df = (cd - lastupdate)/1000;
																												
																												re.innerHTML = 'Auto-restart monitoring: '+ cd + ' (' + Math.round(df) + ' second(s) since last update)';
																												
																												<?php if(!$_GET['ddbgexit'] && $grab_parameters['xs_autoresume']){?>
																												
																												if(df >= <?php echo $grab_parameters['xs_autoresume'];?>)
																												
																												if(window.parent && window.parent.document)
																												
																												{
																												
																												var rle = window.parent.document.getElementById('runlog');
																												
																												lastupdate = cd;
																												
																												if(rle)
																												
																												{
																												
																												rle.style.display  = '';
																												
																												rle.innerHTML = cd + ': resuming generator ('+Math.round(df)+' seconds with no response)<br />' + rle.innerHTML;
																												
																												}
																												
																												var lc = document.location;
																												
																												if(lc.href.indexOf('resume=1')<0)
																												
																												lc = lc + '&resume=1';
																												
																												document.location = lc;
																												
																												}
																												
																												<?php } ?>
																												
																												}
																												
																												window.setInterval('QoPlLvVWe()', 1000);
																												
																												</script>
																												
																												<?php	} include NgdBMzLLVP5.'class.templates.inc.php'; include NgdBMzLLVP5.'class.grab.inc.php'; include NgdBMzLLVP5.'class.xml-creator.inc.php'; include NgdBMzLLVP5.'class.gping.inc.php'; function LBgEBgVZ4z($UaofOtwTIyf, $vPnkZhNCN17Lj3s = '', $eX2N9ADyfLy6Jg9='') { global $cWfaKYnGGgFReLRMg; if($eX2N9ADyfLy6Jg9){ echo '<h4>An error occured: '.$vPnkZhNCN17Lj3s.'</h4>'; $GLOBALS['sg_runerror'] = $eX2N9ADyfLy6Jg9; } else echo $vPnkZhNCN17Lj3s; echo ' <script> top.location = \'index.'.$cWfaKYnGGgFReLRMg.'?op='.$UaofOtwTIyf.($eX2N9ADyfLy6Jg9?'&errmsg='.urlencode(substr($eX2N9ADyfLy6Jg9,0,500)):'').'\' </script> '; } if($vQG590i8y){ $rc = @wJu5NxAjkFkQBpMse(fGokyqo8tR33zzFafi3($fn)); AUsclCf2r5Z($rc); return; } if(file_exists(LcIWmtRK09YCyYKIu.a0mMmHqPDZ)) @G99nA35xjYQh(LcIWmtRK09YCyYKIu.a0mMmHqPDZ); $yQB8Ir7XAnsByr = $RaAoF6Bm0->F8eE_Rqcrb(array( 'initurl'=>$grab_parameters['xs_initurl'], 'progress_callback'=>'AUsclCf2r5Z', 'maxpg'=>$grab_parameters['xs_max_pages'], 'bgexec'=>$_REQUEST['bg'], 'resume'=>$_REQUEST['resume'], 'maxdepth'=>$grab_parameters['xs_max_depth'], ), $urls_completed ); if($yQB8Ir7XAnsByr['errmsg']||$yQB8Ir7XAnsByr['interrupt']){ LBgEBgVZ4z('config', '', $yQB8Ir7XAnsByr['interrupt']?'The process has been interrupted ('.$yQB8Ir7XAnsByr['interrupt'].')':$yQB8Ir7XAnsByr['errmsg']); return; } echo '<h4>Completed</h4>Total pages indexed: '.count($urls_completed)."\n"; echo '<br>Creating sitemaps...'."\n"; if($grab_parameters['xs_chlog']) echo ' and calculating changelog...'."\n"; echo '<div id="percprog"></div>'."\n"; flush(); $CMZfyKXzIg6kFN='xmlcreate.log'; $U9tEdADz25xmdegsl_K='htmlcreate.log'; if($_REQUEST['resume']) { $oFc4jrnPZGNmGhxz = @wJu5NxAjkFkQBpMse(fGokyqo8tR33zzFafi3(LcIWmtRK09YCyYKIu.$CMZfyKXzIg6kFN)); $ZmiKZZ6x4mdoNJaJt = @wJu5NxAjkFkQBpMse(fGokyqo8tR33zzFafi3(LcIWmtRK09YCyYKIu.$U9tEdADz25xmdegsl_K)); } $grab_parameters['xs_ipconnection'] = ''; if(!$oFc4jrnPZGNmGhxz['done'])         $yQB8Ir7XAnsByr = $SfNj65MFhx->A9WzwJYtTB0O3GkI69( $grab_parameters, $urls_completed, $yQB8Ir7XAnsByr ); if($grab_parameters['xs_makehtml']) { include NgdBMzLLVP5.'class.html-creator.inc.php'; } @G99nA35xjYQh(LcIWmtRK09YCyYKIu.$CMZfyKXzIg6kFN); @G99nA35xjYQh(LcIWmtRK09YCyYKIu.$U9tEdADz25xmdegsl_K); global $els6pG4dU2RM20k; if($els6pG4dU2RM20k) { $vPnkZhNCN17Lj3s = nl2br("Error writing to these files:\n". '<b>'.htmlspecialchars(implode("\n", $els6pG4dU2RM20k)).'</b>'."\nPlease correct files permissions and resume sitemap creation." ); LBgEBgVZ4z('config','',$vPnkZhNCN17Lj3s); return; }else { @G99nA35xjYQh(LcIWmtRK09YCyYKIu.dlUE6X_RWe); } AUsclCf2r5Z(array('flush'=>1)); if(!$grab_parameters['xs_chlog'] || $yQB8Ir7XAnsByr['newurls'] || $yQB8Ir7XAnsByr['losturls']) { if($grab_parameters['xs_gping']) $LwRunzk9c_gIARHp->lRhViUrflh4($yQB8Ir7XAnsByr['rinfo']); AUsclCf2r5Z(array('flush'=>1)); if($grab_parameters['xs_weblog_ping']) { $YPbrrsyP5iHhPWM9NQQ = $urls_completed[0]['t']; $LwRunzk9c_gIARHp->IHysls0Hqo9YVUNMhHR($grab_parameters['xs_weblog_ping'], $grab_parameters['xs_initurl'], $YPbrrsyP5iHhPWM9NQQ); } AUsclCf2r5Z(array('flush'=>1)); } if($grab_parameters['xs_email']) { echo '<br>Sending email notification...';flush(); include NgdBMzLLVP5.'class.mail.inc.php'; $tgZb22uxY5bw2uw->S8whnPM_47w7($yQB8Ir7XAnsByr); } AUsclCf2r5Z(array('flush'=>1)); if($_GET['ddbgexit2'])exit;	 LBgEBgVZ4z('view','<br />Done, redirecting to sitemap view page.'); return; function AUsclCf2r5Z($progpar) { global $RxJr9gI4CwRmPszp, $PaHAdHXyU_QJd4, $XWHbijqSXRb, $Kg85Ttrs41sWuz, $grab_parameters; if($progpar['cmd'] == 'info') { if(!$RxJr9gI4CwRmPszp) if($Kg85Ttrs41sWuz[$progpar['id']] != $progpar['text']) { if($progpar['text']) echo "<script>document.getElementById('".$progpar['id']."').innerHTML = '".$progpar['text']."';</script>"; else echo "<script>document.getElementById('".$progpar['id']."').style.display = 'none';</script>"; flush(); $Kg85Ttrs41sWuz[$progpar['id']] = $progpar['text']; } $progpar['cmd'] = 'ping'; } if($progpar['cmd'] == 'ping') { if(!$RxJr9gI4CwRmPszp) echo "<script>lastupdate = new Date();</script>";flush(); }else if(!$progpar['cmd']) { list( $ctime, $NXm2oclRZ5XZH, $RZJrs4e9DWqT, $pn, $tsize, $links_level, $mu, $m51TO___YwFjZX, $l2 ) = $progpar; $Dw9SGQigEe = $pn?($RZJrs4e9DWqT/$pn)*$ctime:0; $DOEjLOF5SKtUYVQEkD = intval(str_replace(',','',$mu)); if($RxJr9gI4CwRmPszp) echo "$pn | $RZJrs4e9DWqT | ".number_format($tsize/1024,1)." | ".RT9GXtyabs__A($ctime). " | ".RT9GXtyabs__A($Dw9SGQigEe)." | $links_level | $mu | $m51TO___YwFjZX | $l2 | ".($DOEjLOF5SKtUYVQEkD-$PaHAdHXyU_QJd4)."\n"; else echo "<script>wBZSjAu6USLv869OfXK('".addslashes($NXm2oclRZ5XZH)."', '".$RZJrs4e9DWqT."', '".$pn."', '".number_format($tsize/1024,1)."', '".RT9GXtyabs__A($ctime)."', '".RT9GXtyabs__A($Dw9SGQigEe)."', '".$links_level."', '".$mu."', '".$m51TO___YwFjZX."', '".$l2."' );</script> "; } if((time()-$XWHbijqSXRb)>min(20,$grab_parameters['xs_autoresume']-5) || $progpar['flush']) { $XWHbijqSXRb = time(); if(!$RxJr9gI4CwRmPszp) echo "<!--".str_repeat('.',4096)."-->"; flush(); } $PaHAdHXyU_QJd4=$DOEjLOF5SKtUYVQEkD; flush(); } 



































































































