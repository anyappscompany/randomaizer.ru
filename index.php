<?php
include_once("db.php");
include_once("functions.php");
include_once("options.php");

$page_template = file_get_contents("template/template.html");

if(is_page()){
    include_once('page.php');
}elseif(is_home()){
    include_once('home.php');
}else{
    header("Content-Type: text/html; charset=utf-8");
    header($_SERVER['SERVER_PROTOCOL']." 404 Not Found\r\n");
    include_once('404.php');
    exit();
}

$page_template = str_replace("[COPYRIGHT]", "&copy; ".date("Y")." ".$footer_text, $page_template);
$page_template = str_replace("[RAND]", md5(time() . mt_rand(1,1000000)), $page_template);
$page_template = str_replace("[SITENAME]", $site_name, $page_template);

//include_once("/generator-yaponskikh-imen-i-familii/index.php");
echo $page_template;
?>

