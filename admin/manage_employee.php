<?php require_once('sidebar.php') ?>
<?php
  $database = mysqli_connect('localhost','root','','leave_management');
  $select  = "SELECT * FROM `user` WHERE type!='admin' AND type!='hr'";
  $query = mysqli_query($database,$select);
?>

<html>
<head>
</head>
<body>
  <div class="col-sm-12">
      <table class="table table-spried" style="background-color: #fffd; border-radius: 2px;">
            <tr><td colspan="10"><center><h2> EMPLOYEE REGISTERED </h2></center></td></tr>
            <tr><td colspan="10">
                <div class="col-sm-12">

                  <!-- form using to search an employee -->
                    <form method="post" action="manage_employee.php">
                      <div class="row">
                      <div class="col-md-4"></div>
                      <div class="col-md-6">
                      <input type="text" name="search_data" required class="form-control" placeholder="---Search Employee Here By Either First Name, Phone Number Or Username---">
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
              <th>Last Name</th>
              <th>Sex</th>
              <th>Phone Number</th>
              <th>Email</th>
              <th>Date Of Birth</th>
              <th>Employee Type</th>
              <th>Login Username</th>
              <th>Action</th>
            </tr>";
//check if search button clicked
      if (isset($_POST["search"])) {
        $data=$_POST['search_data'];

//select data to be searched
        $search_query = mysqli_query($dbconnect,"SELECT * FROM `user` WHERE `first_name` LIKE '%$data%' OR`phone_number`LIKE '%$data%' OR`username`LIKE '%$data%'");
          if ($search_query) {
          $search_count = mysqli_num_rows($search_query);
          if ($search_count > 0) {
          while($row=mysqli_fetch_array($search_query))
          {
            echo "<tr>
                  <td> $row[first_name]</td>
                  <td> $row[last_name]</td>
                  <td> $row[sex]</td>
                  <td> $row[phone_number]</td>
                  <td> $row[email]</td>
                  <td> $row[date_of_birth]</td>
                  <td> $row[type]</td>
                  <td> $row[username]</td>
                  <td><a href='delete_employee.php?del_d= $row[user_id] 'class='btn btn-danger btn_del'' >Delete </a>
                  <a href='update_employee.php?update_d= $row[user_id] 'class='btn btn-primary''>Update </a></td>
              </tr>";
          }}
//if there is no any data after searching
          else
          {
            $_SESSION['error']="Please the data that you are tried to access is not found, please review your information first and come to search again, thank you";
          }
        }}

          else
     //if search button not clicked wil disply both employee here 
          {?>
          </div>
          <?php 
             while ( $row= $query->fetch_array(MYSQLI_BOTH)) {
              
              echo "<tr>
                  <td> $row[first_name]</td>
                  <td> $row[last_name]</td>
                  <td> $row[sex]</td>
                  <td> $row[phone_number]</td>
                  <td> $row[email]</td>
                  <td> $row[date_of_birth]</td>
                  <td> $row[type]</td>
                  <td> $row[username]</td>
                  <td><a href='delete_employee.php?del_d= $row[user_id] 'class='btn btn-sm btn-danger btn_del'' >Delete </a>
                  <a href='update_employee.php?update_d= $row[user_id] 'class='btn btn-sm btn-primary''>Update </a></td>
              </tr>";
               }}?>  
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
</html>
<?php require_once('finish.php') ?>
      