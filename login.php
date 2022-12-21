<?php require_once('includes/config.php'); ?>
<?php 
    //check if button signin is pressed
    if(isset($_POST['signin'])) {

        //recieve data from html input and store into variable
        $username = $_POST['username'];
        $password = $_POST['password'];

        //escape sql injection by escape_real_string
        $username = mysqli_real_escape_string($dbconnect, $username);
        $password = mysqli_real_escape_string($dbconnect, $password);

        //check if all field have data
        if(empty($username) || empty($password)) {
            $message = "All field are required";
            $_SESSION['error'] = $message;
            header("location:index.php");
        }
        
        //if all field have data
        else {
            //password hashing
            $password = sha1($password);

            //query to select user from database
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

                elseif ($_SESSION['type'] == "hr") {
                    $_SESSION['hr_detail']   = $user_data;
                    $_SESSION['hr_loged_in'] = true;
                    header("location:hr/");
                }

                elseif ($_SESSION['type'] == "accountant") {
                    $_SESSION['accountant_detail']   = $user_data;
                    $_SESSION['accountant_loged_in'] = true;
                    header("location:accountant/");
                }

                else {
                    $_SESSION['admin_detail']   = $user_data;
                    $_SESSION['admin_loged_in'] = true;
                    header("location:admin/");
                }
            } 
            else {
                $_SESSION['error'] = "Invalid credentials please try again";
                header("location:index.php");
            }
        }
    }
?>