<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $newQuantity = $_POST['new_quantity'];
    $newPrice = $_POST['new_price'];

    // Update the item in the database
    $updateSql = "UPDATE items SET quantity = $newQuantity, price = $newPrice WHERE name = '$name'";

    if ($conn->query($updateSql) === TRUE) {
        // Item updated successfully, redirect back to update_item_form.php with success message
        header("Location: update_item_form.php?message=Item%20updated%20successfully");
    } else {
        // Error updating item, redirect back to update_item.php with error message
        header("Location: update_item.php?name=" . urlencode($name) . "&error=Error%20updating%20item:%20" . $conn->error);
    }
} else {
    // If request method is not POST, redirect back to update_item.php with error message
    header("Location: update_item.php?error=Invalid%20request%20method.");
}

$conn->close();
?>
