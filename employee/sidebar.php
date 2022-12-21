<!-- database connection -->
<?php include('../includes/config.php') ?>

<!-- check if user loged in -->
<?php if(!isset($_SESSION['employee_loged_in'])): ?>
    <?php header('location:../logout.php') ?>
<?php endif ?>

<?php $user_id = $_SESSION['employee_detail']['user_id'];?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Employee | Panel</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../img/mulogo.png" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">

        <!-- datatable  -->
        <link rel="stylesheet" href="../asset/datatables.min.css">
        <link rel="stylesheet" href="../asset/responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="../asset/responsive/css/responsive.dataTables.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <style>
            .appoint-background {
                background-color: rgb(6, 109, 194);
            }
            .list-group-item:hover {
                background-color: #f5784c;
                color: white;
            }
            .mu-bg {
                background-color: darkcyan;  
                color: white;
                transition: all 1s;
            }
            .mu-color {
                color: #f5784c;
            }
            .uploaded_passort
            {
                height: 10px;
                width: 10px;
            }
        </style>
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end mu-bg" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom mu-bg text-white sticky-top">
                    <b>MU-LMS</b>
                </div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action mu-bg 
                        text-light p-3 nav-hover" href="index.php"><b>Dashboard</b></a>
                    <a class="list-group-item list-group-item-action mu-bg 
                        text-light p-3" href="leave_report.php"><b>Check report</b></a>
                    <a class="list-group-item list-group-item-action mu-bg 
                        text-light p-3" href="change_password_form.php"><b>Change Password</b></a>            
                    <a class="list-group-item list-group-item-action mu-bg
                        text-light p-3" href="../logout.php"><b>Logout</b></a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light border-bottom shadow">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#!">
                                        <img src="<?php echo $_SESSION['employee_detail']['passport'];  ?>" width="50px" height="50px" style="border-radius: 100%;"> <b>
                                        <?php echo $_SESSION['employee_detail']['first_name'];?>
                                        </b></a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid p-3">
                    <?php include_once('../includes/messages.php') ?>
