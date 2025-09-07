<?php
    require "connect.php";
    if($conn){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $birthday = $_POST['birthday'];

        $query = "UPDATE student SET stdname='$name', stdbirth='$birthday' WHERE stdid = $id";
        $result = mysqli_query($conn, $query);
        if (!$result){
            echo "ไม่สามารถบันทึกข้อมูลได้";
        }else{
            header("location: index.php");
        }
    }
?>