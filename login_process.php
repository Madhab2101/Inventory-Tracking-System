<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username and password match
    $checkSql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $checkResult = $conn->query($checkSql);

    if ($checkResult->num_rows > 0) {
        // Username and password are correct, redirect to control_panel function
        include 'your_functions_file.php';
    } else {
        // Incorrect username or password, redirect back to login.php with error message
        header("Location: login.php?error=invalid");
        exit();
    }
}

$conn->close();
?>
