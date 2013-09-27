<?php
	$file = './file.cache';
	
	$handle = fopen($file, 'r');

 	$Arr = unserialize(fread($handle, filesize ($file)));
	
	foreach($Arr as $ar){
		foreach($ar as $item){
			echo $item;
		}
	}

?>