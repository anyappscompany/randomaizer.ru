<?php

switch($_GET['gender']){
    case "any_gender":{
        if($_GET['name']){
            $rnd = rand(0, 1);
            if($rnd == 0){
                $result = mysql_query("SELECT count(*) as total from en_men_names");
                $data = mysql_fetch_assoc($result);
                $result = mysql_query("SELECT text FROM en_men_names WHERE id=".rand(0, ($data['total']-1))." LIMIT 1");
                $row = mysql_fetch_assoc($result);
                $name = $row['text'];
            }else if($rnd == 1){
                $result = mysql_query("SELECT count(*) as total from en_woomen_names");
                $data = mysql_fetch_assoc($result);
                $result = mysql_query("SELECT text FROM en_woomen_names WHERE id=".rand(0, ($data['total']-1))." LIMIT 1");
                $row = mysql_fetch_assoc($result);
                $name = $row['text'];
            }
        }
        break;
    }
    case "men":{
        if($_GET['name']){
            $result = mysql_query("SELECT count(*) as total from en_men_names");
            $data = mysql_fetch_assoc($result);
            $result = mysql_query("SELECT text FROM en_men_names WHERE id=".rand(0, ($data['total']-1))." LIMIT 1");
            $row = mysql_fetch_assoc($result);
            $name = $row['text'];
        }
        break;
    }
    case "woomen":{
        if($_GET['name']){
            $result = mysql_query("SELECT count(*) as total from en_woomen_names");
            $data = mysql_fetch_assoc($result);
            $result = mysql_query("SELECT text FROM en_woomen_names WHERE id=".rand(0, ($data['total']-1))." LIMIT 1");
            $row = mysql_fetch_assoc($result);
            $name = $row['text'];
        }
        break;
    }
}
$name = mb_ucfirst($name);
if($_GET['surname']){
    $result = mysql_query("SELECT count(*) as total from en_surnames");
    $data = mysql_fetch_assoc($result);
    $result = mysql_query("SELECT text FROM en_surnames WHERE id=".rand(0, ($data['total']-1))." LIMIT 1");
    $row = mysql_fetch_assoc($result);
    $name .= " ".mb_ucfirst($row['text']);
}


//echo "<input id=\"gen-result\" onClick=\"copy_to_clipboard_result(this)\" name=\"\" value=".$name."><br /><a onClick=\"copy_to_clipboard_result(); return false;\" href=\"#\">Копировать</a>";
echo $name;
//echo $_GET['name'].$_GET['surname'].$_GET['gender'];


?>