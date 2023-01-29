<h1 class="text-primary"><i class="fa fa-user-plus"></i> Add Student <small>Add New Students</small></h1>
<ol class="breadcrumb">
    <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"> Dashboard </i></a></li> &nbsp;&nbsp;&nbsp;
    <li class="active"><i class="fa fa-user-plus"> Add Student</i></li>
</ol>
<?php
if (isset($_POST['add-student'])) {

    //echo "<pre>";
    //print_r($_POST);
    //print_r($_FILES);
    //echo "</pre>";
    /*[name] => 
    [roll] => 
    [city] => 
    [pcontact] => 
    [class] => 
    [add-student] => Add Student */
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $city = $_POST['city'];
    $pcontact = $_POST['pcontact'];
    $class = $_POST['class'];

    //$picture=$_FILES['picture']['name'];
    //echo $picture;
    $picture = explode('.', $_FILES['picture']['name']);
    //print_r($picture);
    $picture_ex = end($picture);
    //echo $picture_ex;
    $picture_name = $roll . '.' . $picture_ex;
    //echo $picture_name;

    $query = "INSERT INTO `student_info`(`name`, `roll`, `class`, `city`, `contact`, `photo`)
             VALUES ('$name','$roll','$class','$city','$pcontact','$picture_name')";

    $result = mysqli_query($link, $query);
    if ($result) {
        $success = "Data inserted successfully";
        move_uploaded_file($_FILES['picture']['tmp_name'], 'student_images/' . $picture_name);
    } else {
        $error = "Data not inserted";
    }
}
?>
<div class="row">
    <?php
        if(isset($success))
        {
            echo '<p class="alert alert-success col-sm-6">'.$success.'</p>';
        }
        if(isset($error))
        {
            echo '<p class="alert alert-success col-sm-6">'.$error.'</p>';
        }
    ?>
    
</div>


<div class="row">
    <div class="col-sm-6">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Student's Name</label>
                <input type="text" name="name" id="name" placeholder="Student Name" class="form-control" required="">

            </div>
            <div class="form-group">
                <label for="roll">Student's Roll</label>
                <input type="text" name="roll" id="roll" placeholder="Roll" class="form-control" pattern="[0-9]{7}" required="">

            </div>
            <div class="form-group">
                <label for="city">Student's City</label>
                <input type="text" name="city" id="city" placeholder="City" class="form-control" required="">

            </div>
            <div class="form-group">
                <label for="pcontact">Parent's Contact</label>
                <input type="text" name="pcontact" id="pcontact" placeholder="01******" class="form-control" pattern="01[1|5|6|7|8|9][0-9]{8}" required="">

            </div>
            <div class="form-group">
                <label for="class">Student's Class</label>

                <select class="form-control" id="class" name="class" required="">
                    <option value="">Select</option>
                    <option value="1st">1st</option>
                    <option value="2nd">2nd</option>
                    <option value="3rd">3rd</option>
                    <option value="4th">4th</option>
                    <option value="5th">5th</option>
                </select>

            </div>
            <div class="form-group">
                <label for="picture">Picture</label>
                <input type="file" name="picture" id="picture" required="" />
            </div>

            <div class="form-group">
                <input type="submit" value="Add Student" name="add-student" class="btn btn-primary float-right" />
            </div>

        </form>
    </div>
</div>