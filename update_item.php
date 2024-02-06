<?php
include 'db_connection.php';

if (isset($_GET['name'])) {
    $name = $_GET['name'];

    // Prepare and execute query to retrieve item details from the database
    $checkSql = "SELECT * FROM items WHERE name = ?";
    $stmt = $conn->prepare($checkSql);
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $checkResult = $stmt->get_result();

    if ($checkResult->num_rows > 0) {
        // Item exists, display the update form
        $row = $checkResult->fetch_assoc();
        $currentQuantity = $row['quantity'];
        $currentPrice = $row['price'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Item</title>
    <style>
        /* Your CSS styles */
        body {
            background-image: url('Login-background.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            text-align: center;
            padding-top: 50px;
            color: #333;
        }

        .container {
            max-width: 300px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 15px;
        }

        input[type="text"],
        input[type="number"],
        input[type="submit"],
        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            cursor: pointer;
        }

        input[type="submit"] {
            border-radius: 15px;
        }

        label {
            display: inline-block;
            width: 100px;
            text-align: left;
        }

        input[type="text"],
        input[type="number"] {
            display: inline-block;
            width: calc(100% - 110px);
            vertical-align: middle;
        }

        h2 {
            margin-bottom: 20px;
        }

        .message {
            color: red;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Update Item</h2>
        <form method="post" action="update_item_process2.php">
            <label for="name">Item Name:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" readonly><br><br>
            <label for="current_quantity">Current Quantity:</label>
            <input type="text" name="current_quantity" value="<?php echo htmlspecialchars($currentQuantity); ?>" readonly><br><br>
            <label for="current_price">Current Price:</label>
            <input type="text" name="current_price" value="<?php echo htmlspecialchars($currentPrice); ?>" readonly><br><br>
            <label for="new_quantity">New Quantity:</label>
            <input type="number" name="new_quantity" required><br><br>
            <label for="new_price">New Price:</label>
            <input type="number" name="new_price" step="0.01" required><br><br>
            <input type="submit" value="Update Item">
        </form>
    </div>
</body>
</html>
<?php
    } else {
        // If item not found, redirect back to update_item_form.php with error message
        header("Location: update_item_form.php?message=Item%20not%20found.");
        exit();
    }
} else {
    // If item name is not provided in the URL, redirect back to update_item_form.php
    header("Location: update_item_form.php");
    exit();
}

$stmt->close();
$conn->close();
?>
