<?php

function getConfig() {
    return parse_ini_file("config.ini");
}

function getTermsAndConditions() {
    $terms = fopen($_SERVER['DOCUMENT_ROOT'] . "/php/terms.txt", "r");
    while(!feof($terms)) {
      echo fgets($terms) . "<br>";
    }
    fclose($terms);
}

function setTermsAndConditions($new) {
    $terms = fopen($_SERVER['DOCUMENT_ROOT'] . "/php/terms.txt", "w");
    fwrite($terms, $new);
    fclose($terms);
}

function getPrivacyPolicy() {
    $privacy = fopen($_SERVER['DOCUMENT_ROOT'] . "/php/privacy.txt", "r");
    while(!feof($privacy)) {
      echo fgets($privacy) . "<br>";
    }
    fclose($privacy);
}

function setPrivacyPolicy($new) {
    $privacy = fopen($_SERVER['DOCUMENT_ROOT'] . "/php/privacy.txt", "w");
    fwrite($privacy, $new);
    fclose($privacy);
}

$ini_array = parse_ini_file("config.ini");
$serverName = $ini_array['server_name'];
$serverIp = $ini_array['server_ip'];
$serverPort = $ini_array['server_port'];

$buycraftSecret = $ini_array['buycraft_secret'];
$buycraftSubdomain = $ini_array['buycraft_subdomain'];

$twitterUsername = $ini_array['twitter_username'];
$twitterWidgetId = $ini_array['twitter_widget_id'];

$themeCode = $ini_array['theme'];

function getTheme($code) {
    $ini_array2 = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . "/themes/" . $code . ".ini");
    return $ini_array2;
}

function isActive($code) {
    $ini_array1 = parse_ini_file("config.ini");
    $themeCode1 = $ini_array1['theme'];
    return $code == $themeCode1;
}

function getThemeColour() {
    $ini_array1 = parse_ini_file("config.ini");
    $themeCode1 = $ini_array1['theme'];
    if(file_exists($_SERVER['DOCUMENT_ROOT'] . "/themes/" . $themeCode1 . ".ini")) {
        $ini_array2 = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . "/themes/" . $themeCode1 . ".ini");
        return $ini_array2;
    } else {
        return array("nav" => "red lighten-2", "nav:text" => "light", "footer" => "red lighten-2", "footer:text" => "light", "main" => "red lighten-2", "main:text" => "light", "interaction" => "red lighten-2", "interaction:text" => "light", "twitter" => "red lighten-2", "twitter:text" => "light", "store:server" => "red lighten-2", "store:server:text" => "light", "store:category" => "white", "store:category:text" => "dark", "store:package" => "red lighten-2", "store:package:text" => "light",);
    }
    /*if(strtolower(trim($themeCode1)) == "blockyred") {
        return array("nav" => "red lighten-2", "footer" => "red lighten-2", "main" => "red lighten-2", "interaction" => "red lighten-2", "twitter" => "red lighten-2", "store" => array("server" => "red lighten-2", "category" => "white", "package" => "red lighten-2"));
    }
    elseif(strtolower(trim($themeCode1)) == "simplygreen") {
        return "green lighten-1";
    }
    elseif(strtolower(trim($themeCode1)) == "autumngreen") {
        return "green darken-2";
    }
    elseif(strtolower(trim($themeCode1)) == "radiatingpink") {
        return "pink lighten-3";
    }
    elseif(strtolower(trim($themeCode1)) == "royale") {
        return "pink darken-4";
    }
    elseif(strtolower(trim($themeCode1)) == "industrial") {
        return "blue-grey darken-3";
    }
    elseif(strtolower(trim($themeCode1)) == "oceanblue") {
        return "teal lighten-1";
    }
    elseif(strtolower(trim($themeCode1)) == "sky") {
        return "light-blue lighten-1";
    }
    elseif(strtolower(trim($themeCode1)) == "sunrayyellow") {
        return "yellow";
    } else {
        return "red lighten-2";
    }
    */
}

function getAllThemeCodes() {
    $files = scandir($_SERVER['DOCUMENT_ROOT'] . "/themes");
    $codes = array();
    foreach($files as $file) {
        if(strpos($file, ".ini")) {
            array_push($codes, str_replace(".ini", "", $file));
        }
    }
    return $codes;
}

function getAllThemeNames() {
    $codes = getAllThemeCodes();
    $names = array();
    foreach($codes as $code) {
        $theme = getTheme($code);
        array_push($names, $theme['name']);
    }
    return $names;
}

function getAllThemePairs() {
    $files = scandir($_SERVER['DOCUMENT_ROOT'] . "/themes");
    $pairs = array();
    foreach($files as $file) {
        if(strpos($file, ".ini")) {
            array_push($pairs, array(str_replace(".ini", "", $file), getTheme(str_replace(".ini", "", $file))['name']));
        }
    }
    return $pairs;
}

function getThemeDropdown() {
    foreach(getAllThemePairs() as $pair) {
        $code = $pair[0];
        $name = $pair[1];
        if(isActive($code)) {
            echo "<option value='" . $code . "' selected>" . ucwords($name) . "</option>";
        } else {
            echo "<option value='" . $code . "'>" . ucwords($name) . "</option>";
        }
    }
}

function write_php_ini($array, $file)
{
    $res = array();
    foreach($array as $key => $val)
    {
        if(is_array($val))
        {
            $res[] = "[$key]";
            foreach($val as $skey => $sval) $res[] = "$skey = ".(is_numeric($sval) ? $sval : '"'.$sval.'"');
        }
        else $res[] = "$key = ".(is_numeric($val) ? $val : '"'.$val.'"');
    }
    safefilerewrite($file, implode("\r\n", $res));
}

function safefilerewrite($fileName, $dataToSave)
{
    if ($fp = fopen($fileName, 'w'))
    {
        $startTime = microtime(TRUE);
        do
        {
            $canWrite = flock($fp, LOCK_EX);
           // If lock not obtained sleep for 0 - 100 milliseconds, to avoid collision and CPU load
           if(!$canWrite) usleep(round(rand(0, 100)*1000));
        }
        
        while ((!$canWrite)and((microtime(TRUE)-$startTime) < 5));

        //file was locked so now we can store information
        if ($canWrite)
        {
            fwrite($fp, $dataToSave);
            flock($fp, LOCK_UN);
        }
        fclose($fp);
    }

}

?>