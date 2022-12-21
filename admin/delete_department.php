
<?php require_once('../includes/config.php'); ?>

<?php
$delet = "DELETE FROM `department` WHERE `department_id`='".$_GET['del_d']."'";

$query = mysqli_query($dbconnect,$delet);
if ($query) {
	$_SESSION['success']="Department have been deleted successfully.";
	header("location:department.php");
}
else
{
	$_SESSION['error']="You cannot remove this department because there is an employees registered with this department, remove employee first if you do not want this department in your organization";
	header("location:department.php");
}
?>