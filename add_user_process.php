<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newUsername = $_POST['new_username'];
    $newPassword = $_POST['new_password'];

    // Check if the username already exists
    $checkSql = "SELECT * FROM users WHERE username = '$newUsername'";
    $checkResult = $conn->query($checkSql);

    if ($checkResult->num_rows > 0) {
        // Username already exists, redirect back to add_user.php with error message
        header("Location: add_user.php?error=exists");
        exit();
    } else {
        // Insert new user into the database
        $insertSql = "INSERT INTO users (username, password) VALUES ('$newUsername', '$newPassword')";

        if ($conn->query($insertSql) === TRUE) {
            // Account created successfully, redirect back to add_user.php with success message
            header("Location: add_user.php?success=created");
            exit();
        } else {
            // Error creating account, redirect back to add_user.php with error message
            header("Location: add_user.php?error=database");
            exit();
        }
    }
}

$conn->close();
?>
