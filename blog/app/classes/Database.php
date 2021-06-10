<?php


namespace App\classes;


class Database
{
    public static function dbConnection(){
        $hostName   =   'Localhost';
        $userName   =   'root';
        $password   =   '';
        $dbName     =   'blog';
       $link        =   mysqli_connect($hostName,$userName,$password,$dbName);
       return $link;

    }
}