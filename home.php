<?php

$result = mysqli_query($db, "SELECT * FROM scripts");
$home_list = "";
//$row = mysql_fetch_assoc($result);
while ($row = mysqli_fetch_array($result)) {
    //$home_list .= '<img class="img-circle" src="'.$row['iconimagepath'].'" width="50px" height="50px" /> <a href="http://'.$_SERVER['SERVER_NAME'].'/p/'.$row['url'].'.html">'.mb_ucfirst($row['kw']).'</a><br />';
    $home_list .= '<p><img class="img-circle rand-script-icon-home" src="'."/template/images/default.png".'" width="50px" height="50px" /> <a href="http://'.$_SERVER['SERVER_NAME'].'/p/'.$row['url'].'.html">'.mb_ucfirst($row['kw']).'</a></p>';
}

$page_template = str_replace("[CONTENT]", $home_list."<p>".$home_description."</p>", $page_template);
$page_template = str_replace("[META]", "", $page_template);
$page_template = str_replace("[H1]", $home_h1, $page_template);
$page_template = str_replace("[TITLE]", $home_title, $page_template);



?>