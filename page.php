<?php
$content = "";
$tags = array();
$mix = explode("/", preg_replace ("/[^\p{L}0-9-\/.]/iu","", $_SERVER['REQUEST_URI']));//print_r($mix);
$pageadress = str_replace(".html", "", $mix[2]);
$result = mysqli_query($db, "SELECT * FROM pages WHERE url='".$pageadress."' LIMIT 1");
$row = mysqli_fetch_assoc($result);       //print_r($row);

$result = mysqli_query($db, "SELECT * FROM pages WHERE script=".$row['script']." AND status=1");
while ($row2 = mysqli_fetch_array($result)) {     //echo "<hr>".$row2['id'];
    //echo $row2['kw'];
    if($row2['url']===$pageadress) continue;
    $tags[] = '<a href="http://'.$_SERVER['SERVER_NAME'].'/p/'.$row2['url'].'.html">'.mb_ucfirst($row2['kw']).'</a>';
    //$home_list .= '<img src="'.$row['iconimagepath'].'" width="150px" height="150px" /><a href="http://'.$_SERVER['SERVER_NAME'].'/p/'.$row['url'].'.html">'.mb_ucfirst($row['kw']).'</a><br />';
}
shuffle ($tags);
//echo $row['kw'];                                                             //echo $pageadress;

$result = mysqli_query($db, "SELECT * FROM scripts WHERE id='".$row['script']."' LIMIT 1");
$row3 = mysqli_fetch_assoc($result);      //print_r($row3);
$content .= file_get_contents($row3['script']);

$content .= "<p id='description'>".$row['description']."</p>";
if(count($tags)>0){
    $content .= '<div class="panel-group" id="tags-container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#tags-container" href="#tags">Теги</a> </h4>
                </div>
                <div id="tags" class="panel-collapse collapse">
                    <div class="panel-body">';

    $content .= "<p id='tags'>".implode (", ", array_slice ($tags, 0, 5))."</p>";
    $content .= '</div>
            </div>
        </div></div>';
}
//$content = str_replace("[GENBGIMAGE]", "/".$row3['backgroundimagepath'], $content);
//http://btmills.github.io/geopattern/
//$content = str_replace("[GENBGIMAGE]", "/template/images/default.png", $content);

$page_template = str_replace("[TITLE]", mb_ucfirst($row['kw'])." - ".$after_title_page, $page_template);

//$page_template = str_replace("[BODYSTYLE]", "background-image: url(/generator-yaponskih-imen-i-familiy/images/background.jpg); background-color: #D0CBB7;", $page_template);
$page_template = str_replace("[H1]", mb_ucfirst($row['kw']), $page_template);
$page_template = str_replace("[CONTENT]", $content, $page_template);
$page_template = str_replace("[META]", "", $page_template);

?>