<?php
session_start();
include("header.php");

include("dconnect.php");
//include("../kazi2/include/constants.php");
include("include/form.php");




//$useremail = check_input($_POST['useremail']);
$theName = $_POST[theName];

//$vacancytitle = check_input($_POST['vacancytitle']);
$district = $_POST[district];

//$responsibilities = check_input($_POST['responsibilities']);

//$qualifications = check_input($_POST['qualifications']);




 $field = "theName";
if(!$theName || strlen($theName = trim($theName)) == 0)
{
          $errmsg = "*Enter the Station Name";
		 setError($field, $errmsg);
		 }
		 

$field = "district";
if(!$district || strlen($district = trim($district)) == 0)
{
          $errmsg = "*Enter the district Name";
		 setError($field, $errmsg);
		 }	 
		 
		 
		 
$num_errors = count($errors);
 

if ($num_errors > 0){
?>
	<html>
    <head>
	<title>Get A Cop | Station Details</title>
	<link rel="shortcut icon" href="images/favicon.ico" />
	<meta http-equiv="Content-Type"
content="text/html;&gt;&lt;?php echo _ISO; ?&gt;" />
<link rel="stylesheet" href="css/template_css.css" type="text/css"/><link rel="shortcut icon" href="images/favicon.jpg" />

	</head>
    <body>
	<?php //include('header.php');?>

	<?php //include('menu.html'); ?>


	<div id="page">
	<div id="page-bgtop">
	<div id="page-bgbtm">
		<div id="content">
			<div class="post">
				<h2 class="title"><center>
				   County Information
				</center></h2>
				<div class="entry" style="padding:15px; width:500px;">
		<table class="contentpaneopen">
				<tr>
			<td height="447" colspan="2" valign="top"><br />

	
	<?php echo "<strong>Please fill in the $num_errors fields required in the form or correct them as indicated in red. </strong>";
	
	

	//var_dump($errors);
	//var_dump($values);
	//var_dump($_POST['vacancytitle']);


	?>
	<br>
	 <form style="background-color:#CCC" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <table width="77%" border="0" cellspacing="5" cellpadding="5" align="center">
	<tr class='TRHeader'>
	  <td colspan="2"><b>COUNTY INFORMATION</b></td></tr>
	 <tr>
	   <td width="25%"><b> Name*</b></td>
	   <td><input type="text" name="theName" size="40" maxlength="80" class="memorize" value ="<?php echo "".value("theName").""; ?>"/></td><td><?php echo "".error("theName").""; ?>
	   </td>
	 </tr>
	  
	 	 
	 
	 
	  <tr><td width="25%"></td><td><input type="submit" value="POST DATA"/></td><td><input type="reset" value="Reset!"></td></tr>
    </table>
</form>
</div>
			</div>

<?php //var_dump($_SESSION['value_array']);?>
<br>

<?php //var_dump($values); ?>

<?php //var_dump($thevalue); ?>
	
</body>
    </html>
	<?php
}
else {
echo "$num_errors No. of errors were found. Fname is $fname";
$query = "INSERT INTO county_tbl (Name) VALUES ('$theName')";
echo $query;
$result = mysql_query($query);
if ($result)
{
  echo "The vacancy details were entered into the database";
}

}
include("footer.php");
?> 