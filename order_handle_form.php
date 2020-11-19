<?php
require('../../connect/dbconnect.inc.php');
$errors = [];
$success = [];
$pattern ="/[0-9]{3}(-)[0-9]{3}(-)[0-9]{4}/";

if(isset($_POST['submit'])){
    session_start();
    $fname = htmlspecialchars($_POST['firstName']);
    $lname = htmlspecialchars($_POST['lastName']);
    $phone = htmlspecialchars($_POST['phoneNum']);
    $address = htmlspecialchars($_POST['address']);

    //setting the sessions
    $_SESSION['name'] = $fname." ".$lname;
    $_SESSION['phone'] = $phone;
    $_SESSION['address'] = $address;

    if(isset($_POST['menu'])){
        $menu = $_POST['menu']; //get menu
        $converted_menu = json_encode($menu);
        $_SESSION['order'] = $converted_menu; //set session
        $quantity = $_POST['quantity']; //get quantity
        $converted_quantity = json_encode($quantity);
        $_SESSION['quantity'] = $converted_quantity;
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

    if(empty($phone)){
        $errors['phoneNum'] = "Enter a valid phone number";
      }
    if(preg_match($pattern, $phone)){
        $success['phoneNum'] = "This is a Valid Phone Number";
    }
    else{
        $errors['phoneNum'] = "Please enter a Valid Phone Number";
    }

    if(empty($address)){
        $errors['address'] = "Need address for take-out";
    }

    if(empty($menu)){
        $errors['menu[]'] = "Need to choose something from the menu";
    }

    if(!empty($fname) && !empty($lname) && !empty($menu) && !empty($phone)){
        header("Location: confirmationPage.php");
    }

    if(count($errors) === 0){
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
?>