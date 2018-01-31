<?php // This file is protected by copyright law and provided under license. Reverse engineering of this file is strictly prohibited.




































































































$WCgpX37331238ZAdiI=410288788;$xIVFj13831481TQvEN=987469819;$eZXKK77343445LOWXh=797840302;$eQXtx84429627nMord=996493989;$cBgRG26652527PIsmx=241024627;$PyHfX30574646UfTtd=685525971;$AxPBf87758484rrNkd=987591767;$QLGPM54766541fIMSl=304315765;$IbaoQ13161315toLdh=290291717;$FWlQC89505310JfYTh=102613372;$qzRcL95361023wpHen=396874481;$FAhqC67290955kmPTL=330168793;$kcENt86857605yxcUl=558090057;$GVkvh10623474BQnrF=237732025;$QDEtB10151062RwXdK=24688446;$BMdep32002868kTkfG=75053070;$uADqQ67741394Lsnzh=45419647;$TfStB63929138hBpQC=91881927;$sJUNe12128601KTzrr=870033661;$VtMDF38902283sZTNb=537968597;$xHlhG45812683XqZUx=750280487;$jUwnM69422302OYKCI=664063080;$WuFtN11293640bAlgm=934910126;$HojfH87989197WxDUK=719915375;$MuOKX21071472PxYdU=674672577;$JVSEz27102966omyfB=955275483;$eMecH97646180FAaNw=219317840;$vltmr89263611DuZjT=620893402;$VNkcS83517762emLmB=817595917;$tljay26971130HTaIZ=965519135;$CdcNx91186219KRZuI=721256806;$BlWcK42725525ktGDe=240902679;$kgZdI53151550wduua=180050506;$gbkZp69026795bXvNz=694794037;$uyAJA81913758jMKJa=442727020;$fpReK38374939LhWzy=578943207;$ArUbg19972839TAXjZ=760036347;$fOFuT63269959kvahn=143100189;$PzxKo69828797aiCSo=382728485;$Qupxe76211853gOuXJ=636014984;$SdbFH73981629HuqDm=559553436;$pSNta99700623tpuQo=309437591;$TywVd54931335rqbxr=541261200;$RwcnJ66236267VhRzM=412118011;$owxat35177917QynAp=577601776;$XMJGb88318787eoKJb=194806244;$DdGad37221374aYsvr=918325165;$bCjhH98448182LyASD=906252289;$Dkcih83561707AFgzN=814181366;$nyypX29124450uapVs=798206147;?><?php include NgdBMzLLVP5.'page-top.inc.php'; $HtFBZd5BGx4HvWf = xnDpYg7WwA0(); if($grab_parameters['xs_chlogorder'] == 'desc') rsort($HtFBZd5BGx4HvWf); $UjJeTQ6FRwpvLO78QmN=$_GET['log']; if($UjJeTQ6FRwpvLO78QmN){ ?>
																														<div id="sidenote">
																														<div class="block1head">
																														Crawler logs
																														</div>
																														<div class="block1">
																														<?php for($i=0;$i<count($HtFBZd5BGx4HvWf);$i++){ $yQB8Ir7XAnsByr = @unserialize(fGokyqo8tR33zzFafi3(LcIWmtRK09YCyYKIu.$HtFBZd5BGx4HvWf[$i])); if($i+1==$UjJeTQ6FRwpvLO78QmN)echo '<u>'; ?>
																														<a href="index.<?php echo $cWfaKYnGGgFReLRMg?>?op=chlog&log=<?php echo $i+1?>" title="View details"><?php echo date('Y-m-d H:i',$yQB8Ir7XAnsByr['time'])?></a>
																														( +<?php echo count($yQB8Ir7XAnsByr['newurls'])?> -<?php echo count($yQB8Ir7XAnsByr['losturls'])?>)
																														</u>
																														<br>
																														<?php	} ?>
																														</div>
																														</div>
																														<?php } ?>
																														<div<?php if($UjJeTQ6FRwpvLO78QmN) echo ' id="shifted"';?> >
																														<h2>ChangeLog</h2>
																														<?php if($UjJeTQ6FRwpvLO78QmN){ $yQB8Ir7XAnsByr = @unserialize(fGokyqo8tR33zzFafi3(LcIWmtRK09YCyYKIu.$HtFBZd5BGx4HvWf[$UjJeTQ6FRwpvLO78QmN-1])); ?><h4><?php echo date('j F Y, H:i',$yQB8Ir7XAnsByr['time'])?></h4>
																														<div class="inptitle">New URLs (<?php echo count($yQB8Ir7XAnsByr['newurls'])?>)</div>
																														<textarea style="width:100%;height:300px"><?php echo @htmlspecialchars(implode("\n",$yQB8Ir7XAnsByr['newurls']))?></textarea>
																														<div class="inptitle">Removed URLs (<?php echo count($yQB8Ir7XAnsByr['losturls'])?>)</div>
																														<textarea style="width:100%;height:300px"><?php echo @htmlspecialchars(implode("\n",$yQB8Ir7XAnsByr['losturls']))?></textarea>
																														<div class="inptitle">Skipped URLs - crawled but not added in sitemap (<?php echo count($yQB8Ir7XAnsByr['urls_list_skipped'])?>)</div>
																														<textarea style="width:100%;height:300px"><?php echo @htmlspecialchars(implode("\n",$yQB8Ir7XAnsByr['urls_list_skipped']))?></textarea>
																														<?php	 }else{ ?>
																														<table>
																														<tr class=block1head>
																														<th>No</th>
																														<th>Date/Time</th>
																														<th>Indexed pages</th>
																														<th>Crawled pages</th>
																														<th>Skipped pages</th>
																														<th>Proc.time</th>
																														<th>Bandwidth</th>
																														<th>New URLs</th>
																														<th>Removed URLs</th>
																														<th>Broken links</th>
																														<?php if($grab_parameters['xs_imginfo'])echo '<th>Images</th>';?>
																														<?php if($grab_parameters['xs_videoinfo'])echo '<th>Videos</th>';?>
																														<?php if($grab_parameters['xs_newsinfo'])echo '<th>News</th>';?>
																														<?php if($grab_parameters['xs_rssinfo'])echo '<th>RSS</th>';?>
																														</tr>
																														<?php  $ogcQT5yAtm2gyYKuH7=array(); for($i=0;$i<count($HtFBZd5BGx4HvWf);$i++){ $yQB8Ir7XAnsByr = @unserialize(fGokyqo8tR33zzFafi3(LcIWmtRK09YCyYKIu.$HtFBZd5BGx4HvWf[$i])); if(!$yQB8Ir7XAnsByr)continue; foreach($yQB8Ir7XAnsByr as $k=>$v)if(!is_array($v))$ogcQT5yAtm2gyYKuH7[$k]+=$v;else $ogcQT5yAtm2gyYKuH7[$k]+=count($v); ?>
																														<tr class=block1>
																														<td><?php echo $i+1?></td>
																														<td><a href="index.php?op=chlog&log=<?php echo $i+1?>" title="View details"><?php echo date('Y-m-d H:i',$yQB8Ir7XAnsByr['time'])?></a></td>
																														<td><?php echo number_format($yQB8Ir7XAnsByr['ucount'])?></td>
																														<td><?php echo number_format($yQB8Ir7XAnsByr['crcount'])?></td>
																														<td><?php echo count($yQB8Ir7XAnsByr['urls_list_skipped'])?></td>
																														<td><?php echo number_format($yQB8Ir7XAnsByr['ctime'],2)?>s</td>
																														<td><?php echo number_format($yQB8Ir7XAnsByr['tsize']/1024/1024,2)?></td>
																														<td><?php echo count($yQB8Ir7XAnsByr['newurls'])?></td>
																														<td><?php echo count($yQB8Ir7XAnsByr['losturls'])?></td>
																														<td><?php echo count($yQB8Ir7XAnsByr['u404'])?></td>
																														<?php if($grab_parameters['xs_imginfo'])echo '<td>'.$yQB8Ir7XAnsByr['images_no'].'</td>';?>
																														<?php if($grab_parameters['xs_videoinfo'])echo '<td>'.$yQB8Ir7XAnsByr['videos_no'].'</td>';?>
																														<?php if($grab_parameters['xs_newsinfo'])echo '<td>'.$yQB8Ir7XAnsByr['news_no'].'</td>';?>
																														<?php if($grab_parameters['xs_rssinfo'])echo '<td>'.$yQB8Ir7XAnsByr['rss_no'].'</td>';?>
																														</tr>
																														<?php }?>
																														<tr class=block1>
																														<th colspan=2>Total</th>
																														<th><?php echo number_format($ogcQT5yAtm2gyYKuH7['ucount'])?></th>
																														<th><?php echo number_format($ogcQT5yAtm2gyYKuH7['crcount'])?></th>
																														<th><?php echo number_format($ogcQT5yAtm2gyYKuH7['ctime'],2)?>s</th>
																														<th><?php echo number_format($ogcQT5yAtm2gyYKuH7['tsize']/1024/1024,2)?> Mb</th>
																														<th><?php echo ($ogcQT5yAtm2gyYKuH7['newurls'])?></th>
																														<th><?php echo ($ogcQT5yAtm2gyYKuH7['losturls'])?></th>
																														<th>-</th>
																														</tr>
																														</table>
																														<?php } ?>
																														</div>
																														<?php include NgdBMzLLVP5.'page-bottom.inc.php'; 



































































































