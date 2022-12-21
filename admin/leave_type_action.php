<?php include_once('../includes/config.php'); ?>

<?php if(!isset($_SESSION['admin_loged_in'])): ?>
    <?php header('location:../logout.php') ?>
<?php endif ?>

<?php

// Selection
if (isset($_POST['add_leave_type'])) {
 
    // receive all input values from the
    $leave_type = mysqli_real_escape_string($dbconnect, $_POST['leave_type']);

    //validate form
    if (empty($leave_type)) {
        //return error to user
        $_SESSION['error'] = "All field are required";
        header("location:leave_type.php");
    }

    else {

        $new_department_query = mysqli_query($dbconnect, "INSERT 
        INTO leave_type (`leavetype`)
        VALUES('$leave_type')");
    
        if($new_department_query) {
            $_SESSION['success'] = "Leave Type have been added successfully.";
            header("location:leave_type.php");
        }
        else {
            $_SESSION['error'] = "Error Try Again";
            header("location:leave_type.php");
        }
    }
}