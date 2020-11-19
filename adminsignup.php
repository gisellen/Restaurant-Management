<?php 
// this lesson is responsible for when the user didnt fill out the form correctly.  Example, the user MUST input a username AND password in order to proceed.
    //empty array for errors
    $errors = [];
    if(isset($_POST['submit'])){
        $name = $_POST['username'];
        $pwd = $_POST['password'];
        if(empty($name)){
            $errors['username'] = "Username Required";
        }
        else if($name !== "Adam"){
            $errors['username'] = "Username not matched";
        }
        if(empty($pwd)){
            $errors['password'] = "Password Required";
        }
    }
?>