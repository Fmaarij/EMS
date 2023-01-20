<?php
require 'connection.php';
session_start();

if (!$_SESSION['u_lastname']) {
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <!-- Navbar starting here -->
    <?php require 'nav.php' ?>
    <!-- End of navbar -->

    <!-- Main content starts here -->
    <div class="container">
        <div class="row">
            <!-- side bar -->
            <div class="col-lg-3 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Employees</div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="add_new_employee.php">Add New Employee</a></li>
                        <li class="list-group-item"><a href="dash.php">View all employees</a></li>
                    </ul>
                </div>
            </div>
            <!-- side bar ends here -->
            <div class="col-lg-9 col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Employees</div>
                    <div class="panel-body">
                        <form action="" method="POST">
                            <?php
                            $id = $_GET['e_id'];
                            $sql = "SELECT * FROM employees WHERE e_id='$id'";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while ($employee = mysqli_fetch_assoc($result)) { ?>



                                    <div class="form-group">
                                        <input type="text" class="form-controll input-sm" name="e_name" placeholder="Employee name" value="<?php echo $employee['e_name']; ?> " required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-controll input-sm" name="e_email" placeholder="Employee email" value="<?php echo $employee['e_email']; ?> " required>
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" class="form-controll input-sm" name="e_phone" placeholder="Employee phone number" value="<?php echo $employee['e_phone']; ?> " required>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class='btn btn-sm btn-success' value="update employee" name="e_update">
                                    </div>
                            <?php  }
                            } else {
                                echo '0 result found!';
                            }
                            ?>
                        </form>
                        <?php

                        if (isset($_POST['e_update'])) {

                            $e_name = $_POST['e_name'];
                            $e_email = $_POST['e_email'];
                            $e_phone = $_POST['e_phone'];

                            $sql = "UPDATE employees SET e_name='$e_name', e_email='$e_email', e_phone='$e_phone' WHERE e_id='$id' ";

                            if (mysqli_query($conn, $sql)) {
                                // echo "<script>alert('Employee updated successfully!');</script>";
                                // header('Location: dash.php');
                                echo "<script> location.replace('dash.php'); </script>";
                            } else {
                                echo "Error: " . "<br>" . mysqli_error($conn);
                            }
                        }

                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Main content ends here -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>