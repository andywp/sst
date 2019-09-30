<?php
/* if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
     $redirect= "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
     header("Location:".$redirect);
} */
if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
	$uri = 'https://';
} else {
	$uri = 'http://';
}
$uri .= $_SERVER['HTTP_HOST'].'/';
require('./setting.php');
$system->loadTheme();
?>