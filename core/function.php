<?php

function url (string $path = null): string {
    $url = isset($_SERVER['HTTPS'])? "https" : "http"."://" . $_SERVER["HTTP_HOST"];
    if(isset($path)){
        $url .= "/".$path;
    }
    return $url;
}


function alert(string $message ,string $color = "success"){
    return "<div class ='alert alert-$color'>$message</div>";
}

function showDateTime(string $timeStamp , $format = "j M Y"  ) :string {
    return date($format , strtotime($timeStamp));
}