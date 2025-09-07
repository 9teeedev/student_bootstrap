<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูล</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script>
        function CheckRegister() {
            if(document.registerform.id.value == ""){
                alert('กรุณากรอกรหัสนักศึกษา')
                document.registerform.id.focus();
                return false;
            }
            if(document.registerform.name.value == ""){
                alert("กรุณากรอกชื่อ - นามสกุล");
                document.registerform.name.focus();
                return false;
            }
            if (document.registerform.birthday.valur == ''){
                alert("กรุณากรอกวันเกิด");
                document.registerform.birthday.focus();
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
    <h1 style="text-align: center; color: #000099; font-weight: bold; margin-top: 2rem;">เพิ่มข้อมูลนักศึกษา</h1>
    <form action="saveadd.php" method='post' name="registerform" id="registerform" onsubmit="return CheckRegister();">
        <table align="center">
            <tr>
                <td>รหัสนักศึกษา : </td>
                <td><input type="text" name="id" size="15" placeholder="กรุณากรอกรหัสนักศึกษา" class="form-control"></td>
            </tr>
            <tr>
                <td><label class="form-label">ชื่อ - นามสกุล : </label></td>
                <td><input type="text" size="50" name="name" placeholder="กรุณากรอกชื่อของท่าน" class="form-control"></td>
            </tr>
            <tr>
                <td><label class="form-label">วันเกิด : </label></td>
                <td><input type="date" name="birthday" class="form-control"></td>
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