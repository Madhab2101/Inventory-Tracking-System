<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Item Form</title>
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
        <form method="post" action="update_item_process.php">
            <label for="name">Item Name:</label>
            <input type="text" name="name" required><br><br>
            <input type="submit" name="check_item" value="Check Item"><br>
            <?php
            if (isset($_GET['message'])) {
                echo "<p class='message'>" . $_GET['message'] . "</p>";
            }
            ?>
        </form>
        <button onclick="redirectToControlPanel()">Go to Inventory Control Panel</button>
    </div>

    <script>
        function redirectToControlPanel() {
            window.location.href = "your_functions_file.php";
        }
    </script>
</body>
</html>
