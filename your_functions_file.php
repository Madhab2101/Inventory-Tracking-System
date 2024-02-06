<?php
function control_panel() {
    echo "<!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Inventory Control Panel</title>
                <style>
                    body, html {
                        height: 100%;
                        margin: 0;
                        padding: 0;
                    }

                    body {
                        background-image: url('Login-background.png'); /* Replace 'Login-background.png' with the path to your image */
                        background-size: cover;
                        background-repeat: no-repeat;
                        background-attachment: fixed;
                        text-align: center;
                        padding-top: 50px;
                    }

                    .container {
                        height: 100%;
                        display: flex;
                        flex-direction: column;
                        justify-content: center;
                        align-items: center;
                        margin-top: 40px; /* Adjusted margin to push container further down */
                    }

                    .function-box {
                        width: 90%;
                        max-width: 600px; /* Adjust the maximum width as needed */
                        margin-bottom: 20px;
                        padding: 20px;
                        border: 1px solid #ccc;
                        border-radius: 10px;
                        background-color: rgba(255, 255, 255, 0.8);
                    }

                    h1 {
                        margin-bottom: 20px; /* Adjusted margin for h1 */
                        color: black; /* Changed text color to black */
                        padding: 10px; /* Added padding */
                        border: 1px solid black; /* Added border */
                        border-radius: 10px; /* Added border radius */
                        background-color: rgba(255, 255, 255, 0.8); /* Added background color */
                    }
                </style>
            </head>
            <body><br><br>
                <div class='container'>
                    <div class='heading-box'> <!-- New div for the heading -->
                        <h1>Inventory Control Panel</h1>
                    </div>
                    <div class='function-box'>
                        <h2>Add Item</h2>
                        <p>Add new items to the inventory.</p>
                        <a href='add_item_form.php'>Go to Add Item</a>
                    </div>
                    <div class='function-box'>
                        <h2>Display Items</h2>
                        <p>Display all items in the inventory.</p>
                        <a href='display_item.php'>Go to Display Items</a>
                    </div>
                    <div class='function-box'>
                        <h2>Check Item</h2>
                        <p>Check details of a specific item in the inventory.</p>
                        <a href='check_item_form.php'>Go to Check Item</a>
                    </div>
                    <div class='function-box'>
                        <h2>Update Item</h2>
                        <p>Update information of existing items in the inventory.</p>
                        <a href='update_item_form.php'>Go to Update Item</a>
                    </div>
                    <div class='function-box'>
                        <h2>Delete Item</h2>
                        <p>Delete items from the inventory.</p>
                        <a href='delete_item_form.php'>Go to Delete Item</a>
                    </div>
                </div>
            </body>
            </html>";
}

// Call the control_panel() function to display the inventory control panel
control_panel();
?>
