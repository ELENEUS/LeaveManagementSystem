<?php require_once('sidebar.php') ?>
<?php if(isset($_SESSION['pregnant'])):?>
    <?php header('location:preg_clinic.php')?>
<?php endif ?>
<?php
    $year = date('Y');
    $department_query = mysqli_query($dbconnect, "SELECT * FROM department");

    $fetch_department = mysqli_fetch_array($department_query);
    $count_department = mysqli_num_rows($department_query);


    $user = mysqli_query($dbconnect, "SELECT * FROM user");
    $user_count = mysqli_num_rows($user);

    $applicant = mysqli_query($dbconnect, "SELECT * FROM applied_leave");
    $applicant_count = mysqli_num_rows($applicant);
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card bg-success">
                <div class="card-body">
                    <div class="quantinty">
                        <i class="fa fa-user text-white fa-5x"></i>
                        <h4 class="text-light"></h4>
                        <a> <span class="h5 text-white">
                            <?php echo $user_count ?> Users</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-dark">
                <div class="card-body">
                    <div class="quantinty">
                        <i class="fa fa-users text-white fa-5x"></i>
                        <h4 class="text-light"></h4>
                        <a> <span class="h5 text-white">
                            <?php echo $count_department ?> Department</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-warning">
                <div class="card-body">
                    <div class="quantinty">
                        <i class="fa fa-envelope text-white fa-5x"></i>
                        <h4 class="text-light"></h4>
                        <a> <span class="h5 text-white">
                            <?php echo $applicant_count ?> Application</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('finish.php') ?>