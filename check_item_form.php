<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Item Form</title>
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

        /* Center align the table */
        .center-align {
            display: flex;
            justify-content: center;
            margin-top: 20px; /* Adjust spacing between message and buttons */
        }

        .button-container {
            margin-top: 20px; /* Adjust spacing between buttons */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Check Item</h2>
        <form id="checkItemForm">
            <label for="name">Item Name:</label>
            <input type="text" id="itemName" required><br><br>
            <input type="submit" value="Check Item">
        </form>
        <div id="message"></div>
        <div class="button-container">
            <button onclick="redirectToControlPanel()">Go to Inventory Control Panel</button>
        </div>
    </div>

    <script>
        function redirectToControlPanel() {
            window.location.href = "your_functions_file.php";
        }

        document.getElementById("checkItemForm").addEventListener("submit", function(event) {
            event.preventDefault();
            var itemName = document.getElementById("itemName").value;

            fetch("check_item.php", {
                method: "POST",
                body: new URLSearchParams({
                    name: itemName
                }),
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                }
            })
            .then(response => response.json())
            .then(data => {
                var messageDiv = document.getElementById("message");
                if (data.success) {
                    messageDiv.innerHTML = "<div class='center-align'>" + data.message + "</div>";
                } else {
                    messageDiv.innerHTML = "<p style='color: red;'>" + data.message + "</p>";
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });
        });
    </script>
</body>
</html>
