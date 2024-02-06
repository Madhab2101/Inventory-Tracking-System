<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['check_item'])) {
    $name = $_POST['name'];

    // Prepare and execute query to retrieve item details from the database
    $checkSql = "SELECT * FROM items WHERE name = ?";
    $stmt = $conn->prepare($checkSql);
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $checkResult = $stmt->get_result();

    if ($checkResult->num_rows > 0) {
        // Item exists, redirect to update_item.php with item name for updating
        header("Location: update_item.php?name=" . urlencode($name));
        exit();
    } else {
        // Item not found, redirect back to update_item_form.php with error message
        header("Location: update_item_form.php?message=Item%20not%20found.");
        exit();
    }
} else {
    // If request method is not POST or check_item is not set, redirect back to update_item_form.php
    header("Location: update_item_form.php");
    exit();
}

$conn->close();
?>
