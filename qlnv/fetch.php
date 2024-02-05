<?php
    require_once './connect.php';
    $sql = "SELECT * FROM nhanvien";
    $params = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $stmt = sqlsrv_query( $conn, $sql , $params, $options );

    $row_count = sqlsrv_num_rows( $stmt );

    while( $row = sqlsrv_fetch_array( $stmt) ) {
          print json_encode($row);
    }

    sqlsrv_close($conn);
?>