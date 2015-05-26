 <?php

//mysql db connection information
$hostname = "localhost";        //database host name
$database = "short_url";    //name of your database
$username = "root"; //username for your database
$password = ""; //password
$server="http://localhost/c/url_shortner/";
$db = mysql_connect($hostname, $username, $password); 
mysql_select_db($database, $db);


?> 