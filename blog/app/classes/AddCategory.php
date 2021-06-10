<?php


namespace App\classes;
use App\classes\Database;
use http\Message;

class AddCategory{
    public static function saveAddCategoryInfo($data){
        $sql        =   " INSERT INTO add_category (category_name,category_description,status) VALUES ('$data[category_name]','$data[category_description]','$data[status]')";
        if (mysqli_query(Database::dbConnection(),$sql)){
            $msg    =   "Add data save successfully";
            return $msg;
        }else{
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }
    public static function getAddCategoryInfo(){
        $sql        =   " SELECT * FROM add_category";
        if (mysqli_query(Database::dbConnection(), $sql)){
            $queryResult    =   mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error(Database::dbConnection()));
        }
    }
    public static function editCategoryInfoById($id){
        $sql          = "SELECT * FROM add_category WHERE id     =   '$id' ";
        if (mysqli_query(Database::dbConnection(),$sql)){
            $queryResult    =   mysqli_query(Database::dbConnection(),$sql);
            return $queryResult;
        }else{
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }

    }
    public static function updateCategoryInfo($data){
        $sql            =   " UPDATE add_category SET category_name='$data[category_name]',category_description='$data[category_description]',status='$data[status]' WHERE id='$data[id]' ";
        if (mysqli_query(Database::dbConnection(),$sql)){
            header('location:manage-category.php');
        }else{
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }
    public static function deleteCategoryInfo($id){
        $sql            =   " DELETE FROM add_category WHERE id='$id' ";
        if (mysqli_query(Database::dbConnection(),$sql)){
            $msg        =   'Delete Category Info Successfully';
            return $msg;
        }else{
            die('Query Problem'.mysqli_error(Database::dbConnection()));
        }
    }
}