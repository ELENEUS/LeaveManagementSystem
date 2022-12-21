
<?php require_once('../includes/config.php'); ?>

<?php
$delet = "DELETE FROM `work` WHERE `work_id`='".$_GET['del_d']."'";

$query = mysqli_query($dbconnect,$delet);
if ($query) {
	$_SESSION['success']="Work Title have been deleted successfully.";
	header("location:work_title.php");
}
else
{
	$_SESSION['error']="You cannot remove this title because there is an employees registered with this Title, remove employee first if you do not want this title in your organization";
	header("location:work_title.php");
}
?>