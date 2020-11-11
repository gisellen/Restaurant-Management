<?php
$errors = [];
if(isset($_POST['submit'])){
    $name = htmlspecialchars($_POST['name']);
    if(isset($_POST['menu']) && isset($_POST['name'])){
        $menu = $_POST['menu'];
        $converted_menu = json_encode($menu);
        setcookie("name", $name, time()+3600*2, "", "localhost");
        setcookie("order", $converted_menu, time()+3600*2, "", "localhost");
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