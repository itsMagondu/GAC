
<?php
session_start();

 $_SESSION['Magistrateid']
include('dconnect.php');
	
$query="delete from magistrates where username ='$user' && level='$level'";
$result = mysql_query($query) or die (mysql_error());
include('remove_judge.php');
?>

                    <script>
alert("Judge successfully deleted")
window.location="index.php"
</script>
