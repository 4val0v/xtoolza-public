<?php // This file is protected by copyright law and provided under license. Reverse engineering of this file is strictly prohibited.




































































































$BLRpP73215332DELAw=806407166;$kmpwM95902100KSlYI=791895325;$RgcQa82553711MrkeA=580315125;$vsBuP13482666Gfpnf=702385315;$PmBCz94001465JeMIy=190324646;$HMeva34422607qaeAM=573851868;$WYcOw40058594gJhXe=885185730;$bILpf91221924PjwwN=656044983;$zZeqE33225097ZxgeC=916648377;$HRiOK26380615wkzkW=199714660;$nWupp96000977GhhsN=534462585;$VwItZ42398682fWsPX=453610901;$eSZvp70886231jTQwb=987378357;$khnJw71776123HvpOf=668483704;$aeRwD70380860QUjzY=527145691;$ZQDSv47012939Iouvq=95083068;$Pcckf26984863DUKUP=402514587;$owMOd80609131lMvkg=981158997;$koLkC53198242bDpqB=863235047;$ftkvB15064697Lizga=579461487;$gRPsZ81520996UmXFO=161057068;$RCJvT52879639zXoAm=138740539;$rZTHn44453125YZykw=543730652;$pHSZb36553955nntlV=907746155;$SdOFC54494629IleRs=263005798;$vZKwF78587647huzTC=139228332;$AooIm44145508NHMeD=567632507;$EQOoX21480713NugjL=80937072;$zOaTv35905762ZGoVJ=708360779;$GVCmM67733154AKecR=982622376;$IrnZM52275391TmSbs=934940613;$zzLgs59844971piVaK=97034240;$XYGJc25754394spjZA=498122009;$TtdFo20316162pIpdc=670922669;$zEQbB68842774xrIbR=646654968;$OdNhK61646729ymeRV=956037659;$aiCjZ24040527qvfvL=631289490;$ZsBVf26336670kCFsQ=203129211;$tIjax93847657vmvrQ=701775574;$vanrt26885986HpIZz=659947327;$FgHrF30764160XWdTh=108863220;$YOFCx85794678MEZbF=578242004;$HdLUf37290039PHljp=101302429;$OmoKv45562744ikLgw=207763244;$kqshp45925293qnddW=928843201;$SyAJb18690185nQcId=797261048;$cTXkP79169922iZCwR=843235535;$zKykJ27677002kYjGC=598485413;$YdUGw69523926sjgIW=94229431;$QUicm95023194OFvVe=860186341;?><?php function Hl4O6cWdjqldW6() { global $G0Qn3BFpb4, $YC3JfNZl8Dgi, $p_5oI2h4JfbWVep, $grab_parameters; $ctime = time(); if(($ctime - $p_5oI2h4JfbWVep) > 15) m0HngeVPuiULaXDb(); $p_5oI2h4JfbWVep = $ctime; if(!function_exists('getrusage'))return; if(!isset($YC3JfNZl8Dgi)){ $YC3JfNZl8Dgi = explode('|',$grab_parameters['xs_cpumon']); } if(!is_array($YC3JfNZl8Dgi)||!$YC3JfNZl8Dgi[0])return; $ByzJ33WTH1 = microtime(true); if(($Gj_L98sRGD=$ByzJ33WTH1-$G0Qn3BFpb4[1]) < $YC3JfNZl8Dgi[3])return; $yMBs2OPLVVuAK = getrusage(); $ZReTakA51rGrDby = ($yMBs2OPLVVuAK["ru_utime.tv_sec"]*1e6 + $yMBs2OPLVVuAK["ru_utime.tv_usec"]) / 1e6;	 $PHpqjsuRpz25Ou = 0; if($G0Qn3BFpb4){ $uq8LJ8X9g0o = ($ZReTakA51rGrDby - $G0Qn3BFpb4[0]); $PHpqjsuRpz25Ou = 100 * $uq8LJ8X9g0o / $Gj_L98sRGD; } if($PHpqjsuRpz25Ou>$YC3JfNZl8Dgi[0]) { zSyg85rKFKJ8zd("\n<br>CPU monitor sleep: ".number_format($PHpqjsuRpz25Ou,2)."% (".number_format($uq8LJ8X9g0o,2)." / ".number_format($Gj_L98sRGD,2)." / ".number_format($ByzJ33WTH1-$G0Qn3BFpb4[2],2)." ) ".(number_format(memory_get_usage()/1024).'K')); $G0Qn3BFpb4[2] = $ByzJ33WTH1+$YC3JfNZl8Dgi[1]; sleep($YC3JfNZl8Dgi[1]); zSyg85rKFKJ8zd(".. go\n<br>"); }else if($Gj_L98sRGD > $YC3JfNZl8Dgi[2]) { $G0Qn3BFpb4[0] = $ZReTakA51rGrDby; $G0Qn3BFpb4[1] = $ByzJ33WTH1; } } function m0HngeVPuiULaXDb()  { $KLhrN1FulWAW = array( LcIWmtRK09YCyYKIu.dlUE6X_RWe, LcIWmtRK09YCyYKIu.yCwTqe5GDcta ); foreach($KLhrN1FulWAW as $lg) { if(file_exists($lg)){ touch($lg); } } } function D1tXUjHdde7g1() { global $HcbfVH7j0; $HcbfVH7j0 = fTr9xtaaPTXU(LcIWmtRK09YCyYKIu.'debug.log','a'); zSyg85rKFKJ8zd( str_repeat('=',60)."\n".date('Y-m-d H:i:s')."\n\n"); } function zSyg85rKFKJ8zd($sQy6U3e_rh2YW, $oavbxuq1ZeJr = '') { global $HcbfVH7j0; $o6tTsvNFXN = $_GET['ddbg'.$oavbxuq1ZeJr]; if($o6tTsvNFXN){ if($HcbfVH7j0){ fwrite($HcbfVH7j0, strip_tags($sQy6U3e_rh2YW)); } echo $sQy6U3e_rh2YW; flush(); } } function G99nA35xjYQh($wrcGK5HRvX5Hc) { global $grab_parameters; if($grab_parameters['xs_filewmove'] && file_exists($wrcGK5HRvX5Hc) ){ $txVg8HqejS_NN5dKj = tempnam("/tmp", "sgtmp"); if(file_exists($txVg8HqejS_NN5dKj))unlink($txVg8HqejS_NN5dKj); if(file_exists($wrcGK5HRvX5Hc))rename($wrcGK5HRvX5Hc, $txVg8HqejS_NN5dKj); return !file_exists($txVg8HqejS_NN5dKj) || unlink($txVg8HqejS_NN5dKj); }else { return unlink($wrcGK5HRvX5Hc); } } function fTr9xtaaPTXU($wrcGK5HRvX5Hc, $rPpV2duBzldWXxW3Mr) { global $grab_parameters; if($grab_parameters['xs_filewmove'] && file_exists($wrcGK5HRvX5Hc) ){ $Olp20ADnjq2W_ThV6n = ($rPpV2duBzldWXxW3Mr == 'a') ? file_get_contents($wrcGK5HRvX5Hc) : ''; G99nA35xjYQh($wrcGK5HRvX5Hc); $pf = fopen($wrcGK5HRvX5Hc, 'w'); if($Olp20ADnjq2W_ThV6n){ fwrite($pf, $Olp20ADnjq2W_ThV6n); } return $pf; } else { $pf = fopen($wrcGK5HRvX5Hc, 'w'); return $pf; } } function W5mf7Y9Huk0KaQU6($wrcGK5HRvX5Hc) { return md5($wrcGK5HRvX5Hc); } function VQAXwSjJPIxpPDQ5i5S($EUAfaBT8QI, $FE4j24hlEn8) { $PoGqwMsoB = REpEqrxI7DpN9 . substr($EUAfaBT8QI,0,2) . '/'; if(!file_exists($PoGqwMsoB)) mkdir($PoGqwMsoB, 0755); $pf = fTr9xtaaPTXU($PoGqwMsoB . $EUAfaBT8QI.'.txt','w'); fwrite($pf, serialize($FE4j24hlEn8)); fclose($pf); } function ZW04gbhF9A8P($EUAfaBT8QI) { $fl = REpEqrxI7DpN9 . substr($EUAfaBT8QI,0,2) . '/' . $EUAfaBT8QI . '.txt'; if(!file_exists($fl)) return array(); $WnpHNxdaTuMquF7 = implode('', file($fl)); return unserialize($WnpHNxdaTuMquF7); } function pUvA4zhAkYZK2Nd8A($yMBs2OPLVVuAK) { global $grab_parameters; if($grab_parameters['xs_dumptype'] == 'serialize') return serialize($yMBs2OPLVVuAK); else return var_export($yMBs2OPLVVuAK,1); } function wJu5NxAjkFkQBpMse($yMBs2OPLVVuAK) { global $grab_parameters; if($grab_parameters['xs_dumptype'] == 'serialize') $lKYJ6QOoLtm8_Ze4uz3 = unserialize($yMBs2OPLVVuAK); else eval ($s='$lKYJ6QOoLtm8_Ze4uz3 = '.$yMBs2OPLVVuAK.';'); return $lKYJ6QOoLtm8_Ze4uz3; } function cVhR96lmkjBRF($i,$iwe5WfZrZZ6OjkL1yFV,$A18lnbzsiL=false) { if($A18lnbzsiL && $i<2) return $iwe5WfZrZZ6OjkL1yFV; return $i ? preg_replace('#(.*)\.#','$01'.$i.'.',$iwe5WfZrZZ6OjkL1yFV) : $iwe5WfZrZZ6OjkL1yFV; } function Mq7SpvssgXyM($wrcGK5HRvX5Hc, $WkR4kDkMT, $Fpei00GZKLxgY3rk=LcIWmtRK09YCyYKIu, $bn0GubjxW3nLmpyxamZ = false) { if($bn0GubjxW3nLmpyxamZ && function_exists('gzencode')){ $cQoR0fgPz1Mn = gzencode($WkR4kDkMT, 1); unset($WkR4kDkMT); $WkR4kDkMT = $cQoR0fgPz1Mn; $wrcGK5HRvX5Hc .= '.gz'; } $pf = fTr9xtaaPTXU($Fpei00GZKLxgY3rk.$wrcGK5HRvX5Hc,"w"); fwrite($pf, $WkR4kDkMT); fclose($pf); @chmod($Fpei00GZKLxgY3rk.$wrcGK5HRvX5Hc, 0666); unset($WkR4kDkMT); return $wrcGK5HRvX5Hc; } function fGokyqo8tR33zzFafi3($wrcGK5HRvX5Hc) { return implode('',file($wrcGK5HRvX5Hc)); } function xnDpYg7WwA0() { $HtFBZd5BGx4HvWf = array(); $pd = opendir(LcIWmtRK09YCyYKIu); while($fn=readdir($pd)) if(preg_match('#^\d+.*?\.log$#',$fn)) $HtFBZd5BGx4HvWf[] = $fn; closedir($pd); sort($HtFBZd5BGx4HvWf); return $HtFBZd5BGx4HvWf; } function RT9GXtyabs__A($tm) { $tm = intval($tm); $h = intval($tm/60/60); $tm -= $h*60*60; $m = intval($tm/60); $tm -= $m*60; $s = $tm; if($s<10)$s="0$s"; if($m<10)$m="0$m"; return "$h:$m:$s"; } function FRy4YMXr_PT($EA_T0CYlIF6tb7UtP, $jmTPqK4UHmexxwYuYDf) { if(strstr($jmTPqK4UHmexxwYuYDf, '://'))return $jmTPqK4UHmexxwYuYDf;
																												 if($EA_T0CYlIF6tb7UtP[strlen($EA_T0CYlIF6tb7UtP)-1] == '/' && $jmTPqK4UHmexxwYuYDf[0] == '/') $jmTPqK4UHmexxwYuYDf = substr($jmTPqK4UHmexxwYuYDf, 1); if($EA_T0CYlIF6tb7UtP[strlen($EA_T0CYlIF6tb7UtP)-1] == '/' && $EA_T0CYlIF6tb7UtP[strlen($EA_T0CYlIF6tb7UtP)-2] == '/' ) $EA_T0CYlIF6tb7UtP = substr($EA_T0CYlIF6tb7UtP, 0, strlen($EA_T0CYlIF6tb7UtP)-1); return $EA_T0CYlIF6tb7UtP . $jmTPqK4UHmexxwYuYDf; } function PvFdgEcx0laOpBsp($dr) { $dr = preg_replace('#\?.*#', '', $dr); if($dr[strlen($dr)-1]!='/' && $dr) { $dr=str_replace('\\','/',dirname($dr)); if($dr[strlen($dr)-1]!='/')$dr.='/'; } return FRy4YMXr_PT($dr, ''); } function h8i3gNivayoQQtqpLY($Fpei00GZKLxgY3rk, $G5grTsNsr0Tw) { $pd = opendir($Fpei00GZKLxgY3rk); if($pd) while($fn = readdir($pd)) if(is_file($Fpei00GZKLxgY3rk.$fn) && preg_match('#'.$G5grTsNsr0Tw.'$#',$fn)) { @G99nA35xjYQh($Fpei00GZKLxgY3rk.$fn); }else if($fn[0]!='.'&&is_dir($Fpei00GZKLxgY3rk.$fn)) { h8i3gNivayoQQtqpLY($Fpei00GZKLxgY3rk.$fn.'/', $G5grTsNsr0Tw); @rmdir($Fpei00GZKLxgY3rk.$fn); } closedir($pd); } function PvEr4n2DQ($WFYPUhXuj, $dFwEUjmpJKPGadxt) { $ws = "<xmlsitemaps_settings>"; foreach($dFwEUjmpJKPGadxt as $k=>$v) if(strstr($k,'xs_')) $ws .= "\n\t<option name=\"$k\">$v</option>"; $ws .= "\n</xmlsitemaps_settings>"; $pf = fTr9xtaaPTXU($WFYPUhXuj,'w'); fwrite($pf, $ws); fclose($pf); } function xn22ZOg5Ng($WFYPUhXuj, &$dFwEUjmpJKPGadxt, $LZH9hXj8Pt0LkveSZgk = false) { $fl = @implode('', file($WFYPUhXuj)); preg_match_all('#<option name="(.*?)">(.*?)</option>#is', $fl, $JtLwsGHOAgAKL7G, PREG_SET_ORDER); foreach($JtLwsGHOAgAKL7G as $m) if(!$LZH9hXj8Pt0LkveSZgk || $m[2]) { $dFwEUjmpJKPGadxt[$m[1]] = $m[2]; } } function HNUV_wZE_($bG6_Xft9xSIFOd) { global $grab_parameters, $R9idegA3Gd2; return str_replace(basename($grab_parameters['xs_smurl']), $grab_parameters[$bG6_Xft9xSIFOd],  $grab_parameters['xs_smurl']).$R9idegA3Gd2; } 


































































































