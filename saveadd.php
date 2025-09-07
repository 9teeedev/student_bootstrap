<?php
    require "connect.php";
    if($conn){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $birthday = $_POST['birthday'];

        $sqlcheck = "SELECT * FROM student WHERE stdid = $id";
        $querycheck = mysqli_query($conn, $sqlcheck);
        $r = mysqli_num_rows($querycheck);

        if($r > 0){
            echo "ข้อมูลนักศึกษารหัสนักศึกษา $id มีอยู่แล้ว";
        }else{
            $query = "INSERT INTO student (stdid, stdname, stdbirth) VALUES ('$id','$name', '$birthday');";
            $result = mysqli_query($conn, $query);
            if (!$result){
                echo "ไม่สามารถบันทึกข้อมูลได้";
            }else{
                header("location: index.php");
            }
        }
    }
?>