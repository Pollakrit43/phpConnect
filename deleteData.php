<?php
// Include the database connection script
require_once("connectDB.php");

// Check if EmployeeID is provided in the query parameters
if (isset($_GET['employeeID'])) {
    // Get the EmployeeID from the query parameters
    $employeeID = $_GET['employeeID'];

    // Construct the SQL query to delete the employee record
    $query = "DELETE FROM Employees WHERE EmployeeID = ?";

    // Prepare the SQL query
    $stmt = sqlsrv_prepare($conn, $query, array($employeeID));

    if ($stmt === false) {
        // Handle any errors that occur during query preparation
        die(print_r(sqlsrv_errors(), true));
    }

    // Execute the SQL query
    $result = sqlsrv_execute($stmt);

    if ($result === false) {
        // Handle any errors that occur during query execution
        die(print_r(sqlsrv_errors(), true));
    }

    // Check if the record was deleted successfully
    if (sqlsrv_rows_affected($stmt) > 0) {
        echo "Employee with EmployeeID $employeeID has been deleted successfully.";
    } else {
        echo "Employee with EmployeeID $employeeID was not found.";
    }

    // Close the statement
    sqlsrv_free_stmt($stmt);

    // Redirect to the index page after a short delay (e.g., 2 seconds)
    header("refresh:2;url=index.php");
} else {
    // Handle the case where EmployeeID is not provided
    echo "EmployeeID is not specified.";
}

// Close the database connection
sqlsrv_close($conn);
?>
