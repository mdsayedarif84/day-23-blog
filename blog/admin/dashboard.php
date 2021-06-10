<?php
    session_start();
    if ($_SESSION['id']== null){
        header('Location:index.php');
    }
    require_once "../vendor/autoload.php";
    $login      =   new App\classes\Login();

    if (isset($_GET['logout'])){
        $login->adminLogout();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Dashboard</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/styleSheet.css">

</head>
<body>
    <?php include 'includes/menu.php'; ?>


<script src="../assets/js/jquery-3.6.0.js"></script>
<script src="../assets/js/popper.js"></script>
<script src="../assets/js/bootstrap.js"></script>
<!-- Core theme JS-->
<script src="../assets/js/scripts.js"></script>
</body>
</html>