<?php

function mb_ucfirst($string){
    return mb_strtoupper(mb_substr($string, 0, 1, 'UTF-8'), 'UTF-8') . mb_substr($string, 1, mb_strlen($string), 'UTF-8');
}

function is_page(){
    $mix = explode("/", $_SERVER['REQUEST_URI']);

    if(count($mix)==3 && $mix[0] == "" && $mix[1] == "p" && preg_match("/\/[a-z0-9-]+\.html/", $_SERVER['REQUEST_URI'])){
        return true;
    }else{
        return false;
    }
}

function is_home(){
    if($_SERVER['REQUEST_URI'] == '/'){
        return true;
    }else{
        return false;
    }
}
?>