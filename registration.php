<?php require_once('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Field | Registration</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="body">
    <div class="container">
        <div class="row justify-content-center pt-3">
            <div class="col-md-9 col-sm-12 col-xl-9 col-xs-12 shadow">
                <center><img src="img/mulogo.png" alt="" srcset="" width="10%" class="pt-3"></center>
            <h5 class="text-uppercase text-center text-dark pt-4">Mzumbe University Leave Management System <br>(MU-LMS)</h5>
            <hr>
                <div class="">
                    <div class="card-body">
                        <?php require_once('includes/messages.php') ?>
                        <form action="register_action.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" name="fname" id="fname" 
                                        placeholder="---Enter Your First Name---" class="form-control" >
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="lname" id="lname" 
                                    placeholder="---Enter Your Last Name---" class="form-control" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                   <select name="sex" id="" class="form-control">
                                       <option value="">--Select Sex--</option>
                                       <option value="FEMALE">Female</option>
                                       <option value="MALE">Male</option>
                                   </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="number" name="phone" id="phone" 
                                        placeholder="---Enter Your Phone Number---" class="form-control" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="email" name="email" id="email" 
                                        placeholder="---Enter Your Email Address---" class="form-control" >
                                </div>

                                <div class="form-group col-md-6">
                                   <select name="department" id="" class="form-control">
                                       <option value="">--Select Your Department--</option>

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
                                <div class="col-12">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <select name="work_title" id="" class="form-control">
                                                <option value="">--Select Work Title--</option>
<?php
                    $work_list = mysqli_query($dbconnect, "SELECT * FROM work");
                    $work_count = mysqli_num_rows($work_list);

?>
<!-- loop for looping work title -->
                                <?php while($work=mysqli_fetch_array($work_list)) {?>
                                                                             
                                       <option value="<?php echo $work['work_id'] ?>"><?php echo $work['title'] ?><?php }?></option>
                                            </select>
                                        </div>
                                         <div class="form-group col-md-6">
                                            <select name="employee_type" id="" class="form-control">
                                                <option value="">--Select Type--</option>
                                                <option value="PARMANENT EMPLOYED">PARMANENT EMPLOYED</option>
                                                <option value="TEMPORARY EMPLOYED">TEMPORARY EMPLOYED</option>
                                            </select>
                                        </div>
                                     <div class="form-group col-md-6">
                                    <input type="text" placeholder="Upload your Passport ------->" class="form-control" readonly>
                                </div>
                                   <div class="form-group col-md-6">
                                    <input type="file" name="passport" id="Passport" 
                                    placeholder="Passport" class="form-control" >
                                </div>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" placeholder="Enter Your Date Of Birth ------->" readonly class="form-control" >
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="date" name="date_birth" id="date_birth" 
                                    placeholder="Date of Birth" class="form-control" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" 
                                    placeholder="Enter your login username ------->" class="form-control" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="username" id="username" 
                                    placeholder="---Username---" class="form-control" >
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" name="register" id="signin" value="Register"
                                    class="btn mu-btn btn-block">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>