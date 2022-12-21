<?php require_once('sidebar.php') ?>

<?php
    $department_list = mysqli_query($dbconnect, "SELECT * FROM department");
    $department_count = mysqli_num_rows($department_list);
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 mt-5">
            <div class="card">
                <form action="department_add_action.php" method="post" class="pt-3 px-3">
                    <h4>New Department</h4>
                    <div class="row">
                        <div class="col-xl-4 col-md-5 col-xs-12 col-sm-12">
                            <input type="text" name="dept_name" 
                                id="" class="form-control" placeholder="Add Department Name">
                        </div>
                        <div class="col-xl-3 col-md-7 col-xs-12 col-sm-12">
                            <input type="submit" name="add_departmant" 
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
                                    <th>Department</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- loop for looping department -->
                                <?php  $sn = 1; while($department=mysqli_fetch_array($department_list)) {?>
                                    <tr>
                                        <td><?php echo $sn++ ?></td>
                                        <td><?php echo $department['department_name'] ?></td>
                                        <td><a href="delete_department.php?del_d=<?php echo $department['department_id'];?>"><button class="btn btn-sm btn-danger delete_department">Delete</button></a>
                  <a href="update_department.php?update_d=<?php echo $department['department_id'];?>"><button class="btn-sm btn-primary">Update</button></a></td>
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
<script>
    function _reset(){
        $('[name="id"]').val('');
        $('#manage-department').get(0).reset();
    }
    
    $('#manage-department').submit(function(e){
        e.preventDefault()
        start_load()
        $.ajax({
            url:'ajax.php?action=save_department',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success:function(resp){
                if(resp==1){
                    alert_toast("Data successfully added",'success')
                    setTimeout(function(){
                        location.reload()
                    },1500)

                }
                else if(resp==2){
                    alert_toast("Data successfully updated",'success')
                    setTimeout(function(){
                        location.reload()
                    },1500)

                }
            }
        })
    })
    $('.edit_department').click(function(){
        start_load()
        var cat = $('#manage-department')
        cat.get(0).reset()
        cat.find("[name='id']").val($(this).attr('data-id'))
        cat.find("[name='name']").val($(this).attr('data-name'))
        end_load()
    })
    $('.delete_department').click(function(){
        _conf("Are you sure to delete this department?","delete_department",[$(this).attr('data-id')])
    })
    function displayImg(input,_this) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#cimg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
    function delete_department($id){
        start_load()
        $.ajax({
            url:'ajax.php?action=delete_department',
            method:'POST',
            data:{id:$id},
            success:function(resp){
                if(resp==1){
                    alert_toast("Data successfully deleted",'success')
                    setTimeout(function(){
                        location.reload()
                    },1500)

                }
            }
        })
    }
</script>
<?php require_once('finish.php') ?>