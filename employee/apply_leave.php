<?php require_once('sidebar.php') ?>
<?php
//$database = mysqli_connect('localhost','root','','leave_management');
//$user_id=$_SESSION['employee_detail']['user_id']

?>


<html>
<head>
</head>
<body>

<div class="container h-40">
    <div class="row px-2 ">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body">
                    <form action="apply_leave_action.php" method="POST">
                        <div class="card-header">
                            <div class="text-center">
                                <h4 class="mu-color">Apply Leave</h4>
                                    </div>

		      <?php
             if (isset($_SESSION['Leave_success']))
              {?>
              <h4 style="font-family: serif;color:green;text-align: center;">
              <?php echo $_SESSION['Leave_success'];?>
              </h4>
          <?php }
        unset($_SESSION['Leave_success']);

         ?>
       </div>
	     <div class="col-sm-12">
        <div class="form-control">
       <div class="row">
        <div class="col-sm-6">
            <label><b>Employee Name</b></label>
            <input type="text" name="username" placeholder="Employee username " class="form-control"value = "<?php echo $_SESSION['employee_detail']['first_name'];
                         echo " ";
                         echo $_SESSION['employee_detail']['last_name'];
                       ?>" readonly required>
        </div>
        <div class="col-sm-6">
            <label><b>Department</b></label>
                        <?php
                      $department_query = mysqli_query($dbconnect, "SELECT * from user,department
                          WHERE user_id  = $user_id AND department=department_id");
                      $department_count = mysqli_num_rows($department_query);

                      while($department=mysqli_fetch_array($department_query)) {?>
                                                                                                   
                                               
                    <input type="text" name="department" placeholder="Employee username " class="form-control" value = "<?php echo $department['department_name'] ?>" readonly required>
                    <?php }?>
         
       </div>
     </div><br>
      <div class="row">
        <div class="col-sm-6">
            <label><b>Job Title</b></label>
            <?php
                      $work_query = mysqli_query($dbconnect, "SELECT * from user,work
                          WHERE user_id  = $user_id AND work_title=work_id");

                      if (!$work_query) {
                        echo "table not accessed well";
                      }
                      $department_count = mysqli_num_rows($work_query);

                      while($department=mysqli_fetch_array($work_query)) {?>
                                                                                                   
                                               
                  <input type="text" name="job_title" class="form-control" value = "<?php echo $department['title'] ?>" readonly required>
                  <?php }?>
          
        </div>
          <div class="col-sm-6">
              <label><b>Leave type</b></label>
              <select name="leave_type" id="" class="form-control">
                      <option value="">--Select Leave Type--</option>

                          <?php
                              $leave_type_list = mysqli_query($dbconnect, "SELECT * FROM leave_type");
                              $leave_type_count = mysqli_num_rows($leave_type_list);
                          ?>

                          <?php while($leave_type=mysqli_fetch_array($leave_type_list)) {?>
                      <option value="<?php echo $leave_type['leave_id'] ?>"><?php echo $leave_type['leavetype'] ?><?php }?></option>
                </select>
            
          </div>
        </div><br>
        <div class="row">
          <div class="col-sm-6">
              <label><b>From date</b></label>
              <input type="date" name="fromdate" id="datepicker" placeholder="yy-m-d" class="form-control glyphicon glyphicon-calendar" required>
            </div>
            <div class="col-sm-6">
                <label><b>To date</b></label>
                    <input type="date" name="todate" id="datepicker2" placeholder="yy-m-d" class="form-control" required >
              
            </div>
          
        </div><br>
        <div class="row">
          <div class="col-sm-6">
           
            <label><b>Employee Leave Description</b></label>
             <textarea rows="2" placeholder=" Employe Leave Description " name="comment"  class="form-control" required>
                 </textarea>
         
        </div>
          <div class="col-sm-6">
            
              <label><b>application date</b></label>
              <input type="date" name="newdate" class="form-control" required>
    
               
          </div> 
        </div><br>
        <div class="row">
          <div class="col-sm-5">
          </div>        
          <div class="col-sm-2">
            <button class="btn btn-success" name="appl_leave" style="width:160px">APPLY</button>
          </div>
          <div class="col-sm-5">
          </div>
          
        </div><br>
      </div>
      </div>
    </form>
   </div>
            </div>
        </div>
    </div>
  </div>

     <?php require_once('finish.php') ?>

      