<?php require_once('sidebar.php') ?>

<?php
    error_reporting(0);
    $id = $_GET['update_d'];

    if(isset($_POST['update']))
    {
        $employee_id = $_POST['user_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $sex = $_POST['sex'];
        $phone_number = $_POST['phone_number'];
        $email = $_POST['email'];
        $date_birth = $_POST['date_birth'];
        $username = $_POST['username'];
        $employed_as = $_POST['employed_as'];
        $type = $_POST['type'];
        $department_name = $_POST['department_name'];
        $employed_time = $_POST['employee_time'];

        $update ="update `user` set first_name ='$first_name',last_name='$last_name',sex='$sex',phone_number='$phone_number',email='$email',date_of_birth='$date_birth',employee_type='$employed_time',username='$username',department='$department_name',work_title='$employed_as',type='$type' WHERE user_id = $id";
        $sql = mysqli_query($dbconnect,$update);

        if($sql)
        {
            $_SESSION['success'] = "Data have been updated successfully";
            
            header('location:update_department.php');
        }
        else
        {
        $_SESSION['error']="Data not changed please contact @kaijage for system maintenance";
        header('location:update_department.php');
        }    
    }
?>

<?php 
    $select = ("SELECT * FROM `user`,`department`,`work` WHERE user.department=department.department_id AND user.work_title=work.work_id AND user_id = $id");


    $sql = mysqli_query($dbconnect,$select);
    $row = mysqli_fetch_assoc($sql);

    $user_id = $row['user_id'];
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $sex = $row['sex'];
    $phone_number = $row['phone_number'];
    $email = $row['email'];
    $date_birth = $row['date_of_birth'];
    $employed_time=$row['employee_type'];
    $last_name = $row['last_name'];
    $username = $row['username'];
    $employed_as=$row['title'];
    $type=$row['type'];
    $department_name=$row['department_name'];
    $department_id=$row['department'];
    $employed_as_id=$row['work_title'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <title>update Employee</title>
</head>
<body>
<div class="container h-40">
    <div class="row px-2 ">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body">
                    <form action="" method="POST" class="pt-3 px-3">
                        <div class="card-header">
                            <div class="text-center">
                                <h4 class="mu-color">Update Employee Information Here</h4>
                                    </div>

                            <?php if(isset($_SESSION['success'])) :?>
                            <center><div class="alert bg-success text-white">
                              <?php echo $_SESSION['success'] ?>
                            </div></center>
                            <?php endif ?>
                            <?php unset($_SESSION['success']) ?>

                            <!-- check if redirection comes with session error and error message -->
                            <?php if(isset($_SESSION['error'])) :?>
                            <center><div class="alert bg-danger text-white">
                                <?php echo $_SESSION['error'] ?>
                            </div></center>
                            <?php endif ?>
                            <?php unset($_SESSION['error']) ?>
                     </div>
                         <div class="col-md-12">
                            <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><b>User ID</b></label>
                                    <input type="text" name="user_id" class="form-control" value="<?php echo $user_id ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><b>First Name</b></label>
                                    <input type="text" name="first_name" class="form-control" value="<?php echo $first_name ?>" required>
                                </div>
                            </div>
                                <div class="col-md-4">
                                    <label><b>Last Name</b></label>
                                    <input type="text" name="last_name" class="form-control" value="<?php echo $last_name ?>" required>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-4">
                                    <label><b>Sex</b></label>
                                    <input type="text" name="sex" class="form-control" value="<?php echo $sex ?>" required>
                                </div>
                                <div class="col-md-4">
                                    <label><b>Phone Number</b></label>
                                    <input type="number" name="phone_number" class="form-control" value="<?php echo $phone_number ?>" required>
                                </div>
                                <div class="col-md-4">
                                    <label><b>Email</b></label>
                                    <input type="text" name="email" class="form-control" value="<?php echo $email ?>" required>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-4">
                                    <label><b>Date Of Birth</b></label>
                                    <input type="date" name="date_birth" class="form-control" value="<?php echo $date_birth ?>" required>
                                </div>
                            <div class="col-md-4">
                                    <label><b>Employed Time</b></label>
                                    <select name="employee_time" id="" class="form-control">
                                    <option value="<?php echo $employed_time ?>"><?php echo $employed_time ?></option>
                                    <option value="PARMANENT EMPLOYED">PARMANENT EMPLOYED</option>
                                    <option value="TEMPORARY EMPLOYED">TEMPORARY EMPLOYED</option>
                                    </select>
                            </div>
                                <div class="col-md-4">
                                    <label><b>Login Username</b></label>
                                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" required>
                                </div>
                            </div><br>
                        </div>
                        <br>
                        <div class="row">
                         <div class="col-md-4">
                                <label><b>Employed as</b></label>
                                <select name="employed_as" id="" class="form-control">
                                   <!-- hii ni work_type_id pamoja na title ambazo employee amesajiliwa nazo -->
                                    <option value="<?php echo $employed_as_id; ?>"><?php echo $employed_as; ?></option>
            <!-- hizi ni aina za kazi nyingine ambazo employee atataka kubadilisha atachagua hizi hapa itaenda work_type_id tu na sio jina la aina ya kazi -->
<?php
                    $work_list = mysqli_query($dbconnect, "SELECT * FROM work");
                    $work_count = mysqli_num_rows($work_list);

?>
<!-- loop for looping work title -->
                                <?php while($work=mysqli_fetch_array($work_list)) {?>
                                                                             
                                       <option value="<?php echo $work['work_id']; ?>"><?php echo $work['title']; ?><?php }?></option>
                                            </select>



                        </div>
                                <div class="col-md-4">
                                <label><b>Action Type</b></label>
                                <input type="text" name="type" class="form-control"value="<?php echo $type ?>"  required>
                        </div>
                            <div class="col-md-4">
                                <label><b>Department Name</b></label>
                                    <select name="department_name" id="" class="form-control">

                                    <!-- hii ni department_id pamoja na department_name ambazo employee amesajiliwa nazo -->
                                    <option value="<?php echo $department_id; ?>"><?php echo $department_name; ?></option>

                     <!-- hizi ni deparment nyingine ambazo employee atataka kubadilisha atachagua hizi hapa itaenda department_id tu na sio jina la department -->
                    <?php
                    $department_list = mysqli_query($dbconnect, "SELECT * FROM department");
                    $department_count = mysqli_num_rows($department_list);

                        ?>
                                <!-- loop for looping department -->
                                <?php while($department=mysqli_fetch_array($department_list)) {?>                                       
                                    <option value="<?php echo $department['department_id'];?>"><?php echo $department['department_name'];?><?php }?></option>
                                   </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                        </div>
                         <div class="col-md-4">
                            <div class="card-footer">
                                <button type="submit"name="update" class="btn btn-sm btn-primary lg-8">UPDATE</button>
                            </div>
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