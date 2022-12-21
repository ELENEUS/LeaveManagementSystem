<?php require_once('sidebar.php') ?>

<?php
    error_reporting(0);
    $id = $_GET['update_d'];

    if(isset($_POST['update']))
    {
        $department_id = $_POST['department_id'];
        $department_name = $_POST['department_name'];

        $update ="update `department` set department_name ='$department_name' WHERE department_id = $id";
        $sql = mysqli_query($dbconnect,$update);

        if($sql)
        {
            $_SESSION['success'] = "Department updated successfully";
            
            header('location:update_department.php');
        }
        else
        {
        $_SESSION['error']="Department not changed please contact @kaijage for system maintenance";
        header('location:update_department.php');
        }    
    }
?>

<?php 
    $select = "SELECT * FROM `department` WHERE department_id = $id";
    $sql = mysqli_query($dbconnect,$select);
    $row = mysqli_fetch_assoc($sql);

    $dp_id = $row['department_id'];
    $dp_name = $row['department_name'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <title>update department</title>
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
                                <h4>Update Department Here</h4>
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
                                    <label><b>Department ID</b></label>
                                    <input type="text" name="department_id" class="form-control" value="<?php echo $dp_id ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <br>
                         <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-group">
                                    <label><b>Department Name</b></label>
                                    <input type="text" name="department_name" class="form-control"value="<?php echo $dp_name ?>"  required>
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