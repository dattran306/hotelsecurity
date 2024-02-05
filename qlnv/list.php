<html>
<head>
<title>NHÂN VIÊN ĐI LÀM HÔM NAY</title>
</head>
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <script>
    $(document).ready(function () {
    $('#data').DataTable();
    });
</script>

<body>


    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">

        
<?php	
    require './conn.php';
   $stmt = "SELECT nhanvien.ID ID, nhanvien.RegistrationPlate1 RegistrationPlate1, nhanvien.FullName FullName, nhanvien.Department Department,
            convert(varchar, tblEventTemp.EventDateTime, 22) THOIGIAN,
            tblEventTemp.PlateNumber PlateNumber
            FROM tblEventTemp, nhanvien
            WHERE tblEventTemp.TicketName=nhanvien.TicketName 
            ";
   $query = sqlsrv_query($conn, $stmt);

?>

<table id="data" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Giờ vào</th>
                <th>Nhân viên</th>
                <th>Bộ phận</th>
                
            </tr>
        </thead>
        <tbody>
            


<?php
while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC))
{
?>
            <tr>
                <td><?= $result["THOIGIAN"];?></td>
                <td><?= $result["FullName"];?></td>
                <td><?= $result["Department"];?></td>
                
                
            </tr>
<?php
}


?>
</tbody>
</table>
<?php
sqlsrv_close($conn);
?>
</div>
<div class="col-md-6 col-sm-12">
    <?php
    require_once './cl.php';
    require_once './stat.php';
?>
</div>
<a href="./print.php" type="button" class="btn btn-danger">EMERGENCY</a>
</div>
</div>

</body>
</html>