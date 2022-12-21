<?php include_once('../includes/config.php') ?>


<?php 
error_reporting(0);
$id2 = $_SESSION['id'];
?>

<?php
if(isset($_POST['send_feedback'])) {
	$comment = $_POST['comment'];
	$action  = $_POST['active'];
 $update_feedback_query =  mysqli_query($dbconnect,"UPDATE `feedback` SET `short_description`='$comment',`status`='$action' WHERE `feedback_id`=$id2");
 if ($update_feedback_query) {
 	 // echo "<script> alert ('confimation successful')</script> ";
    //   echo "<script> location.href='Employen.php'</script> ";

    $_SESSION['success']="Feedback sent successfully";
    header("location:feedback_confirmation.php");
  
    }  
    else 
    {
    // $_SESSION['error']="Feedback not sent";
    // header("location:feedback_confirmation.php");
    echo "majibu hayajatumwa";	
     } 


}

?>