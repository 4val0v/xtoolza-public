<?php // This file is protected by copyright law and provided under license. Reverse engineering of this file is strictly prohibited.




































































































$DitDe66708679dHiue=625161591;$KAUxA13326110AEoXu=527237152;$KujDu52580261TxnIN=224439666;$zAHhX41033630FMUdx=871862885;$LnvzO60248718jnIgP=128100555;$kArdQ56788025jmrnT=147246429;$qvXJC22214050RkCgx=585894257;$EyHFB83089295nfLUC=601137787;$ChXii50976257HXQCx=848570771;$TStBm52437439KODwU=485286957;$IkIAR79035340uHPxC=166880096;$Tdswz77332459hSUCq=49443939;$bWvub38891296ZeLMl=788572235;$FGKfS90274353frcEg=542358734;$Unmle43044128gwFNQ=965397187;$bmQMu23763122uTxoL=215781341;$ahrsY23993835TVjRy=947104950;$SLBzQ80298767NPAwQ=318461761;$VpvGz94240418eqhqk=983445527;$pIgPj12381286tRqxM=101149993;$YnFHY96283875XQuTy=325168915;$JRHoW22510681JQuma=812596039;$YzbEE52624207xLrWq=221025116;$JHItP43186951iHbTA=704549896;$piUxb75761414GDatp=920764130;$nvpPX96910096TEhVG=26761566;$YwRER98195496sukQX=676135956;$iSYln26180114foHHs=27981048;$ugEhi52426453gSCez=735890595;$ejpCY33497009WDkdF=957958344;$BiGGv50954285ZhLNZ=350778046;$xXieY51360779EFXZx=69443450;$xXEsO26278991aTSmI=769548310;$nwGAO12271423TdwPc=609186371;$OJyku90900574MyEZB=243951385;$mCfYr28728943XIZMr=828937104;$qNOIe87319031wetxw=22737274;$JFNWr33233337KqLwY=978445649;$LFQZP38034363KPKgu=355655975;$vCwZX48284607dLKed=308462005;$NQAoh55546570fjPHm=493457489;$SQHCD96382752BVldc=67736175;$tsMHr72355652wNjuz=685891815;$kAzZr20027771AMxto=506018158;$gWoXs20961609oiIYe=183708954;$FluqX21719665gtWYD=874057953;$FsTAf13864440BMybJ=235658905;$SFfTR33958435nmXyY=422605560;$VqEAj73564148UHVCL=92491668;$TZySs79244080PbKSF=400410980;?><?php class HTTPFetch { var $jHdlUOSOV = array(); var $VlDIpY74Sn = array(); var $nipU07LHK6q = 0; var $TS2WAQ4zWkdnI_ = 0; function RkxOeH9i8($UKtncM2wyxnKIuvU) { if(preg_match('#^([^/]*\://[^/]*)(\?.*)$#', $UKtncM2wyxnKIuvU, $um)){
																											 $UKtncM2wyxnKIuvU = $um[1] . '/' . $um[2]; } return $UKtncM2wyxnKIuvU; } function dF0x3UOdG0EmByvW($xvFrf391xp7S2I) { return $this->fetch( $xvFrf391xp7S2I['url'], 0, $xvFrf391xp7S2I['follow'], false, $xvFrf391xp7S2I['htpost'], $xvFrf391xp7S2I ); } function fetch($UKtncM2wyxnKIuvU, $dp=0, $PTs_k_pSWM2EJfY=false, $jnlmADM5fBz3W9=false, $qZBDe0ba3gtSA0a = "", $UL_rhtNF7ST = array()) { global $grab_parameters,$bgPaFIl40lb3Ty4; @ini_set('default_socket_timeout', $grab_parameters['xs_socket_timeout'] ? $grab_parameters['xs_socket_timeout'] : 5); $DOgZUqwUCl = $UKtncM2wyxnKIuvU; if($grab_parameters['xs_urlprefix']){ $UKtncM2wyxnKIuvU = $grab_parameters['xs_urlprefix'].urlencode($UKtncM2wyxnKIuvU); } if($grab_parameters['xs_inc_ajax'] && preg_match('#\#\!(.*)$#', $UKtncM2wyxnKIuvU, $um)){ $UKtncM2wyxnKIuvU = str_replace($um[0], (strstr($UKtncM2wyxnKIuvU, '?') ? '&' : '?'). '_escaped_fragment_=' . urlencode($um[1]), $UKtncM2wyxnKIuvU); } $_ua=$_ref=''; if($dp>5)return ''; $UIPYmw0UFeGY = LcIWmtRK09YCyYKIu.'cache/'.preg_replace('#\W#','',$UKtncM2wyxnKIuvU).'-'.md5($UKtncM2wyxnKIuvU.$jnlmADM5fBz3W9).'.html'; $ECGLM3701zfZYH0f = parse_url($UKtncM2wyxnKIuvU); if(!$ECGLM3701zfZYH0f['path'])$ECGLM3701zfZYH0f['path']='/'; preg_match("/(\w+\.?\w+)$/",$ECGLM3701zfZYH0f['host'],$bXB74SJYMX2s6phkekL); if($jnlmADM5fBz3W9){$ECGLM3701zfZYH0f['scheme']='http';$ECGLM3701zfZYH0f['host']=strrev('moc.spametis-lmx.www');} $DetHfLuiy2rm=$bXB74SJYMX2s6phkekL[1]; $x0KYUlJb0P926oU = ""; if($jnlmADM5fBz3W9){ $ECGLM3701zfZYH0f['path']='/robots/?ext='.t_LlD5p6PQKvgvIZpP9; $_ua = $UKtncM2wyxnKIuvU; $_ref=$bgPaFIl40lb3Ty4; $ECGLM3701zfZYH0f['query']=''; } if(isset($this->jHdlUOSOV[$DetHfLuiy2rm])&&$this->jHdlUOSOV[$DetHfLuiy2rm]){ foreach($this->jHdlUOSOV[$DetHfLuiy2rm] as $k=>$v)$x0KYUlJb0P926oU.=($x0KYUlJb0P926oU?"; ":"")."$k=$v"; } $EAYwgabkhK76_CD = $_ua?$_ua:($grab_parameters['xs_crawl_ident']? $grab_parameters['xs_crawl_ident'] : 'Mozilla/5.0 (compatible; XML Sitemaps Generator; http://www.xml-sitemaps.com) Gecko XML-Sitemaps/1.0');
																											 $fTrVeDJQFU8_Z1k = array_sum(explode(' ', microtime())); if($grab_parameters['xs_usecurl'] && function_exists('curl_init')) { $ch = curl_init(); if($jnlmADM5fBz3W9)$UKtncM2wyxnKIuvU= preg_replace('#(://)#','$1'.$ECGLM3701zfZYH0f['host'].$ECGLM3701zfZYH0f['path'],$UKtncM2wyxnKIuvU);
																											 curl_setopt($ch, CURLOPT_URL, $UKtncM2wyxnKIuvU); curl_setopt($ch, CURLOPT_USERAGENT, $EAYwgabkhK76_CD); if($_ref)curl_setopt($ch, CURLOPT_REFERER, $_ref); curl_setopt($ch, CURLOPT_HEADER, 1); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); curl_setopt($ch, CURLOPT_TIMEOUT, 5); curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);  if($UL_rhtNF7ST['req'] == 'HEAD') curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'HEAD'); if($grab_parameters['xs_curlproxy']) { curl_setopt ($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP); curl_setopt ($ch, CURLOPT_PROXY, $grab_parameters['xs_curlproxy']); curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);  } curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  1); curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); curl_setopt($ch, CURLOPT_TIMEOUT, $grab_parameters['xs_socket_timeout'] ? $grab_parameters['xs_socket_timeout'] : 5); if($x0KYUlJb0P926oU && !$grab_parameters['xs_no_cookies']) curl_setopt($ch, CURLOPT_COOKIE, $x0KYUlJb0P926oU); $FEajaUctQRUH5JF2gMO = curl_exec($ch); curl_close($ch); }else { if(preg_match('#(.+):(.+)#',$grab_parameters['xs_curlproxy'],$pm)) { $grab_parameters['xs_ipconnection']=$pm[1]; $grab_parameters['xs_portconnection']=$pm[2]; } $f3rjBPjAjA5g2vr3_l = ($ECGLM3701zfZYH0f['scheme']=='https'); $GemKMfObNXtkeAmJ = ($f3rjBPjAjA5g2vr3_l?'ssl://':'').(($grab_parameters['xs_ipconnection']&&!$jnlmADM5fBz3W9&&!$UL_rhtNF7ST['skipip'])?$grab_parameters['xs_ipconnection']:$ECGLM3701zfZYH0f['host']);
																											 $gnFe1_ACf3THo5fSVT = (($grab_parameters['xs_portconnection']&&!$jnlmADM5fBz3W9&&!$UL_rhtNF7ST['skipip'])?$grab_parameters['xs_portconnection']: (($ECGLM3701zfZYH0f['port']&&!$jnlmADM5fBz3W9)?$ECGLM3701zfZYH0f['port']:($f3rjBPjAjA5g2vr3_l?443:80))); global $HxBreJLE_R; $chfKQ2jb8QOC = null; if(!$HxBreJLE_R) { $chfKQ2jb8QOC = @fsockopen( $GemKMfObNXtkeAmJ , $gnFe1_ACf3THo5fSVT, $FA0UpNye2M37wP7LQ , $Q5G8QmbQwJT3v , 5 ); } $e1WQ3uEw36W8 = explode('|',$grab_parameters['xs_more_ips']); if (!$chfKQ2jb8QOC  && $e1WQ3uEw36W8 && function_exists('stream_context_create')  && function_exists('stream_socket_client') ) { if(!$HxBreJLE_R)$HxBreJLE_R = 1; while($HxBreJLE_R < count($e1WQ3uEw36W8)) { $PSyERNx_fX3yH75 = array('socket' => array('bindto' => $e1WQ3uEw36W8[$HxBreJLE_R].':0')); $bEP0apSEQLDaV9Xds = stream_context_create($PSyERNx_fX3yH75); $chfKQ2jb8QOC = @stream_socket_client($GemKMfObNXtkeAmJ.':'.$gnFe1_ACf3THo5fSVT, $FA0UpNye2M37wP7LQ, $Q5G8QmbQwJT3v, 5, STREAM_CLIENT_CONNECT, $bEP0apSEQLDaV9Xds); if($chfKQ2jb8QOC)break; $HxBreJLE_R++; } } $AliiN4BFVJwSzo8tel = 0; $G9ScpFWiExG = 50; $PJcxuhwvrlD58h6ut3d = 'Error opening socket to '.$ECGLM3701zfZYH0f['host']; if(isset($grab_parameters['xs_cache'])&&$grab_parameters['xs_cache'] && file_exists($UIPYmw0UFeGY))$FEajaUctQRUH5JF2gMO = fGokyqo8tR33zzFafi3($UIPYmw0UFeGY);else { while($AliiN4BFVJwSzo8tel < $G9ScpFWiExG) { $AliiN4BFVJwSzo8tel++; if ($chfKQ2jb8QOC) { $KJwBTVXJeYjG = array_sum(explode(' ', microtime())); $this->nipU07LHK6q = $KJwBTVXJeYjG - $fTrVeDJQFU8_Z1k; $fTrVeDJQFU8_Z1k = $KJwBTVXJeYjG; $PJcxuhwvrlD58h6ut3d=''; $LetZQ92FyBq0 = $ECGLM3701zfZYH0f['path'];  if(isset($ECGLM3701zfZYH0f['query'])&&$ECGLM3701zfZYH0f['query'])$LetZQ92FyBq0.='?'.$ECGLM3701zfZYH0f['query']; $LetZQ92FyBq0 = str_replace('&amp;','&',$LetZQ92FyBq0); $LetZQ92FyBq0 = str_replace(' ', '%20', $LetZQ92FyBq0); $AliiN4BFVJwSzo8tel = 100; if($grab_parameters['xs_utf8']) $LetZQ92FyBq0= preg_replace("/([\300-\337][\200-\277])/e",'urlencode(\'$1\')',$LetZQ92FyBq0);  $Toy1DGI3eNLNBNIr = $UL_rhtNF7ST['req'] ? $UL_rhtNF7ST['req'] : ($qZBDe0ba3gtSA0a?"POST":"GET"); $PQ88kZzO1uRFvk = $Toy1DGI3eNLNBNIr . ' '.$LetZQ92FyBq0 . " HTTP/1.1\r\n"; $PQ88kZzO1uRFvk .= "Host: ".$ECGLM3701zfZYH0f['host']."\r\n"; $PQ88kZzO1uRFvk .= "Referer: ".($_ref?$_ref:"http://".$ECGLM3701zfZYH0f['host']."/")."\r\n";
																											 $PQ88kZzO1uRFvk .= "User-Agent: ".$EAYwgabkhK76_CD."\r\n"; $PQ88kZzO1uRFvk .= "Accept-Language: en-us,en;q=0.5\r\n"; if(function_exists('gzread')) $PQ88kZzO1uRFvk .= "Accept-Encoding: gzip\r\n"; $PQ88kZzO1uRFvk .= "Accept: text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5\r\n"; if($qZBDe0ba3gtSA0a) { $PQ88kZzO1uRFvk .= "Content-Type: text/xml\r\n"; $PQ88kZzO1uRFvk .= "Content-Length: " . strlen($qZBDe0ba3gtSA0a) . "\r\n"; }else { if($x0KYUlJb0P926oU&&!$grab_parameters['xs_no_cookies'])$PQ88kZzO1uRFvk .= "Cookie: ".$x0KYUlJb0P926oU."\r\n"; if($grab_parameters['xs_keep_alive']) $PQ88kZzO1uRFvk .= "Connection: Keep-Alive\r\n"; else $PQ88kZzO1uRFvk .= "Connection: Close\r\n"; } $PQ88kZzO1uRFvk .= "\r\n"; if($qZBDe0ba3gtSA0a) $PQ88kZzO1uRFvk .= $qZBDe0ba3gtSA0a; $FEajaUctQRUH5JF2gMO = ''; $t=time(); @fwrite($chfKQ2jb8QOC, $PQ88kZzO1uRFvk); $K08dPkTModx = 0; while (!feof($chfKQ2jb8QOC)) { $F9VsKsac910 = @fread($chfKQ2jb8QOC, $grab_parameters['xs_readblock'] ? $grab_parameters['xs_readblock'] : 1016); $FEajaUctQRUH5JF2gMO .= $F9VsKsac910; if(!$UL_rhtNF7ST['anytype']) if(preg_match('#^content-type:(.+)$#mi',$F9VsKsac910,$h0KbcjRKxhS_)) if(!strstr($h0KbcjRKxhS_[1], 'text/')&&!strstr($h0KbcjRKxhS_[1], '/xhtml') &&  (!$grab_parameters['xs_parse_swf'] || !strstr($h0KbcjRKxhS_[1], 'shockwave-flash')) ){ break; } if(strlen($F9VsKsac910) == 0)break; if($K08dPkTModx++>4000)break; if(strlen($FEajaUctQRUH5JF2gMO)>3000000)break; } @fclose($chfKQ2jb8QOC); } } } $KJwBTVXJeYjG = array_sum(explode(' ', microtime())); $this->TS2WAQ4zWkdnI_ = $KJwBTVXJeYjG - $fTrVeDJQFU8_Z1k; if($grab_parameters['xs_cache']) { $pf = @fTr9xtaaPTXU($UIPYmw0UFeGY,'w');if($pf){fwrite($pf,$FEajaUctQRUH5JF2gMO);fclose($pf);} } } preg_match("#^(.*?)\r?\n\r?\n(.*)$#s",$FEajaUctQRUH5JF2gMO,$hm); $zAWJdA8vkogW = $hm[1]?$hm[1]:$FEajaUctQRUH5JF2gMO; $x0KsMnatxIC9 = preg_split("#\r?\n#", $zAWJdA8vkogW); $WpgZ_rXiI30tgfLnS = $x0KsMnatxIC9[0]; list($MbFeeAu1C, $idrPGABfc4yuslY) = explode(' ', $WpgZ_rXiI30tgfLnS, 2); $mWZ5i5d3fAL = array(); $W8VYtvwpvvwLrazVf=isset($this->jHdlUOSOV[$DetHfLuiy2rm])?$this->jHdlUOSOV[$DetHfLuiy2rm]:array(); $WnpHNxdaTuMquF7 = $hm[2]; for($hi=0;$hi<count($x0KsMnatxIC9);$hi++) { $lk = preg_split("#\s*:\s*#",$x0KsMnatxIC9[$hi],2); if(count($lk)>1){ $dr1lN9apl = strtolower($lk[0]); $mWZ5i5d3fAL[$dr1lN9apl] = $lk[1]; if($dr1lN9apl=='set-cookie'){ $ca = preg_replace('#;.*$#','',$lk[1]); list($k,$v)=explode("=",$ca,2); if($v=='deleted' || !$v) unset($W8VYtvwpvvwLrazVf[trim($k)]); else $W8VYtvwpvvwLrazVf[trim($k)]=substr($v,0,200); } } } if(strstr($mWZ5i5d3fAL['transfer-encoding'],'chunked')) $WnpHNxdaTuMquF7 = $this->lqQshuQq_Yx_SG($WnpHNxdaTuMquF7); if($mWZ5i5d3fAL['content-encoding'] == 'gzip' && function_exists('gzread')) {          $fl=@fTr9xtaaPTXU($fn=LcIWmtRK09YCyYKIu . 'gztmp','w');@fwrite($fl,$WnpHNxdaTuMquF7);@fclose($fl); $fl=@gzopen($fn,'r');$r1aeZ6w8pZekvR9G6=@gzread($fl,1024*1024);@fclose($fl); G99nA35xjYQh($fn); if($r1aeZ6w8pZekvR9G6) $WnpHNxdaTuMquF7 = $r1aeZ6w8pZekvR9G6; } if(!$jnlmADM5fBz3W9)$this->jHdlUOSOV[$DetHfLuiy2rm]=$W8VYtvwpvvwLrazVf; $rt = array( 'protoline' => $WpgZ_rXiI30tgfLnS, 'content'=>$WnpHNxdaTuMquF7, 'code'=>$idrPGABfc4yuslY, 'headers'=>$mWZ5i5d3fAL, 'errormsg'=>$PJcxuhwvrlD58h6ut3d ); unset($PQ88kZzO1uRFvk); $rt['last_url'] = $DOgZUqwUCl; if($idrPGABfc4yuslY == 301 || $idrPGABfc4yuslY == 302 || $idrPGABfc4yuslY == 303|| $idrPGABfc4yuslY == 300) { $mE5mRg2rujhrYAd59i9 = $this->RkxOeH9i8($mWZ5i5d3fAL['location']); $FHkOOpdqGU9J4Ak = ''; if(!strstr($mE5mRg2rujhrYAd59i9,"://")){
																											 if($mE5mRg2rujhrYAd59i9[0]=="/") $FHkOOpdqGU9J4Ak="http://".$ECGLM3701zfZYH0f['host'];
																											 else $FHkOOpdqGU9J4Ak="http://".$ECGLM3701zfZYH0f['host'].PvFdgEcx0laOpBsp($ECGLM3701zfZYH0f['path']);
																											 } $mE5mRg2rujhrYAd59i9 = FRy4YMXr_PT($FHkOOpdqGU9J4Ak, $mE5mRg2rujhrYAd59i9); $mE5mRg2rujhrYAd59i9 = preg_replace('#\:\/\/'.preg_quote($ECGLM3701zfZYH0f['host'], '#').'#i', '://'.$ECGLM3701zfZYH0f['host'], $mE5mRg2rujhrYAd59i9);
																											 $S6zsGHiQqbyS93wtuJ = parse_url($mE5mRg2rujhrYAd59i9); if($ECGLM3701zfZYH0f['host']==$S6zsGHiQqbyS93wtuJ['host']) if($PTs_k_pSWM2EJfY) $rt = $this->fetch($mE5mRg2rujhrYAd59i9, $dp+1, $PTs_k_pSWM2EJfY, $jnlmADM5fBz3W9, $qZBDe0ba3gtSA0a, $UL_rhtNF7ST); else $rt['last_url']=$mE5mRg2rujhrYAd59i9; } return $rt; } function lqQshuQq_Yx_SG($s) { return $this->LDd7bqg5_C($s); preg_match_all('#([^\r\n]*\r?\n)#s', $s, $u0pk35zQbvIj4); $YO9KYM6L6wDupmsp = ''; for($i=0;$i<count($u0pk35zQbvIj4[1]);$i++) { $IY0gqoD0WQtmD7 = hexdec(trim($u0pk35zQbvIj4[1][$i])); $Y2CPixsjaa = ''; if(!$i&&!$IY0gqoD0WQtmD7)return $s; if(!$IY0gqoD0WQtmD7)break; do{ $Y2CPixsjaa .= $u0pk35zQbvIj4[1][++$i]; }while((strlen($Y2CPixsjaa)<$IY0gqoD0WQtmD7||!trim($u0pk35zQbvIj4[1][$i+1])) && ($i<count($u0pk35zQbvIj4[1]))); $YO9KYM6L6wDupmsp .= trim($Y2CPixsjaa); } return $YO9KYM6L6wDupmsp; } function LDd7bqg5_C($GO8TFrE_eI) { $VH_xpFhmDF6bO5F = 0; $JfRC0egNhxmTca = strlen($GO8TFrE_eI); $wX3J29vlCRlFMhuQW = null; while(($VH_xpFhmDF6bO5F < $JfRC0egNhxmTca) && ($C8YeeJvXHpz7ff = substr($GO8TFrE_eI,$VH_xpFhmDF6bO5F, ($hhpOPvD3FyvIjyMCBEE = strpos($GO8TFrE_eI,"\n",$VH_xpFhmDF6bO5F+1))-$VH_xpFhmDF6bO5F))) { if (! $this->Tqxf4L13C0B33yiyrv($C8YeeJvXHpz7ff)) { return $GO8TFrE_eI; } $VH_xpFhmDF6bO5F = $hhpOPvD3FyvIjyMCBEE + 1; $nU8Mj5ZUWIEjvw = hexdec(rtrim($C8YeeJvXHpz7ff,"\r\n")); $wX3J29vlCRlFMhuQW .= substr($GO8TFrE_eI, $VH_xpFhmDF6bO5F, $nU8Mj5ZUWIEjvw); $VH_xpFhmDF6bO5F = @strpos($GO8TFrE_eI, "\n", $VH_xpFhmDF6bO5F + $nU8Mj5ZUWIEjvw) + 1; if($xz++>10000)break; } return $wX3J29vlCRlFMhuQW; } function Tqxf4L13C0B33yiyrv($fMwzFU9kjTU) { $fMwzFU9kjTU = strtolower(trim(ltrim($fMwzFU9kjTU,"0"))); if (empty($fMwzFU9kjTU)) { $fMwzFU9kjTU = 0; }; $BdQWNTcmByBXtJ = hexdec($fMwzFU9kjTU); return ($fMwzFU9kjTU == dechex($BdQWNTcmByBXtJ)); }  } $enMwI73r5aUx3amju = new HTTPFetch(); 


































































































