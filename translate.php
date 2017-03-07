<?php
session_start();
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
if(isset($_REQUEST["lang"])){
	$lang = $_REQUEST["lang"];
}else if(isset($_SESSION["lang"])){
	$lang = $_SESSION["lang"];
}else{
	$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
}
$_SESSION["lang"] = $lang;
//echo $lang;
/*
else if(startsWith($lang,"es")){
	include_once "index_es.html";
}
*/

if(startsWith($lang,"pt")){
	$file = "pt_BR.cls";
}else{
	$file = "en_US.cls";
}
$langFile = file_get_contents($file);
$langList = explode(PHP_EOL,$langFile);
$lang = array();
foreach ($langList as $item) {
	$itemE = explode("|",$item);
	$itemKey = $itemE[0];
	$itemValue = str_replace($itemKey.'|',"",$item);
    $lang[$itemKey] = $itemValue;
}
echo $lang["str1"];
function startsWith($haystack, $needle)
{
     $length = strlen($needle);
     return (substr($haystack, 0, $length) === $needle);
}
?>
<div class="lang container" style="text-align:right;">
		<a title="Português" href="?lang=pt">PT</a>
		<a title="English" href="?lang=en">EN</a>
</div>