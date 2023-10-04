<!DOCTYPE html>
<html>
<head>
    <title>Insert Employee Data</title>
</head>
<body>
    <h1>Insert Employee Data</h1>
    <form method="post" action="insertData.php">
        <label for="employeeID">Employee ID:</label>
        <input type="text" name="employeeID" required><br><br>

        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" required><br><br>

        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" required><br><br>

        <input type="submit" value="Insert Data">
    </form>
</body>
</html>
