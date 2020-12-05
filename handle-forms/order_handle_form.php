<?php
//@TODO: check for 0 values in the quantity
require('../../connect/dbconnect.inc.php');
$errors = [];
$success = [];
$pattern ="/[0-9]{3}(-)[0-9]{3}(-)[0-9]{4}/";
session_start();
if(isset($_POST['submit'])){
    $fname = htmlspecialchars($_POST['firstName']);
    $lname = htmlspecialchars($_POST['lastName']);
    $phone = htmlspecialchars($_POST['phoneNum']);
    $address = htmlspecialchars($_POST['address']);

    //setting the sessions
    $_SESSION['name'] = $fname." ".$lname;
    $_SESSION['fname'] = $fname;
    $_SESSION['lname'] = $lname;
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
        $errors['menu[]'] = "Please choose something from the menu";
    }

    if(count($errors) === 0){
        header("Location: confirmationPage.php");
    }
}

if(isset($_POST['cancel'])){
    session_destroy();
    header("Location: customeroption.php");
}

if(isset($_POST['confirm'])){
    $query = "SELECT first_name, last_name  FROM customer WHERE first_name = ? && last_name = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $_SESSION['fname'], $_SESSION['lname']);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0){  //if customer doesnt not exist in the table, then put new customer into the record.
        $query = "INSERT INTO customer (`first_name`, `last_name`, `phone_num`, `address`) VALUES (?,?,?,?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssss', $_SESSION['fname'], $_SESSION['lname'], $_SESSION['phone'], $_SESSION['address']);
        $stmt->execute();
        $result = $stmt->get_result();
    }

    //GET ORDERS
    $item_arr = [];
    foreach(json_decode($_SESSION['order']) as $item){
        $query = "SELECT menu_item FROM menu WHERE menu_item = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $item);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        //putting the results into an array
        $item_arr[] = $row['menu_item'];
    }

    //getting quantity array
    foreach (json_decode($_SESSION['quantity']) as $key => $value){
        if($value != null){
            $quant1[] = (int) $value;
        }
    }
    
    //combining both 
    $menuOrder=array_map('getValues', $item_arr, $quant1);
    foreach($menuOrder as $order){
        foreach($order as $key => $value){
            $query = "INSERT INTO orders (menuID, quantity, CustomerID) VALUES ((SELECT MenuID FROM menu WHERE menu_item = ?), ?, (SELECT customerID from customer WHERE first_name = ? && last_name = ?))";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('siss', $key, $value, $_SESSION['fname'], $_SESSION['lname']);
            $stmt->execute();
            $result = $stmt->get_result();
        }
    }
    session_destroy();
}

?>