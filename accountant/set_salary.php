<?php require_once('sidebar.php') ?>

<?php
    $salary_list = mysqli_query($dbconnect, "SELECT * FROM salary");
    $salary_count = mysqli_num_rows($salary_list);
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 mt-5">
            <div class="card">
                <form action="salary_add_action.php" method="post" class="pt-3 px-3">
                    <h4>Set Employee Salary</h4>
                    <div class="row">
                        <div class="col-xl-4 col-md-5 col-xs-12 col-sm-12">
                            <input type="text" name="salary_scale" 
                                id="" class="form-control" placeholder="Add Salary Scale" required>
                        </div>
                         <div class="col-xl-4 col-md-5 col-xs-12 col-sm-12">
                            <input type="number" name="actual_salary" 
                                id="" class="form-control" placeholder="Enter Actual Salary" required>
                        </div>
                        <div class="col-xl-3 col-md-7 col-xs-12 col-sm-12">
                            <input type="submit" name="add_salary" 
                                id="" class="btn btn-sm mu-btn">
                        </div>
                    </div>
                </form>
                <hr>
                <div class="card-body">
                    <div class="table">
                        <table width="100%" class="table table-striped table-sm table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Salary Scale</th>
                                    <th>Actual Salary</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- loop for looping salary -->
                                <?php  $sn = 1; while($salary=mysqli_fetch_array($salary_list)) {?>
                                    <tr>
                                        <td><?php echo $sn++ ?></td>
                                        <td><?php echo $salary['salary_scale'] ?></td>
                                        <td><?php echo $salary['actual_salary'] ?></td>
                                        <td><a href="delete_salary.php?del_salary=<?php echo $salary['salary_id'];?>"><button class="btn btn-sm btn-danger">Delete</button></a>
                  <a href="update_salary.php?update_d=<?php echo $salary['salary_id'];?>"><button class="btn-sm btn-primary">Update</button></a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('finish.php') ?>