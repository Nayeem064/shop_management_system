<?php
session_start();
require_once './dbconnection.php';

if (!isset($_SESSION['user_login'])) {
    header('location:login.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SMS</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    
    <link href="../css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap4.min.js"></script>
    <script src="../js/script.js"></script>


</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">SMS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="float-right collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-user-circle"> Welcome</i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registration.php"><i class="fa fa-user-plus"> Add User</i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=user-profile"><i class="fa fa-user"> Profile</i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php"><i class="fa fa-power-off"> Logout</i></a>
                </li>


            </ul>

        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                <div class="list-group">
                    <a href="index.php?page=dashboard" class="list-group-item active">
                        <i class="fa fa-dashboard"> Dashboard</i>
                    </a>
                    <a href="index.php?page=add-student" class="list-group-item"><i class="fa fa-user-plus"> Add Student</i></a>
                    <a href="index.php?page=all-students" class="list-group-item"><i class="fa fa-users"> All Students</i></a>
                    <a href="index.php?page=all-users" class="list-group-item"><i class="fa fa-users"> All Users</i></a>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="content">
                    <?php
                        //require_once('./dashboard.php')
                        //echo $_GET['page'].'.php';
                        //$page=$_GET['page'].'.php';
                        if(isset($_GET['page']))
                        {
                            $page=$_GET['page'].'.php';
                        }
                        else
                        {
                            $page="dashboard.php";
                        }
                        
                        if(file_exists($page))
                        {
                            require_once $page;
                        }
                        else
                        {
                            //echo "File not found";
                            require_once '404.php';
                        }
                    ?>
                </div>
            </div>
        </div>
        

    </div>
    <footer class="footer-area">
        <p>Copyright &copy; 2020 Students Management System. All rights are preserved</p>
    </footer>

</body>

</html>