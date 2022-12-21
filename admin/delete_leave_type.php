
<?php require_once('../includes/config.php'); ?>

<?php
$delet = "DELETE FROM `leave_type` WHERE `leave_id`='".$_GET['del_d']."'";

$query = mysqli_query($dbconnect,$delet);
if ($query) {
	$_SESSION['success']="Type of leave have been deleted successfully.";
	header("location:leave_type.php");
}
else
{
	$_SESSION['error']="You cannot remove this type of leave because there is an employees applied with this Type of leave, remove employee first if you do not want this type of leave in your organization";
	header("location:leave_type.php");
}
?>