<html>
<head>
<title>DANH SÁCH NHÂN VIÊN</title>
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
        <?php
	ini_set('display_errors', 1);
	error_reporting(~0);

   $serverName = "172.16.20.80";
   $userName = "sa";
   $userPassword = "123456";
   $dbName = "dbSPM";
  
   $connectionInfo = array("Database"=>$dbName, "UID"=>$userName, "PWD"=>$userPassword, "MultipleActiveResultSets"=>true);

   $conn = sqlsrv_connect( $serverName, $connectionInfo);

   if( $conn === false ) {
      die( print_r( sqlsrv_errors(), true));
   }


   $stmt = "SELECT * FROM nhanvien
            ";
   $query = sqlsrv_query($conn, $stmt);

?>

<table id="data" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Mã thẻ xe</th>
                <th>Nhân viên</th>
                <th>Bộ phận</th>
                <th>Biển số xe 1</th>
                <th>Biển số xe 2</th>
            </tr>
        </thead>
        <tbody>
            


<?php
while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC))
{
?>
            <tr>
                <td><?= $result["TicketName"];?></td>
                <td><?= $result["FullName"];?></td>
                <td><?= $result["Department"];?></td>
                <td><?= $result["RegistrationPlate1"];?></td>
                <td><?= $result["RegistrationPlate2"];?></td>
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