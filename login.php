<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Tracking Login</title>
    <style>
        body {
            background-image: url('Login-background.png');
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
        <h2>Inventory Tracking Login</h2>
        <form method="post" action="login_process.php">
            <label for="username">Username:</label>
            <input type="text" name="username" required><br><br>

            <label for="password">Password:</label>
            <input type="password" name="password" required><br><br>

            <input type="submit" value="Login"><br>
        </form>

        <?php
        // Display error message if it exists
        if (isset($_GET['error']) && $_GET['error'] === 'invalid') {
            echo "<p class='alert'>Incorrect username or password.</p>";
        }
        ?>

        <p>Don't have an account? <a href="add_user.php">Create one</a></p>
    </div>
</body>
</html>
