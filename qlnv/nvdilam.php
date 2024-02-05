<?php
    require_once './connect.php';
    $sql = "SELECT nhanvien.FullName, tblEventInOut.EventDateTime_IN FROM tblEventInOut, nhanvien WHERE tblEventInOut.TicketName=nhanvien.TicketName AND MONTH(EventDateTime_IN)=10 AND YEAR(EventDateTime_IN)=2022 ";
    $params = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $stmt = sqlsrv_query( $conn, $sql , $params, $options );

    $row_count = sqlsrv_num_rows( $stmt );

    while( $row = sqlsrv_fetch_array( $stmt) ) {
          print json_encode($row);
    }

    sqlsrv_close($conn);
?>