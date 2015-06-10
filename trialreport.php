<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>TRIAL REPORT</title>
</head>

<body bgcolor="#0066FF">
<?PHP
include( "header.php");
include( "dconnect.php");
$query= "SELECT *FROM trial";
$result = mysql_query($query);
?>
<div id="table">
<br />
<h3 style = "color:#000000"><center>TRIAL</center></h3>
<br />
   <table width="547" border = "1" align="center" cellpadding="3" cellspacing="2"
   style="background-color: #ADD8E6">
   <tr><td width="81">TRIAL ID</td><td width="51">DATE</td><td width="113">VERDICT</td><td width="92">ARRESTID</td><td width="156">MAGISTRATE ID
   <?php
   //fetch each record in result set
   for ( $counter = 0;
   		$row = mysql_fetch_row( $result );
		$counter ++ ){
		//build table to display results
		print("<tr>");
		foreach ( $row as $key => $value )
			print("<td>$value</td>");
		print( "</tr>");
	}
?>
</table>
</div>
</body>
<?php
include( "footer.php");
?>
</html>
