<?php require('functions.php'); ?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>URL shrinker</title>
</head>

<body>

<h1> URL to shrink: </h1>
<form id="form1" name="form1" method="get" action="">
  <input name="url" type="text" id="url" value="http://" size="75" />
  <input type="submit" name="Submit" value="Go" />
</form>

<?php 
    if(array_key_exists('url',$_GET)){
    if (filter_var(trim($_GET['url']), FILTER_VALIDATE_URL) != false) {
        $url = addslashes(trim($_GET['url']));
        for ($x = 0; $x <= 10; $x++) {
            if (make_short_url($url) != false){
                if(isset($short_links)){
                    $short_links.= (make_short_url($url)."\n");
                }else{
                    $short_links= (make_short_url($url)."\n");
                }
            }else{
                echo "Database error";
            }
            
        } 

    }elseif($_GET['url']){
        $error='The URL is not valid';
    }
}
?>
        <h2>
        <?php if(isset($url)){ echo $url; } ?>
    </h2>
<?php 
    if(isset($short_links)){
        echo "<textarea rows='11' cols='50'>". $short_links . "</textarea>";
        }
    ?>
    <h2>
        <?php if(isset($error)){ echo $error; } ?>
    </h2>
<br />
<br />
    <h3><a href="javascript:void(location.href='<?php echo $server; ?>index.php?url='+encodeURIComponent(location.href))">Drag this to browser bookmark Bar</a></h3>
<br />

</body>
</html>