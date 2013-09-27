<?php
require_once("define.php");
date_default_timezone_set('PRC');

function GetIP(){
	if(!empty($_SERVER["HTTP_CLIENT_IP"])){
		$cip = $_SERVER["HTTP_CLIENT_IP"];
	}
	elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
		$cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
	}
	elseif(!empty($_SERVER["REMOTE_ADDR"])){
		$cip = $_SERVER["REMOTE_ADDR"];
	}
	else{
		$cip = "无法获取！";
	}
	return $cip;
}

function insertIp($time,$ip,$ua){
    $dbc = mysql_connect(HOSTNAME,USER,PASSWD) or die("unable to connect ".mysql_error());
    mysql_select_db(DATABASE) or die ("unable to change db");

    $query = "INSERT INTO ".TABLE." VALUES('$time','$ip','$ua','to_be_used')";
    
    mysql_query($query) or die (mysql_error());
    mysql_close();
}

function getIpList(){
    $dbc = mysql_connect(HOSTNAME,USER,PASSWD) or die("unable to connect ".mysql_error());
    mysql_select_db(DATABASE) or die ("unable to change db");
    $now = time() - 86400;

    $query = "SELECT * FROM ".TABLE." WHERE time>".$now." ORDER BY time DESC";
    
    $result = mysql_query($query) or die("Unable to select");
    mysql_close();
    return $result;
}

function deleteIpRecord($time){
    $dbc = mysql_connect(HOSTNAME,USER,PASSWD) or die("unable to connect ".mysql_error());
    mysql_select_db(DATABASE) or die ("unable to change db");

    $query = "DELETE FROM ".TABLE." WHERE time='$time'";

    mysql_query($query) or die("Unable to delete ".mysql_error());
    mysql_close();
}

function ipLocate($ip){
    $str =  file_get_contents("http://www.ip138.com/ips138.asp?ip=$ip&action=2");
    $regex = "/\<li\>.{12}(.*?)\<\/li\>/";
    if(preg_match($regex, $str, $matches)){
        return mb_convert_encoding($matches[1],"UTF-8","gb2312");
    }else{
        return "no good ip";
    }
}

?>
