<?php

require_once('config.php');

$content = file_get_contents('https://api.buycraft.net/v4?action=packages&secret=' . $buycraftSecret);
$json = json_decode($content, true);

$content1 = file_get_contents('https://api.buycraft.net/v4?action=info&secret=' . $buycraftSecret);
$json1 = json_decode($content1, true);

$categories = array();

foreach($json['payload'] as $package){
    $category = $package['category'];
    if(array_key_exists($category, $categories)) {
       array_push($categories[$category], $package); 
    } else {
        $categories[$category] = array($package);
    }
}

foreach(array_keys($categories) as $cat) {
    $content2 = file_get_contents('https://api.buycraft.net/v4?action=categories&secret=' . $buycraftSecret);
    $json2 = json_decode($content2, true);
    
    $catName = "Error";
    
    foreach($json2['payload'] as $cat1) {
        if($cat1['id'] == $cat) {
            $catName = $cat1['name'];
        }
    }
    
    echo "<div class='card " . getThemeColour()['store:category'] . "'><div class='card-content'><span class='card-title " . getThemeColour()['store:category:text'] . "'>" . $catName . "</span><div class='row'>";
    foreach($categories[$cat] as $package) {
        echo "<div class='col s12'><div class='card " . getThemeColour()['store:package'] . " " . getThemeColour()['store:package:text'] . "'><div class='card-content'><span class='card-title'>" . $package['name'] . "</span><p>" . $package['description'] . "</p><div class='card-action'><strong><a class='btn white black-text' href='https://" . $buycraftSubdomain . ".buycraft.net/checkout/packages?direct=true&action=add&package=" . $package['id'] . "'>Buy for " . $package['price'] . " " . $json1['payload']['serverCurrency'] . "</strong></a></div></div></div></div>";
    }
    echo "</div></div></div>";
}

?>