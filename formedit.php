<?php
    require "connect.php";
    if($conn){
        $id = $_GET['stdid'];

        $sql = "SELECT * FROM student WHERE stdid = $id";
        $query = mysqli_query($conn, $sql);
        $r = mysqli_num_rows($query);
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูล</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script>
        function CheckEdit() {
            if(document.editform.id.value == ""){
                alert('กรุณากรอกรหัสนักศึกษา')
                document.editform.id.focus();
                return false;
            }
            if(document.editform.name.value == ""){
                alert("กรุณากรอกชื่อ - นามสกุล");
                document.editform.name.focus();
                return false;
            }
            if (document.editform.birthday.valur == ''){
                alert("กรุณากรอกวันเกิด");
                document.editform.birthday.focus();
                return false;
             }
             return true;
        }
    </script>
    <style>
        tr,td {
            padding: 8px;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center; color: #000099; font-weight: bold; margin-top: 2rem;">แก้ไขข้อมูลนักศึกษา</h1>
    <?php if ($r == 0) { echo "<h2 style='text-align: center; color: #000099; font-weight: bold;'>ไม่พบข้อมูลผู้ใช้ รหัส $id</h2>"; } else {
        $data = mysqli_fetch_row($query);
    ?>
    <form action="saveedit.php" method='post' name="editform" id="editform" onsubmit="return CheckEdit();">
        <input type="hidden" name="id" value="<?php echo $id?>">
        <table align="center">
            <tr>
                <td>รหัสนักศึกษา : </td>
                <td><?php echo $data[0];?></td>
            </tr>
            <tr>
                <td>ชื่อ - นามสกุล : </td>
                <td><input type="text" size="50" name="name" placeholder="กรุณากรอกชื่อของท่าน" class="form-control" value="<?php echo $data[1];?>"></td>
            </tr>
            <tr>
                <td>วันเกิด : </td>
                <td><input type="date" name="birthday" class="form-control" value="<?php echo $data[2];?>"></td>
            </tr>
            <tr align="center">
                <td colspan="3"><input type="submit" value="ตกลง" class="btn btn-primary">&nbsp;&nbsp;<input type="reset" value="พิมพ์ใหม่" class="btn btn-secondary"></td>
            </tr>
        </table>
    </form>
    <br><br>
    <center><a class="btn btn-primary" href="index.php">แสดงข้อมูลทั้งหมด</a>&nbsp;&nbsp;<a class="btn btn-success" href="formadd.php">เพิ่มข้อมูล</a>&nbsp;&nbsp;</center>
</body>
</html>
<?php
        }
    }
?>