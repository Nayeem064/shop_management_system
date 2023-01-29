<?php
    require_once './dbconnection.php';
    session_start();
    if(isset($_SESSION['user_login']))
    {
        header('location:index.php');
    }
    if(isset($_POST['login']))
    {
        $username=$_POST['username'];
        $password=$_POST['password'];
        //print_r($_POST);

        $query="SELECT * FROM `users` WHERE `username`='$username'; ";

        $username_check=mysqli_query($link,$query);
        if(mysqli_num_rows($username_check)>0)
        {
            //echo "Yes";
            $row=mysqli_fetch_assoc($username_check);
            //print_r($row);
            if($row['password']==md5($password))
            {
                //echo "Yes";
                if($row['status']=='active')
                {
                    //echo "Yes";
                    $_SESSION['user_login']=$username;
                    header('location:index.php');
                }
                else
                {
                    $status_inactive="Your status is inactive";
                }
            }
            else
            {
                $wrong_password="This password incorrect";
            }
        }
        else
        {
            //echo "No";
            $username_not_found="This username is not found";
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">

    
  </head>
  <body>
    <br/>
    <div class="container animated table-active animated shake pt-2">
        <br/>
        <h1 class="text-center" >Student Management System</h1>
        <br/>
        <div class="row">
        <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <h2 class="text-center">Admin Login Form</h2>
                <form action="login.php" method="POST">
                    <div>
                        <input type="text" placeholder="Username" name="username" required="" class="form-control"
                        value="<?php if(isset($username)) echo $username ?>">
                    </div><br/>

                    <div>
                        <input type="Password" placeholder="Password" name="password" required="" class="form-control"
                        value="<?php if(isset($password)) echo $password ?>">
                    </div><br/>

                    <div>
                        <input type="submit" value="Login" name="login" class="btn btn-primary float-right">
                    </div>

                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <br/>
        <?php
            if(isset($username_not_found))
            {
                echo '<div class="alert alert-danger col-sm-4 m-auto">'.$username_not_found.'</div>';
            }
            if(isset($wrong_password))
            {
                echo '<div class="alert alert-danger col-sm-4 m-auto">'.$wrong_password.'</div>';
            }
            if(isset($status_inactive))
            {
                echo '<div class="alert alert-danger col-sm-4 m-auto">'.$status_inactive.'</div>';
            }
        ?>
        
    </div>

    
  </body>
</html>