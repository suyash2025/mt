<?php
/**********************************************************************
 *Contains all the basic Configuration
 *dbHost = Host of your MySQL DataBase Server... Usually it is localhost
 *dbUser = Username of your DataBase
 *dbPass = Password of your DataBase
 *dbName = Name of your DataBase
 **********************************************************************/
$dbHost = 'localhost';
$dbUser = 'root'; //'Data Base User Name';
$dbPass = 'admin@123'; // 'Data Base Password';
$dbName = 'angular'; //'Data Base Name';
$dbC = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName)
        or die('Error Connecting to MySQL DataBase');
?>
