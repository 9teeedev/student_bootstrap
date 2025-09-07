<?php
    $host = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "webapp2025";

    $conn = mysqli_connect($host, $username, $password, $dbname);

    if(!$conn){
        die("Error : ".mysqli_connect_error());
        exit();
    }
?>