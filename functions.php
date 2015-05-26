<?php
require('db.php');
//insert new url
function make_short_url($url){
    global $server;
    $short = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 6);

    $insert_db = mysql_query("INSERT INTO urls (url_link, url_short) VALUES
        (
        '".$url."',
        '".$short."'
        )
    ");
    if(!$insert_db){
      return false;  
    }else{
        $link = $server . $short;
        return $link;
    }
    mysql_close($db);
}

function do_redirect($sl){
    $redirect = mysql_fetch_assoc(mysql_query("SELECT url_link FROM urls WHERE url_short = '".$sl."'"));
    $redirect = $redirect['url_link'];
    //echo $redirect;
    header('HTTP/1.1 301 Moved Permanently');  
    header("Location: ".$redirect);   
}
function track_traffic($url){
    $time= time();
    $client_ip=$_SERVER['REMOTE_ADDR'];
    $insert_db = mysql_query("INSERT INTO hits (url_short, time_stamp, client_ip) VALUES
        (
        '".$url."',
        '".$time."',
        '".$client_ip."'
        )
    ");
    if(!$insert_db){
      return false;  
    }else{
        return true;
    }
    mysql_close($db);
}
//Getting site statistics 
?>