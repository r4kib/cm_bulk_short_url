<?php 
require('db.php');
if(array_key_exists('short',$_GET)){
    $short = $_GET['short'];
    $short= rtrim($short, '-');
    $result=mysql_query("SELECT time_stamp FROM hits WHERE url_short = '".$short."'");
    $today=0;
    $week=0;
    $month=0;
    $all=0;
    $pt=time();
    while($rows = mysql_fetch_assoc($result)){
       $t= intval($rows['time_stamp']);
        $ago=$pt -$t;
        if($ago <= 86400){
            $today++;
        }
         if($ago <= 604800){
            $week++;
        }
         if($ago <= 2592000){
            $month++;
        }
        
        $all++;
    }
     mysql_close($db);
}else{
echo 'Access Denied';
}
?>
<!DOCTYPE HTML>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>statistics for</title>
</head>

<body>
<h1> Stats for : <?php echo($server . $short); ?></h1>
<h2> Last 24 hours clicks : <?php echo $week; ?></h2>
    <h2> This Week clicks : <?php echo $today; ?></h2>
    <h2> This month clicks : <?php echo $month; ?></h2>
    <h2> Lifetime clicks : <?php echo $all; ?></h2>
	
</body>

</html>