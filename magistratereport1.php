<?php
include( "header.php");
include("dconnect.php");

 $data = mysql_query("SELECT * FROM magistrates") or die(mysql_error()); 
 
 $num=mysql_num_rows($data);
echo $num;
if($num==0){
include('index.php');
}
else{


$row = mysql_fetch_array( $data );
$sql = "SELECT * FROM magistrates";

$result = mysql_query($sql);
?>
<div id="table">  
 <h3 style = "color:#000000"> <center> MAGISTRATES</center></h3>
     <br />
  <table width="560" border = "2" align="center" cellpadding="3" cellspacing="2"
   style="background-color: #ADD8E6" >
   <tr><td>MAGISTRATE ID</td><td>NAME</td><td>COURT ID</td><td>TITLE</td><td>DELETE</td></tr>

<?php

while($info = mysql_fetch_array( $result )){
$MagistrateName=$info['MagistrateName'];
$Magistrateid=$info['Magistrateid'];
$Courtid=$info['Courtid'];
$Titleid=$info['Titleid'];


//Outputs the image and other data
echo "<tr >";
echo "<td>".$info['Magistrateid']."</td>";
echo "<td>".$info['MagistrateName']."</td>";
echo "<td>".$info['Courtid']."</td>";
echo "<td>".$info['Titleid']."</td>";
echo "<td><a href = \"confirm_delete.php?table=magistrates&&field=Magistrateid&&value=".$info['Magistrateid']."\">Remove Magistrate</a></td>";

};


 ?>
                 </table>
                 
  
<?php
}
include( "footer.php");
?>