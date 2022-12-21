<?php require_once('sidebar.php') ?>
<?php
$database = mysqli_connect('localhost','root','','leave_management');
$user_id=$_SESSION['employee_detail']['user_id'];
$img=$_SESSION['employee_detail']['passport'];
?>

<?php

    $user = mysqli_query($dbconnect, "SELECT * FROM user WHERE user_id = '$user_id'");
    $user_data = mysqli_fetch_assoc($user);

    $work_query = mysqli_query($database, "SELECT title from user,work
                  WHERE user_id  = $user_id AND work_title=work_id");
    $work_data = mysqli_fetch_assoc($work_query);

    $department_query = mysqli_query($database, "SELECT department_name from user,department
                  WHERE user_id  = $user_id AND department=department_id");
    $department_data = mysqli_fetch_assoc($department_query);

?>
<div class="container">
        <div class="col-12">      
                    <p class="mu-color text-center px-2 pt-2">
                    <b>Welcome...! <?php echo "$user_data[last_name] $user_data[first_name]" ?>
                     Your account is active and now we are waiting for your leave application</b></p>
                    <center><a href="apply_leave.php" class="btn btn-success col-4 mb-3">Apply Leave Now</a></center>
        </div>
                    <h4 class="mu-color">Your personal Details</h4>
                    <hr>
                    <div class="quantinty">
                        <table class="table table-striped">
                            <tr>
                                <th>Full Name</th>
                                <td><?php echo "$user_data[first_name] $user_data[last_name]" ?></td>
                            </tr>
                            <tr>
                                <th>Sex</th>
                                <td><?php echo $user_data['sex'] ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo $user_data['email'] ?></td>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <td><?php echo $user_data['phone_number'] ?></td>
                            </tr>
                            <tr>
                                <th>Department</th>
                                <td><?php echo $department_data['department_name'] ?></td>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td><?php echo $work_data['title'] ?></td>
                            </tr>
                            <tr>
                                <th>Work Type</th>
                                <td><?php echo $user_data['employee_type'] ?></td>
                            </tr>
                            <tr>
                                <th> Date Of Birth</th>
                                <td><?php echo $user_data['date_of_birth'] ?></td>
                            </tr>
                            <tr>
                                <th>Usrname</th>
                                <td><?php echo $user_data['username'] ?></td>
                            </tr>
                        </table>
                    </div>
    </div>
</div>
<?php require_once('finish.php') ?>