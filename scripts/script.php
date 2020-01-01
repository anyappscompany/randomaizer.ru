<?php
include_once("../db.php");
include_once("../functions.php");

switch ($_GET['sn']) {
    case "generator-yaponskih-imen-i-familiy":
        include_once("generator-yaponskih-imen-i-familiy.php");
        break;
    case "generator-japonskih-nikov":
        include_once("generator-japonskih-nikov.php");
        break;
    case "generator-angliyskih-imen-i-familiy":
        include_once("generator-angliyskih-imen-i-familiy.php");
        break;
    default:
        echo "i равно 1";
        break;
}

?>