<?php

require_once('config.php');

$content = file_get_contents('https://mcapi.ca/query/' . $serverIp . ': ' . $serverPort . '/motd');
$json = json_decode($content, true);

if(isset($json['status']) and $json['status'] == false) {
    echo "Offline";
} elseif(isset($json['motd'])) {
    echo $json['motd'];
} else {
    echo "Error";
}

?>