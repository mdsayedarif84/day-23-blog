<?php
    require_once "vendor/autoload.php";
    use App\classes\viewFrontendBlogDetails;
    $id     =   $_GET['id'];
    $queryResult    =   viewFrontendBlogDetails::getFrontBlog($id);
    $frontBlogDetails=  mysqli_fetch_assoc($queryResult);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Manage Category</title>
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/styleSheet.css">
    <link rel="stylesheet" href="assets/css/styles.css">

</head>
<body>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#!">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="about-me.php">About</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">All Products</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                        <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <button class="btn btn-outline-dark" type="submit">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                </button>
            </form>
        </div>
    </div>
</nav>
<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Blog in style</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this Blog homepage template</p>
        </div>
    </div>
</header>
<div class="container">
    <table class="table table-dark table-striped">
        <tr>
            <th>Blog Id</th>
            <td><?php echo $frontBlogDetails['id']; ?></td>
        </tr>
        <tr>
            <th>Blog Title</th>
            <td><?php echo $frontBlogDetails['blog_title']; ?></td>
        </tr>
        <tr>
            <th>Category ID</th>
            <td><?php echo $frontBlogDetails['category_id']; ?></td>
        </tr>
        <tr>
            <th>Blog Short Description</th>
            <td><?php echo $frontBlogDetails['short_description']; ?></td>
        </tr>
        <tr>
            <th>Blog Long Description</th>
            <td><?php echo $frontBlogDetails['long_description']; ?></td>
        </tr>
        <tr>
            <th>Blog Image</th>
            <td><img src="app/<?php echo $frontBlogDetails['blog_image']; ?>" alt="" height="200" width="350"> </td>
        </tr>
        <tr>
            <th>Comments</th>
            <td>
                <textarea placeholder="comments here"></textarea>
            </td>
        </tr>
        <tr>
            <th>Comments Status</th>
            <td></td>
        </tr>
        <tr>
            <th>Publication Status</th>
            <td><?php echo $frontBlogDetails['status']==1 ?  'Published' : 'Unpublished'; ?></td>
        </tr>
    </table>
</div>
<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
</footer>
<script src="assets/js/jquery-3.6.0.js"></script>
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.js"></script>
<!-- Core theme JS-->
<script src="assets/js/scripts.js"></script>
</body>
</html>

