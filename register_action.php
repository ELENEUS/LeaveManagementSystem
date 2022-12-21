<?php include_once('includes/config.php') ?>
<?php  

if(isset($_POST['register'])) {
    $fname  = mysqli_real_escape_string($dbconnect, $_POST['fname']);
    $lname  = mysqli_real_escape_string($dbconnect, $_POST['lname']);
    $sex    = mysqli_real_escape_string($dbconnect, $_POST['sex']);
    $phone  = mysqli_real_escape_string($dbconnect, $_POST['phone']);
    $email  = mysqli_real_escape_string($dbconnect, $_POST['email']);
    $department= mysqli_real_escape_string($dbconnect, $_POST['department']);
    $work_title= mysqli_real_escape_string($dbconnect, $_POST['work_title']);
    $employee_type= mysqli_real_escape_string($dbconnect, $_POST['employee_type']);
    $date_birth= mysqli_real_escape_string($dbconnect, $_POST['date_birth']);
    $username  = mysqli_real_escape_string($dbconnect, $_POST['username']);
    // $password  = mysqli_real_escape_string($dbconnect, $_POST['password']);
    // $cpassword = mysqli_real_escape_string($dbconnect, $_POST['cpassword']);
    $type="employee";
    $is_active=1;
    $password = sha1($lname);

    //uploading passport
    $file_name=strtolower($_FILES['passport']['name']);
    $file_text=substr($file_name, strpos($file_name, '.'));
    $prifix='u_'.md5(time()*rand(1,9999));//used to rename passport
    $picture_name=$prifix.$file_text;
    $upload_passport='employee/images/'.$picture_name;
    $upload_passport1='images/'.$picture_name;

    $extensions=pathinfo($picture_name,PATHINFO_EXTENSION);
    if (!in_array($extensions,['png','jpeg','gif','jpg'])) {
           $_SESSION['error']="image is not either png,jpeg,gif or jpg";
           header("location:registration.php");
       }  
       else
       {
        if (@move_uploaded_file($_FILES['passport']['tmp_name'], $upload_passport)) {
            
        //check username
        $username_check = mysqli_query($dbconnect, "SELECT username FROM user WHERE username='$username'");
        $count_username = mysqli_num_rows($username_check);

        //check if username exist
        if($count_username == 1){
            $_SESSION['error'] = "User with the same username already registered please just find another username";
            header("location:registration.php");
        }
        else{

                        $register_user_query = mysqli_query($dbconnect, "INSERT 
                INTO user (`first_name`, `last_name`, `sex`, `phone_number`, `email`,`passport`,`username`, `type`, `employee_type`, `date_of_birth`, `is_active`, `department`, `work_title`, `password`)
                VALUES ('$fname', '$lname', '$sex','$phone', '$email', '$upload_passport1','$username','$type','$employee_type','$date_birth','$is_active','$department','$work_title','$password')");

            //check if user registered successfully
            if($register_user_query) {


                $query_user = mysqli_query($dbconnect, "SELECT *
                FROM user 
                WHERE (((username) = '$username')
                AND ((password) = '$password' )
                AND ((is_active) = 1))");
            
            //count how many row returned from the query
            $count_row = mysqli_num_rows($query_user);

            //check if number of rows equal to one
            if($count_row == 1) {
                //store user data in array
                $user_data = mysqli_fetch_assoc($query_user);
                $_SESSION['type'] = $user_data['type'];

                if($_SESSION['type'] == "employee") {
                    $_SESSION['employee_loged_in'] = true;
                    $_SESSION['employee_detail']   = $user_data;
                    header("location:employee/");
                }

            }

            else {
               $_SESSION['error']="Employee not registered please contact system administator !!!";
                header("location:registration.php");
            }

        }
       } 
   }


        

    } }
    else {
        $_SESSION['error'] = "Bad access method";
        header("location:registration.php");
    }

?>