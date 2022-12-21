<?php require_once('sidebar.php') ?>
<html>
<head>
</head>
<body>
  <div class="col-sm-12">
      <table class="table table-spried">
          <form action="employen.php" method="POST" >
            <tr>
              <div class="col-12">     
                <p class="mu-color text-center px-2 pt-2">
                <b>Welcome...! <?php echo $_SESSION['employee_detail']['first_name']; echo " "; echo$_SESSION['employee_detail']['last_name'] ?>
                 to see your leave application feedback</b></p>
              </div>
            </tr>
            <tr>
              <th>Leave type</th>
              <th>From date</th>
              <th>To date</th>
              <th>Description</th>
              <th>derpartment</th>
              <th>Job title</th>
              <th>Application Date</th>
              <th>Feedback Message</th>
              <th>Status</th>
            </tr>

           <?php
              $leave_applied_query = mysqli_query($dbconnect, "SELECT * FROM applied_leave,user,leave_type,department,work WHERE applied_leave.username=user.user_id AND applied_leave.department_nm=department.department_id AND applied_leave.job_title=work.work_id AND applied_leave.leave_typ=leave_type.leave_id AND type!='admin' AND type!='hr' AND user_id=$user_id");


                //select applied_id inorder to send it to the feedback table b'se of the relationship
                $feedback_query = mysqli_query($dbconnect, "SELECT * FROM feedback,applied_leave,user WHERE feedback.applied_leave_user=applied_leave.applied_id AND  user_applied_feedback=$user_id");
                     
                        $feedback_count = mysqli_num_rows($feedback_query);

                        while($feedback=mysqli_fetch_array($feedback_query)){
                        
                    $_SESSION['user_applied_feedback']=$feedback['user_applied_feedback']; 
                    $applid_id=$_SESSION['user_applied_feedback'];
                  
               }
               if (isset($_SESSION['user_applied_feedback'])) {
               
              $default_feadback_query = mysqli_query($dbconnect, "SELECT * FROM feedback WHERE  user_applied_feedback=$applid_id");

              $default_feadback_count = mysqli_num_rows($default_feadback_query);
              $leave_applied_count = mysqli_num_rows($leave_applied_query);
                      

                      while($leave=mysqli_fetch_array($leave_applied_query)) {
                      $feedback=mysqli_fetch_array($default_feadback_query) ?>
            <tr>
              <td><?php echo $leave['leavetype']  ?></td>
              <td><?php echo $leave['from_date']?></td>
              <td><?php echo $leave['to_date']?></td>
              <td><?php echo $leave['leave_description'] ?></td>
              <td><?php echo $leave['department_name'] ?></td>
              <td><?php echo $leave['title'] ?></td>
              <td><?php echo $leave['application_date'] ?></td>

            <td><p class="mu-color px-2 pt-2"><b><i><?php echo $feedback['short_description'] ?></i></b></p></td>

              <?php  
              if ($feedback['status']=='ACCEPTED' || $feedback['status']=='REJECTED') {  
            ?>
              <td><a href=""class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" ></span><?php echo $feedback['status']; ?></a></td>
              <?php } else{ ?>
              <td>
                <a href="#" class="btn btn-sm btn-danger"><?php echo $feedback['status']; ?></a>
              </td><?php } ?>

            </tr>
            
</form>
<?php }}

else
{ 

$_SESSION['error']="Dear applicant it shows that, currently you have no any leave application, please apply leave first !!!";
  }
  ?>
</table>
<!-- check if redirection comes with session error and error message -->
<?php if(isset($_SESSION['error'])) :?>
    <center><div class="alert bg-danger text-white">
        <?php echo $_SESSION['error'] ?>
    </div></center>
<?php endif ?>
<?php unset($_SESSION['error']) ?>
</div>
</body>
</html>
<?php require_once('finish.php') ?>
  



      