<?php


$db_host="localhost";
$db_pass="";
$db_user="root";
$db = "url_shortner";

$con =  mysqli_connect($db_host,$db_user,$db_pass,$db);
if(!'con'){

	 die('Could not connect: ' . mysql_error());
         }
        
     
?>