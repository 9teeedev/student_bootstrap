<?php
    require "connect.php";
    if($conn){
        $id = $_GET['stdid'];

        $query = "DELETE FROM student WHERE stdid = $id";
        $result = mysqli_query($conn, $query);
        if (!$result){
            echo "ไม่สามารถลบได้";
        }else{
            header("location: index.php");
        }
    }
?>