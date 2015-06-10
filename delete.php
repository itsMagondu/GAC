<?php
session_start();

include('dconnect.php');


$table=$_SESSION['table'];
$field=$_SESSION['field'];
$record=$_SESSION['value'];



 $data = mysql_query("DELETE FROM $table WHERE $field='$record'") or die(mysql_error()); 
$num=mysql_num_rows($data);

//background
include('magistratereport1.php');
?>


	 <script>
	 alert("Record successfully deleted")
	window.location="magistratereport1.php"
	 </script>
<?	
//echo('record deleted'); 
?>



                  



