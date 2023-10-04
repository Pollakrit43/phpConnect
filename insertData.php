<?php
require_once("connectDB.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employeeID = $_POST["employeeID"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];

    $tsql = "INSERT INTO Employees (EmployeeID, FirstName, LastName) VALUES (?, ?, ?)";
    
    $params = array($employeeID, $firstName, $lastName);
    
    $insertStmt = sqlsrv_query($conn, $tsql, $params);

    if ($insertStmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo "Data inserted successfully!";
        
        // Redirect to the index page after a short delay (e.g., 2 seconds)
        header("refresh:2;url=index.php");
    }

    sqlsrv_free_stmt($insertStmt);
}

sqlsrv_close($conn);
?>
