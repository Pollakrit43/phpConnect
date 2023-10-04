<?php
// Include the database connection script
require_once("connectDB.php");

// Define your SQL query to select all employees
$query = "SELECT * FROM Employees";

// Execute the query
$result = sqlsrv_query($conn, $query);

if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Fetch and display the results
while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
    // Access columns by name
    echo "Employee ID: " . $row['EmployeeID'] . "<br>";
    echo "First Name: " . $row['FirstName'] . "<br>";
    echo "Last Name: " . $row['LastName'] . "<br>";

    // Add a link to update data for each employee
    echo '<a style="text-decoration: none; color: blue;" href="updateData.php?employeeID=' . $row['EmployeeID'] . '">Update</a>';

    // Add a link to delete data for each employee
    echo ' | <a style="text-decoration: none; color: red;" href="deleteData.php?employeeID=' . $row['EmployeeID'] . '">Delete</a>';
    echo "<br><br>";
}

// Close the result and database connection
sqlsrv_free_stmt($result);
sqlsrv_close($conn);
?>



<!DOCTYPE html>
<html>
<head>
    <body>
    <h1>Add Data</h1>
    
    <!-- Create a button-like link to add data -->
    <a href="addData.php" style="text-decoration: none; padding: 10px 20px; background-color: #0090FE; color: white; border-radius: 5px;">Add data</a>
    </body>
</html>
