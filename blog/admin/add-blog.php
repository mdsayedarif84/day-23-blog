<?php
    session_start();
    if ($_SESSION['id']== null){
        header('Location:index.php');
    }
    require_once "../vendor/autoload.php";
    $login          =   new \App\classes\Login();
    use App\classes\Blog;
    $queryResult    =   Blog::getAllPublishedCategory();


    if (isset($_GET['logout'])){
        $login->adminLogout();
    }
    $msg            =   '';
    if (isset($_POST['btn'])){
        $msg        = Blog::saveBlogInfo($_POST);
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>Add Blog</title>
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
                        <h2>Welcome to <span class="txt">Add Blog</span></h2>
                    </div>
                    <h6 class="mt-3">let's light some fire and get the show on the road...</h6>
                    <div class="footer">
                        <div class="socials d-flex flex-row justify-content-between text-white">
                            <div class="d-flex flex-row"><i class="fab fa-linkedin-in"></i><i class="fab fa-facebook-f"></i><i class="fab fa-twitter"></i></div> <span>Privacy Policy</span> <span>&copy; 2020 Stoke</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 rcol">
                    <form class="sign-up" action="" method="post" enctype="multipart/form-data">
                        <h2 class="heading mb-4">Add Blog</h2>
                        <div class="form-group fone mt-2">
                            <label>Category Name::</label>
                            <select class="form-group" name="category_id">
                                <option>...Select Category Name...</option>
                                <?php while ($category = mysqli_fetch_assoc($queryResult)) { ?>
                                <option value="<?php echo $category['id']; ?>"><?php echo $category['category_name']; ?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group fone mt-2">
                            <input type="text" name="blog_title" class="form-control" placeholder="Blog Title">
                        </div>
                        <div class="form-group fone mt-2">
                            <textarea name="short_description" class="form-control" placeholder="short Description"></textarea>
                        </div>
                        <div class="form-group fone mt-2 ">
                            <textarea  name="long_description" class="form-control textarea" rows="5" placeholder="Long Description"></textarea>
                        </div>
                        <div class="form-group fone mt-2">
                            <label>Blog Image::</label>
                            <input type="file" name="blog_image" class="form-control" accept="image/*">
                        </div>
                        <div class="form-group fone mt-2">
                            <label class="form-group row">Publication Status ::</label>
                            <input type="radio" name="status" value="1">Published
                            <input type="radio" name="status" value="0">Unpublished
                        </div>
                        <div class="form-group">
                            <button type="submit" name="btn" class="btn btn-success mt-5">Save Blog Info</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="../assets/js/jquery-3.6.0.js"></script>
        <script src="../assets/js/popper.js"></script>
        <script src="../assets/tinymce/js/tinymce/tinymce.min.js"> </script>
        <script>tinymce.init({selector:'.textarea'});</script>
        <script src="../assets/js/bootstrap.js"></script>
        <!-- Core theme JS-->
        <script src="../assets/js/scripts.js"></script>
    </body>
</html>