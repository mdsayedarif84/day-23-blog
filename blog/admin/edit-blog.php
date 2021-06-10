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
    $msg        =   '';
    use App\classes\Blog;
    $queryResult2    =   Blog::getAllPublishedCategory();
    $id         =   $_GET['id'];
    $queryResult        =   Blog::editBlogInfo($id);
    $blogData       =   mysqli_fetch_assoc($queryResult);
    if (isset($_POST['btn'])){
        $msg    =   Blog::updateBlogInfo($_POST);
    }
?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>Edit Blog</title>
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../assets/css/bootstrap.css">
        <link rel="stylesheet" href="../assets/css/styleSheet.css">
    </head>
    <body>
        <?php include 'includes/menu.php'; ?>
        <h1 class="text-info text-center"><?php echo $msg?></h1>
        <div class="container">
            <form action="" method="post" name="editBlogForm" enctype="multipart/form-data">
                <table class="table table-dark table-striped">
                    <tr>
                        <th>Select Option</th>
                        <td>
                            <div class="form-control">
                                <select class="form-group" name="category_id">
                                    <option>...Select Category Name...</option>
                                    <?php while ($category = mysqli_fetch_assoc($queryResult2)) { ?>
                                        <option value="<?php echo $category['id']; ?>"><?php echo $category['category_name']; ?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Blog Title</th>
                        <td>
                            <div>
                                <input type="text" name="blog_title" value="<?php echo $blogData['blog_title']; ?>" class="form-control" >
                                <input type="hidden" name="blog_id" value="<?php echo $blogData['id']; ?>" class="form-control" >
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Short Description</th>
                        <td>
                            <div>
                                <textarea name="short_description" class="form-control">
                                    <?php echo $blogData['short_description']?>
                                </textarea>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Long Description</th>
                        <td>
                            <div>
                                <textarea name="long_description" class="form-control textarea">
                                    <?php echo $blogData['long_description']?>
                                </textarea>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Blog Image</th>
                        <td>
                            <div>
                                <input type="file" name="blog_image"  accept="image/*">
                                <img src="<?php echo $blogData['blog_image']?>" alt="fs" height="50" width="100">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Publication Status</th>
                        <td>
                            <div>
                                <input type="radio" name="status" value="1" <?php if ($blogData['status']=='1') echo "checked"?> >Published
                                <input type="radio" name="status" value="0" <?php if ($blogData['status']=='0') echo "checked"?> >Unpublished
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <button type="submit" name="btn" class="btn btn-success form-control">Update Blog Info</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <script src="../assets/js/jquery-3.6.0.js"></script>
        <script src="../assets/js/popper.js"></script>
        <script src="../assets/tinymce/js/tinymce/tinymce.min.js"> </script>
        <script>tinymce.init({selector:'.textarea'});</script>
        <script src="../assets/js/bootstrap.js"></script>
        <script>
            document.forms['editBlogForm'].elements['category_id'].value='<?php echo $blogData['category_id']; ?>';
        </script>
        <!-- Core theme JS-->
        <script src="../assets/js/scripts.js"></script>
    </body>
    </html>