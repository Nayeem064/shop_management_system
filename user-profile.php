<h1 class="text-primary"><i class="fa fa-user"></i> User Profile <small>My Profile</small></h1>
<ol class="breadcrumb">
    <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"> Dashboard</a></i></li>
    &nbsp;&nbsp;
    <li class="active"><i class="fa fa-user"> Profile</i></li>
</ol>
<?php
$session_user = $_SESSION['user_login'];
$user_data = mysqli_query($link, "SELECT * FROM `users` WHERE `username`='$session_user'");
$user_row = mysqli_fetch_assoc($user_data);
//print_r($user_row);
?>

<div class="row">

    <div class="col-sm-6">
        <table class="table table-bordered">
            <tr>
                <td>User ID</td>
                <td><?= ucwords($user_row['id']); ?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><?= $user_row['name']; ?></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><?= $user_row['username'] ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?= $user_row['email']; ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><?= ucwords($user_row['status']); ?></td>
            </tr>
            <tr>
                <td>Signup Date</td>
                <td><?= $user_row['datetime']; ?></td>
            </tr>
        </table>
        <a href="" class="btn btn-sm btn-info float-right">Edit</a>
    </div>
    <div class="col-sm-5">
        <a href="">
            <img class="img-thumbnail" style="max-width: 220px;" src="images/<?= $user_row['photo']; ?>" alt="">
        </a>
        <br>
        <?php
        if (isset($_POST['upload'])) {
            //print_r($_FILES);

            $photo = explode(".", $_FILES['photo']['name']);
            //print_r($photo);

            $photo = end($photo);
            $photo_name = $session_user . '.' . $photo;
            //echo $photo_name;
            $upload=mysqli_query($link,"UPDATE `users` SET `photo`='$photo_name'  WHERE `username`='$session_user'");
            if($upload)
            {
                move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$photo_name);
            }
        }
        ?>
        <form action="" enctype="multipart/form-data" method="POST">
            <label for="photo">Profile Picture</label><br />
            <input type="file" id="photo" name="photo" required="">
            <br><br>
            <input type="submit" name="upload" value="Upload" class="btn btn-sm btn-info">
        </form>
    </div>
</div>