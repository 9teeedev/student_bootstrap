<?php 
    require "connect.php";
    if($conn){
        $page = isset($_GET['page']) ? trim($_GET['page']) : '';
        if($page == '') $page = 1;
        function convert_date($date){
            $date = explode("-", $date);
            $month = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฎาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
            return "วันที่ ".$date[2]." ".$month[$date[1]]." ".($date[0]+543);
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการข้อมูลนักศึกษา</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script>
        function chkdel() {
            return confirm("กรุณายืนยันการลบอีกครั้ง !!!");
        }
    </script>
    <style>
        th,td {
            padding: 8px;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container my-5">
        <h1 class="text-center text-primary mb-4 display-4">ระบบจัดการข้อมูลนักศึกษา</h1>
        <form action="" method="get" class="d-flex justify-content-center mb-4">
            <div class="input-group w-50">
                <input type="text" name="textsearch" id="textsearch" class="form-control" placeholder="กรุณาป้อนคำค้นหา">
                <button type="submit" class="btn btn-primary">ค้นหา</button>
            </div>
        </form>
        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-primary me-2">แสดงข้อมูลทั้งหมด</a>
            <a href="formadd.php" class="btn btn-success">เพิ่มข้อมูล</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">ลำดับที่</th>
                        <th class="text-center">รหัสนักศึกษา</th>
                        <th class="text-center">ชื่อ - นามสกุล</th>
                        <th class="text-center">วันเกิด</th>
                        <th class="text-center">แก้ไขข้อมูล</th>
                        <th class="text-center">ลบข้อมูล</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $textsearch = isset($_GET['textsearch']) ? trim($_GET['textsearch']) : '';
                        $query = "SELECT * FROM student";
                        if($textsearch != ""){
                            $query = $query." WHERE stdid LIKE '%$textsearch%' OR stdname LIKE '%$textsearch%'";
                        }  
                        $result = mysqli_query($conn, $query);

                        $recordall = mysqli_num_rows($result);
                        $perpage = 10;

                        $numpage = $recordall/$perpage;
                        if($recordall % $perpage > 0) $numpage++;
                        echo "<center class='mt-4'>ข้อมูลทั้งหมดมี ".$recordall." รายการ มี ".intval($numpage)." หน้า กำลังแสดงข้อมูลหน้าที่ ".$page."</center>";
                        
                        $start = $perpage*$page-$perpage;
                        $queryview = $query." LIMIT $start, $perpage";  
                        $result = mysqli_query($conn, $queryview);
                        
                        $i=1+$start;
                        while ($data = mysqli_fetch_row($result)) {
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $i; ?></td>
                        <td><?php echo $data[0]; ?></td>
                        <td><?php echo $data[1]; ?></td>
                        <td class="text-center"><?php echo convert_date($data[2]); ?></td>
                        <td class="text-center"><a href="formedit.php?stdid=<?php echo $data[0]; ?>" class="btn btn-warning btn-sm">แก้ไข</a></td>
                        <td class="text-center"><a href="delete.php?stdid=<?php echo $data[0]; ?>" class="btn btn-danger btn-sm" onclick="return chkdel();">ลบ</a></td>
                    </tr>
                    <?php $i++; } ?>
                </tbody>
            </table>
            <div style="text-align: center;">
                เลือกหน้า <?php for ($i=1; $i<=$numpage; $i++) echo "<a href='index.php?page=$i'>$i</a> |&nbsp;"?>
                
            </div>
        </div>
        
    </div>
</body>
</html>

<?php }?>