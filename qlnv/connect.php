
<?php

$serverName = "172.16.20.80"; //serverName\instanceName
$connectionInfo = array( "Database"=>"dbSPM", "UID"=>"sa", "PWD"=>"123456");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}


?>
