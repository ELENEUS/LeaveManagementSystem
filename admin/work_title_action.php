<?php include_once('../includes/config.php'); ?>

<?php if(!isset($_SESSION['admin_loged_in'])): ?>
    <?php header('location:../logout.php') ?>
<?php endif ?>

<?php

// Selection
if (isset($_POST['add_work_title'])) {
 
    // receive all input values from the
    $work_title=mysqli_real_escape_string($dbconnect, $_POST['work_title']);

    //validate form
    if (empty($work_title)) {
        //return error to user
        $_SESSION['error'] = "All field are required";
        header("location:work_title.php");
    }

    else {

        $new_department_query = mysqli_query($dbconnect, "INSERT 
        INTO work (`title`)
        VALUES('$work_title')");
    
        if($new_department_query) {
            $_SESSION['success'] = "Record have been added successfully.";
            header("location:work_title.php");
        }
        else {
            $_SESSION['error'] = "Error Try Again";
            header("location:work_title.php");
        }
    }
}