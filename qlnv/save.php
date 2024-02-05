<html>
<head>
<title>ThaiCreate.Com PHP & SQL Server (sqlsrv)</title>
</head>
<body>
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName = "172.16.20.80";
	$userName = "sa";
	$userPassword = '123456';
	$dbName = "dbSPM";

	$connectionInfo = array("Database"=>$dbName, "UID"=>$userName, "PWD"=>$userPassword, "MultipleActiveResultSets"=>true);

	$conn = sqlsrv_connect( $serverName, $connectionInfo);

	if( $conn === false ) {
		die( print_r( sqlsrv_errors(), true));
	}

	$sql = "INSERT INTO nhanvien (FullName, Department, TicketName, RegistrationPlate1, RegistrationPlate2) VALUES (?, ?, ?, ?, ?)";
	$params = array($_POST["FullName"], $_POST["Department"], $_POST["TicketName"], $_POST["RegistrationPlate1"], $_POST["RegistrationPlate2"]);

	$stmt = sqlsrv_query( $conn, $sql, $params);
	if( $stmt === false ) {
		 die( print_r( sqlsrv_errors(), true));
	}
	else
	{
		echo "Record add successfully";
	}

	sqlsrv_close($conn);
?>
</body>
</html>