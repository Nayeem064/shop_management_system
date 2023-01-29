<?php
require_once './dbconnection.php';
session_start();
if (isset($_POST['registration'])) {
    /*echo "<pre>";
        print_r($_POST);
        print_r($_FILES);
        echo "</pre>";*/

    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];

    //$photo=$_FILES['photo']['name'];

    //echo $photo;

    $photo = explode(".", $_FILES['photo']['name']); //
    //print_r($photo);

    $photo = end($photo);
    //echo $photo;
    $photo_name = $username . '.' . $photo;
    //echo $photo_name;
    //print_r($_FILES);
    //exit();

    $input_error = array();
    //print_r($input_error);

    if (empty($name)) {
        $input_error['name'] = "The name field is required";
    }
    if (empty($email)) {
        $input_error['email'] = "The email field is required";
    }
    if (empty($username)) {
        $input_error['username'] = "The username field is required";
    }
    if (empty($password)) {
        $input_error['password'] = "The password field is required";
    }
    if (empty($name)) {
        $input_error['c_password'] = "The confirm password field is required";
    }
    /*echo '<pre>';
        print_r($input_error);
        echo '</pre>';*/
    $email_ok = false;
    $password_ok = false;
    $username_ok = false;
    $c_password_ok = false;


    if (count($input_error) == 0) {
        //echo "Yes";
        $email_check = mysqli_query($link, "SELECT * FROM `users` WHERE `email`='$email'; ");
        $username_check = mysqli_query($link, "SELECT * FROM `users` WHERE `username`='$username'; ");
        //print_r($email_check);
        if (mysqli_num_rows($email_check) == 0) //In mysql there is no such email
        {
            $email_ok = true;
            //echo "Yes";
        } else {
            //echo "NO";
            $email_error = "This email address is already exists";
        }

        if (strlen($password) > 7) {
            $password_ok = true;
            if ($password == $c_password) {
                $c_password_ok = true;
                $password = md5($password);
                //echo "Yes";
            } else {
                $password_not_matched = "Confirm password not matched";
            }
        } else {
            $password_length = "Password should be at least 8 characters";
        }

        if (mysqli_num_rows($username_check) == 0) //In mysql there is no such username
        {
            //echo "Yes";
            if (strlen($username) > 5) {
                $username_ok = true;
                //echo "Yes";
            } else {
                //echo "No";
                $username_length = "Username should be at least 5 characters";
            }
        } else {
            //echo "NO";
            $username_error = "This username is already exists";
        }
    } else {
        //echo "No";
    }

    if ($email_ok == true && $password_ok == true && $username_ok == true && $c_password_ok == true) {
        unset($_SESSION['data_insert_success']);
        $query = "INSERT INTO `users`(`name`, `email`, `username`, `password`, `photo`, `status`) 
            VALUES ('$name','$email','$username','$password','$photo_name','inactive')";
        $result = mysqli_query($link, $query);
        if ($result) {
            $_SESSION['data_insert_success'] = "Data inserted successfully";
            move_uploaded_file($_FILES['photo']['tmp_name'], 'images/' . $photo_name);
            header('location:registration.php');
            unset($_SESSION['data_insert_success']);
        } else {
            $_SESSION['data_insert_error'] = "Data not inserted";
            unset($_SESSION['data_insert_error']);
        }
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
    <title>Registration</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">


</head>

<body>
    <div class="container">
        <br />
        <h1>User Registration Form</h1>
        <hr />
        <?php
        if (isset($_SESSION['data_insert_success'])) {
            echo '<div class="alert alert-success">' . $_SESSION['data_insert_success'] . '</div>';
        }
        unset($_SESSION['data_insert_success']);
        if (isset($_SESSION['data_insert_error'])) {
            echo '<div class="alert alert-warning">' . $_SESSION['data_insert_error'] . '</div>';
        }


        //<div class="alert alert-success">test</div>
        //<div class="alert alert-warning">test</div>
        ?>

        <div class="row">
            <div class="col-md-12">
                <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group">
                        <label for="name" class="control-label col-sm-1">Name:</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="name" type="text" name="name" placeholder="Enter Your Name" value="<?php if (isset($name)) echo $name ?>">
                            <label class="error">
                                <?php
                                if (isset($input_error['name'])) {
                                    echo "*" . $input_error['name'];
                                }
                                ?>
                            </label>

                        </div>

                    </div>


                    <div class="form-group">
                        <label for="email" class="control-label col-sm-1">Email:</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="email" type="email" name="email" placeholder="Enter Your Email" value="<?php if (isset($email)) echo $email ?>">
                            <label class="error">
                                <?php
                                if (isset($input_error['email'])) {
                                    echo "*" . $input_error['email'];
                                }
                                ?>
                            </label>
                            <label class="error">
                                <?php
                                if (isset($email_error)) {
                                    echo $email_error;
                                }
                                ?>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username" class="control-label col-sm-1">Username:</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="username" type="text" name="username" placeholder="Enter Your Username" value="<?php if (isset($username)) echo $username ?>">
                            <label class="error">
                                <?php
                                if (isset($input_error['username'])) {
                                    echo "*" . $input_error['username'];
                                }
                                ?>
                            </label>
                            <label class="error">
                                <?php
                                if (isset($username_error)) {
                                    echo $username_error;
                                }
                                if (isset($username_length)) {
                                    echo $username_length;
                                }
                                ?>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="control-label col-sm-1">Password:</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="password" type="password" name="password" placeholder="Enter Your Password" value="<?php if (isset($password)) echo $password ?>">
                            <label class="error">
                                <?php
                                if (isset($input_error['password'])) {
                                    echo "*" . $input_error['password'];
                                }
                                ?>
                            </label>
                            <label class="error">
                                <?php
                                if (isset($password_length)) {
                                    echo $password_length;
                                }
                                ?>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="c_password" class="control-label col-sm-1">Confirm Password:</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="c_password" type="password" name="c_password" placeholder="Confirm Password" value="<?php if (isset($c_password)) echo $c_password ?>">
                            <label class="error">
                                <?php
                                if (isset($input_error['c_password'])) {
                                    echo "*" . $input_error['c_password'];
                                }
                                ?>
                            </label>
                            <label class="error">
                                <?php
                                if (isset($password_not_matched)) {
                                    echo $password_not_matched;
                                }
                                ?>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="photo" class="control-label col-sm-1">Photo:</label>
                        <div class="col-sm-4">
                            <input id="photo" type="file" name="photo">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <input type="submit" value="Registration" name="registration" class="btn btn-primary">
                    </div>

                </form>
            </div>
        </div><br />
        <h5>If you already have an account please <a href="login.php">Login</a></h5>
        <hr />


        <footer>
            <p>Copyright &copy; 2020 - <?php echo date("Y") ?> All Rights Reversed</p>
        </footer>

    </div>


</body>

</html>