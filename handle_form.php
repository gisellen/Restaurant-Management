<?php
require('../../connect/dbconnect.inc.php');
$errors = [];
if(isset($_POST['submit'])){
    $name = htmlspecialchars($_POST['name']);
    if(isset($_POST['menu']) && isset($_POST['name'])){
        $menu = $_POST['menu'];
        $converted_menu = json_encode($menu);
        setcookie("name", $name, time()+3600*2, "", "localhost");
        setcookie("order", $converted_menu, time()+3600*2, "", "localhost");

        //GET CUSTOMER INFO INTO customer table (WORK IN PROGRESS)
        $query = "INSERT INTO customer (first_name) VALUES (?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $name);
        $stmt->execute();
        $result = $stmt->get_result();

    }
    else{
        $menu = false;
    }
    if(empty($name)){
        $errors['name'] = "Name needed";
    }
    if(empty($menu)){
        $errors['menu[]'] = "Need to choose something from the menu";
    }
    if(!empty($name) && !empty($menu)){
        header("Location: confirmationPage.php");
    }
}
// echo var_dump($_GET); // check vars, uncomment if you need it. 
?>