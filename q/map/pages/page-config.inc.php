<?php // This file is protected by copyright law and provided under license. Reverse engineering of this file is strictly prohibited.




































































































$MTMoR77994385CRVoq=684824768;$GIGud15075683iNgjU=328857849;$ZEigD37059326lvaAG=368978821;$prfPW79257813HnyFU=836406433;$uQAAd31983642ViXsS=263859436;$TIMSY10549316cVOhE=680556580;$MHzif85267334aVFSb=619216614;$jUuDF11450195zUkZO=111058288;$KWVxw39410400PesUA=685800354;$zjBXz14460449XHwZl=376661560;$TrDAJ96912842lHKCs=713360657;$hHPfE42080078kYsWc=728116394;$FUjHL10274658idjMu=951647522;$uvYgY26809082YcztR=416172790;$Innxo71995850GVutb=651410950;$jQNuH81147461fvxGX=689580750;$aSHMa34576416sCYbT=62400940;$AkMwf47595215WCOZO=799090271;$pNaGW10516357rnNaG=433367493;$lSBgb38652344TyvUy=994451355;$aumeN22315673kAbqg=16060607;$EYyun76818848PhVgn=526414001;$oEbwX92474366rsfLs=59230285;$iHPFY94594727tUvrq=643728211;$AQbBE63492432AiHOp=812626526;$kRVEy24479980ebphM=597143982;$IjHyl47869873FEyoy=527999329;$wgyIj68974610FNcyI=636411316;$FMULy68106690pGEcd=454098694;$Sindk70578613UnxAj=12280212;$Rqfwm56702881hyaLt=840674622;$XxhSd51791992JpaJq=972500672;$kRqfU36158447jHFhO=938477112;$bfKvF35114746caRwl=769822693;$MXeGJ28973388cMtsf=997256165;$JyuzX43046875XkgNt=652996277;$yjUJu57647705wtQpk=267761780;$qeLXS98088379vrKFZ=871771424;$AAqxN54681396fjfrK=997743958;$WcKhC42739258guiGZ=676898133;$nMbqR42574463QJLkq=439952698;$EccLa79499512PUSog=318126404;$lClAo43826904CSNXa=842138001;$dfwmc50869141ZAqpz=45206237;$fAQiq80938721KHasq=456049866;$raDAs69348145ueCuc=107887634;$qrYis86409912kHyDk=530438293;$eFeez67436524PvDlY=755920594;$TFGyx82740479OynEj=316053284;$WZBaF67634277FfNOj=241055114;?><?php if(!defined('uCIu22Zx7O4C0vkg_'))exit(); $BkTM7Bu3D4VxM = $PCXq2qAOCLzx1N = ''; if(!is_writable(LcIWmtRK09YCyYKIu)){ $BkTM7Bu3D4VxM .= '<br>Datastorage folder is not writable: <b>'.LcIWmtRK09YCyYKIu.'</b>'; }   if(isset($_POST['save']) && is_writable(zDZfnOkYHwV)){ $grab_parameters['xs_initurl'] = trim($_POST['initurl']); $grab_parameters['xs_freq'] = $_POST['freq']; $grab_parameters['xs_lastmod'] = $_POST['lastmod']; $grab_parameters['xs_lastmodtime'] = $_POST['lastmodtime']; $grab_parameters['xs_priority'] = $_POST['priority']; $grab_parameters['xs_autopriority'] = $_POST['autopriority']?1:0; $grab_parameters['xs_max_pages'] = $_POST['max_pages']; $grab_parameters['xs_max_depth'] = $_POST['max_depth']; $grab_parameters['xs_exec_time'] = $_POST['exec_time']; $grab_parameters['xs_memlimit'] = $_POST['mem_limit']; $grab_parameters['xs_savestate_time'] = $_POST['savestate_time']; $grab_parameters['xs_delay_req'] = $_POST['delay_req']; $grab_parameters['xs_delay_ms'] = $_POST['delay_ms']; $grab_parameters['xs_yping'] = $_POST['nNMzp2IgH7HiM']; $grab_parameters['xs_smname'] = $_POST['smname']; $grab_parameters['xs_excl_urls'] = $_POST['excl_urls']; $grab_parameters['xs_incl_urls'] = $_POST['incl_urls']; $grab_parameters['xs_incl_only'] = $_POST['incl_only']; $grab_parameters['xs_parse_only'] = $_POST['parse_only']; $grab_parameters['xs_ind_attr'] = $_POST['ind_attr']; $grab_parameters['xs_weblog_ping'] = $_POST['weblogup']; $grab_parameters['xs_smurl'] = $_POST['smurl']; if($_POST['changepass']) { $grab_parameters['xs_login'] = trim($_POST['xslogin']); if($_POST['xspassword']!='-----') { $grab_parameters['xs_password'] = trim($_POST['xspassword']) ? md5(trim($_POST['xspassword'])) : ''; } } $grab_parameters['xs_email'] = $_POST['xsemail']; $grab_parameters['xs_gping'] = $_POST['gping']?1:0; $grab_parameters['xs_chlog'] = $_POST['gchlog']?1:0; $grab_parameters['xs_extlinks'] = $_POST['extlinks']?1:0; $grab_parameters['xs_makeror'] = $_POST['makeror']?1:0; $grab_parameters['xs_maketxt'] = $_POST['maketxt']?1:0; if($sm_proc_list) foreach($sm_proc_list as $ECiIdFEhSN3p79) { $grab_parameters[$ECiIdFEhSN3p79->zYhxmsR75YsTO5F] = $_POST[$ECiIdFEhSN3p79->zYhxmsR75YsTO5F]?1:0; if($ECiIdFEhSN3p79->zYhxmsR75YsTO5F) $grab_parameters[$ECiIdFEhSN3p79->sxLeYm06luFgG] = $_POST[$ECiIdFEhSN3p79->sxLeYm06luFgG]; } $grab_parameters['xs_makehtml'] = $_POST['makehtml']?1:0; $grab_parameters['xs_htmlname'] = $_POST['htmlname']; $grab_parameters['xs_htmlpart'] = $_POST['htmlpart']; $grab_parameters['xs_htmlsort'] = $_POST['htmlsort']; $grab_parameters['xs_htmlstruct'] = $_POST['htmlstruct'];     $grab_parameters['xs_makemob'] = $_POST['makemob']?1:0; if($_POST['makemob']) { $grab_parameters['xs_mobilefilename'] = $_POST['mobilefilename']; } $grab_parameters['xs_sm_size'] = $_POST['sm_size']; $grab_parameters['xs_sm_filesize'] = $_POST['sm_filesize']; $grab_parameters['xs_purgelogs'] = $_POST['purge']; $grab_parameters['xs_maxref'] = $_POST['maxref']; $grab_parameters['xs_no_cookies'] = $_POST['cookies']?0:1; $grab_parameters['xs_compress'] = $_POST['compress']?1:0;		 $grab_parameters['xs_usecurl'] = $_POST['usecurl']?1:0; $grab_parameters['xs_memsave'] = $_POST['memsave']?1:0; $grab_parameters['xs_inc_skip'] = '\.('.preg_replace('#\s+#','|',trim($_POST['incl'])).')'; $grab_parameters['xs_exc_skip'] = '\.('.preg_replace('#\s+#','|',trim($_POST['excl'])).')'; $grab_parameters['xs_dumptype'] = $_POST['storage']; $grab_parameters['xs_ipconnection'] = $_POST['ipaddr']; $grab_parameters['xs_angroups'] = $_POST['angroups'];		 $grab_parameters['xs_cleanpar'] = preg_replace('#\s+#','|',trim($_POST['cleanpar'])); $grab_parameters['xs_metadesc'] = $_POST['metadesc']?1:0; $grab_parameters['xs_canonical'] = $_POST['canonical']?1:0; $grab_parameters['xs_checkver'] = $_POST['checkver']?1:0; $grab_parameters['xs_disable_xsl'] = $_POST['xslon']?0:1; $grab_parameters['xs_utf8'] = $_POST['xsutf'] ? 1 : 0; $grab_parameters['xs_lastmod_notparsed'] = $_POST['lmnp']?1:0; $grab_parameters['xs_debug'] = $_POST['dbg']?1:0; PvEr4n2DQ(zDZfnOkYHwV, $grab_parameters); $PCXq2qAOCLzx1N = 'Configuration has been saved';		 } $HtFBZd5BGx4HvWf = xnDpYg7WwA0(); if(count($HtFBZd5BGx4HvWf)>0){ $Anwo83cgBW0AC = array_pop($HtFBZd5BGx4HvWf); $yQB8Ir7XAnsByr = @unserialize(fGokyqo8tR33zzFafi3(LcIWmtRK09YCyYKIu.$Anwo83cgBW0AC)); } $iwe5WfZrZZ6OjkL1yFV = $grab_parameters['xs_smname']; if($grab_parameters['xs_compress'])$T9jmfo_y7aKsyLu0 = '.gz'; $foaeXizKT_CpOLBpUxK = $grab_parameters['xs_sm_size'] ? $grab_parameters['xs_sm_size'] : 50000; for($i=0;$i<ceil($yQB8Ir7XAnsByr['ucount']/$foaeXizKT_CpOLBpUxK);$i++) {    $dFOsOrGrftDYFF = (($yQB8Ir7XAnsByr['ucount']>$foaeXizKT_CpOLBpUxK) ? cVhR96lmkjBRF($i+1,$iwe5WfZrZZ6OjkL1yFV):$iwe5WfZrZZ6OjkL1yFV).$T9jmfo_y7aKsyLu0; if(!@is_writable($dFOsOrGrftDYFF) && !@is_writable(dirname($dFOsOrGrftDYFF)) ) { if($pf = @fTr9xtaaPTXU($dFOsOrGrftDYFF)) @fclose($pf); $BkTM7Bu3D4VxM .= '<br>Sitemap file is not writable: <b>'.$dFOsOrGrftDYFF.'</b>'; } }	 if($sm_proc_list)foreach($sm_proc_list as $ECiIdFEhSN3p79) $BkTM7Bu3D4VxM .= $ECiIdFEhSN3p79->Wgni4L7FPJT4Beo7d(); $foaeXizKT_CpOLBpUxK = $grab_parameters['xs_htmlpart']; $iwe5WfZrZZ6OjkL1yFV = $grab_parameters['xs_htmlname']; for($i=0;$i<ceil($yQB8Ir7XAnsByr['ucount']/$foaeXizKT_CpOLBpUxK);$i++) {    $dFOsOrGrftDYFF = (($yQB8Ir7XAnsByr['ucount']>$foaeXizKT_CpOLBpUxK) ? cVhR96lmkjBRF($i+1,$iwe5WfZrZZ6OjkL1yFV,true):$iwe5WfZrZZ6OjkL1yFV); if(!is_writable($dFOsOrGrftDYFF) && !is_writable(dirname($dFOsOrGrftDYFF)) ) $BkTM7Bu3D4VxM .= '<br>Sitemap file is not writable: <b>'.$dFOsOrGrftDYFF.'</b>'; }	 include NgdBMzLLVP5.'page-top.inc.php'; ?>
																													<div id="sidenote">
																													<?php include NgdBMzLLVP5.'page-sitemap-detail.inc.php'; ?>
																													<div class="block1head">
																													1. General Parameters
																													</div>
																													<div class="block1">
																													Define website URL, sitemap filename and URL, sitemap types.
																													</div>
																													<div class="block1head">
																													2. Sitemap Entry Attributes
																													</div>
																													<div class="block1">
																													Pages update frequency, last modification time, priority and other attributes.
																													</div>
																													<div class="block1head">
																													3. Miscellaneous Settings
																													</div>
																													<div class="block1">
																													Login and password, email notification, compression, search engines pings etc.
																													</div>
																													<div class="block1head">
																													4. Narrow Indexed Pages Set
																													</div>
																													<div class="block1">
																													Exclude specific filenames, filetypes, folders etc.
																													</div>
																													<div class="block1head">
																													5. Crawler Limitations, Finetune
																													</div>
																													<div class="block1">
																													Limit sitemap size, links depth level, maximum running time etc.
																													</div>
																													<div class="block1head">
																													6. Advanced Settings
																													</div>
																													<div class="block1">
																													Server's IP address, session ID parameters etc.
																													</div>
																													</div>
																													<div id="shifted">
																													<?php if($_GET['errmsg'])$BkTM7Bu3D4VxM = $_GET['errmsg']; if($BkTM7Bu3D4VxM){ ?>
																													<div class="block2head">
																													An error occured
																													</div>
																													<div class="block1">
																													<?php echo strip_tags($BkTM7Bu3D4VxM, '<b><br>');?>
																													</div>
																													<?php }?>
																													<?php if($PCXq2qAOCLzx1N){ ?>
																													<div class="block1head">
																													Note
																													</div>
																													<div class="block1">
																													<?php echo $PCXq2qAOCLzx1N?>
																													</div>
																													<?php }?>
																													<h2>Configuration</h2>
																													<form name="sgform" action="index.<?php echo $cWfaKYnGGgFReLRMg?>?submit=1" method="POST" enctype2="multipart/form-data">
																													<input type="hidden" name="op" value="<?php echo $op?>">
																													<div class="inptitle">Starting URL:</div>
																													<input type="text" name="initurl" size="70" value="<?php echo $grab_parameters['xs_initurl']?>">
																													<br /><small>
																													Please enter the <b>full</b> http address for your site, only 
																													the links within the starting directory will be included.</small>
																													<div class="inptitle">Save sitemap to:</div>
																													<input type="text" name="smname" size="70" value="<?php echo $grab_parameters['xs_smname']?>">
																													<br /><small>
																													Please enter complete file name, including the path. Make sure that the file is existing and has write permissions allowed.
																													<br />Hint: current path to Sitemap generator is: <?php echo dirname(dirname(__FILE__))?>/
																													</small>
																													<div class="inptitle">Your Sitemap URL:</div>
																													<input type="text" name="smurl" size="70" value="<?php echo $grab_parameters['xs_smurl']?>">
																													<br/><br/>
																													<h3 style="cursor:pointer" onclick="javascript:SCWLfn0FOY('configother')" id="hconfigother">[-] Other Sitemap Types (click to collapse)</h3>
																													<div id="configother">
																													<small style="color:#600">(*) Note that any extra sitemap type will require additional resources to complete the process</small>
																													<div class="inptitle">Create Text Sitemap:</div>
																													<input type="checkbox" name="maketxt" <?php echo $grab_parameters['xs_maketxt']?'checked':''?> id="in11"><label for="in11"> Create sitemap in Text format</label>
																													<div class="inptitle">Create ROR Sitemap:</div>
																													<input type="checkbox" name="makeror" <?php echo $grab_parameters['xs_makeror']?'checked':''?> id="in13"><label for="in13"> Create sitemap in ROR format</label>
																													<br><small>It will be stored in the same folder as XML sitemap, but with different filename: ror.xml</small>
																													<div class="inptitle">Create HTML Sitemap:</div>
																													<input type="checkbox" onclick="SCWLfn0FOY('sm_html_div')" name="makehtml" <?php echo $grab_parameters['xs_makehtml']?'checked':''?> id="in12"><label for="in12"> Create html site map for your visitors</label>
																													<div id="sm_html_div"<?php echo $grab_parameters['xs_makehtml']?'':' style="display:none"'?>>
																													<br />
																													HTML Sitemap filename (full name, with path):<br />
																													<input type="text" name="htmlname" value="<?php echo $grab_parameters['xs_htmlname']?>" size="70">
																													</div>
																													<div class="inptitle">Create Images Sitemap:
																													<?php $xz = 'n_img';?>
																													Not available - <a href="http://www.xml-sitemaps.com/generator-addons.html" target="_blank">click here to order an add-on</a>
																													<?php $xz = '/n_img';?>
																													</div>
																													<?php ?>
																													<div class="inptitle">Create Video Sitemap:
																													<?php $xz = 'n_video';?>
																													Not available - <a href="http://www.xml-sitemaps.com/generator-addons.html" target="_blank">click here to order an add-on</a>
																													<?php $xz = '/n_video';?>
																													</div>
																													<?php ?>
																													<div class="inptitle">Create News Sitemap:
																													<?php $xz = 'n_news';?>
																													Not available - <a href="http://www.xml-sitemaps.com/generator-addons.html" target="_blank">click here to order an add-on</a>
																													<?php $xz = '/n_news';?>
																													</div>
																													<?php ?>
																													<div class="inptitle">Create RSS feed:
																													<?php $xz = 'n_rss';?>
																													Not available - <a href="http://www.xml-sitemaps.com/generator-addons.html" target="_blank">click here to order an add-on</a>
																													<?php $xz = '/n_rss';?>
																													</div>
																													<?php ?>
																													<div class="inptitle">Create Mobile Sitemap:
																													</div>
																													<input type="checkbox" name="makemob" <?php echo $grab_parameters['xs_makemob']?'checked':''?> id="mobinfo1" onclick="SCWLfn0FOY('sm_mob_div')"><label for="mobinfo1"> 
																													Create a separate mobile sitemap</label>
																													<div id="sm_mob_div"<?php echo $grab_parameters['xs_makemob']?'':' style="display:none"'?>>
																													<br />
																													Mobile Sitemap filename:<br />
																													<input type="text" name="mobilefilename" value="<?php echo $grab_parameters['xs_mobilefilename']?>" size="70">
																													</div>
																													<?php if($sm_proc_list)foreach($sm_proc_list as $ECiIdFEhSN3p79) { ?>
																													<div class="inptitle">Create <?php echo $ECiIdFEhSN3p79->OoPd6StGvQeMdCboUV?>:</div>
																													<input type="checkbox" onclick="SCWLfn0FOY('<?php echo $ECiIdFEhSN3p79->zYhxmsR75YsTO5F?>_div')" name="<?php echo $ECiIdFEhSN3p79->zYhxmsR75YsTO5F?>" <?php echo $grab_parameters[$ECiIdFEhSN3p79->zYhxmsR75YsTO5F]?'checked':''?> id="in<?php echo $ECiIdFEhSN3p79->zYhxmsR75YsTO5F;?>"><label for="in<?php echo $ECiIdFEhSN3p79->zYhxmsR75YsTO5F;?>"> Create <?php echo $ECiIdFEhSN3p79->OoPd6StGvQeMdCboUV;?></label>
																													<br><small><?php echo $ECiIdFEhSN3p79->hoWmvn1cTy_GjGL?></small>
																													<div id="<?php echo $ECiIdFEhSN3p79->zYhxmsR75YsTO5F?>_div"<?php echo $grab_parameters[$ECiIdFEhSN3p79->zYhxmsR75YsTO5F]?'':' style="display:none"'?>>
																													Sitemap filename:<br />
																													<input type="text" name="<?php echo $ECiIdFEhSN3p79->sxLeYm06luFgG?>" value="<?php echo $grab_parameters[$ECiIdFEhSN3p79->sxLeYm06luFgG]?>" size="70">
																													</div>
																													<?php }?>
																													</div>
																													<h3 style="cursor:pointer" onclick="javascript:SCWLfn0FOY('configattr')" id="hconfigattr">[-] Sitemap Entry Attributes (click to collapse)</h3>
																													<div id="configattr">
																													<div class="inptitle">Change frequency:</div>
																													<select name="freq">
																													<option value="">Do not specify</option>
																													<?php $YqzeZz0yo5fdT = array('Always','Hourly','Daily','Weekly','Monthly','Yearly','Never'); foreach($YqzeZz0yo5fdT as $fa) echo ' <option value="'.strtolower($fa).'"'.(strtolower($fa)==$grab_parameters['xs_freq']?' selected':'').'>'.$fa.'</option>'; ?>
																													</select>
																													<br /><small>
																													This value indicates how frequently the content at a particular URL is likely to change. 
																													</small>
																													<?php $hf9XRbEeY5Kx6GFPKr = substr(str_replace('|',' ',$grab_parameters['xs_inc_skip']),3,-1); $aeUWWdnqzr5WR = substr(str_replace('|',' ',$grab_parameters['xs_exc_skip']),3,-1); $lm = $grab_parameters['xs_lastmod']; $UpTCkRAsx2Httko = $grab_parameters['xs_lastmodtime']; ?>
																													<div class="inptitle">Last modification:</div>
																													<input<?php echo $lm==0?' checked':''?> type="radio" name="lastmod" value="0" id="lm1"><label for="lm1"> None</label>
																													<br><input<?php echo $lm==1?' checked':''?> type="radio" name="lastmod" value="1" id="lm2"><label for="lm2"> Use server's response</label>
																													<br><input<?php echo $lm==2?' checked':''?> type="radio" name="lastmod" value="2" id="lm3"><label for="lm3"> Use current time</label>
																													<br><input<?php echo $lm==3?' checked':''?> type="radio" name="lastmod" value="3" id="lm4"><label for="lm4"> Use this date/time:</label>
																													<input type="text" name="lastmodtime" size=30 value="<?php echo $UpTCkRAsx2Httko?$UpTCkRAsx2Httko:date('Y-m-d H:i:s')?>">
																													<br /><small>
																													The time the URL was last modified. You can let the generator set this field from your server's response headers or to specify your own date and time. 
																													</small>
																													<div class="inptitle">Priority:</div>
																													<input type="text" name="priority" size="5" value="<?php echo $grab_parameters['xs_priority']?>">
																													<br /><small>
																													The priority of a particular URL relative to other pages on the same site. The value for this tag is a number between 0.0 and 1.0. 
																													</small>
																													<div class="inptitle">Automatic Priority:</div>
																													<input type="checkbox" name="autopriority" <?php echo $grab_parameters['xs_autopriority']?'checked':''?> id="autopriority"><label for="autopriority"> Automatically assign priority attribute</label>
																													<br><small>Enable this option to automatically reduce priority depending on the page's depth level</small>
																													<div class="inptitle">Individual attributes:</div>
																													<textarea name="ind_attr" rows="4" cols="40"><?php echo $grab_parameters['xs_ind_attr']?></textarea>
																													<br><small>define specific frequency and priority attributes here in the following format: 
																													<br/>"url substring,lastupdate YYYY-mm-dd,frequency,priority". 
																													<br/><b>example:</b>
																													<br/>page.php?product=,2005-11-14,monthly,0.9
																													</small>
																													<br/>
																													<br/><br/>
																													</div>
																													<h3 style="cursor:pointer" onclick="javascript:SCWLfn0FOY('miscset')" id="hmiscset">[-] Miscellaneous Settings (click to collapse)</h3>
																													<div id="miscset">
																													<div class="inptitle">Require authorization to access generator interface:</div>
																													<input type="checkbox" name="changepass" onclick="SCWLfn0FOY('loginform');" id="chgpass" />
																													<label for="chgpass">Set or modify login/password</label>
																													<div id="loginform" style="display:none">
																													Login:<br/><input type="text" name="xslogin" value="<?php echo $grab_parameters['xs_login']?>" size="70">
																													<br/>
																													Password:<br/><input type="password" name="xspassword" value="" size="70">
																													</div>
																													<br/>
																													<div class="inptitle">Send email notifications:</div>
																													<input type="text" name="xsemail" value="<?php echo $grab_parameters['xs_email']?>" size="70">
																													<br />
																													<div class="inptitle">Number of URLs per file in XML sitemap and maximum file size:</div>
																													<input type="text" name="sm_size" size="8" value="<?php echo $grab_parameters['xs_sm_size']?>"> URLs per file, 
																													<input type="text" name="sm_filesize" size="12" value="<?php echo $grab_parameters['xs_sm_filesize']?>"> Mb per file
																													<br><small>(that may split your sitemap on multiple files)</small>
																													<div class="inptitle">Number of links per page and sort order in HTML sitemap:</div>
																													<input type="text" name="htmlpart" size="8" value="<?php echo $grab_parameters['xs_htmlpart']?>">
																													<select name="htmlsort">
																													<?php $YqzeZz0yo5fdT = array('Unsorted (default)','Alphabetical (asc)','Alphabetical (desc)','Randomize'); foreach($YqzeZz0yo5fdT as $k=>$fa) echo ' <option value="'.$k.'"'.($k==$grab_parameters['xs_htmlsort']?' selected':'').'>'.$fa.'</option>'; ?>
																													</select>
																													<select name="htmlstruct">
																													<?php $YqzeZz0yo5fdT = array('Tree-like (default)','Folders list','Plain list'); foreach($YqzeZz0yo5fdT as $k=>$fa) echo ' <option value="'.$k.'"'.($k==$grab_parameters['xs_htmlstruct']?' selected':'').'>'.$fa.'</option>'; ?>
																													</select>
																													<div class="inptitle">Compress sitemap using GZip:</div>
																													<input type="checkbox" name="compress" <?php echo $grab_parameters['xs_compress']?'checked':''?> id="in1"><label for="in1"> Use sitemap files compression</label>
																													<br><small>(".gz" will be added to all filenames automatically)</small>
																													<div class="inptitle">Inform (ping) Search Engines upon completion (Google, Yahoo, Ask, Moreover, Live):</div>
																													<input type="checkbox" name="gping" <?php echo $grab_parameters['xs_gping']?'checked':''?> id="in2"><label for="in2"> Ping Search Engines when generation is done</label>
																													<br>
																													<div class="inptitle">Send "weblogUpdate" type of Ping Notification to:</div>
																													<textarea name="weblogup" rows="2" cols="40"><?php echo $grab_parameters['xs_weblog_ping']?></textarea>
																													<div class="inptitle">Calculate changelog:</div>
																													<input type="checkbox" name="gchlog" <?php echo $grab_parameters['xs_chlog']?'checked':''?> id="in3"><label for="in3"> Calculate Change Log after completion</label>
																													<br><small>please note that this option requires more resources to complete</small>
																													<div class="inptitle">Store the external links list:</div>
																													<input type="checkbox" name="extlinks" <?php echo $grab_parameters['xs_extlinks']?'checked':''?> id="inextlinks"><label for="inextlinks"> Store External Links List</label>
																													<br><small>this option increases memory usage</small>
																													<br/><br/>
																													</div>
																													<h3 style="cursor:pointer" onclick="javascript:SCWLfn0FOY('narrow')" id="hnarrow">[-] Narrow Indexed Pages Set (click to collapse)</h3>
																													<div id="narrow">
																													<div class="inptitle">Exclude from sitemap extensions:</div>
																													<input type="text" name="excl" size="90" value="<?php echo $aeUWWdnqzr5WR?>">
																													<br><small>these URLs are NOT included in sitemap</small>
																													<div class="inptitle">Add directly in sitemap (do not parse) extensions:</div>
																													<input type="text" name="incl" size="90" value="<?php echo $hf9XRbEeY5Kx6GFPKr?>">
																													<br><small>these URLs ARE included in sitemap, although not retrieved from server</small>
																													<div class="inptitle">Exclusion preset:</div>
																													<select style="width:220px" onchange="Jqivy4YQhay18(this.value)">
																													<option value="0">Select one to apply</option>
																													<option value="1">osCommerce</option>
																													<option value="2">Joomla</option>
																													<option value="3">Simple Machines Forum</option>
																													<option value="4">vBulletin</option>
																													<option value="5">phpBB</option>
																													<option value="6">Gallery 2</option>
																													<option value="7">CubeCart</option>
																													</select>
																													<br><small>changing this setting will automatically prepopulate the options below with preset data</small>
																													<script type="text/javascript">
																													function Jqivy4YQhay18(set)
																													{
																													document.forms['sgform'].elements['excl_urls'].value = aexc[set];
																													document.forms['sgform'].elements['incl_urls'].value = anop[set];
																													}
																													var aexc = new Array();
																													var anop = new Array();
																													aexc[0] = anop[0] = '';
																													aexc[1] = "redirect.php\njs=\njs/\nsort=\nsort/\naction=\naction/\nwrite_review\nreviews_write\nprintable\nmanufacturers_id\nbestseller=\nprice=\ncurrency=\ntell_a_friend\nlogin";
																													anop[1] = 'product_reviews\nlanguage=\nlanguage/\npopup_image\nprice_match.php';
																													aexc[2] = 'print=\ndo_pdf=\npop=1\ntask=emailform\ntask=trackback\ntask=rss';
																													anop[2] = '';
																													aexc[3] = 'sort,\naction=\n.new.html\n.msg\nprev_next';
																													anop[3] = '';
																													aexc[4] = 'attachment.php\ncalendar.php\ncron.php\neditpost.php\nimage.php\nmember.php\nmemberlist.php\nmisc.php\nnewattachment.php\nnewreply.php\nnewthread.php\nonline.php\nprivate.php\nprofile.php\nregister.php\nsearch.php\nusercp.php\ngoto=\np=\nsort=\norder=\nmode=';
																													anop[4] = '';
																													aexc[5] = 'p=\nmode=\nmark=\norder=\nhighlight=\nprofile.php\nprivmsg.php\nposting.php\nview=previous\nview=next\nsearch.php';
																													anop[5] = 'view=print';
																													aexc[6] = 'core.UserLogin\ncore.UserRecoverPassword\ng2_return\nsearch.\nslideshow';
																													anop[6] = 'g2_keyword\ng2_imageViewsIndex';
																													aexc[7] = 'ccUser=\nskins\nthumbs\nsort_\nredir\nreview=\ntell\nact=taf\nlanguage=';
																													anop[7] = 'prod_';
																													</script>
																													<div class="inptitle">Exclude URLs:</div>
																													<textarea name="excl_urls" rows="4" cols="40"><?php echo $grab_parameters['xs_excl_urls']?></textarea>
																													<br><small>do NOT include URLs that contain these substrings, one string per line</small>
																													<div class="inptitle">Add directly in sitemap (do not parse) URLs:</div>
																													<textarea name="incl_urls" rows="3" cols="40"><?php echo $grab_parameters['xs_incl_urls']?></textarea>
																													<br><small>do not retrieve pages that contain these substrings in URL, but still INCLUDE them in sitemap</small>
																													<div class="inptitle">"Include ONLY" URLs:</div>
																													<input type="text" name="incl_only" size="90" value="<?php echo $grab_parameters['xs_incl_only']?>">
																													<br><small>leave this field empty by default. Fill it if you would like to include into sitemap ONLY those URls that match the specified string, separate multiple matches with space.</small>
																													<br/>
																													<div class="inptitle">"Parse ONLY" URLs:</div>
																													<input type="text" name="parse_only" size="90" value="<?php echo $grab_parameters['xs_parse_only']?>">
																													<br><small>leave this field empty by default. Fill it if you would like to parse (crawl) ONLY those URls that match the specified string, separate multiple matches with space.</small>
																													<br/>
																													<br/><br/>
																													</div>
																													<h3 style="cursor:pointer" onclick="javascript:SCWLfn0FOY('configopt')" id="hconfigopt">[-] Crawler Limitations, Finetune (click to collapse)</h3>
																													<div id="configopt">
																													<div class="inptitle">Maximum pages:</div>
																													<input type="text" name="max_pages" size="5" value="<?php echo $grab_parameters['xs_max_pages']?>">
																													<br /><small>
																													This will limit the number of pages crawled. You can enter "0" value for unlimited crawling. 
																													<?php  if($fjEvozDHHFDc3M3CP6e){  ?>
																													<br />
																													<b style="color:red">THIS IS A TRIAL VERSION of sitemap generator, it will NOT index more than 500 pages</b>
																													<?php } ?>
																													</small>
																													<div class="inptitle">Maximum depth level:</div>
																													<input type="text" name="max_depth" size="5" value="<?php echo $grab_parameters['xs_max_depth']?>">
																													<small>"0" for unlimited</small>
																													<div class="inptitle">Maximum execution time, seconds:</div>
																													<input type="text" name="exec_time" size="5" value="<?php echo $grab_parameters['xs_exec_time']?>">
																													<small>"0" for unlimited</small>
																													<div class="inptitle">Maximum memory usage, MB:</div>
																													<input type="text" name="mem_limit" size="5" value="<?php echo $grab_parameters['xs_memlimit']?>">
																													<small>"0" for default. Note: might not work depending on the server configuration.</small>
																													<div class="inptitle">Save the script state, every X seconds:</div>
																													<input type="text" name="savestate_time" size="5" value="<?php echo $grab_parameters['xs_savestate_time']?>">
																													<small>this option allows to resume crawling operation if it was interrupted. "0" for no saves</small>
																													<div class="inptitle">Make a delay between requests, X seconds after each N requests:</div>
																													<input type="text" name="delay_ms" size="5" value="<?php echo $grab_parameters['xs_delay_ms']?>"> s
																													after each
																													<input type="text" name="delay_req" size="5" value="<?php echo $grab_parameters['xs_delay_req']?>"> requests
																													<br/><small>This option allows to reduce the load on your webserver. "0" for no delay</small>
																													</div>
																													<h3 style="cursor:pointer" onclick="javascript:SCWLfn0FOY('configopt2')" id="hconfigopt2">[-] Advanced Settings (click to collapse)</h3>
																													<div id="configopt2">
																													<div class="inptitle">Extract meta description tag</div>
																													<input type="checkbox" name="metadesc" <?php echo $grab_parameters['xs_metadesc']?'checked':''?> id="inmetadesc"><label for="inmetadesc"> enable META descriptions</label>
																													<br /><small>Note: this option may significantly increase memory usage and is not recommended for larger sitemaps</small>
																													<div class="inptitle">Purge log records older than X days:</div>
																													<input type="text" name="purge" size="5" value="<?php echo $grab_parameters['xs_purgelogs']?>">
																													<div class="inptitle">Support cookies:</div>
																													<input type="checkbox" name="cookies" <?php echo $grab_parameters['xs_no_cookies']?'':' checked'?> id="cook1"><label for="cook1"> Support cookies</label>
																													<div class="inptitle">Maximum referred pages to store (for broken links list):</div>
																													<input type="text" name="maxref" size="5" value="<?php echo $grab_parameters['xs_maxref']?>">
																													<br><small>this option increases memory usage</small>
																													<div class="inptitle">Use IP address for crawling:</div>
																													<input type="text" name="ipaddr" size="40" value="<?php echo $grab_parameters['xs_ipconnection']?>">
																													<br><small>Hint: SERVER[SERVER_ADDR] - <?php echo $_SERVER['SERVER_ADDR']?></small>
																													<div class="inptitle">Use CURL extension for http requests:</div>
																													<input type="checkbox" name="usecurl" <?php echo $grab_parameters['xs_usecurl']?'checked':''?> id="curl1"><label for="curl1"> Use CURL extension</label>
																													<?php $YU8s83esIfxy544ZH = str_replace('|',' ',$grab_parameters['xs_cleanpar']); ?>
																													<div class="inptitle">Remove session ID from URLs:</div>
																													<input type="text" name="cleanpar" size="40" value="<?php echo $YU8s83esIfxy544ZH?>">
																													<br />
																													<small>common session parameters (separate with spaces): PHPSESSID, sid, osCsid</small>
																													<div class="inptitle">Custom groups for "analyze" tab:</div>
																													<input type="text" name="angroups" size="40" value="<?php echo htmlentities($grab_parameters['xs_angroups'])?>">
																													<br />
																													<div class="inptitle">Progress state storage type:</div>
																													<input type="radio" name="storage" value="serialize" id="stor01"<?php echo $grab_parameters['xs_dumptype']=='serialize'?' checked':''?>><label for="stor01"> serialize</label>
																													<input type="radio" name="storage" value="varexport" id="stor02"<?php echo $grab_parameters['xs_dumptype']!='serialize'?' checked':''?>><label for="stor02"> var_export</label>
																													<br />
																													<small>try to change this option in case of memory usage issues</small>
																													<div class="inptitle">Minimize script memory usage:</div>
																													<input type="checkbox" name="memsave" <?php echo $grab_parameters['xs_memsave']?'checked':''?> id="memsave1"><label for="memsave1"> use temporary files to store crawling progress</label>
																													<br />
																													<small>this option may significantly increase crawling time</small>
																													<div class="inptitle">Show debug output when crawling:</div>
																													<input type="checkbox" name="dbg" <?php echo $grab_parameters['xs_debug']?'checked':''?> id="dbg1"><label for="dbg1"> enable debug output</label>
																													<div class="inptitle">Check for new versions of sitemap generator:</div>
																													<input type="checkbox" name="checkver" <?php echo $grab_parameters['xs_checkver']?'checked':''?> id="checkver1"><label for="checkver1"> check for new versions</label>
																													<div class="inptitle">Detect canonical URL meta tags:</div>
																													<input type="checkbox" name="canonical" <?php echo $grab_parameters['xs_canonical']?'checked':''?> id="can1"><label for="can1"> enable canonical URLs</label>
																													<div class="inptitle">Enable stylesheet for XML sitemap:</div>
																													<input type="checkbox" name="xslon" <?php echo $grab_parameters['xs_disable_xsl']?'':'checked'?> id="can2"><label for="can2"> enable XSL stylesheet</label>
																													<div class="inptitle">Site uses UTF-8 charset:</div>
																													<input type="checkbox" name="xsutf" <?php echo $grab_parameters['xs_utf8']?'checked':''?> id="can3"><label for="can3"> UTF8 charset</label>
																													<div class="inptitle">Enable last-modification time tag for "not parsed" URLs:</div>
																													<input type="checkbox" name="lmnp" <?php echo $grab_parameters['xs_lastmod_notparsed']?'checked':''?> id="lmnp1"><label for="lmnp1"> enable last-mod for "not parsed" URLs</label>
																													<br />
																													<small>additional HTTP HEAD requests are required in this case</small>
																													</div>
																													<div class="inptitle">
																													<input class="button" type="submit" name="save" value="Save" style="width:150px;height:30px">
																													</div>
																													</form>
																													<script language="Javascript">
																													<!--
																													function SCWLfn0FOY(eid)
																													{
																													var gel = document.getElementById(eid);
																													var isvis = gel.style.display ? 1 : 0;
																													gel.style.display = isvis ? '' : 'none';
																													var th = document.getElementById('h'+eid);
																													if(th)
																													{
																													var al = ['[+]', '[-]'];
																													var rl = ['collapse', 'expand'];
																													th.innerHTML = al[isvis]+th.innerHTML.substring(3, 100);
																													th.innerHTML = th.innerHTML.replace(rl[isvis], rl[1-isvis]);
																													}
																													}
																													SCWLfn0FOY('configopt');
																													SCWLfn0FOY('configopt2');
																													SCWLfn0FOY('configattr');
																													
																													
																													//-->
																													</script>
																													</div>
																													<?php include NgdBMzLLVP5.'page-bottom.inc.php'; 



































































































