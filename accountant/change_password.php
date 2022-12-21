
<?php include_once('../includes/config.php'); ?>


<?php 

if((isset($_SESSION['accountant_detail'])))
{
    $id=$_SESSION['accountant_detail']['user_id'];
}

if(isset($_POST['change_pass']))
{
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_new= $_POST['confirm_password'];

    $current_password=sha1($current_password);
    $new_password=sha1($new_password);
    $confirm_new=sha1($confirm_new);

    if ($new_password!==$confirm_new) {
      $_SESSION['error']="Password must match";
      header("location:change_password_form.php");
    }

    else
    {
      $select_data="SELECT password FROM user WHERE user_id=$id";
      $query=mysqli_query($dbconnect,$select_data);

      if ($query) {
        if (mysqli_num_rows($query)>0) {
          $row=mysqli_fetch_array($query);
          $_SESSION['current_password']=$row['password']; 

          if ($current_password!==$_SESSION['current_password'])
           {
            $_SESSION['error']="current password is not correct";
            header("location:change_password_form.php");  
          }

          else
          {
            $update_password="UPDATE user SET password='$new_password' WHERE user_id=$id";
            $query_update=mysqli_query($dbconnect,$update_password);
            if ($query_update)
             {
              $_SESSION['success']="Password updated successfully";
              header("location:change_password_form.php");
            }
            else
            {
              $_SESSION['error']="Password not updated";
               header("location:change_password_form.php");

            }

          }

        }
      }


      else
      {
        echo "table is not found";
      }
    }
  }
  ?>