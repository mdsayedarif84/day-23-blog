<?php
session_start();
if ($_SESSION['id']== null){
    header('Location:index.php');
}
require_once "../vendor/autoload.php";
$login      =   new \App\classes\Login();

if (isset($_GET['logout'])){
    $login->adminLogout();
}
    $msg    =   '';
    use App\classes\AddCategory;
if (isset($_POST['btn'])){
    $msg    =   AddCategory::saveAddCategoryInfo($_POST) ;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Add Category</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
<!--    <link rel="stylesheet" href="../assets/css/styleSheet.css">-->
    <link rel="stylesheet" href="../assets/css/addCategory-from.css">

</head>
<body>
<?php include 'includes/menu.php'; ?>
<h1 class="text-info text-center"><?php echo $msg?></h1>

<div class="container d-flex justify-content-center">
    <div class="row my-5">
        <div class="col-md-5 text-left text-white lcol">
            <div class="greeting">
                <h2>Welcome to <span class="txt">Add Category</span></h2>
            </div>
            <h6 class="mt-3">let's light some fire and get the show on the road...</h6>
            <div class="footer">
                <div class="socials d-flex flex-row justify-content-between text-white">
                    <div class="d-flex flex-row"><i class="fab fa-linkedin-in"></i>
                        <i class="fab fa-facebook-f"></i>
                        <i class="fab fa-twitter"></i>
                    </div>
                    <span>Privacy Policy</span> <span>&copy; 2020 Stoke</span>
                </div>
            </div>
        </div>
        <div class="col-md-7 rcol">
            <form class="sign-up" action="" method="post">
                <h2 class="heading mb-4">Add Category</h2>
                <div class="form-group fone mt-2">
                    <input type="text" name="category_name" class="form-control" placeholder="Category Name">
                </div>
                <div class="form-group fone mt-2">
                    <textarea name="category_description" class="form-control" placeholder="Category Description"></textarea>
                </div>
                <div class="form-group fone mt-2">
                    <label class="form-group row">Publication Status ::</label>
                    <input type="radio" name="status" value="1">Published
                    <input type="radio" name="status" value="0">Unpublished

                </div>
                <button type="submit" name="btn" class="btn btn-success mt-5">Save Category Info</button>
            </form>
        </div>
    </div>
</div>
<script src="../assets/js/jquery-3.6.0.js"></script>
<script src="../assets/js/popper.js"></script>
<script src="../assets/js/bootstrap.js"></script>
<!-- Core theme JS-->
<script src="../assets/js/scripts.js"></script>
</body>
</html>