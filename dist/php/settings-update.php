<?php

require('config.php');

$config = getConfig();

$config['server_name'] = $_POST['server_name'];
$config['server_ip'] = $_POST['server_ip'];
$config['server_port'] = $_POST['server_port'];

$config['theme'] = $_POST['website_theme'];

write_php_ini($config, "config.ini");

setTermsAndConditions($_POST['website_terms']);
setPrivacyPolicy($_POST['website_privacy']);

header("Location: ../admin.php");
exit();

?>