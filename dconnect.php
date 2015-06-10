<?php
//include("../kazi2/include/constants.php");
$hostname = "localhost";
$db_user = "root";
$db_password="";
$database="kikuyuwebportal"; 

$db = mysql_connect($hostname,$db_user,$db_password);
mysql_select_db($database,$db);

?>