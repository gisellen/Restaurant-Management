<?php 
require('../../connect/dbconnect.inc.php');
if (!function_exists('addItem')) {
    function addItem() {
        echo "<p> Add item </p>";
        echo "<input id='addItem' type='text' name='itemName' placeholder='item name'>";
        echo "<input id='addItem' type='text' name='itemPrice' placeholder='item price'>";
        echo "<input id='addItem' type='submit' name='addItemSubmit' placeholder='Add Item' onclick='myFunction()'>";
    }
}

if(isset($_POST['addItemSubmit'])){
    echo "add item complete!";
}
?>