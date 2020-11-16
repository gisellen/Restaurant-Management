<?php
require('../../connect/dbconnect.inc.php');
$errors = [];
if(isset($_POST['submit'])){
    $fname = htmlspecialchars($_POST['firstName']);
    $lname = htmlspecialchars($_POST['lastName']);
    if(isset($_POST['menu'])){
        $menu = $_POST['menu'];
        $converted_menu = json_encode($menu);
        setcookie("name", $fname." ".$lname, time()+3600*2, "", "localhost");
        setcookie("order", $converted_menu, time()+3600*2, "", "localhost");
    }
    else{
        $menu = false;
    }
    if(empty($fname)){
        $errors['firstName'] = "First Name needed";
    }
    if(empty($lname)){
        $errors['lastName'] = "Last Name needed";
    }
    if(empty($menu)){
        $errors['menu[]'] = "Need to choose something from the menu";
    }
    if(!empty($fname) && !empty($lname) && !empty($menu)){
        header("Location: confirmationPage.php");
    }

    if(count($errors) === 0){
//GET CUSTOMER INFO INTO customer table (WORK IN PROGRESS)
        //if customer doesnt not exist in the table, then put new customer into the record.
        $query = "SELECT first_name, last_name  FROM customer WHERE first_name = ? && last_name = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $fname, $lname);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows === 0){
            $query = "INSERT INTO customer (first_name, last_name) VALUES (?,?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('ss', $fname, $lname);
            $stmt->execute();
            $result = $stmt->get_result();
        }

        //GET ORDERS
        foreach($menu as $item){
            $query = "INSERT INTO orders (menuID, quantity, CustomerID) VALUES ((SELECT MenuID FROM menu WHERE menu_item = ?), 1, (SELECT customerID from customer WHERE first_name = ? && last_name = ?))";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('sss', $item, $fname, $lname);
            $stmt->execute();
            $result = $stmt->get_result();
        }
    }
}
// echo var_dump($_GET); // check vars, uncomment if you need it. 
?>