	<?php
	session_start();
	$_SESSION['table']=$_GET['table'];
$_SESSION['field']=$_GET['field'];
$_SESSION['value']=$_GET['value'];

//echo $_SESSION['table'];

	 if(isset($_SESSION['table'])&&isset($_SESSION['field'])&&isset($_SESSION['value'])){
	 //background
	 include('magistratereport1.php');
	?>

            <script>

var answer= confirm("Removing a record deletes all their details.Are you sure you want to delete this record")
if (answer)
window.location="delete.php"
//else window.location="magistratereport1.php"
</script>
<?php
	} ?>