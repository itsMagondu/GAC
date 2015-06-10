<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>MAGISTRATE REPORT</title>

</head>

<body bgcolor="#0066FF">
<?PHP
include( "header.php");
include( "dconnect.php");
$query= "SELECT *FROM magistrates";
$result = mysql_query($query);
?>

<div id="table">  
 <h3 style = "color:#000000"> <center> MAGISTRATES</center></h3>
     <br />
  <table width="560" border = "2" align="center" cellpadding="3" cellspacing="2"
   style="background-color: #ADD8E6" >
   <tr><td>MAGISTRATE ID</td><td>NAME</td><td>DATE OF BIRTH</td><td>SEX</td><td>DELETE</td></tr>
   
   <?php
   //fetch each record in result set
   for ( $counter = 0; $row = mysql_fetch_row( $result ); $counter ++ ){
   
			
		//build table to display results
		print("<tr>");
		foreach ( $row as $key => $value )
		print("<td>$value</td>");
		
		$info = mysql_fetch_array( $results );			
		$record=$info['Magistrateid'];
	echo "<td ><a href = \"delete.php?table=magistrates&&field=Magistrateid&&value=$record\">Remove Magistrate</a></td>";
			//echo "<td><a href = \"remove_judge1.php?table=$info['Magistrateid']&&field=$magistrateid&&value=$value\">Remove Judge</a></td>";
			
			
			
			
			
			
			
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
