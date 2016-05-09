<?php

require_once('config.php');

$content = file_get_contents('https://mcapi.ca/query/' . $serverIp . ': ' . $serverPort . '/list');
$json = json_decode($content, true);

if($json['Players']['list'] == false) {
    echo "<h5>No Players Online!</h5>";
} else {
    echo "<div class='row'>";
    foreach($json['Players']['list'] as $player) {
        echo '<div class="col s4 m3 l2"><div class="avatar"><div class="bg-grad"></div><img src="https://mcapi.ca/avatar/2d/' . $player . '" alt="' . $player . '"><span class="avatar-name"><strong>' . $player . '</strong></span></div></div>';
    }
    echo "</div>";
}

?>