<?php
session_start();

// Sample initial product data
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = array(
        array('img' => 'product1.jpg', 'name' => 'Product 1', 'sku' => 'SKU123', 'price' => 50, 'brand' => 'Brand A', 'status' => 'enabled'),
        // Add more sample products here
    );
}

if (isset($_POST['delete'])) {
    $selected = $_POST['selected'] ?? array();
    foreach ($selected as $index) {
        unset($_SESSION['products'][$index]);
    }
    $_SESSION['products'] = array_values($_SESSION['products']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List.Php</title>
</head>
<style>

body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
}

h1 {
    background-color: #333;
    color: white;
    padding: 10px;
    text-align: center;
}


table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
    border:4px solid black;
}

table th, table td {
    padding: 8px;
    text-align: left;
    border:2px solid black;
    font-size:25px;
}

button {
    padding: 7px 12px;
    border: none;
    border-radius: 5px;
    background-color: red;
    color: white;
    cursor: pointer;
    margin-right: 10px;
    margin-top:8px;
    margin-left:8px;
    font-size: 16px;
    }

a {
    text-decoration: none;
    padding: 7px 12px;
    border: none;
    border-radius: 5px;
    background-color: mediumblue;
    color: white;
    cursor: pointer;
    margin-right: 10px;
    margin-top:10px;
    font-size: 16px;
}

input[type="checkbox"] {
    transform: scale(1.5);
}

.product-image {
    max-width: 100px;
}



</style>
<body>
    <h1>List.Php</h1>
    <form action="" method="post">
    <button type="submit" name="delete">Delete</button>
        <a href="form.php">Add</a>
        <table border="1">
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Name</th>
                <th>SKU</th>
                <th>Price</th>
                <th>Brand</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php foreach ($_SESSION['products'] as $index => $product): ?>
                <tr>
                    <td><input type="checkbox" name="selected[]" value="<?php echo $index; ?>"></td>
                    <td><img src="<?php echo $product['img']; ?>" alt="Product Image" width="50"></td>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['sku']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td><?php echo $product['brand']; ?></td>
                    <td><?php echo date('Y-m-d'); ?></td>
                    <td><?php echo $product['status']; ?></td>
                    <td><a href="edit.php?index=<?php echo $index; ?>">Edit</a> | <a href="delete.php?index=<?php echo $index; ?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </form>
</body>
</html>
