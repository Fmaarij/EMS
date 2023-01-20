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
                    <div class="panel-heading">Employees List</div>
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Details</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>

                        <?php

                        $sql = "SELECT * FROM employees";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($employee = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $employee['e_id']; ?></td>
                                    <td><?php echo $employee['e_name']; ?></td>
                                    <td><a href="details.php?e_id=<?php echo $employee['e_id']; ?>" class="btn btn-xs btn-info">Details</a></td>
                                    <td><a href="update.php?e_id=<?php echo $employee['e_id']; ?>" class="btn btn-xs btn-warning">Edit</a></td>
                                    <td><a href="delete.php?e_id=<?php echo $employee['e_id']; ?>" class="btn btn-xs btn-danger">Delete</a></td>
                                </tr>

                        <?php
                            }
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