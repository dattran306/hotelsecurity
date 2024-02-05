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

   ?>