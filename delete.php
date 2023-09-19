<?php
session_start();

if (isset($_GET['index'])) {
    $index = $_GET['index'];
    if (isset($_POST['confirm'])) {
        unset($_SESSION['products'][$index]);
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
    <title>Delete</title>
</head>
<style>
    
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
        <button type="submit" name="confirm">Delete</button>
        <a href="first-test.php">Cancel</a>
        <button type="reset">Reset</button>
    </form>
</body>
</html>
