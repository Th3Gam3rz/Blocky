<?php

    require_once('config.php');
    
    $content1 = file_get_contents('https://mcapi.ca/query/' . $serverIp .  ': ' . $serverPort . '/info');
    $json1 = json_decode($content1, true);
    
    echo "<strong>";
    
    if($json1['status'] == false) {
        echo "Offline";
    } else {
        echo "<a href='currently-ingame.php'>" . $json1['players']['online'] . "/" . $json1['players']['max'] . " Players Online</a>";
        echo "<br>Minecraft v" . $json1['version'];
        if($serverPort != "25565") {
            echo "<br>Connect with: ". $serverIp . ":" . $serverPort . "";
        } else {
            echo "<br>Connect with: ". $serverIp . "";
        }
    }
    
    echo "</strong>";

?>