<?php 
require('../../connect/dbconnect.inc.php');
$errors = [];
if(isset($_POST['signup'])){
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $cpassword = htmlspecialchars($_POST['confirmPassword']);
    $code = htmlspecialchars($_POST['code']);
    $codepattern = "/c302/";

    if(preg_match($codepattern, $code) == false){
        $errors['code'] = "Unable to create account.";
    }
    if(empty($username)){
        $errors['username'] = "Must include a username";
    }
    if(empty($password)){
        $errors['password'] = "Must include a password";
    }
    if(empty($cpassword)){
        $errors['password'] = "Must confirm password";
    }
    if($password != $cpassword){
        $errors['cpassword'] = "Password do not match";
    }

    //check if there are duplicate usernames
    $findUser = "SELECT username FROM users WHERE username = ?";
    $stmt = $conn->prepare($findUser);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0){
        $errors['duplicate'] = "Username taken, please type another username.";
    }

    //if there are no errors then put into the query
    if(count($errors) === 0){
        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (`username`, `password`) VALUES (?,?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $username, $hashedpassword);
        $stmt->execute();
        header("Location: adminloginpage.php");
    }
}
?>