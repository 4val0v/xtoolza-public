<? 
//active processes
passthru('top'); 
//process list
passthru('ps -Al');
//memory usage
passthru('free'); 
//core load, disk activity
passthru('iostat'); 
//server process list
passthru('ps axu'); 
//using memory by processes
passthru('pmap -d PID'); 
//Active Internet connections
passthru('netstat'); 
//network statistics
passthru('iptraf'); 
?>