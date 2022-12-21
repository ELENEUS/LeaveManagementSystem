
<?php require_once('../includes/config.php'); ?>

<?php
$delet = "DELETE FROM `salary` WHERE `salary_id`='".$_GET['del_salary']."'";

$query = mysqli_query($dbconnect,$delet);
if ($query) {
	$_SESSION['success']="Salary have been deleted successfully.";
	header("location:set_salary.php");
}
else
{
	$_SESSION['error']="You cannot remove this Salary because there is an employees allocated with this salary, remove employee first if you do not want this salary in your organization";
	header("location:set_salary.php");
}
?>