
<?php require_once('../includes/config.php'); ?>

<?php
$delet = "DELETE FROM `user` WHERE `user_id`='".$_GET['del_d']."'";

$query = mysqli_query($dbconnect,$delet);
if ($query) {
	$_SESSION['success']="Employee have been deleted successfully.";
	header("location:manage_employee.php");
}
else
{
	$_SESSION['error']="You cannot remove this employee because is arleady requested for leave application in your organization";
	header("location:manage_employee.php");
}
?>