<?php
session_start();

include( "header.php");
include("dconnect.php");
//include("../kazi2/include/constants.php");
include("include/form.php");




//$useremail = check_input($_POST['useremail']);
$theName = $_POST[theName];

//$vacancytitle = check_input($_POST['vacancytitle']);
$rank = $_POST[rank];

//$responsibilities = check_input($_POST['responsibilities']);
$dob = $_POST[dob];

//$qualifications = check_input($_POST['qualifications']);
$gender = $_POST[gender];

$stationid = $_POST[stationid];



 $field = "theName";
if(!$theName || strlen($theName = trim($theName)) == 0){
          $errmsg = "*Enter the Date";
		 setError($field, $errmsg);
		 }
		 
$field = "rank";
if(!$rank || strlen($rank = trim($rank)) == 0){
          $errmsg = "*Enter the Officer Rank";
		 setError($field, $errmsg);
		 }
$field = "dob";
if(!$dob || strlen($dob = trim($dob)) == 0){
          $errmsg = "*Enter the Date of Birth";
		 setError($field, $errmsg);
		 }
		 
$field = "gender";
if(!$gender|| strlen($gender = trim($gender)) == 0){
          $errmsg = "*Enter the Gender";
		 setError($field, $errmsg);
		 }	
		 
$field = "stationid";
if(!$stationid|| strlen($station = trim($stationid)) == 0){
          $errmsg = "*Enter the StationID";
		 setError($field, $errmsg);
		 }	
 
		 
		 
$num_errors = count($errors);
 

if ($num_errors > 0){
?>
	<html>
    <head>
	<title>Get A Cop | Staff Details</title>
	<link rel="shortcut icon" href="images/favicon.ico" />
	<meta http-equiv="Content-Type"
content="text/html;&gt;&lt;?php echo _ISO; ?&gt;" />
<>
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
				<h2 class="title"><center>Staff Information</center></h2>
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
    <table width="83%" border="0" cellspacing="10" cellpadding="4" align="center">
	<tr class='TRHeader'>
	  <td colspan="2"><b>POLICE STATION STAFF INFORMATION</b></td></tr>
	 <tr>
	   <td width="25%"><b> Name*</b></td>
	   <td><input type="text" name="theName" size="40" maxlength="80" class="memorize" value ="<?php echo "".value("theName").""; ?>"/></td><td><?php
	   echo "".error("theName").""; ?>
	   </td>
	 </tr>
	 <tr>
	   <td width="25%"><b>Grade*</b></td>
	   <td><select name="suspectid2" id="suspectid" >
	     <?php 
                                                    	$query_disp="SELECT * FROM grade";
														$result_disp = mysql_query($query_disp);
														while($query_data = mysql_fetch_array($result_disp))
														{
														?>
	     <option value="<? echo $query_data['gradeID']; ?>" > <?php echo $query_data['gradeid'] ;?></option>
	     <?php
														}
														
														?>
        </select></td><td><?php echo "". error("rank").""; ?> </td></tr>
	 
		 
      <tr>
        <td width="25%"><b>Date of Birth</b></td>
        <td><input type="text" name="dob" size="20" maxlength="60" class="memorize" value ="<?php echo "".value("dob").""; ?>"/></td><td><?php echo "". error("dob").""; ?> </td></tr>
	  
	 <tr>
	   <td width="25%" valign="top"><b>Gender</b></td>
	 <td><input type="text" name="gender" class="memorize" value ="<?php echo "".value("gender").""; ?>" ></td><td><?php echo "". error("gender").""; ?> </td></tr>
     <tr>
	   <td width="25%" valign="top"><b>Station ID</b></td>
	 <td><select name="suspectid" id="suspectID" >
	   <?php 
                                                    	$query_disp="SELECT * FROM station";
														$result_disp = mysql_query($query_disp);
														while($query_data = mysql_fetch_array($result_disp))
														{
														?>
	   <option value="<? echo $query_data['StationID']; ?>" > <?php echo $query_data['Name'] ;?></option>
	   <?php
														}
														
														?>
	   </select></td><td><?php echo "". error("stationid").""; ?> </td></tr>
	 
	 
	 
	 
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
$query = "INSERT INTO policestaff(officerName,gradeid,DOB,gender,StationID) VALUES ('$theName','$rank','$sdob','$gender','$stationid')";
echo $query;
$result = mysql_query($query);
if ($result){
  echo "The Staff details were entered into the database";
}

}
include( "footer.php");
?> 