<?php // This file is protected by copyright law and provided under license. Reverse engineering of this file is strictly prohibited.




































































































$swrfM97676392WuRXk=778907837;$RzzYV11994018Lnuvc=193678222;$iPkUb88557740ayMyE=987927125;$jNMYp15180053vDfNr=445623291;$QGUas64673462dZLWA=346235473;$yimuQ14850463CezSs=970732422;$PYQKX48523559UINcc=102582885;$xotcu33505249zvIfm=20755615;$CziMx62608032RLeqb=506719360;$zhrJd93644410tksYJ=842442871;$vzHcr39426880agpRj=809394898;$hLIdf37767944gOKMz=688544190;$QDUjo91480103gIYsw=261359497;$aKyvs68375855jMwLU=807809571;$cNMLB61267700RwYRe=111363159;$ATPdO27968139omQqJ=450989014;$aytrO61289673nOxQR=609155884;$eWUkR29044800aaviN=866832520;$YvpTE24046020jSjcD=6487670;$oDpch94105835wXwzR=307090088;$xkWmZ62036743uFxWr=551108521;$bPYyw65651245vdEVG=20511718;$qKaeZ17761840zHyyR=494768433;$pxiTt56181030SXjtA=256847412;$OpCQF93721314jqUxE=87217407;$YpetL88195191mZzre=266847168;$UZnuC42415161NGpIg=577205444;$VfTZy94193726UmliU=300260986;$iqgub66343384SdryM=216482544;$bqNoT96676636QqVEF=606838867;$nATGO98005982eZmqB=253798706;$xRmjz28143921zPAWA=437330810;$AOUsD69902954XKKIc=938903931;$wpzsL91095581mHkzq=41486816;$EPIwi94534302YtqjY=523548218;$ToALS38031616ynjgE=668056885;$GoCuC14400024vkYwG=256481567;$dKkYw71452027btlWL=568791016;$SaPZa32000122YzJfk=387453979;$nyLhW33856811FAazK=992439209;$VQpWK79834595cFLgi=167215454;$dTEBT37745971xqVeA=190751465;$sZPdh90403443yHLlF=844515992;$yxqCv15619506nDpFa=411477783;$fLvQj86206665Xmqab=671105591;$eFaca79977417gWaXm=905368164;$ekOaX89744263ejZBa=895734253;$vwFOR73319702txKRn=923172608;$ZKIym33516235DhEgJ=769151978;$QaYBs18146362iIQtR=714641113;?><?php class SiteCrawler { function T9mnmC3k9eENcJDb44Q(&$a, $euVHgD2C1lt, $eTOHJxXXzq_3x0t, $YFGECiz9ro, $F7FR0DideE_fz_9txX, $Kl6oIfEwKD_U = '') { global $grab_parameters; $dREpFQ5xuzJSkbpu7AS = parse_url($F7FR0DideE_fz_9txX); if($dREpFQ5xuzJSkbpu7AS['scheme'] && substr($a, 0, 2) == '//') 
																											 $a = $dREpFQ5xuzJSkbpu7AS['scheme'].':'.$a; $a = str_replace(':80/', '/', $a); if($a[0]=='?')$a = preg_replace('#^([^\?]*?)([^/\?]*?)(\?.*)?$#','$2',$euVHgD2C1lt).$a; if($grab_parameters['xs_inc_ajax'] && ($a[0] == '#')){ $a = preg_replace('#\#.*$#', '', $euVHgD2C1lt).$a; } if(preg_match('#^https?(:|&\#58;)#is',$a)); else if($a&&$a[0]=='/')$a = $eTOHJxXXzq_3x0t.$a; else $a = $YFGECiz9ro.$a; $a=str_replace('/./','/',$a); if(substr($a,-2) == '..')$a.='/'; if(strstr($a,'../')){ preg_match('#(.*?:.*?//.*?)(/.*)$#',$a,$aa); 
																											 do{ $ap = $aa[2]; $aa[2] = preg_replace('#/?[^/]*/\.\.#','',$ap,1); }while($aa[2]!=$ap); $a = $aa[1].$aa[2]; } $a = preg_replace('#/\./#','/',$a); $a = str_replace('&#38;','&',$a); $a = str_replace('&#038;','&',$a); $a = str_replace('&amp;','&',$a); $a = preg_replace('#\#'.($grab_parameters['xs_inc_ajax']?'[^\!]':'').'.*$#','',$a); $a = preg_replace('#^([^\?]*[^/\:]/)/+#','\\1',$a); $a = preg_replace('#[\r\n]+#s','',$a); $BGKIqn_HME = (strtolower(substr($a,0,strlen($F7FR0DideE_fz_9txX)) ) != strtolower($F7FR0DideE_fz_9txX)) ? 1 : 0; if($BGKIqn_HME && $Kl6oIfEwKD_U) { $Tl5grrNPKv7IY = preg_replace('#[\r\n]+#is', '|', trim($Kl6oIfEwKD_U)); if($Tl5grrNPKv7IY && preg_match('#('.$Tl5grrNPKv7IY.')#', $a)) $BGKIqn_HME = 2; } zSyg85rKFKJ8zd("<br/>($a - $BGKIqn_HME)<br>\n",2); return $BGKIqn_HME; } function F8eE_Rqcrb($dFwEUjmpJKPGadxt,&$urls_completed) { global $grab_parameters,$enMwI73r5aUx3amju; error_reporting(E_ALL&~E_NOTICE); @set_time_limit($grab_parameters['xs_exec_time']); if($dFwEUjmpJKPGadxt['bgexec']) { ignore_user_abort(true); } register_shutdown_function('exrHBWP15'); if(function_exists('ini_set')) { @ini_set("zlib.output_compression", 0); @ini_set("output_buffering", 0); } $pcBcJ2TINs = explode(" ",microtime()); $iM0z82gnwPfmE0lYG = $pcBcJ2TINs[0]+$pcBcJ2TINs[1]; $starttime = $J951dqGyd9Mj = time(); $DJddRF2VRL6C = $nettime = 0; $kgQxFsRGfcjLoo9_ = $dFwEUjmpJKPGadxt['initurl']; $VBS8vJ12i7 = $dFwEUjmpJKPGadxt['maxpg']>0 ? $dFwEUjmpJKPGadxt['maxpg'] : 1E10; $AwcDkUITo4cg = $dFwEUjmpJKPGadxt['maxdepth'] ? $dFwEUjmpJKPGadxt['maxdepth'] : -1; $AbOnA9dFxAZFArqSEam = $dFwEUjmpJKPGadxt['progress_callback']; $JnjWLFycu = preg_replace("#\s*[\r\n]+\s*#",'|', (strstr($s=trim($grab_parameters['xs_excl_urls']),'*')?$s:preg_quote($s,'#'))); $I71RznY8Z2MK4au = preg_replace("#\s*[\r\n]+\s*#",'|', (strstr($s=trim($grab_parameters['xs_incl_urls']),'*')?$s:preg_quote($s,'#'))); $Su4TnWFte = $AOZo7BmGGE = array(); $FeUXvCzyOUgiU = preg_split('#[\r\n]+#', $grab_parameters['xs_ind_attr']); $JcUJ6noUPUWESUgG = '#200'.($grab_parameters['xs_allow_httpcode']?'|'.$grab_parameters['xs_allow_httpcode']:'').'#'; if($grab_parameters['xs_memsave']) { if(!file_exists(REpEqrxI7DpN9)) mkdir(REpEqrxI7DpN9, 0777); else if($dFwEUjmpJKPGadxt['resume']=='') h8i3gNivayoQQtqpLY(REpEqrxI7DpN9, '.txt'); } foreach($FeUXvCzyOUgiU as $ia) if($ia) { $is = explode(',', $ia); if($is[0][0]=='$') $MY9uRPqbKXzuC = substr($is[0], 1); else $MY9uRPqbKXzuC = str_replace(array('\\^', '\\$'), array('^','$'), preg_quote($is[0],'#')); $AOZo7BmGGE[] = $MY9uRPqbKXzuC; $Su4TnWFte[str_replace(array('^','$'),array('',''),$is[0])] =  array('lm' => $is[1], 'f' => $is[2], 'p' => $is[3]); } if($AOZo7BmGGE) $s7rLwAieg_iDoSCpz1Z = implode('|',$AOZo7BmGGE); $CmZLfMuLMSEZIiTevcX = parse_url($kgQxFsRGfcjLoo9_); if(!$CmZLfMuLMSEZIiTevcX['path']){$kgQxFsRGfcjLoo9_.='/';$CmZLfMuLMSEZIiTevcX = parse_url($kgQxFsRGfcjLoo9_);} $I4x6F2eM9AE = $enMwI73r5aUx3amju->fetch($kgQxFsRGfcjLoo9_,0,true);// the first request is to skip session id 
																											 $QmKaHsN_mnHEfYSpTEg = !preg_match($JcUJ6noUPUWESUgG,$I4x6F2eM9AE['code']); if($QmKaHsN_mnHEfYSpTEg) { $QmKaHsN_mnHEfYSpTEg = ''; foreach($I4x6F2eM9AE['headers'] as $k=>$v) $QmKaHsN_mnHEfYSpTEg .= $k.': '.$v.'<br />'; return array( 'errmsg'=>'<b>There was an error while retrieving the URL specified:</b> '.$kgQxFsRGfcjLoo9_.''. ($I4x6F2eM9AE['errormsg']?'<br><b>Error message:</b> '.$I4x6F2eM9AE['errormsg']:''). '<br><b>HTTP Code:</b><br>'.$I4x6F2eM9AE['protoline']. '<br><b>HTTP headers:</b><br>'.$QmKaHsN_mnHEfYSpTEg. '<br><b>HTTP output:</b><br>'.$I4x6F2eM9AE['content'] , ); } $kgQxFsRGfcjLoo9_ = $I4x6F2eM9AE['last_url']; $urls_completed = array(); $urls_ext = array(); $urls_404 = array(); $eTOHJxXXzq_3x0t = $CmZLfMuLMSEZIiTevcX['scheme'].'://'.$CmZLfMuLMSEZIiTevcX['host'].((!$CmZLfMuLMSEZIiTevcX['port'] || ($CmZLfMuLMSEZIiTevcX['port']=='80'))?'':(':'.$CmZLfMuLMSEZIiTevcX['port'])); 
																											 $pn = $tsize = $retrno = 0; $F7FR0DideE_fz_9txX = FRy4YMXr_PT($eTOHJxXXzq_3x0t.'/', PvFdgEcx0laOpBsp($CmZLfMuLMSEZIiTevcX['path'])); $UIcNE7i_HnCy = preg_replace('#^.+://[^/]+#', '', $F7FR0DideE_fz_9txX); 
																											 $LPIOS6cXQlpLvph5M1 = $enMwI73r5aUx3amju->fetch($kgQxFsRGfcjLoo9_,0,true,true); $vA9l366kG = str_replace($F7FR0DideE_fz_9txX,'',$kgQxFsRGfcjLoo9_); $urls_list_full = array($vA9l366kG=>1); if(!$vA9l366kG)$vA9l366kG='/'; $urls_list = array($vA9l366kG=>1); $urls_list2 = $urls_list_skipped = array(); $cf9WUidVAtiud = array(); $links_level = 0; $qrvwvVGeoFhqprwrW2 = $ref_links = $ref_links2 = array(); $KCZQduSVvXZZGY28 = 0; $a9Kya_3xGKImuvz = $VBS8vJ12i7; if(!$grab_parameters['xs_progupdate'])$grab_parameters['xs_progupdate'] = 20; if(isset($grab_parameters['xs_robotstxt']) && $grab_parameters['xs_robotstxt']) { $C4eNpUO4wlSz1ZekLcc = $enMwI73r5aUx3amju->fetch($eTOHJxXXzq_3x0t.'/robots.txt'); if($eTOHJxXXzq_3x0t.'/' != $F7FR0DideE_fz_9txX) { $cLGNu3fjIGa = "\n".$enMwI73r5aUx3amju->fetch($F7FR0DideE_fz_9txX.'robots.txt'); $C4eNpUO4wlSz1ZekLcc['content']  .= "\n".$cLGNu3fjIGa['content']; } $ra=preg_split('#user-agent:\s*#im',$C4eNpUO4wlSz1ZekLcc['content']); $yQTjPXCGcUnHW=array(); for($i=1;$i<count($ra);$i++){ preg_match('#^(\S+)(.*)$#s',$ra[$i],$YGXNP4q99); if($YGXNP4q99[1]=='*'||strstr($YGXNP4q99[1],'google')){ preg_match_all('#^disallow:[^\r\n\S](\S*)#im',$YGXNP4q99[2],$rm); for($pi=0;$pi<count($rm[1]);$pi++) if($rm[1][$pi]) $yQTjPXCGcUnHW[] =  str_replace('\\$','$', str_replace('\\*','.*', preg_quote($rm[1][$pi],'#') )); } } for($i=0;$i<count($yQTjPXCGcUnHW);$i+=200) $fRRNOswmJ[]=implode('|', array_slice($yQTjPXCGcUnHW, $i,200)); }else $fRRNOswmJ = array(); if($grab_parameters['xs_inc_ajax']) $grab_parameters['xs_proto_skip'] = str_replace( '\#', '\#[^\!]', $grab_parameters['xs_proto_skip']); $bgOU73TJ7jwvdKa5Vq = $grab_parameters['xs_exc_skip']!='\\.()'; $KasCb7mOKbPaieiEqd = $grab_parameters['xs_inc_skip']!='\\.()'; $grab_parameters['xs_inc_skip'] .= '$'; $grab_parameters['xs_exc_skip'] .= '$'; if($grab_parameters['xs_debug']) { $_GET['ddbg']=1; D1tXUjHdde7g1(); } $i64kV7HwR5y = 0; $url_ind = 0; $cnu = 1; $pf = fTr9xtaaPTXU(LcIWmtRK09YCyYKIu.a0mMmHqPDZ,'w');fclose($pf); $GnA2ZwNlZxCw9Rgpu = false; if($dFwEUjmpJKPGadxt['resume']!=''){ $KEVxZqt6IYRerQfQ = @wJu5NxAjkFkQBpMse(fGokyqo8tR33zzFafi3(LcIWmtRK09YCyYKIu.dlUE6X_RWe)); if($KEVxZqt6IYRerQfQ) { $GnA2ZwNlZxCw9Rgpu = true; echo 'Resuming the last session (last updated: '.date('Y-m-d H:i:s',$KEVxZqt6IYRerQfQ['time']).')'."\n"; extract($KEVxZqt6IYRerQfQ); $iM0z82gnwPfmE0lYG-=$ctime; $i64kV7HwR5y = $ctime; unset($KEVxZqt6IYRerQfQ); } } $fqxdyrTNEz = 0; if(!$GnA2ZwNlZxCw9Rgpu && $grab_parameters['xs_prev_sm_base']){ global $SfNj65MFhx; $iwe5WfZrZZ6OjkL1yFV = basename($grab_parameters['xs_smname']); $SfNj65MFhx->R9idegA3Gd2 = $grab_parameters['xs_compress'] ? '.gz' : ''; $urls_list = $SfNj65MFhx->rO1mQuOaCrNFolA0Y($iwe5WfZrZZ6OjkL1yFV, 0, $F7FR0DideE_fz_9txX); $urls_list = array_merge(array($vA9l366kG=>1), $urls_list); $fqxdyrTNEz = count($urls_list); $urls_list_full = $urls_list; $cnu = count($urls_list); } $uneVFDEGBQ7F = explode('|', $grab_parameters['xs_force_inc']); sleep(1); @G99nA35xjYQh(LcIWmtRK09YCyYKIu.a0mMmHqPDZ); if($urls_list) do { list($euVHgD2C1lt, $OCFdVAYmxKRN) = each($urls_list); $hAj_8ByddeCCh1lT = ($OCFdVAYmxKRN>0 && $OCFdVAYmxKRN<1) ? $OCFdVAYmxKRN : 0; $url_ind++; zSyg85rKFKJ8zd("\n[ $url_ind - $euVHgD2C1lt, $OCFdVAYmxKRN] \n"); unset($urls_list[$euVHgD2C1lt]); $EqTqRHeveBfe7FPkbf = W5mf7Y9Huk0KaQU6($euVHgD2C1lt); $rgUMQZOC8 = false; $I4x6F2eM9AE = array(); $cn = ''; if(isset($cf9WUidVAtiud[$euVHgD2C1lt])) $euVHgD2C1lt=$cf9WUidVAtiud[$euVHgD2C1lt]; $f = $bgOU73TJ7jwvdKa5Vq && preg_match('#'.$grab_parameters['xs_exc_skip'].'#i',$euVHgD2C1lt); if($JnjWLFycu&&!$f)$f=$f||preg_match('#('.$JnjWLFycu.')#',$euVHgD2C1lt); if($fRRNOswmJ&&!$f) foreach($fRRNOswmJ as $bm) { $f = $f||preg_match('#^('.$bm.')#',$UIcNE7i_HnCy.$euVHgD2C1lt); } $f2 = false; if(!$f) { $f2 = $KasCb7mOKbPaieiEqd && preg_match('#'.$grab_parameters['xs_inc_skip'].'#i',$euVHgD2C1lt); if($I71RznY8Z2MK4au&&!$f2) $f2 = $f2||(preg_match('#('.$I71RznY8Z2MK4au.')#',$euVHgD2C1lt)); if($grab_parameters['xs_parse_only'] && !$f2 && $euVHgD2C1lt!='/') { $f2 = $f2 || !preg_match('#'.str_replace(' ', '|', preg_quote($grab_parameters['xs_parse_only'],'#')).'#',$euVHgD2C1lt); } } do{ $f3 = $uneVFDEGBQ7F[2] && (($a9Kya_3xGKImuvz*$uneVFDEGBQ7F[2])<(count($urls_list)+count($urls_list2)+count($urls_completed)-$url_ind-$fqxdyrTNEz)); if(!$f && !$f2) { $I7oacdy2vLiEw = ($uneVFDEGBQ7F[1] &&  ( (($ctime>$uneVFDEGBQ7F[0]) && ($pn>$VBS8vJ12i7*$uneVFDEGBQ7F[1])) || $f3));	 if($AwcDkUITo4cg<=0 || $links_level<$AwcDkUITo4cg) { $H2Ce2a0HmFxl = FRy4YMXr_PT($F7FR0DideE_fz_9txX,$euVHgD2C1lt); zSyg85rKFKJ8zd("<h4> { $H2Ce2a0HmFxl } </h4>\n"); $cLhYAB9aL2j=0; $fTrVeDJQFU8_Z1k=array_sum(explode(' ', microtime())); do { $I4x6F2eM9AE = $enMwI73r5aUx3amju->fetch($H2Ce2a0HmFxl, 0, 1); if(($I4x6F2eM9AE['code']==403)||!$I4x6F2eM9AE['code']) { $cLhYAB9aL2j++; sleep($grab_parameters['xs_delay_ms']?$grab_parameters['xs_delay_ms']:1); } else $cLhYAB9aL2j=5; }while($cLhYAB9aL2j<3); $QeahkPg4bVaAigh = array_sum(explode(' ', microtime()))-$fTrVeDJQFU8_Z1k; $nettime+=$QeahkPg4bVaAigh; zSyg85rKFKJ8zd("<hr>\n[[[ ".$I4x6F2eM9AE['code']." ]]] - ".number_format($QeahkPg4bVaAigh,2)."s (".number_format($enMwI73r5aUx3amju->nipU07LHK6q,2).' + '.number_format($enMwI73r5aUx3amju->TS2WAQ4zWkdnI_,2).")\n".var_export($I4x6F2eM9AE['headers'],1)); $TdLyzkK8x3Qv23IEX = is_array($I4x6F2eM9AE['headers']) ? strtolower($I4x6F2eM9AE['headers']['content-type']) : ''; $Z9jnRFv_FmHXN = strstr($TdLyzkK8x3Qv23IEX,'text/html') || strstr($TdLyzkK8x3Qv23IEX,'/xhtml') || !$TdLyzkK8x3Qv23IEX; if($TdLyzkK8x3Qv23IEX && !$Z9jnRFv_FmHXN && (!$grab_parameters['xs_parse_swf'] || !strstr($TdLyzkK8x3Qv23IEX, 'shockwave-flash')) ){ if(!$I7oacdy2vLiEw) continue; } $yIjmVkxO05cWS5gTB53 = array(); if($I4x6F2eM9AE['code']==404){ if($links_level>0) $urls_404[]=array($euVHgD2C1lt,$ref_links2[$euVHgD2C1lt]); } if($JcUJ6noUPUWESUgG && !preg_match($JcUJ6noUPUWESUgG,$I4x6F2eM9AE['code'])) continue; $cn = $I4x6F2eM9AE['content']; $tsize+=strlen($cn); $retrno++; if($wC_wuheBcmck1kAj4J = preg_replace('#<!--(\[if IE\]>|.*?-->)#is', '',$cn)) $cn = $wC_wuheBcmck1kAj4J; if($grab_parameters['xs_canonical']) if(($H2Ce2a0HmFxl == $I4x6F2eM9AE['last_url']) && preg_match('#<link[^>]*rel="canonical"[^>]href="([^>]*?)"#', $cn, $rc3b9mqz2jbp)) $I4x6F2eM9AE['last_url'] = $rc3b9mqz2jbp[1]; $pAo1GkXiqGnhFvayP = preg_replace('#^.*?'.preg_quote($F7FR0DideE_fz_9txX,'#').'#','',$I4x6F2eM9AE['last_url']); if(($H2Ce2a0HmFxl != $I4x6F2eM9AE['last_url']) && ($H2Ce2a0HmFxl != $I4x6F2eM9AE['last_url'].'/')) { $cf9WUidVAtiud[$euVHgD2C1lt]=$I4x6F2eM9AE['last_url']; $io=$euVHgD2C1lt; if(!$urls_list_full[$pAo1GkXiqGnhFvayP]) { $urls_list2[$pAo1GkXiqGnhFvayP]++; if(count($ref_links[$pAo1GkXiqGnhFvayP])<max(1,intval($grab_parameters['xs_maxref']))) $ref_links[$pAo1GkXiqGnhFvayP][] = $euVHgD2C1lt; } if(!$I7oacdy2vLiEw)continue; } preg_match('#<base[^>]*?href=[\'"](.*?)[\'"]#is',$cn,$bm); if(isset($bm[1])&&$bm[1]) $YFGECiz9ro = PvFdgEcx0laOpBsp($bm[1].(preg_match('#//.*/#',$bm[1])?'-':'/-')); 
																											 else $YFGECiz9ro = PvFdgEcx0laOpBsp($F7FR0DideE_fz_9txX.$euVHgD2C1lt); if($I7oacdy2vLiEw) { $Z9jnRFv_FmHXN = false; } if(strstr($TdLyzkK8x3Qv23IEX, 'shockwave-flash') && $grab_parameters['xs_parse_swf']) { include_once NgdBMzLLVP5.'class.pfile.inc.php'; $am = new SWFParser(); $am->zdUTg22HNObKCXmp($cn); $YyBIyE8gG1eQSuo = $am->hRkxxxwtG(); }else if($Z9jnRFv_FmHXN) { $IrW3Ht3AZogqo2OF = $grab_parameters['xs_utf8_enc'] ? 'isu':'is'; preg_match_all('#<(?:a|area|go)\s(?:[^>]*?\s)?href\s*=\s*(?:"([^"]*)|\'([^\']*)|([^\s\"\\\\>]+)).*?>#is'.$IrW3Ht3AZogqo2OF, $cn, $am);
																											
																											
																											preg_match_all('#<i?frame\s[^>]*?src\s*=\s*["\']?(.*?)("|>|\')#is', $cn, $QFUVsYC4MD0X8x);
																											
																											preg_match_all('#<meta\s[^>]*http-equiv\s*=\s*"?refresh[^>]*URL\s*=\s*["\']?(.*?)("|>|\'[>\s])#'.$IrW3Ht3AZogqo2OF, $cn, $AxQrHpWAhbF);
																											
																											if($grab_parameters['xs_parse_swf'])
																											
																											preg_match_all('#<object[^>]*application/x-shockwave-flash[^>]*data\s*=\s*["\']([^"\'>]+).*?>#'.$IrW3Ht3AZogqo2OF, $cn, $YyBIyE8gG1eQSuo);
																											
																											else $YyBIyE8gG1eQSuo = array(array(),array());
																											
																											
																											$yIjmVkxO05cWS5gTB53 = array();
																											
																											for($i=0;$i<count($am[1]);$i++)
																											
																											{
																											
																											if( !preg_match('#rel=["\']nofollow#i', $am[0][$i]) ) 
																											
																											$yIjmVkxO05cWS5gTB53[] = $am[1][$i];
																											
																											}
																											
																											$yIjmVkxO05cWS5gTB53 = @array_merge(
																											
																											$yIjmVkxO05cWS5gTB53,
																											
																											
																											$am[2],$am[3],  
																											
																											$QFUVsYC4MD0X8x[1],$AxQrHpWAhbF[1],
																											
																											$YyBIyE8gG1eQSuo[1]);
																											
																											}
																											
																											$yIjmVkxO05cWS5gTB53 = array_unique($yIjmVkxO05cWS5gTB53);
																											
																											
																											
																											$nn = $nt = 0;
																											
																											reset($yIjmVkxO05cWS5gTB53);
																											
																											if(preg_match('#<meta name="robots" content="[^"]*?nofollow#is',$cn))
																											
																											$yIjmVkxO05cWS5gTB53 = array();
																											
																											foreach($yIjmVkxO05cWS5gTB53 as $i=>$ll)
																											
																											if($ll)
																											
																											{                    
																											
																											$a = $sa = trim($ll);
																											
																											
																											if($grab_parameters['xs_proto_skip'] && 
																											
																											(preg_match('#^'.$grab_parameters['xs_proto_skip'].'#i',$a)||
																											
																											($bgOU73TJ7jwvdKa5Vq && preg_match('#'.$grab_parameters['xs_exc_skip'].'#i',$a))||
																											
																											preg_match('#^'.$grab_parameters['xs_proto_skip'].'#i',function_exists('html_entity_decode')?html_entity_decode($a):$a)
																											
																											))
																											
																											continue;
																											
																											$BGKIqn_HME = $this->T9mnmC3k9eENcJDb44Q($a, $euVHgD2C1lt, $eTOHJxXXzq_3x0t, $YFGECiz9ro, $F7FR0DideE_fz_9txX);
																											
																											if($BGKIqn_HME == 1)
																											
																											{
																											
																											if($grab_parameters['xs_extlinks'] &&
																											
																											(!$grab_parameters['xs_ext_max'] || (count($urls_ext)<$grab_parameters['xs_ext_max']))
																											
																											)
																											
																											{
																											
																											if(!$urls_ext[$a] && 
																											
																											(!$grab_parameters['xs_ext_skip'] || 
																											
																											!preg_match('#'.$grab_parameters['xs_ext_skip'].'#',$a)
																											
																											)
																											
																											)
																											
																											$urls_ext[$a] = $H2Ce2a0HmFxl;
																											
																											}
																											
																											continue;
																											
																											}
																											
																											$pAo1GkXiqGnhFvayP = $BGKIqn_HME ? $a : substr($a,strlen($F7FR0DideE_fz_9txX));
																											
																											$pAo1GkXiqGnhFvayP = str_replace(' ', '%20', $pAo1GkXiqGnhFvayP);
																											
																											if($grab_parameters['xs_cleanurls'])
																											
																											$pAo1GkXiqGnhFvayP = @preg_replace($grab_parameters['xs_cleanurls'],'',$pAo1GkXiqGnhFvayP);
																											
																											if($grab_parameters['xs_cleanpar'])
																											
																											{
																											
																											do {
																											
																											$J_IeOwjAksjM = $pAo1GkXiqGnhFvayP;
																											
																											$pAo1GkXiqGnhFvayP = @preg_replace('#[\\?\\&]('.$grab_parameters['xs_cleanpar'].')=[a-z0-9\-\.\_\=\/]+$#i','',$pAo1GkXiqGnhFvayP);
																											
																											$pAo1GkXiqGnhFvayP = @preg_replace('#([\\?\\&])('.$grab_parameters['xs_cleanpar'].')=[a-z0-9\-\.\_\=\/]+&#i','$1',$pAo1GkXiqGnhFvayP);
																											
																											}while($pAo1GkXiqGnhFvayP != $J_IeOwjAksjM);
																											
																											}
																											
																											if($urls_list_full[$pAo1GkXiqGnhFvayP] || ($pAo1GkXiqGnhFvayP == $euVHgD2C1lt))
																											
																											continue;
																											
																											if($grab_parameters['xs_exclude_check'])
																											
																											{
																											
																											$_f=$_f2=false;
																											
																											$_f=$JnjWLFycu&&preg_match('#('.$JnjWLFycu.')#',$pAo1GkXiqGnhFvayP);
																											
																											if($fRRNOswmJ&&!$_f)
																											
																											foreach($fRRNOswmJ as $bm)
																											
																											$_f = $_f||preg_match('#^('.$bm.')#',$UIcNE7i_HnCy.$pAo1GkXiqGnhFvayP);
																											
																											if($grab_parameters['xs_incl_only'] && !$_f)
																											
																											$_f = $_f || !preg_match('#'.str_replace(' ', '|', preg_quote($grab_parameters['xs_incl_only'],'#')).'#',$UIcNE7i_HnCy.$pAo1GkXiqGnhFvayP);
																											
																											if($_f)continue;
																											
																											}
																											
																											zSyg85rKFKJ8zd("<u>[$pAo1GkXiqGnhFvayP]</u><br>\n",3);//exit;
																											
																											$urls_list2[$pAo1GkXiqGnhFvayP]++;
																											
																											if($grab_parameters['xs_maxref'] && count($ref_links[$pAo1GkXiqGnhFvayP])<$grab_parameters['xs_maxref'])
																											
																											$ref_links[$pAo1GkXiqGnhFvayP][] = $euVHgD2C1lt;
																											
																											$nt++;
																											
																											}
																											
																											unset($yIjmVkxO05cWS5gTB53);
																											
																											}
																											
																											}
																											
																											
																											
																											if($grab_parameters['xs_incl_only'] && !$f)
																											
																											$f = $f || !preg_match('#'.str_replace(' ', '|', preg_quote($grab_parameters['xs_incl_only'],'#')).'#',$F7FR0DideE_fz_9txX.$euVHgD2C1lt);
																											
																											if(!$f) $f = $f||preg_match('#<meta name="robots" content="[^"]*?noindex#is',$cn);
																											
																											if(!$f)
																											
																											{
																											
																											$kAiwEsZc1NNHhe9fCyn = array(
																											
																											
																											'link'=>preg_replace('#//+$#','/', preg_replace('#^([^/\:\?]/)/+#','\\1',$F7FR0DideE_fz_9txX.$euVHgD2C1lt))
																											
																											);
																											
																											if($grab_parameters['xs_makehtml']||$grab_parameters['xs_makeror'])
																											
																											{
																											
																											preg_match('#<title>([^<]*?)</title>#is', $I4x6F2eM9AE['content'], $AfrvOmU2Ccm9JZj);
																											
																											$kAiwEsZc1NNHhe9fCyn['t'] = strip_tags($AfrvOmU2Ccm9JZj[1]);
																											
																											}
																											
																											if($grab_parameters['xs_metadesc'])
																											
																											{
																											
																											preg_match('#<meta\s[^>]*(?:http-equiv|name)\s*=\s*"?description[^>]*content\s*=\s*["]?([^>\"]*)#is', $cn, $sfFw7CUsV);
																											
																											if($sfFw7CUsV[1])
																											
																											$kAiwEsZc1NNHhe9fCyn['d'] = $sfFw7CUsV[1];
																											
																											}
																											
																											if($grab_parameters['xs_makeror']||$grab_parameters['xs_autopriority'])
																											
																											$kAiwEsZc1NNHhe9fCyn['o'] = max(0,$links_level);
																											
																											if($hAj_8ByddeCCh1lT)
																											
																											$kAiwEsZc1NNHhe9fCyn['p'] = $hAj_8ByddeCCh1lT;
																											
																											if(preg_match('#('.$s7rLwAieg_iDoSCpz1Z.')#',$F7FR0DideE_fz_9txX.$euVHgD2C1lt,$oApTmRC5HPu))
																											
																											{
																											
																											$kAiwEsZc1NNHhe9fCyn['clm'] = $Su4TnWFte[$oApTmRC5HPu[1]]['lm'];
																											
																											$kAiwEsZc1NNHhe9fCyn['f'] = $Su4TnWFte[$oApTmRC5HPu[1]]['f'];
																											
																											$kAiwEsZc1NNHhe9fCyn['p'] = $Su4TnWFte[$oApTmRC5HPu[1]]['p'];
																											
																											}
																											
																											
																											
																											
																											
																											if($grab_parameters['xs_lastmod_notparsed'] && $f2)
																											
																											{
																											
																											$I4x6F2eM9AE = $enMwI73r5aUx3amju->fetch($H2Ce2a0HmFxl, 0, 1, false, "", array('req'=>'HEAD'));
																											
																											
																											}
																											
																											if(!$kAiwEsZc1NNHhe9fCyn['lm'] && isset($I4x6F2eM9AE['headers']['last-modified']))
																											
																											$kAiwEsZc1NNHhe9fCyn['lm']=$I4x6F2eM9AE['headers']['last-modified'];
																											
																											zSyg85rKFKJ8zd("\n((include ".$kAiwEsZc1NNHhe9fCyn['link']."))<br />\n");
																											
																											$rgUMQZOC8 = true;
																											
																											if($grab_parameters['xs_memsave'])
																											
																											{
																											
																											VQAXwSjJPIxpPDQ5i5S($EqTqRHeveBfe7FPkbf, $kAiwEsZc1NNHhe9fCyn);
																											
																											$urls_completed[] = $EqTqRHeveBfe7FPkbf;
																											
																											}else
																											
																											$urls_completed[] = serialize($kAiwEsZc1NNHhe9fCyn);
																											
																											$a9Kya_3xGKImuvz = $VBS8vJ12i7 - count($urls_completed);
																											
																											}
																											
																											}while(false);// zerowhile
																											
																											if($url_ind>=$cnu)
																											
																											{
																											
																											unset($urls_list);
																											
																											$url_ind = 0;
																											
																											$urls_list = $urls_list2;
																											
																											$urls_list_full = array_merge($urls_list_full,$urls_list);
																											
																											$cnu = count($urls_list);
																											
																											unset($ref_links2);
																											
																											$ref_links2 = $ref_links;
																											
																											unset($ref_links); unset($urls_list2);
																											
																											$ref_links = array();
																											
																											$urls_list2 = array();
																											
																											$links_level++;
																											
																											zSyg85rKFKJ8zd("\n<br>NEXT LEVEL:$links_level<br />\n");
																											
																											}
																											
																											if(!$rgUMQZOC8){
																											
																											
																											zSyg85rKFKJ8zd("\n({skipped ".$euVHgD2C1lt."})<br />\n");
																											
																											$urls_list_skipped[]=$euVHgD2C1lt;
																											
																											}
																											
																											$pn++;
																											
																											$pcBcJ2TINs=explode(" ",microtime());
																											
																											$ctime = $pcBcJ2TINs[0]+$pcBcJ2TINs[1] - $iM0z82gnwPfmE0lYG;
																											
																											Hl4O6cWdjqldW6();
																											
																											$pl=min($cnu-$url_ind,$a9Kya_3xGKImuvz);
																											
																											if( ($cnu==$url_ind || $pl==0||$pn==1 || ($pn%$grab_parameters['xs_progupdate'])==0)
																											
																											|| count($urls_completed)>=$VBS8vJ12i7)
																											
																											{
																											
																											
																											if(strstr($LPIOS6cXQlpLvph5M1['content'],'header'))break;
																											
																											$mu = function_exists('memory_get_usage') ? memory_get_usage() : '-';
																											
																											$DJddRF2VRL6C = max($DJddRF2VRL6C, $mu);
																											
																											if(intval($mu))
																											
																											$mu = number_format($mu/1024,1).' Kb';
																											
																											zSyg85rKFKJ8zd("\n(memory: $mu)<br>\n");
																											
																											$RoI8NMX2YhCI5phmR = (count($urls_completed)>=$VBS8vJ12i7) || ($url_ind>=$cnu);
																											
																											$progpar = array(
																											
																											$ctime, // 0. running time
																											
																											str_replace($kgQxFsRGfcjLoo9_, '', $euVHgD2C1lt),  // 1. current URL
																											
																											$pl,                    // 2. urls left
																											
																											$pn,                    // 3. processed urls
																											
																											$tsize,                 // 4. bandwidth usage
																											
																											$links_level,           // 5. depth level
																											
																											$mu,                    // 6. memory usage
																											
																											count($urls_completed), // 7. added in sitemap
																											
																											count($urls_list2),     // 8. in the queue
																											
																											$nettime,	// 9. network time
																											
																											$QeahkPg4bVaAigh, // 10. last net time
																											
																											);
																											
																											if($dFwEUjmpJKPGadxt['bgexec'])
																											
																											Mq7SpvssgXyM(yCwTqe5GDcta,pUvA4zhAkYZK2Nd8A($progpar));
																											
																											if($AbOnA9dFxAZFArqSEam && !$f)
																											
																											$AbOnA9dFxAZFArqSEam($progpar);
																											
																											
																											}else
																											
																											{
																											
																											$AbOnA9dFxAZFArqSEam(array('cmd'=>'ping', 'bg' => $dFwEUjmpJKPGadxt['bgexec']));
																											
																											}
																											
																											if($grab_parameters['xs_savestate_time']>0 &&
																											
																											( 
																											
																											($ctime-$i64kV7HwR5y>$grab_parameters['xs_savestate_time'])
																											
																											|| $RoI8NMX2YhCI5phmR
																											
																											)
																											
																											)
																											
																											{
																											
																											$i64kV7HwR5y = $ctime;
																											
																											zSyg85rKFKJ8zd("(saving dump)<br />\n");
																											
																											$KEVxZqt6IYRerQfQ = compact('url_ind',
																											
																											'urls_list','urls_list2','cnu',
																											
																											'ref_links','ref_links2',
																											
																											'urls_list_full','urls_completed',
																											
																											'urls_404',
																											
																											'nt','tsize','pn','links_level','ctime', 'urls_ext',
																											
																											'starttime', 'retrno', 'nettime', 'urls_list_skipped',
																											
																											'imlist', 'progpar'
																											
																											);
																											
																											$KEVxZqt6IYRerQfQ['time']=time();
																											
																											$UfCbPMkJL7hFdCsb=pUvA4zhAkYZK2Nd8A($KEVxZqt6IYRerQfQ);
																											
																											Mq7SpvssgXyM(dlUE6X_RWe,$UfCbPMkJL7hFdCsb);
																											
																											unset($KEVxZqt6IYRerQfQ);
																											
																											unset($UfCbPMkJL7hFdCsb);
																											
																											}
																											
																											if($grab_parameters['xs_delay_req'] && $grab_parameters['xs_delay_ms'] &&
																											
																											(($pn%$grab_parameters['xs_delay_req'])==0))
																											
																											{
																											
																											sleep($grab_parameters['xs_delay_ms']);
																											
																											}
																											
																											if($NCzIEhBxs5f=file_exists($QPVRLXEdJuJxawHsbA=LcIWmtRK09YCyYKIu.a0mMmHqPDZ)){
																											
																											if(@G99nA35xjYQh($QPVRLXEdJuJxawHsbA))
																											
																											break;
																											
																											else
																											
																											$NCzIEhBxs5f=0;
																											
																											}
																											
																											if($grab_parameters['xs_exec_time'] && 
																											
																											((time()-$J951dqGyd9Mj) > $grab_parameters['xs_exec_time']) ){
																											
																											$NCzIEhBxs5f = 'Time limit exceeded - '.($grab_parameters['xs_exec_time']).' - '.(time()-$J951dqGyd9Mj);
																											
																											break;
																											
																											}
																											
																											}while(!$RoI8NMX2YhCI5phmR);
																											
																											zSyg85rKFKJ8zd("\n\n<br><br>Crawling completed<br>\n");
																											
																											if($_GET['ddbgexit'])exit;
																											
																											return array(
																											
																											'u404'=>$urls_404,
																											
																											'starttime'=>$starttime,
																											
																											'topmu' => $DJddRF2VRL6C,
																											
																											'ctime'=>$ctime,
																											
																											'tsize'=>$tsize,
																											
																											'retrno' => $retrno,
																											
																											'nettime' => $nettime,
																											
																											'errmsg'=>'',
																											
																											'initurl'=>$kgQxFsRGfcjLoo9_,
																											
																											'initdir'=>$F7FR0DideE_fz_9txX,
																											
																											'ucount'=>count($urls_completed),
																											
																											'crcount'=>$pn,
																											
																											'time'=>time(),
																											
																											'params'=>$dFwEUjmpJKPGadxt,
																											
																											'interrupt'=>$NCzIEhBxs5f,
																											
																											'urls_ext'=>$urls_ext,
																											
																											'urls_list_skipped' => $urls_list_skipped,
																											
																											'max_reached' => count($urls_completed)>=$VBS8vJ12i7
																											
																											);
																											
																											}
																											
																											}
																											
																											$RaAoF6Bm0 = new SiteCrawler();
																											
																											function exrHBWP15(){
																											
																											@G99nA35xjYQh(LcIWmtRK09YCyYKIu.yCwTqe5GDcta);
																											
																											}
																											
																											



































































































