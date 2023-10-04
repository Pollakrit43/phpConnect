<?php
$serverName = 'BOATPC\SQLEXPRESS';
$connectionOption = array(
    "Database" => "testDB",
    "Uid" => "",
    "PWD" => ""
);

$conn = sqlsrv_connect($serverName, $connectionOption);

if (!$conn) {
    die("Conncetion failed : " . sqlsrv_errors());
}
?>