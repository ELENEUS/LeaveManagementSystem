<?php require_once('sidebar.php') ?>

<?php
    error_reporting(0);
    $id = $_GET['update_d'];

    if(isset($_POST['update']))
    {
        $salary_id = $_POST['salary_id'];
        $salary_scale = $_POST['salary_scale'];
        $actual_salary = $_POST['actual_salary'];

        $update ="update `salary` set salary_scale ='$salary_scale',actual_salary='$actual_salary' WHERE salary_id = $id";
        $sql = mysqli_query($dbconnect,$update);

        if($sql)
        {
            $_SESSION['success'] = "Salary updated successfully";
            
            header('location:update_salary.php');
        }
        else
        {
        $_SESSION['error']="Salary not changed please contact @kaijage for system maintenance";
        header('location:update_salary.php');
        }    
    }
?>

<?php 
    $select = "SELECT * FROM `salary` WHERE salary_id = $id";
    $sql = mysqli_query($dbconnect,$select);
    $row = mysqli_fetch_assoc($sql);

    $s_id = $row['salary_id'];
    $salary_scale = $row['salary_scale'];
    $actual_salary = $row['actual_salary'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <title>Update Salary</title>
</head>
<body>
<div class="container h-40">
    <div class="row px-2 ">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-body">
                    <form action="" method="POST" class="pt-3 px-3">
                        <div class="card-header">
                            <div class="text-center">
                                <h4>Update Salary</h4>
                                    </div>

                            <?php if(isset($_SESSION['success'])) :?>
                            <div class="alert bg-success text-white">
                              <?php echo $_SESSION['success'] ?>
                            </div>
                            <?php endif ?>
                            <?php unset($_SESSION['success']) ?>

                            <!-- check if redirection comes with session error and error message -->
                            <?php if(isset($_SESSION['error'])) :?>
                            <div class="alert bg-danger text-white">
                                <?php echo $_SESSION['error'] ?>
                            </div>
                            <?php endif ?>
                            <?php unset($_SESSION['error']) ?>
                     </div>
                         <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-group">
                                    <label><b>Salary ID</b></label>
                                    <input type="text" name="salary_id" class="form-control" value="<?php echo $s_id ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <br>
                         <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-group">
                                    <label><b>Salary Scale</b></label>
                                    <input type="text" name="salary_scale" class="form-control"value="<?php echo $salary_scale; ?>"  required>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-group">
                                    <label><b>Actual Salary</b></label>
                                    <input type="text" name="actual_salary" class="form-control"value="<?php echo $actual_salary; ?>"  required>
                                </div>
                            </div>
                        </div>

                         <div class="col-md-4">
                            <div class="card-footer">
                                <button type="submit"name="update" class="btn btn-primary lg-8">UPDATE</button>
                            </div>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php require_once('finish.php') ?>