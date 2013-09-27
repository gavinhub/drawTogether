<?php
	$file = './file.cache';
	$online = './online.cache';
	$Arr = array();
	$Srr = array();
	for($i = 0;$i<30;$i++){
		$Srr[] = 0;
	}
	for($r = 0; $r<20; $r++){
		$Arr[] = $Srr;
	}
	
	file_put_contents($file,serialize($Arr));
	
	$IPS = array();
	$IPS['KEEP'] = 1;
	file_put_contents($online,serialize($IPS));
?>