<?php include_once('../includes/config.php'); ?>

<?php if(!isset($_SESSION['accountant_loged_in'])): ?>
    <?php header('location:../logout.php') ?>
<?php endif ?>

<?php

// Selection
if (isset($_POST['add_salary'])) {
 
    // receive all input values from the
    $salary_scale= mysqli_real_escape_string($dbconnect, $_POST['salary_scale']);
    $atual_salary= mysqli_real_escape_string($dbconnect, $_POST['actual_salary']);

    

        $new_department_query = mysqli_query($dbconnect, "INSERT 
        INTO salary (`salary_scale`,`actual_salary`)
        VALUES('$salary_scale','$atual_salary')");
    
        if($new_department_query) {
            $_SESSION['success'] = "Salary have been added successfully.";
            header("location:set_salary.php");
        }
        else {
            $_SESSION['error'] = "Error Try Again";
            header("location:set_salary.php");
        }
}
?>