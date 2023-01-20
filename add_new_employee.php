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
                           <div class="form-group">
                            <input type="text" class="form-controll input-sm" name="e_name" placeholder="Employee name" required>
                           </div> 
                           <div class="form-group">
                            <input type="email" class="form-controll input-sm" name="e_email" placeholder="Employee email" required>
                           </div> 
                           <div class="form-group">
                            <input type="tel" class="form-controll input-sm" name="e_phone" placeholder="Employee phone number" required>
                           </div> 
                           <div class="form-group">
                            <input type="submit" class='btn btn-sm btn-success' value="Add employee" name="e_add">
                           </div>

                        </form>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
    <!-- Main content ends here -->

    <?php 
    if(isset($_POST['e_add'])){

        $e_name=$_POST['e_name'];
        $e_email=$_POST['e_email'];
        $e_phone=$_POST['e_phone'];

        $sql="INSERT INTO employees (e_name, e_email, e_phone) VALUES ('$e_name', '$e_email', '$e_phone')";
        
        if( mysqli_query($conn, $sql) ){
            echo "<script>alert('Employee added successfully!');</script>";
        }else {
            echo "Erro: " .$sql ."<br>" .mysqli_error($conn);
        }

    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>