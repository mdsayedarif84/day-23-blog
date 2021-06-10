<?php


namespace App\classes;
// this function call for frontend page
class viewFrontendBlogDetails{
    public static function getFrontBlog($id){
        $sql = "SELECT * FROM blogs WHERE id='$id'";
        if (mysqli_query(Database::dbConnection(), $sql)) {
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;
        } else {
            die("Query Problem" . mysqli_error(Database::dbConnection()));
        }
    }
}