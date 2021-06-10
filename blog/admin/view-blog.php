<?php
    session_start();
    if ($_SESSION['id']== null){
        header('Location:index.php');
    }
    require_once "../vendor/autoload.php";
    $login          =   new App\classes\Login();
    use App\classes\Blog;

    if (isset($_GET['logout'])){
        $login->adminLogout();
    }

    $msg            =   '';
    $id             =   $_GET['id'];
    $queryResult    =   Blog::editBlogInfo($id);
    $blogInfo       =   mysqli_fetch_assoc($queryResult);
    if (isset($_GET['delete'])){
        $id         =   $_GET['id'];
        $msg        =   Blog::deleteBlogInfo($id);
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>Manage Category</title>
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../assets/css/bootstrap.css">
        <link rel="stylesheet" href="../assets/css/styleSheet.css">

    </head>
    <body>
        <?php include 'includes/menu.php'; ?>
        <h1 class="text-info text-center"><?php echo $msg?></h1>
        <div class="container">
            <table class="table table-dark table-striped">
                <tr>
                    <th>Blog Id</th>
                    <td><?php echo $blogInfo['id']; ?></td>
                </tr>
                <tr>
                    <th>Blog Title</th>
                    <td><?php echo $blogInfo['blog_title']; ?></td>
                </tr>
                <tr>
                    <th>Category ID</th>
                    <td><?php echo $blogInfo['category_id']; ?></td>
                </tr>
                <tr>
                    <th>Blog Short Description</th>
                    <td><?php echo $blogInfo['short_description']; ?></td>
                </tr>
                <tr>
                    <th>Blog Long Description</th>
                    <td><?php echo $blogInfo['long_description']; ?></td>
                </tr>
                <tr>
                    <th>Blog Image</th>
                    <td><img src="<?php echo $blogInfo['blog_image']; ?>" alt="" height="200" width="350"> </td>
                </tr>
                <tr>
                    <th>Publication Status</th>
                    <td><?php echo $blogInfo['status']==1 ?  'Published' : 'Unpublished'; ?></td>
                </tr>
            </table>
        </div>
        <script src="../assets/js/jquery-3.6.0.js"></script>
        <script src="../assets/js/popper.js"></script>
        <script src="../assets/js/bootstrap.js"></script>
        <!-- Core theme JS-->
        <script src="../assets/js/scripts.js"></script>
    </body>
</html>
