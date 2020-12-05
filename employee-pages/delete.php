<?php 
require('../../../connect/dbconnect.inc.php');
if(isset($_POST['deleteOrder'])){
    $id = $_POST['deleteOrder'];
    $query = "DELETE FROM orders WHERE OrderID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    header("Location: orderhistory.php");
}

?>