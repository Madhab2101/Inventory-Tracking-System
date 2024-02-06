<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Tracking Login</title>
    <style>
        body {
            background-image: url('Login-background.png'); /* Replace 'Login-background.png' with the path to your image */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            text-align: center;
            padding-top: 50px;
        }

        .container {
            max-width: 300px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 15px;
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
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
        input[type="password"] {
            display: inline-block;
            width: calc(100% - 110px);
            vertical-align: middle;
        }

        .alert {
            color: red;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create Account</h2>
        <form method="post" action="add_user_process.php">
            <label for="new_username">New Username:</label>
            <input type="text" name="new_username" required><br><br>

            <label for="new_password">New Password:</label>
            <input type="password" name="new_password" required><br><br>

            <input type="submit" value="Create Account"><br>
        </form>

        <?php
        // Display error or success message
        if (isset($_GET['error'])) {
            if ($_GET['error'] === 'exists') {
                echo "<p class='alert'>Username already exists. Please <a href='login.php'>login here</a>.</p>";
            } elseif ($_GET['error'] === 'database') {
                echo "<p class='alert'>Error creating account. Please try again later.</p>";
            }
        } elseif (isset($_GET['success']) && $_GET['success'] === 'created') {
            echo "<p class='alert'>Account created successfully. You can now <a href='login.php'>login here</a>.</p>";
        }
        ?>
    </div>
</body>
</html>
