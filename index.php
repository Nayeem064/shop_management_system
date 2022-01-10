<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Shop Management System</title>

</head>

<body>
    <div class="container">
        <br />
        <a class="btn btn-primary float-right" href="admin/login.php">Login</a>&nbsp;&nbsp;
        <a class="btn btn-primary float-right" href="admin/registration.php">Registration</a>&nbsp;&nbsp;
        <br /><br />
        <h1 class="text-center">Welcome to Shop Management System</h1><br />

        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">

                <form action="" method="POST">
                    <table class="table table-bordered">
                        <tr>
                            <td class="text-center" colspan="2"><label>Product Information</label></td>
                        </tr>

                        <tr>
                            <td>
                                <label for="choose">Choose Product</label>
                            </td>
                            <td>
                                <select class="form-control" id="choose" name="choose">
                                    <option value="">Select</option>
                                    <option value="Miniket Rice Premium">Rice</option>
                                    <option value="Moshur Dal (Deshi)">Dal</option>
                                    <option value="Chicken Eggs(layer)">Egg</option>
                                    <option value="Onion(Imported)">Onion</option>
                                    <option value="Fresh Refined Sugar">Sugar</option>
                                    <option value="Fresh Fortified Soyabean Oil(5 ltr)">Oil</option>
                                    <option value="Potato Regular">Potato</option>
                                    <option value="Vim Dishwashing Bar">Vim</option>
                                    <option value="ACI Pure Salt">Salt</option>
                                    <option value="Bashundhara Toilet Tissue">Toilet Tissue</option>                                 
                                    <option value="Wheel Washing Powder">Washing Powder</option>
                                    <option value="Teer Flour (Atta)">Flour</option>
                                    <option value="Radhuni Chilli (Morich) Powder">Chilli Powder</option>

                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td class="text-center" colspan="2">
                                <input class="btn btn-info" type="submit" value="Show Info" name="show_info">
                            </td>
                        </tr>
                    </table>

                </form>
            </div>

            <div class="col-sm-4"></div>

        </div>
        <br />
        <?php
        require_once './admin/dbconnection.php';

        if (isset($_POST['show_info'])) {
            //print_r($_POST);
            $choose = $_POST['choose'];
            $result = mysqli_query($link, "SELECT * FROM `product_info` WHERE `name`='$choose'");
            //print_r($result);
            if (mysqli_num_rows($result) == 1) {
                $row=mysqli_fetch_assoc($result);
                //print_r($row);
        ?>
        <div class="row">
            <div class="col-sm-11 col-sm-offset-2">
                <table class=" table table-bordered" style="text-align: center;">
                    <tr>
                        <td rowspan="3">
                            <img style="width: 300px; height:270px;"
                                src="admin/product_images/<?php echo $row['photo'] ?>" class="img-thumbnail">
                        </td>
                        <td>Name</td>
                        <td><?php echo ucwords($row['name']); ?></td>
                    </tr>

                    <tr>
                        <td>Quantity</td>
                        <td><?php echo $row['quantity']; ?></td>
                    </tr>

                    <tr>
                        <td>Price</td>
                        <td><?php echo $row['price']; ?></td>
                    </tr>
                


                </table>
            </div>


        </div>
        <?php
            }
            else
            {
                ?>
        <script type="text/javascript">
        alert("Data Not Found");
        </script>
        <?php
            }
        }
        ?>




    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>