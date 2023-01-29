<h1 class="text-primary"><i class="fa fa-users"></i> All Student <small>All Students</small></h1>
<ol class="breadcrumb">
    <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"> Dashboard </i></a></li> &nbsp;&nbsp;&nbsp;
    <li class="active"><i class="fa fa-users"> All Student</i></li>
</ol>

<div class="table-responsive">
                    <table id="data" class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Roll</th>
                                <th>Class</th>
                                <th>City</th>
                                <th>Contact</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $db_student_info=mysqli_query($link,"SELECT * FROM `student_info` ");
                                //print_r($db_student_info);
                                while($row=mysqli_fetch_assoc($db_student_info))
                                {
                                    ?>
                                    
                            
                            
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo ucwords($row['name']) ?></td>
                                <td><?php echo $row['roll'] ?></td>
                                <td><?php echo $row['class'] ?></td>
                                <td><?php echo ucwords($row['city']) ?></td>
                                <td><?php echo $row['contact'] ?></td>
                                <td><img style="width: 100px; height:90px;" src="student_images/<?php echo $row['photo'] ?>" alt=""></td>
                                <td>
                                    <a href="index.php?page=update-student&id=<?php echo base64_encode($row['id'])?>" class="btn btn-warning"><i class="fa fa-pencil">Edit</i></a> &nbsp;&nbsp;&nbsp;
                                    <a href="delete_student.php?id=<?php echo base64_encode($row['id']) ?>" class="btn btn-danger"><i class="fa fa-trash">Delete</i></a>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                            
                        </tbody>
                    </table>
                    </div>