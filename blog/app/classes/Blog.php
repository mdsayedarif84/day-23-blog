<?php


namespace App\classes;
use App\classes\Database;

class Blog{
    //This function call in add-blog.php
    public static function saveBlogInfo($data){
        $fileName   =   $_FILES['blog_image']['name'];
        $directory  =   "../assets/imgs/";
        $imageUrl   =   $directory.$fileName;
        $filetype   =   pathinfo($fileName,PATHINFO_EXTENSION);
        $check      =   getimagesize($_FILES['blog_image']['tmp_name']);
        if ($check){
            if (file_exists($imageUrl)){
                die('This image already exist.Please select another image');
            }else{
                if ($_FILES['blog_image']['size']>500000){
                    die('Your image file is too large.Please select the 10kb image');
                }else{
                    if ($filetype != 'jpg' && $filetype != 'JPG' && $filetype != 'png'){
                        die('Image type is not supported.please insert jpg or png');
                    }else{
                        move_uploaded_file($_FILES['blog_image']['tmp_name'],$imageUrl);
                        $sql                =   "INSERT INTO blogs (category_id,blog_title,short_description,long_description,blog_image,status) VALUES ('$data[category_id]','$data[blog_title]','$data[short_description]','$data[long_description]','$imageUrl','$data[status]') ";
                        if (mysqli_query(Database::dbConnection(),$sql)){
                            $msg            =   'Blog Data Save Successfully';
                            return $msg;
                        }else{
                            die("Query Problem".mysqli_error(Database::dbConnection()));
                        }
                    }
                }
            }
        }else{
            die('Please choose a image file');
        }
    }
    //this function call in manage-blog.php
    public static function getBlogInfo(){
        $sql                =   "SELECT b. *, c.category_name FROM blogs as b,add_category as c WHERE b.category_id=c.id";
        if (mysqli_query(Database::dbConnection(),$sql)){
            $queryResult    =   mysqli_query(Database::dbConnection(),$sql);
            return $queryResult;
        }else{
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }
    //this function call in edit-blog.php
    public static function editBlogInfo($id){
        $sql                =   "SELECT * FROM blogs WHERE id='$id'";
        if ( mysqli_query(Database::dbConnection(),$sql)){
            $queryResult    =   mysqli_query(Database::dbConnection(),$sql);
            return $queryResult;
        }else{
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }
    //this function call in edit-blog.php
    public static function updateBlogInfo($data){
        $blogImage          =   $_FILES['blog_image']['name'];
        if ($blogImage){

            $sql        =   " SELECT * FROM blogs WHERE id ='$data[blog_id]' ";
            $queryResult=   mysqli_query(Database::dbConnection(),$sql);
            $blogInfo   =   mysqli_fetch_assoc($queryResult);
            unlink($blogInfo['blog_image']);

            $fileName   =   $_FILES['blog_image']['name'];
            $directory  =   "../assets/imgs/";
            $imageUrl   =   $directory.$fileName;
            $filetype   =   pathinfo($fileName,PATHINFO_EXTENSION);
            $check      =   getimagesize($_FILES['blog_image']['tmp_name']);
            if ($check){
                if (file_exists($imageUrl)){
                    die('This image already exist.Please select another image');
                }else{
                    if ($_FILES['blog_image']['size']>500000){
                        die('Your image file is too large.Please select the 10kb image');
                    }else{
                        if ($filetype != 'jpg' && $filetype != 'JPG' && $filetype != 'png'){
                            die('Image type is not supported.please insert jpg or png');
                        }else{
                            move_uploaded_file($_FILES['blog_image']['tmp_name'],$imageUrl);
                            $sql =   "UPDATE blogs SET category_id='$data[category_id]', blog_title='$data[blog_title]',short_description='$data[short_description]',long_description='$data[long_description]',blog_image='$imageUrl',status='$data[status]' WHERE id='$data[blog_id]' ";
                            if (mysqli_query(Database::dbConnection(),$sql)){
                                header('location:manage-blog.php');
                            }else{
                                die("Query Problem".mysqli_error(Database::dbConnection()));
                            }
                        }
                    }
                }
            }else{
                die('Please choose a image file');
            }

        }else{
            $sql =   "UPDATE blogs SET category_id='$data[category_id]', blog_title='$data[blog_title]',short_description='$data[short_description]',long_description='$data[long_description]',status='$data[status]' WHERE id='$data[blog_id]' ";
            if (mysqli_query(Database::dbConnection(),$sql)){
                header('location:manage-blog.php');
            }else{
                die("Query Problem".mysqli_error(Database::dbConnection()));
            }
        }

    }
    //this function call in manage.php
    public static function deleteBlogInfo($id){
        $sql            =   " DELETE FROM blogs WHERE id='$id' ";
        if (mysqli_query(Database::dbConnection(),$sql)){
            $msg        =   'Delete Category Info Successfully';
            return $msg;
        }else{
            die('Query Problem'.mysqli_error(Database::dbConnection()));
        }
    }
    //this function call in add blog
    public static function getAllPublishedCategory(){
        $sql            =   "SELECT * FROM add_category WHERE status= 1 ";
        if (mysqli_query(Database::dbConnection(),$sql)){
            $queryResult=   mysqli_query(Database::dbConnection(),$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error(Database::dbConnection()));
        }
    }
}