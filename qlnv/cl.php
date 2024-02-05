
<?php
    $amountOfCL = 0;
    require './conn.php';
    $stmt = "SELECT COUNT(*) dem
    FROM nhanvien n
            RIGHT OUTER JOIN  tblEventTemp et  ON n.TicketName=et.TicketName
            WHERE et.TicketName LIKE 'nvmh%' AND n.FullName IS NULL
            ";
    $query = sqlsrv_query($conn, $stmt);
    while( $row = sqlsrv_fetch_array($query) ) {
          $amountOfCL = $row["dem"];
    }
sqlsrv_close($conn);
?>
