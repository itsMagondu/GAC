<?php
session_start();
include("header.php");


include("dconnect.php");
//include("../kazi2/include/constants.php");
include("include/form.php");



$thedate = $_POST[datepicker];

$offence = $_POST[offence];

$suspectid = $_POST[suspectid];

$staffid = $_POST[staffid];



$field = "thedate";
if (!$thedate) {
    $errmsg = "*Enter the Date";
    setError($field, $errmsg);
}

$field = "offence";
if (!$offence || strlen($offence = trim($offence)) == 0) {
    $errmsg = "*Enter the Offences";
    setError($field, $errmsg);
}


$num_errors = count($errors);


if ($num_errors > 0) {
    ?>

    <?php //include('header.php'); ?>

    <?php //include('menu.html');   ?>

    <script>
        $(function(){
            $("#arrest_date").datepicker({dateFormat:'yy-mm-dd'});
        });
    </script>
    <div id="page">
        <div id="page-bgtop">
            <div id="page-bgbtm">
                <div id="content">
                    <div class="post">
                        <h2 class="title"><center> Arrest Information</center></h2>
                        <div class="entry" style="padding:15px; width:500px;">
                            <table class="contentpaneopen">
                                <tr>
                                    <td height="447" colspan="2" valign="top"><br />


                                        <?php
                                        echo "<strong>Please fill in the $num_errors fields required in the form </strong>";
                                       // var_dump($errors);
                                        //var_dump($values);
                                        //var_dump($_POST['vacancytitle']);
                                        ?>
                                        <br>
                                        </br>
                                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>"method="POST" enctype="multipart/form-data"  style="background-color:#CCC">

                                            <table width="70%" border="0" cellspacing="10" cellpadding="2" align="center" >
                                                <tr class='TRHeader'><td colspan="2"><b>PERSONAL INFORMATION</b></td></tr>
                                                <tr>
                                                    <td width="25%"><b> Date*</b></td>
                                                    <td>
                                                        <input type = "text" name="datepicker" id ="datepicker" onclick='scwShow(this,event);' value='' />
                                                    </td><td><?php echo "" . error("thedate") . ""; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="25%"><b>Offence*</b></td>
                                                    <td><textarea cols="45" rows="5" name="offence" class="memorize" value ="<?php echo "" . value("offence") . ""; ?>" ></textarea></td><td><?php echo "" . error("offence") . ""; ?> </td></tr>


                                                <tr>
                                                    <td width="25%"><b>Suspect ID</b></td>
                                                    <td>
                                                    <select name="suspectid" id="suspectID" >
                                                    <?php 
                                                    	$query_disp="SELECT * FROM suspects";
														$result_disp = mysql_query($query_disp);
														while($query_data = mysql_fetch_array($result_disp))
														{
														?>
														<option value="<? echo $query_data['SuspectID']; ?>" > <?php echo $query_data['SuspectName'] ;?> </option>
														<?php
														}
														
														?>
														</select></td><td><?php echo "" . error("suspectid") . ""; ?> </td></tr>

                                                <tr>
                                                    <td width="25%" valign="top"><b>Staff ID</b></td>
                                                    <td><select name="staffid"  id="staffid">
                                                      <?php 
                                                    	$query_disp="SELECT * FROM policestaff";
														$result_disp = mysql_query($query_disp);
														while($query_data = mysql_fetch_array($result_disp))
														{
														?>
                                                      <option value="<? echo $query_data['policeID']; ?>" > <?php echo $query_data['OfficersName'] ;?></option>
                                                      <?php
														}
														
														?>
                                                    </select></td><td><?php echo "" . error("staffid") . ""; ?> </td></tr>




                                                <tr><td width="25%"></td><td><input type="submit" value="POST DATA"/></td><td><input type="reset" value="Reset!"></td></tr>
                                            </table>
                                        </form>

                                        </div>


                                        <?php
            } 
            else 
			{
                 $query = "INSERT INTO arrests(Dateofarrest,Offenceid,suspectID,staffID) VALUES ('$thedate','$offence','$suspectid','$staffid')";
                                        //echo $query;
                                        $result = mysql_query($query);
                                      if ($result) {
                                     echo "              The Arrest details were entered into the database";
                                     }
                            }
            include("footer.php");
  ?> 