<?php require_once('sidebar.php') ?>
<html>
<head>
</head>
<body >
  <div class="col-sm-12">
      <table class="table table-spried">
            <tr><td colspan="10"><center> <b>LATEST LEAVE APPLICATION</b> </center></td></tr>
            <tr><td colspan="10">
              <div class="col-sm-12">

                  <!-- form using to search an employee -->
                    <form method="post" action="applied_leave.php">
                      <div class="row">
                      <div class="col-md-4"></div>
                      <div class="col-md-6">
                      <input type="text" name="search_data" required class="form-control" placeholder="---Search Employee Here By Applied date---">
                     </div>
                      <div class="col-md-2">
                        <button class="btn btn-sm mu-btn" name="search">Search</button>
                      </div>
                      </div>
                    </form>
            <?php
// disply of column
          echo" </td></tr>
            <tr>
              <th>First Name</th>
              <th>Leave Type</th>
              <th>From Date</th>
              <th>To Date</th>
              <th>Message</th>
              <th>Department</th>
              <th>Work As</th>
              <th>Applied Date Username</th>
              <th>Feedback</th>
              <th>Status</th>
            </tr>";
//check if search button clicked
      if (isset($_POST["search"])) {
        $data=$_POST['search_data'];

      $leave_applied_query = mysqli_query($dbconnect, "SELECT * FROM applied_leave,user,leave_type,department,work WHERE applied_leave.username=user.user_id AND applied_leave.department_nm=department.department_id AND applied_leave.job_title=work.work_id AND applied_leave.leave_typ=leave_type.leave_id AND type!='admin' AND type!='hr' AND application_date LIKE '%$data%'");

        //select default feadback with their id 
      $default_feadback_query = mysqli_query($dbconnect, "SELECT * FROM feedback,applied_leave,user,leave_type,department,work WHERE feedback.applied_leave_user=applied_leave.applied_id AND applied_leave.username=user.user_id AND applied_leave.department_nm=department.department_id AND applied_leave.job_title=work.work_id AND applied_leave.leave_typ=leave_type.leave_id AND type!='admin' AND type!='hr' AND applied_leave_user=applied_id AND application_date LIKE '%$data%'");

              $default_feadback_count = mysqli_num_rows($default_feadback_query);
              $leave_applied_count = mysqli_num_rows($leave_applied_query);
if ($leave_applied_count==0) {
  
 $_SESSION['error'] ="Please the data that you are tried to access is not found, please review your information first and come to search again, thank you";

 }
              while($leave=mysqli_fetch_array($leave_applied_query)){ 
              $feedback=mysqli_fetch_array($default_feadback_query) ?>

            <tr>
              <td><?php echo $leave['first_name']; echo " ";echo $leave['last_name']?></td>
              <td><?php echo $leave['leavetype']  ?></td>
              <td><?php echo $leave['from_date']?></td>
              <td><?php echo $leave['to_date']?></td>
              <td><p class="mu-color px-2 pt-2"><b><i><?php echo $leave['leave_description'] ?></i></b></p></td>
              <td><?php echo $leave['department_name'] ?></td>
              <td><?php echo $leave['title'] ?></td>
              <td><?php echo $leave['application_date'] ?></td>

              <?php  
              if ($feedback['status']=='ACCEPTED' || $feedback['status']=='REJECTED') {  
            ?>
              <td><a href=""class="btn btn-sm" style="background-color:yellowgreen; color: #fff;"><span class="glyphicon glyphicon-edit" ></span><?php echo $feedback['status']; ?></a></td>
              <?php } else{ ?>
              <td>
                <a href="#" class="btn btn-sm btn-primary"><?php echo $feedback['status']; ?></a>
              </td><?php } ?>


              <?php 
              if ($feedback['status']=='ACCEPTED' || $feedback['status']=='REJECTED') {
               ?>
              <td><a href=""class="btn btn-sm" style="background-color:forestgreen; color: #fff;"><span class="glyphicon glyphicon-edit" ></span>Confirmed</a></td>
            <?php } else{ ?>
              <td><a href="feedback_confirmation.php?feedback_no=<?php echo $feedback['feedback_id'];?>" class="btn btn-sm btn-danger btn_del" ><span class="glyphicon glyphicon-edit"></span>Confirm</a></td><?php } ?>
            </tr>
                
<?php }}
      
          else{
           //select leave applied users
          
      $leave_applied_query = mysqli_query($dbconnect, "SELECT * FROM applied_leave,user,leave_type,department,work WHERE applied_leave.username=user.user_id AND applied_leave.department_nm=department.department_id AND applied_leave.job_title=work.work_id AND applied_leave.leave_typ=leave_type.leave_id AND type!='admin' AND type!='hr' ");

        //select default feadback with their id 
      $default_feadback_query = mysqli_query($dbconnect, "SELECT * FROM feedback,applied_leave,user,leave_type,department,work WHERE feedback.applied_leave_user=applied_leave.applied_id AND applied_leave.username=user.user_id AND applied_leave.department_nm=department.department_id AND applied_leave.job_title=work.work_id AND applied_leave.leave_typ=leave_type.leave_id AND type!='admin' AND type!='hr' AND applied_leave_user=applied_id");

              $default_feadback_count = mysqli_num_rows($default_feadback_query);
              $leave_applied_count = mysqli_num_rows($leave_applied_query);
if ($leave_applied_count==0) {

$_SESSION['error']="Currently there is no any leave application, please wait !!!";

}
              while($leave=mysqli_fetch_array($leave_applied_query)){ 
              $feedback=mysqli_fetch_array($default_feadback_query) ?>

            <tr>
              <td><?php echo $leave['first_name']; echo " ";echo $leave['last_name']?></td>
              <td><?php echo $leave['leavetype']  ?></td>
              <td><?php echo $leave['from_date']?></td>
              <td><?php echo $leave['to_date']?></td>
              <td><p class="mu-color px-2 pt-2"><b><i><?php echo $leave['leave_description'] ?></i></b></p></td>
              <td><?php echo $leave['department_name'] ?></td>
              <td><?php echo $leave['title'] ?></td>
              <td><?php echo $leave['application_date'] ?></td>

              <?php  
              if ($feedback['status']=='ACCEPTED' || $feedback['status']=='REJECTED') {  
            ?>
              <td><a href=""class="btn btn-sm" style="background-color:yellowgreen; color: #fff;"><span class="glyphicon glyphicon-edit" ></span><?php echo $feedback['status']; ?></a></td>
              <?php } else{ ?>
              <td>
                <a href="#" class="btn btn-sm btn-primary"><?php echo $feedback['status']; ?></a>
              </td><?php } ?>


              <?php 
              if ($feedback['status']=='ACCEPTED' || $feedback['status']=='REJECTED') {
               ?>
              <td><a href=""class="btn btn-sm" style="background-color:forestgreen; color: #fff;"><span class="glyphicon glyphicon-edit" ></span>Confirmed</a></td>
            <?php } else{ ?>
              <td><a href="feedback_confirmation.php?feedback_no=<?php echo $feedback['feedback_id'];?>" class="btn btn-sm btn-danger btn_del" ><span class="glyphicon glyphicon-edit"></span>Confirm</a></td><?php } ?>
            </tr>
                
<?php }}?>
</table>
<!-- session to check if user does not exist during searching -->
                        <!-- check if redirection comes with session error and error message -->
                            <?php if(isset($_SESSION['error'])) :?>
                            <div class="alert bg-danger text-white">
                                <?php echo $_SESSION['error'] ?>
                            </div>
                            <?php endif ?>
                            <?php unset($_SESSION['error']) ?>
</div>
</body>

      

