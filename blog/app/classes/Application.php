<?php


namespace App\classes;


class Application{
    public static function getAllPublishedBlogInfo(){
        $sql        =   "SELECT * FROM blogs WHERE status= 1 ";
        if (mysqli_query(Database::dbConnection(),$sql)){
            $queryResut =   mysqli_query(Database::dbConnection(),$sql);
            return $queryResut;
        }else{
            die('Query Problem'.mysqli_error(Database::dbConnection()));
        }

    }
}