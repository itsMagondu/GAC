<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>MAGISTRATE REPORT</title>
</head>

<body bgcolor="#0066FF">
<?PHP
include("header.php");
include( "dconnect.php");
$query= "SELECT *FROM arrest";
$result = mysql_query($query);
?>
<h3 style = "color:#000000">
ARRESTS REPROTS</h3>
   <table border = "1" cellpadding="3" cellspacing="2"
   style="background-color: #ADD8E6">
   <tr><td>ARREST ID</td><td>DATE</td><td>OFFENCE</td><td>SUSPECT ID</td><td> STAFFID</td></tr>
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
include("footer.php");
?>
</table>
</body>
</html>
