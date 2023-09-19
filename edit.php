<?php
session_start();

if (isset($_GET['index'])) {
    $index = $_GET['index'];
    $product = $_SESSION['products'][$index];

    if (isset($_POST['update'])) {
        $updatedProduct = array(
            'img' => $product['img'],
            'name' => $_POST['name'],
            'sku' => $_POST['sku'],
            'price' => $_POST['price'],
            'brand' => $_POST['brand'],
            'status' => $_POST['status'],
        );

        $_SESSION['products'][$index] = $updatedProduct;
        header('Location: first-test.php');
    }
} else {
    header('Location: first-test.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<style>

body, h1, h2, h3, p, ul, li {
    margin: 0;
    padding-top: 30px;
    padding-left: 425px;
    padding-right: 425px;
}

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

form{
    border: 5px solid black;
    border-radius:10px;
    background: aqua;
    padding:15px  25px;
}

form label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

form input[type="text"],
form input[type="number"],
form select,
form textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid black;
    border-radius: 5px;
    margin-bottom: 15px;
    font-size: 16px;
}


#img {
    display: block;
    margin-bottom: 15px;
}

button {
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    background-color: mediumblue;
    color: white;
    cursor: pointer;
    font-size: 16px;
    margin-right: 10px;
}

button[type="reset"] {
    background-color: mediumblue;
}

a {
    text-decoration: none;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    background-color: red;
    color: white;
    cursor: pointer;
    font-size: 16px;
    margin-right: 10px;
}
</style>
<body>
    <form action="" method="post">
         <label for="img">Image:</label>
        <input type="file" name="img" id="img" value="<?php echo $product['img']; ?>"><br>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $product['name']; ?>"><br>
        <label for="sku">SKU:</label>
        <input type="text" name="sku" id="sku" value="<?php echo $product['sku']; ?>"><br>
        <label for="price">Price:</label>
        <input type="number" name="price" id="price" value="<?php echo $product['price']; ?>"><br>
        <label for="brand">Brand:</label>
        <input type="text" name="brand" id="brand" value="<?php echo $product['brand']; ?>"><br>
        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="enabled" <?php if ($product['status'] === 'enabled') echo 'selected'; ?>>Enabled</option>
            <option value="disabled" <?php if ($product['status'] === 'disabled') echo 'selected'; ?>>Disabled</option>
        </select><br>
        <button type="submit" name="update">Edit</button>
        <a href="first-test.php">Cancel</a>
        <button type="reset">Reset</button>
    </form>
</body>
</html>
