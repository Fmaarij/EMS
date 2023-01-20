<?php

// session_start();

if (!$_SESSION['u_lastname']) {
    header('Location: index.php');
}

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container d-flex justify-content-between">
        <div class="d-flex">
            <a class="navbar-brand" href="dash.php">Welcom <small><?php echo $_SESSION['u_lastname']; ?></small></a>
        </div>
        <div class="">
            <button class="btn btn-outline-success" type="submit"><a href="logout.php">Log Out</a></button>
        </div>
    </div>
</nav>