<?php

	/*///////////////////////////
	$Arr = array();
	$Srr = array();
	for($i = 0;$i<20;$i++){
		$Srr[] = 0;
	}
	for($r = 0; $r<10; $r++){
		$Arr[] = $Srr;
	}
	*/

	$file = './file.cache';
	$handle = fopen($file, 'r');
 	$Arr = unserialize(fread($handle, filesize ($file)));

    $x = $_GET['x'];
    $y = $_GET['y'];
    if($x >=0 && $x <30 &&$y<20 && $y>=0){
	    if($Arr[$y][$x] === 'x'){
		    $Arr[$y][$x] = '0';
		    echo 'clear';
	    }else{
		    $Arr[$y][$x] = 'x';
		    echo 'draw';
	    }
	// set done
	file_put_contents($file,serialize($Arr));
	////////////////////////////////////////////////////////
    }else{
        echo "asshole";
    }

?>
