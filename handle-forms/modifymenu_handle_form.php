<?php 
require('../../../connect/dbconnect.inc.php');
if (!function_exists('addItem')) {
    function addItem() {
        echo "<p> Add item </p>";
        echo "<input id='addItem' type='text' name='itemName' placeholder='item name'>";
        echo "<input id='addItem' type='text' name='itemPrice' placeholder='item price'>";
        echo "<input id='addItem' type='submit' name='addItemSubmit' placeholder='Add Item'>";
    }
}

if (!function_exists('deleteItem')) {
    function deleteItem() {
        echo "<p> Type the ID to delete item </p>";
        echo "<input type='text' name='itemID' placeholder='item id'>";
        echo "<input type='submit' name='deleteItemSubmit' placeholder='Add Item'>";
    }
}

if (!function_exists('modifyItem')) {
    function modifyItem() {
        echo "<p> Type the ID to modify and input values </p>";
        echo "<input type='text' name='itemID' placeholder='id'>";
        echo "<input type='text' name='price' placeholder='item price'>";
        echo "<input type='submit' name='modifyItemSubmit' placeholder='Add Item'>";
    }
}

if(isset($_POST['addItemSubmit'])){
    //get values
    $item = $_POST['itemName'];
    $price = $_POST['itemPrice'];
    $query = "INSERT INTO menu (menu_item, price) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('si', $item, $price);
    $stmt->execute();
    echo "add item complete!";
}

if(isset($_POST['deleteItemSubmit'])){
    $id = $_POST['itemID'];
    $query = "DELETE FROM menu WHERE MenuID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    echo "delete item complete!";
}

if(isset($_POST['modifyItemSubmit'])){
    $id = $_POST['itemID'];
    $price = $_POST['price'];
    $query = "UPDATE menu SET price = ? WHERE MenuID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ii', $price, $id);
    $stmt->execute();
    echo "modify item complete!";
}
?>