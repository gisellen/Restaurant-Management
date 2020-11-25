<?php 
require('../../connect/dbconnect.inc.php');
session_start();
    //experimental: check if there are unwanted symbols in the username?
    //empty array for errors
    $errors = [];
    $_SESSION['login'] = false;
    if(isset($_POST['login'])){
        $name = htmlspecialchars($_POST['username']);
        $pwd = htmlspecialchars($_POST['password']);
        //create query for getting username 
        if(empty($name)){
            $errors['username'] = "Username Required";
        }
        if(empty($pwd)){
            $errors['password'] = "Password Required";
        }

        //find user in the database
        $query = "SELECT `password` FROM users WHERE (username = ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $name);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if(mysqli_num_rows($result) == 0){
            $errors['login'] = "Username and password not matched";
        }
        else if(password_verify($pwd, $row['password']) == false){
            $errors['login'] = "Username and password not matched";
        }

        //if there is no error, then login.
        if(count($errors) === 0){
            $_SESSION['login'] = true;
            header("Location: adminmenu.php");
        } 
    }
    elseif($_SESSION['login'] === true){
        header("Location: adminmenu.php");
    }
?>