<h1 class="text-primary"><i class="fa fa-pencil-square-o"></i> Update Student <small> Update Students</small></h1>
<ol class="breadcrumb">
    <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"> Dashboard </i></a></li>
    &nbsp;&nbsp;&nbsp;
    <li><a href="index.php?page=all-students"><i class="fa fa-users"> All Students </i></a></li>
    &nbsp;&nbsp;&nbsp;
    <li class="active"><i class="fa fa-pencil-square-o"> Update Student</i></li>
</ol>

<?php
    $id= base64_decode($_GET['id']);
    //echo $id;
    $db_data=mysqli_query($link,"SELECT * FROM `student_info` WHERE `id`='$id'");
    //print_r($db_data);
    $db_row=mysqli_fetch_assoc($db_data);
    //print_r($db_row);

    if (isset($_POST['update-student'])) {

        $name = $_POST['name'];
        $roll = $_POST['roll'];
        $city = $_POST['city'];
        $pcontact = $_POST['pcontact'];
        $class = $_POST['class'];
    
        
        //$picture = explode('.', $_FILES['picture']['name']);
        
        //$picture_ex = end($picture);
        
        //$picture_name = $roll . '.' . $picture_ex;
        
    
        $query = "UPDATE `student_info` SET `name`='$name',`roll`='$roll',`class`='$class',`city`='$city',`contact`='$pcontact' WHERE `id`='$id'";
    
        $result = mysqli_query($link, $query);
        if($result)
        {
            header('location:index.php?page=all-students');
        }
        
    }
?>

<div class="row">
    <div class="col-sm-6">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Student's Name</label>
                <input type="text" name="name" id="name" placeholder="Student Name" class="form-control" required=""
                value="<?php echo $db_row['name'] ?>">

            </div>
            <div class="form-group">
                <label for="roll">Student's Roll</label>
                <input type="text" name="roll" id="roll" placeholder="Roll" class="form-control" pattern="[0-9]{7}" required=""
                value="<?php echo $db_row['roll'] ?>">

            </div>
            <div class="form-group">
                <label for="city">Student's City</label>
                <input type="text" name="city" id="city" placeholder="City" class="form-control" required=""
                value="<?php echo $db_row['city'] ?>">

            </div>
            <div class="form-group">
                <label for="pcontact">Parent's Contact</label>
                <input type="text" name="pcontact" id="pcontact" placeholder="01******" class="form-control" pattern="01[1|5|6|7|8|9][0-9]{8}" required=""
                value="<?php echo $db_row['contact'] ?>">

            </div>
            <div class="form-group">
                <label for="class">Student's Class</label>

                <select class="form-control" id="class" name="class" required="">
                    <option value="">Select</option>
                    <option <?php echo $db_row['class']=='1st'?'selected=""':''; ?> value="1st">1st</option>
                    <option <?php echo $db_row['class']=='2nd'?'selected=""':''; ?> value="2nd">2nd</option>
                    <option <?php echo $db_row['class']=='3rd'?'selected=""':''; ?> value="3rd">3rd</option>
                    <option <?php echo $db_row['class']=='4th'?'selected=""':''; ?> value="4th">4th</option>
                    <option <?php echo $db_row['class']=='5th'?'selected=""':''; ?> value="5th">5th</option>
                </select>

            </div>
            

            <div class="form-group">
                <input type="submit" value="Update Student" name="update-student" class="btn btn-primary float-right" />
            </div>

        </form>
    </div>
</div>