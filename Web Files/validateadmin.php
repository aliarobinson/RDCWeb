<?php
//Connect to database
include("dbaction/titanconnect.php");

$username = 'a';

if(!$username) {
	redirectHome();
}

$query = "{call dbo.SelectUserPermissions(?)}";
$params = array(array($username, SQLSRV_PARAM_IN));

$stmt = sqlsrv_query($conn, $query, $params);

if($stmt === false) {
	sqlsrv_close($conn);
	redirectHome();
}

$result = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

if($result["Permission"] != 1) {
	redirectHome();
}
sqlsrv_free_stmt($stmt);

sqlsrv_close($conn);

function redirectHome() {
	header('Location: index.php');
}
?>