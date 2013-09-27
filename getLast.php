<?php
require("./func.php");
date_default_timezone_set("PRC");
$fh = fopen("./lastman.cache",'r');
$time = fgets($fh);
$ip = fgets($fh);
fclose($fh);

$theIp = GetIP();

insertIp(time(),$theIp,$_SERVER['HTTP_USER_AGENT']);

if(strcmp($ip,$theIp)==0){
     echo "怎么又是你...";
}else{
    $time = time() - $time;
    if($time < 2){
        echo "嘘..还有别人在哦~";
    }else{
        if($time < 60)
            $text = $time."秒";
        elseif($time < 3600)
            $text = floor($time / 60) . "分钟";
        elseif($time < 86400)
            $text = floor($time / 3600) ."小时";
        else
            $text = floor($time / 86400) . "天";

        echo $text."前有别人路过哦~";
    }
}
?>
