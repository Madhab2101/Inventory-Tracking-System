<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];

    // Check if the item exists in the database
    $checkSql = "SELECT * FROM items WHERE name = '$name'";
    $checkResult = $conn->query($checkSql);

    if ($checkResult->num_rows > 0) {
        // Item exists, delete it from the database
        $deleteSql = "DELETE FROM items WHERE name = '$name'";
        if ($conn->query($deleteSql) === TRUE) {
            echo "Item deleted successfully";
        } else {
            echo "Error deleting item: " . $conn->error;
        }
    } else {
        // Item does not exist, display a message
        echo "Item not present in the database.";
    }

    // Close the connection after checking
    $conn->close();
}
?>
