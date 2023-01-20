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
                        <li class="list-group-item"><a href="dash.php">View all eployees</a></li>
                    </ul>
                </div>
            </div>
            <!-- side bar ends here -->
            <div class="col-lg-9 col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Employee details </div>
                    <table class="table table-bordered">


                        <?php
                        $id = $_GET['e_id'];
                        $sql = "SELECT * FROM employees WHERE e_id='$id'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($employee = mysqli_fetch_assoc($result)) { ?>


                                <tr>
                                    <th style="width:130px">Name</th>
                                    <td><?php echo $employee['e_name']; ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?php echo $employee['e_email']; ?></td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td><?php echo $employee['e_phone']; ?></td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="update.php?e_id=<?php echo $employee['e_id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <td><a href="delete.php?e_id=<?php echo $employee['e_id']; ?>" class="btn btn-xs btn-danger">Delete</a></td>
                                    </td>
                                </tr>

                        <?php
                            }
                        } else {
                            echo "0 result found!";
                        }
                        ?>



                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content ends here -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>