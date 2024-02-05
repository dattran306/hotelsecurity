<html>
<head>
<title>KIỂM TRA NHÂN VIÊN ĐI LÀM</title>
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

<div class="container-fluid p-5 bg-primary text-white text-center">
  <h1>KIỂM TRA NHÂN VIÊN ĐI LÀM</h1>
  
</div>
    <div class="container">
        <div class="row">

        
        <div class="col-12">

        
        <?php

	
    require './conn.php';

   $stmt = "SELECT nhanvien.ID ID, nhanvien.RegistrationPlate1 RegistrationPlate1, nhanvien.FullName FullName, nhanvien.Department Department,
            convert(varchar, tblEventInOut.EventDateTime_IN, 22) giovao, convert(varchar, tblEventInOut.EventDateTime_OUT, 22) giora            
            FROM tblEventInOut, nhanvien
            WHERE tblEventInOut.TicketName=nhanvien.TicketName
            AND YEAR(tblEventInOut.EventDateTime_IN)>=2023
            AND MONTH(tblEventInOut.EventDateTime_IN)>=1
            AND DAY(tblEventInOut.EventDateTime_IN)>=1
            ";
   $query = sqlsrv_query($conn, $stmt);

?>

<table id="data" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                
                <th>Nhân viên</th>
                <th>Bộ phận</th>
                <th>Giờ vào</th>
                <th>Giờ ra</th>
                
            </tr>
        </thead>
        <tbody>
            


<?php
while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC))
{
?>
            <tr>
                
                <td><?= $result["FullName"];?></td>
                <td><?= $result["Department"];?></td>
                <td><?= $result["giovao"];?></td>
                <td><?= $result["giora"];?></td>                
                
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

</div>
</div>
</body>
</html>