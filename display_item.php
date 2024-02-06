<?php
include 'db_connection.php';

// Function to retrieve and display items
function displayItems() {
    global $conn;

    $sql = "SELECT * FROM items ORDER BY name";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='3'>
                <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['quantity']}</td>
                    <td>{$row['price']}</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No items in inventory</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Inventory Items</title>
    <style>
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
            max-width: 500px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 15px;
        }

        table {
            width: 100%;
            margin-top: 20px;
            margin-bottom: 20px; /* Added margin bottom for spacing */
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Inventory Items</h2>
        <?php displayItems(); ?>
        <div style="margin-top: 20px;"> <!-- Added margin top for spacing -->
            <button onclick="redirectToControlPanel()">Go to Inventory Control Panel</button>
        </div>
    </div>

    <script>
        function redirectToControlPanel() {
            window.location.href = "your_functions_file.php"; // Replace with your control panel page
        }
    </script>
</body>
</html>

<?php
$conn->close();
?>
