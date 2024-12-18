<?php
// Enable error reporting for debugging
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data from POST
    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $gender = $_POST['Gender'];
    $email = $_POST['Email'];
    $address = $_POST['Address'];
    $userName = $_POST['UserName'];
    $password = $_POST['Password']; // Correct the variable name

    // Database connection settings
    $servername = "localhost";
    $username = "root";
    $dbpassword = "PASS"; // If root has a password, set it here
    $dbname = "register forms"; // Ensure database name is correct

    // Connect to the MariaDB database
    try {
        $conn = new mysqli($servername, $username, $dbpassword, $dbname);
    } catch (mysqli_sql_exception $e) {
        die("Connection failed: " . $e->getMessage());
    }

    // Check if the username already exists in the database
    $stmt = $conn->prepare("SELECT COUNT(*) FROM registration WHERE userName = ?");
    $stmt->bind_param("s", $userName);
    $stmt->execute();
    $stmt->bind_result($userCount);
    $stmt->fetch();
    $stmt->close();

    if ($userCount > 0) {
        // Username already exists, show error message
        echo "Error: Username already exists!";
    } else {
        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO registration (firstName, lastName, gender, email, address, userName, password) VALUES (?, ?, ?, ?, ?, ?, ?)");

        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Bind parameters
        $stmt->bind_param("sssssss", $firstName, $lastName, $gender, $email, $address, $userName, $hashedPassword);

        // Execute the statement and check for success
        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
  <style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    width: 300px;
    margin: 100px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

label {
    display: block;
    margin: 10px 0 5px;
}

input[type="text"],
input[type="email"],
input[type="password"],
select {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

input[type="submit"] {
    background-color: #5cb85c;
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    border-radius: 4px;
}

input[type="submit"]:hover {
    background-color: #4cae4c;
}
</style>
</head>
<body>
    <div class="container">
        <h2>Registration Form</h2>
        <form action="registration.php" method="POST">
            <label for="FirstName">First Name:</label>
            <input type="text" id="FirstName" name="FirstName" required>

            <label for="LastName">Last Name:</label>
            <input type="text" id="LastName" name="LastName" required>

            <label for="Gender">Gender:</label>
            <select id="Gender" name="Gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>

            <label for="Email">Email:</label>
            <input type="email" id="Email" name="Email" required>

            <label for="Address">Address:</label>
            <input type="text" id="Address" name="Address" required>

            <label for="UserName">Username:</label>
            <input type="text" id="UserName" name="UserName" required>

            <label for="Password">Password:</label>
            <input type="password" id="Password" name="Password" required>

            <input type="submit" value="Register">
        </form>
    </div>
</body>
</html>
