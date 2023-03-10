<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application | Login-Page</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">

     <!-- Font Awesome 5 CDN link to add social icons in html5 registration form -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"crossorigin="anonymous"/>
</head>
<body class="body">
    <div class="container">
        <div class="row justify-content-center pt-3">
            <div class="col-md-6 col-sm-12 col-xl-6 col-xs-12  border">
                <center><img src="img/mulogo.png" alt="" srcset="" width="20%" class="pt-3"></center>
            <h5 class="text-uppercase text-center text-dark pt-4 font-weight-bold">Mzumbe University Leave Management System <br>(MU-LMS)</h5>
            <hr>
                <div class="">
                    <div class="card-body">
                         <?php require_once('includes/messages.php') ?>
                        <form action="login.php" method="post">
                            <div class=" form-group mt-1">
                                <input type="text" name="username" id="username" 
                                    placeholder="username" class="form-control" required >
                            </div>
                            <div class="form-group mt-2">
                                <input type="password" name="password" id="password" placeholder="password" class="form-control" required>
                            </div>
                            <div class="form-group mt-2">
                                <input type="submit" name="signin" id="signin" value="Sign in" class="btn mu-btn btn-block">
                            </div>
                            <div class="form-group mt-2">
                                <p class="text-center">Do you have an account? <a href="registration.php" class="mu-text">Create Account</a></p>
                            </div>
                            <div class="form-group mt-2">
                                <p class="text-center"><b>Forgort password?</b> <a href="" class="mu-text">Reset Password</a></p>
                                 <hr>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>