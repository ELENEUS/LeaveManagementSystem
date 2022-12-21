<?php require_once('sidebar.php') ?>


<?php
    $work_title_list = mysqli_query($dbconnect, "SELECT * FROM work");
    $work_title_count= mysqli_num_rows($work_title_list);
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 mt-5">
            <div class="card">
                <hr>
                <div class="card-body">
                    <div class="table">
                        <table width="100%" class="table table-striped table-sm table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Work Title</th>
                                    <th>Salary</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- loop for looping doctor -->
                                <?php  $sn = 1; while($work_title=mysqli_fetch_array($work_title_list)) {?>
                                    <tr>
                                        <td><?php echo $sn++ ?></td>
                                        <td><?php echo $work_title['title'] ?></td>
                                        <td><a href="delete_work_title.php?del_d=<?php echo $work_title['work_id'];?>" class="btn btn-sm btn-danger btn_del" >Delete </a>
                                        </td>
                                        <td>
                  <a href="update_work_title.php?update_d=<?php echo $work_title['work_id'];?>" class="btn btn-sm btn-primary" >Update </a></td>
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