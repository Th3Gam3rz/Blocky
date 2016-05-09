<?php

require_once('config.php');

if($buycraftSecret == "") {
    echo "<h5>No Buycraft Secret Specified!</h5>";
    exit();
}

$content = file_get_contents('https://api.buycraft.net/v4?action=info&secret=' . $buycraftSecret);
$json = json_decode($content, true);

if($json['code'] == 101) {
    echo "<h5>Incorrect Buycraft Information</h5>";
} else {
    echo "<strong><a class='" . getThemeColour()['store:server:text'] . "' href='" . $json['payload']['serverStore'] . "'>" . $json['payload']['serverName'] . "</a></strong>";
}

?>