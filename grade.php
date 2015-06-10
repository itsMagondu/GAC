<?php
session_start();
include("header.php");


include("dconnect.php");
//include("../kazi2/include/constants.php");
include("include/form.php");



$thedate = $_POST[datepicker];

$grade = $_POST[grade];

$suspectid = $_POST[suspectid];

$staffid = $_POST[staffid];



$field = "thedate";
if (!$thedate) {
    $errmsg = "*Enter the Date";
    setError($field, $errmsg);
}

$field = "grade";
if (!$grade || strlen($grade = trim($grade)) == 0) {
    $errmsg = "*Enter the grade";
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
                           Grade Information
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
                                                  <td colspan="2"><b>POLICE GRADE INFORMATION</b></td></tr>
                                                <tr>
                                                    <td width="25%"><b>Grade charged*</b></td>
                                                    <td><textarea cols="45" rows="5" name="grade" class="memorize" value ="<?php echo "" . value("grade") . ""; ?>" ></textarea></td><td><?php echo "" . error("grade") . ""; ?> </td></tr>




                                                <tr><td width="25%"></td><td><input type="submit" value="POST DATA"/></td><td><input type="reset" value="Reset!"></td></tr>
                                            </table>
                                  </form>

                                        </div>


                                        <?php
            } 
            else 
			{
                 $query = "INSERT INTO grade_id(grade) VALUES ('$grade')";
                                        //echo $query;
                                        $result = mysql_query($query);
                                      if ($result) {
                                     echo "              The Grade details were entered into the database";
                                     }
                            }
            include("footer.php");
  ?> 