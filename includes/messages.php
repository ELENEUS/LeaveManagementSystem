<!-- check if redirection comes with session error and error message -->
<?php if(isset($_SESSION['error'])) :?>
    <center><div class="alert bg-danger text-white">
        <?php echo $_SESSION['error'] ?>
    </div></center>
<?php endif ?>
<?php unset($_SESSION['error']) ?>

<!-- //check if redirection comes with session success and success message -->
<?php if(isset($_SESSION['success'])) :?>
    <center><div class="alert bg-success text-white">
      <?php echo $_SESSION['success'] ?>
    </div></center>
<?php endif ?>
<?php unset($_SESSION['success']) ?>