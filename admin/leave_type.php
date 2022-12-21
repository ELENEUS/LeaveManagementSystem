<?php require_once('sidebar.php') ?>


<?php
    $leave_type_list = mysqli_query($dbconnect, "SELECT * FROM leave_type");
    $leave_type_count = mysqli_num_rows($leave_type_list);
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 mt-5">
            <div class="card">
                <form action="leave_type_action.php" method="post" class="pt-3 px-3">
                    <h4>Add New Leave Type</h4>
                    <div class="row">
                        <div class="col-xl-4 col-md-5 col-xs-12 col-sm-12">
                            <input type="text" name="leave_type" 
                                id="" class="form-control" placeholder="Add Leave Type Name">
                        </div>
                        <div class="col-xl-3 col-md-7 col-xs-12 col-sm-12">
                            <input type="submit" name="add_leave_type" 
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
                                    <th>Leave Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- loop for looping department -->
                                <?php  $sn = 1; while($leave=mysqli_fetch_array($leave_type_list)) {?>
                                    <tr>
                                        <td><?php echo $sn++ ?></td>
                                        <td><?php echo $leave['leavetype'] ?></td>
                                        <td><a href="delete_leave_type.php?del_d=<?php echo$leave['leave_id'];?>" class="btn btn-sm btn-danger btn_del" >Delete </a>
                  <a href="update_leave_type.php?update_d=<?php echo$leave['leave_id'];?>" class="btn btn-sm btn-primary" >Update </a></td>
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