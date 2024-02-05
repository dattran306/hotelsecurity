<?php	
    require './conn.php';
    $stmt = "SELECT nhanvien.ID ID, nhanvien.RegistrationPlate1 RegistrationPlate1, nhanvien.FullName FullName, nhanvien.Department Department,
            convert(varchar, tblEventTemp.EventDateTime, 22) THOIGIAN,
            tblEventTemp.PlateNumber PlateNumber
            FROM tblEventTemp, nhanvien
            WHERE tblEventTemp.TicketName=nhanvien.TicketName
            ORDER BY Department
            ";
    $query = sqlsrv_query($conn, $stmt);
?>
<html>
<head>
<title>NHÂN VIÊN ĐI LÀM HÔM NAY</title>
</head>
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

<button onClick="window.print()">Print this page</button>
<body>
    <div class="container">
        <h1>DANH SÁCH NHÂN VIÊN LÀM VIỆC HÔM NAY</h1>
        <table id="data" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>STT</th>
                <th>Bộ phận</th>
                <th>Giờ vào</th>
                <th>Nhân viên</th>
                <th>Có mặt</th>
                <th>Không có mặt</th>
            </tr>
        </thead>
        <tbody>
<?php
    $i=1;
    while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC))
    {
?>
            <tr>
                <td><?= $i++;?></td>
                <td><?= $result["Department"];?></td>
                <td><?= $result["THOIGIAN"];?></td>
                <td><?= $result["FullName"];?></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
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
</body>
</html>