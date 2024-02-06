<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item Form</title>
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

        /* Adjust label and input display */
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
            margin-top: 20px; /* Add margin to separate message from form */
        }

        .redirect-link {
            margin-top: 10px; /* Add margin to separate redirect link from message */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Item</h2>
        <form method="post" action="add_item.php">
            <label for="name">Item Name:</label>
            <input type="text" name="name" required><br><br>

            <label for="item_quantity">Item Quantity:</label>
            <input type="number" name="item_quantity" required><br><br>

            <label for="price">Item Price:</label>
            <input type="number" name="price" step="0.01" required><br><br>

            <input type="submit" value="Add Item"><br>
            <?php
            // Check if there's a message from add_item.php
            if (isset($_GET['message'])) {
                echo "<p class='message'>" . $_GET['message'] . "</p>";
            }
            ?>
        </form>
        <button onclick="redirectToControlPanel()">Go to Inventory Control Panel</button>
    </div>

    <script>
        function redirectToControlPanel() {
            // Redirect the user to the control panel page and include your_functions_file.php
            window.location.href = "your_functions_file.php";
        }
    </script>
</body>
</html>
