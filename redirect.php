<?php 
require('functions.php')
?>
<?php 
 if(array_key_exists('redir',$_GET)){
    if ($_GET['redir']) {
        $url = addslashes($_GET['redir']);
        if(substr($url,-1)!= '-'){
            track_traffic($url);
            do_redirect($url);
        }elseif(substr($url,-1)== '-'){
            $link= 'stats.php?short=' . $url;
            header('HTTP/1.1 301 Moved Permanently');  
            header("Location: ".$link);   
        }
        } 
}
?>
