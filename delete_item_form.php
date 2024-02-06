<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Item Form</title>
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
            margin-top: 50px; /* Adjusted top margin for spacing */
        }

        input[type="text"],
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

        input[type="submit"],
        button {
            border-radius: 15px;
        }

        /* Adjust label and input display */
        label {
            display: inline-block;
            width: 100px;
            text-align: left;
        }

        input[type="text"] {
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
            margin-top: 20px; /* Adjusted top margin for spacing */
            margin-bottom: 20px; /* Adjusted bottom margin for spacing */
        }

        .redirect-link {
            margin-top: 20px; /* Adjusted top margin for spacing */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Delete Item</h2>
        <form id="deleteForm" method="post" action="delete_item.php">
            <label for="name">Item Name:</label>
            <input type="text" name="name" required>

            <input type="submit" value="Delete Item">
        </form>
        <div id="message" class="message">
            <?php
            // Check if there's a message from delete_item.php
            if (isset($_GET['message'])) {
                echo $_GET['message'];
            }
            ?>
        </div>
        <button onclick="redirectToControlPanel()">Go to Inventory Control Panel</button>
    </div>

    <script>
        function redirectToControlPanel() {
            window.location.href = "your_functions_file.php"; // Update with appropriate URL
        }

        // Function to handle form submission
        document.getElementById('deleteForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission

            var formData = new FormData(this);

            fetch(this.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('message').textContent = data; // Display message returned by delete_item.php
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>
</body>
</html>
