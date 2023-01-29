<h1 class="text-primary"><i class="fa fa-users"></i> All Users <small>All Users</small></h1>
<ol class="breadcrumb">
    <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"> Dashboard </i></a></li> &nbsp;&nbsp;&nbsp;
    <li class="active"><i class="fa fa-users"> All Users</i></li>
</ol>

<div class="table-responsive">
                    <table id="data" class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                
                                
                                <th>Name</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Photo</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $db_student_info=mysqli_query($link,"SELECT * FROM `users` ");
                                //print_r($db_student_info);
                                while($row=mysqli_fetch_assoc($db_student_info))
                                {
                                    ?>
                                    
                            
                            
                            <tr>
                                
                                <td><?php echo ucwords($row['name']) ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['username'] ?></td>
                                <td><img style="width: 100px; height:90px;" src="images/<?php echo $row['photo'] ?>" alt=""></td>
                                
                            </tr>
                            <?php
                                }
                            ?>
                            
                        </tbody>
                    </table>
                    </div>