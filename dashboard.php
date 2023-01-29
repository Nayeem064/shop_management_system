<h1 class="text-primary"><i class="fa fa-dashboard"></i> Dashboard <small>Statistics Overview</small></h1>
<ol class="breadcrumb">
    <li class="active"><i class="fa fa-dashboard"> Dashboard</i></li>
</ol>
<?php
    $count_student=mysqli_query($link,"SELECT * FROM `student_info`");
    //print_r($count_student);
    $total_student=mysqli_num_rows($count_student);
    //echo $total_student;
    $count_users=mysqli_query($link,"SELECT * FROM `users`");
    $total_user=mysqli_num_rows($count_users);
?>
<div class="row">
    <div class="col-sm-4">
        <div class="card card-primary">
            <div class="card-header">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>

                    <div class="col-xs-9">
                        <div class="float-right" style="font-size: 45px;"><?php echo $total_student ?></div>
                        <div class="clearfix"></div>
                        <div class="float-right">All Students</div>
                    </div>
                </div>
            </div>
            <a href="index.php?page=all-students">
                <div class="card-footer">
                    <span class="float-left">All Students</span>
                    <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="card card-primary">
            <div class="card-header">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>

                    <div class="col-xs-9">
                        <div class="float-right" style="font-size: 45px;"><?php echo $total_user?></div>
                        <div class="clearfix"></div>
                        <div class="float-right">All Users</div>
                    </div>
                </div>
            </div>
            <a href="index.php?page=all-users">
                <div class="card-footer">
                    <span class="float-left">All Users</span>
                    <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>

        </div>
    </div>



</div>
<hr />
<h3>New Students</h3>
<div class="table-responsive">
    <table id="data" class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Roll</th>
                <th>City</th>
                <th>Contact</th>
                <th>Photo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $db_student_info = mysqli_query($link, "SELECT * FROM `student_info` ");
            //print_r($db_student_info);
            while ($row = mysqli_fetch_assoc($db_student_info)) {
            ?>



                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo ucwords($row['name']) ?></td>
                    <td><?php echo $row['roll'] ?></td>
                    <td><?php echo ucwords($row['city']) ?></td>
                    <td><?php echo $row['contact'] ?></td>
                    <td><img style="width: 100px; height:90px;" src="student_images/<?php echo $row['photo'] ?>" alt=""></td>
                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>
</div>