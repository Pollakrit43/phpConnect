<?php
// Include the database connection script
require_once("connectDB.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the updated data from the form
    $employeeID = $_POST["employeeID"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];

    // Define the SQL query to update the data
    $query = "UPDATE Employees SET FirstName = ?, LastName = ? WHERE EmployeeID = ?";

    // Prepare the query
    $params = array($firstName, $lastName, $employeeID);
    $stmt = sqlsrv_prepare($conn, $query, $params);

    // Execute the query
    if (sqlsrv_execute($stmt)) {
        echo "Data updated successfully!";
        
        // Redirect to the index page after a short delay (e.g., 2 seconds)
        header("refresh:2;url=index.php");
    } else {
        echo "Error updating data: " . print_r(sqlsrv_errors(), true);
    }
}

// Retrieve the EmployeeID from the query parameter
if (isset($_GET["employeeID"])) {
    $employeeID = $_GET["employeeID"];
    
    // Define a SQL query to fetch the employee's data
    $query = "SELECT * FROM Employees WHERE EmployeeID = ?";

    // Prepare the query
    $params = array($employeeID);
    
    $stmt = sqlsrv_prepare($conn, $query, $params);

    // Execute the query
    if (sqlsrv_execute($stmt)) {
        // Fetch the data
        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

        // Display the data in an HTML form
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Update Data</title>
        </head>
        <body>
            <h1>Update Employee Data</h1>
            <form method="POST" action="updateData.php">
                <input type="hidden" name="employeeID" value="<?php echo $row['EmployeeID']; ?>">
                First Name: <input type="text" name="firstName" value="<?php echo $row['FirstName']; ?>"><br>
                Last Name: <input type="text" name="lastName" value="<?php echo $row['LastName']; ?>"><br>
                <input type="submit" value="Update">
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "Error fetching data: " . print_r(sqlsrv_errors(), true);
    }
}

// Close the database connection
sqlsrv_close($conn);
?>
