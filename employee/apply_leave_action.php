<?php include_once('includes/config.php') ?>
<?php  
$user_id=$_SESSION['employee_detail']['user_id'];

                //select department_id inorder to send it to the leave table b'se of the relationship
                      $department_query = mysqli_query($dbconnect, "SELECT * from user,department
                          WHERE user_id  = $user_id AND department=department_id");
                      $department_count = mysqli_num_rows($department_query);

                      while($department=mysqli_fetch_array($department_query)){

                    $_SESSION['department_id']=$department['department_id']; 
            
               }
               //select work_id inorder to send it to the leave table b'se of the relationship
                    $work_query = mysqli_query($dbconnect, "SELECT * from user,work
                          WHERE user_id  = $user_id AND work_title=work_id");

                      if (!$work_query) {
                        echo "table not accessed well";
                      }

                        $department_count = mysqli_num_rows($work_query);
                        while($department=mysqli_fetch_array($work_query)) {
                                                                                                   
                   $_SESSION['work_id']=$department['work_id'];

                  }

if(isset($_POST['appl_leave'])) {
    $username = $user_id;
    $department = $_SESSION['department_id'];
    $job_title = $_SESSION['work_id'];
    $leave_type = mysqli_real_escape_string($dbconnect, $_POST['leave_type']);
    $fromdate  = mysqli_real_escape_string($dbconnect, $_POST['fromdate']);
    $todate= mysqli_real_escape_string($dbconnect, $_POST['todate']);
    $comment= mysqli_real_escape_string($dbconnect, $_POST['comment']);
    $newdate= mysqli_real_escape_string($dbconnect, $_POST['newdate']);
                      

            $appl_leave_query = mysqli_query($dbconnect, "INSERT 
                INTO applied_leave (`username`, `leave_typ`, `from_date`, `to_date`, `leave_description`, `department_nm`, `job_title`, `application_date`)
                VALUES ('$username', '$leave_type', '$fromdate','$todate', '$comment', '$department','$job_title','$newdate')");

            //check if user registered successfully
            if($appl_leave_query) {
            $_SESSION['success']="Leave applied succssfuly";
            header("location:apply_leave.php");
            }

            else {
               echo"Something went wrong please try again";
                // header("location:registration.php");
            }



                //select applied_id inorder to send it to the feedback table b'se of the relationship
                      $feedback_query = mysqli_query($dbconnect, "SELECT * FROM applied_leave
                          WHERE username  = $user_id");
                      $feedback_count = mysqli_num_rows($feedback_query);

                      while($feedback=mysqli_fetch_array($feedback_query)){

                    $_SESSION[' applied_id']=$feedback['applied_id']; 
                    $applid_id=$_SESSION[' applied_id'];
               }


            $default_feadback_query = mysqli_query($dbconnect, "INSERT INTO `feedback`(`applied_leave_user`,`user_applied_feedback`) VALUES ('$applid_id','$user_id')");

            //check if default feedback sent successfully
            if($default_feadback_query) {
            $_SESSION['success']="Leave applied succssfuly";
            header("location:apply_leave.php");
            }

            else {
             echo"Sorry Feedback not submited";
            }




        }
            else {
        $_SESSION['error'] = "Bad access method";
        header("location:registration.php");

        }
?>