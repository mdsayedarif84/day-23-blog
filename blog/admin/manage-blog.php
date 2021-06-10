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
    $msg    =   '';
    use App\classes\Blog;
    $queryResult    =   Blog::getBlogInfo();
    if (isset($_GET['delete'])){
        $id     =   $_GET['id'];
        $msg    =   Blog::deleteBlogInfo($id);
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
                        <tr class="text-center">
                            <th>SL No</th>
                            <th>Category Name</th>
                            <th>Blog Title</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                    <?php
                    $i=1;
                    while ($data  =   mysqli_fetch_assoc($queryResult)) {?>
                        <tr class="text-center">
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data['category_name']; ?></td>
                            <td><?php echo $data['blog_title']; ?></td>
                            <td><?php echo $data['status']==1 ?  'Published' : 'Unpublished'; ?></td>
                            <td class="w-25">
                                <a href="view-blog.php?id=<?php echo $data['id']; ?>">View</a>
                                <a href="edit-blog.php?id=<?php echo $data['id']; ?>">Edit</a>
                                <a href=" ?delete=true&id=<?php echo $data['id']; ?>" onclick="return confirm('Are u sure delete this id')">Delete</a>
                            </td>
                        </tr>
                    <?php }?>
                </table>
            </div>
        <script src="../assets/js/jquery-3.6.0.js"></script>
        <script src="../assets/js/popper.js"></script>
        <script src="../assets/js/bootstrap.js"></script>
        <!-- Core theme JS-->
        <script src="../assets/js/scripts.js"></script>
    </body>
    </html>
