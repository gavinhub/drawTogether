<?php
    require("./func.php");
    date_default_timezone_set('PRC');

	$file = './online.cache';
	$handle = fopen($file, 'r');
 	$ipArray = unserialize(fread($handle, filesize($file)));
	$time = date('U');
	foreach($ipArray as $ip => $old){
        if($time - $old > 3){
			unset($ipArray[$ip]);
			//echo "delete ".$ip;
		}
	}
    $theIP = GetIp();
	$ipArray[$theIP] = $time;
	$ipArray['KEEP'] = 1;
	file_put_contents($file,serialize($ipArray));
    // the last man
    $file = './lastman.cache';
    $fp = fopen($file,"w");
    fwrite($fp,$time."\n");
    fwrite($fp,$theIP);
    fclose($fp);
    echo sizeof($ipArray)-1;
?>
