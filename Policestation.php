<?php
session_start();
include("header.php");


include("dconnect.php");
//include("../kazi2/include/constants.php");
include("include/form.php");



$thename = $_POST[name];


$countyid = $_POST[countyid];



$field = "thedate";
if (!$thedate) {
    $errmsg = "*Enter the Date";
    setError($field, $errmsg);
}

$field = "verdict";
if (!$verdict || strlen($verdict = trim($verdict)) == 0) {
    $errmsg = "*Enter the verdict";
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
                        <h2 class="title"><center>
                           Station Information
                        </center></h2>
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
                                                <tr class='TRHeader'>
                                                  <td colspan="2"><b>POLICE STATION INFORMATION</b></td></tr>
                                                <tr>
                                                    <td width="25%"><b>Station Name*</b></td>
                                                    <td>
                                                        <input type = "text" name="name" id ="name" value='' />
                                                    </td><td><?php echo "" . error("thedate") . ""; ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td width="25%" valign="top"><b>County ID</b></td>
                                                    <td><select name="countyid"  id="">
                                                      <?php 
                                                    	$query_disp="SELECT * FROM county";
														$result_disp = mysql_query($query_disp);
														while($query_data = mysql_fetch_array($result_disp))
														{
														?>
                                                      <option value="<? echo $query_data['countyid']; ?>" > <?php echo $query_data['Countyname'] ;?></option>
                                                      <?php
														}
														
														?>
                                                    </select></td><td><?php echo "" . error("countyid") . ""; ?> </td></tr>




                                                <tr><td width="25%"></td><td><input type="submit" value="POST DATA"/></td><td><input type="reset" value="Reset!"></td></tr>
                                            </table>
                                    </form>

                                        </div>


                                        <?php
            } 
            else 
			{
                 $query = "INSERT INTO police_station_tbl(station name,countyId) VALUES ('$thename','$countyid')";
                                        //echo $query;
                                        $result = mysql_query($query);
                                      if ($result) {
                                     echo "              The Station details were entered into the database";
                                     }
                            }
            include("footer.php");
  ?> 