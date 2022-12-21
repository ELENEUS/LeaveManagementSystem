<?php include_once('../includes/config.php'); ?>

<?php if(!isset($_SESSION['admin_loged_in'])): ?>
    <?php header('location:../logout.php') ?>
<?php endif ?>

<?php

// Selection
if (isset($_POST['add_departmant'])) {
 
    // receive all input values from the
    $dept_name             = mysqli_real_escape_string($dbconnect, $_POST['dept_name']);

    //validate form
    if (empty($dept_name)) {
        //return error to user
        $_SESSION['error'] = "All field are required";
        header("location:department.php");
    }

    else {

        $new_department_query = mysqli_query($dbconnect, "INSERT 
        INTO department (`department_name`)
        VALUES('$dept_name')");
    
        if($new_department_query) {
            $_SESSION['success'] = "Department have been added successfully.";
            header("location:department.php");
        }
        else {
            $_SESSION['error'] = "Error Try Again";
            header("location:department.php");
        }
    }
}