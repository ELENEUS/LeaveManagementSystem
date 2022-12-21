<?php  
    session_start();
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'leave_management';

    $dbconnect = mysqli_connect($host, $user, $password, $dbname);

    if(!$dbconnect) {
        echo "Database connection error";
    }
?>