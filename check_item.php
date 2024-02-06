<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];

    $sql = "SELECT * FROM items WHERE name = '$name'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode([
            "success" => true,
            "message" => "<table border='3'>
                            <tr>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                            <tr>
                                <td>{$row['name']}</td>
                                <td>{$row['quantity']}</td>
                                <td>{$row['price']}</td>
                            </tr>
                        </table>"
        ]);
        
        
        
    } else {
        echo json_encode(["success" => false, "message" => "Item not found"]);
    }
}

$conn->close();
?>
