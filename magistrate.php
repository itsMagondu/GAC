<?php
session_start();
include("header.php");

include("dconnect.php");
//include("../kazi2/include/constants.php");
include("include/form.php");




//$useremail = check_input($_POST['useremail']);
$name = $_POST[name];

//$vacancytitle = check_input($_POST['vacancytitle']);
$court = $_POST[courtid];

//$responsibilities = check_input($_POST['responsibilities']);
$title = $_POST[titleid];



 $field = "name";
if(!$name || strlen($name = trim($name)) == 0){
          $errmsg = "*Enter the Names";
		 setError($field, $errmsg);
		 }
		 
$field = "courtid";
if(!$court || strlen($court = trim($court)) == 0){
          $errmsg = "*Enter the Date of Birth";
		 setError($field, $errmsg);
		 }
$field = "titleid";
if(!$title || strlen($title = trim($title)) == 0){
          $errmsg = "*Enter the sex";
		 setError($field, $errmsg);
		 }
		 
		 
		 
		 
$num_errors = count($errors);
//$num_errors = 0;
 

if ($num_errors > 0){
?>
	<html>
    <head>
	<title>Get A Cop | Arrest Details</title>
	<meta name="description" content="online accounting system" />
<meta name="keywords" content="ricasi, mombasa, bamburi, accounting, kenya, ricasi consulting, google, yahoo, kra, kra pin, budget, tax, kpmg, pwc, delloitte, forensic audit, corporate, finance, staff training, eric, agava, magada, obunga, accounting system, audit, human resources" />
<meta name="Generator" content="PHP" />
<meta name="robots" content="index, follow" />
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
				<h2 class="title"> <center>  Magistrate Information </center></h2>
				<div class="entry"  style="padding:15px; width:500px;">
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
    <table width="67%" border="0" cellspacing="6" cellpadding="5" align="center">
	<tr class='TRHeader'>
	  <td colspan="2"><b>MAGISTRATE INFORMATION</b></td></tr>
	 <tr>
	   <td width="25%"><b> Name</b></td>
	   <td width="49%"><input type="text" name="name" size="40" maxlength="80" class="memorize" value ="<?php echo "".value("name").""; ?>"/></td><td width="26%"><?php echo "".error("name").""; ?>
	   </td>
	 </tr>
	 <tr>
	   <td><b>Court  ID</b></td>
	   <td><select name="courtid"  >
	     <?php 
                                                    	$query_disp="SELECT * FROM courts";
														$result_disp = mysql_query($query_disp);
														while($query_data = mysql_fetch_array($result_disp))
														{
														?>
	     <option value="<? echo $query_data['courtID']; ?>" > <?php echo $query_data['CourtID'] ;?></option>
	     <?php
														}
														
														?>
	     </select></td>
	   <td><?php echo "" . error("suspectid") . ""; ?></td>
	   </tr>
	 <tr>
	   <td valign="top"><b>Title ID</b></td>
	   <td><select name="titleid" >
	     <?php 
                                                    	$query_disp="SELECT * FROM judgetitle";
														$result_disp = mysql_query($query_disp);
														while($query_data = mysql_fetch_array($result_disp))
														{
														?>
	     <option value="<? echo $query_data['titleID']; ?>" > <?php echo $query_data['titleID'] ;?></option>
	     <?php
														}
														
														?>
	     </select></td>
	   <td><?php echo "" . error("titleid") . ""; ?></td>
	   </tr>
	 
	 
	  <tr><td width="25%"></td><td><input type="submit" value="POST DATA"/></td><td><input width="10px" type="reset" value="Reset!"></td></tr>
    </table>
</form>


<?php //var_dump($_SESSION['value_array']);?>
<br>

<?php //var_dump($values); ?>

<?php //var_dump($thevalue); ?>
	
</body>
    </html>
	<?php
}
else {

$query = "INSERT INTO magistrates(MagistrateName,DOB,sex) VALUES ('$name','$court','title')";
$result = mysql_query($query);
if ($result){
  echo "The vacancy details were entered into the database";
}

}
include("footer.php");
?> 