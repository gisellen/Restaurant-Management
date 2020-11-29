<?php 
session_start();
if(isset($_POST['goback'])){
    session_destroy();
    header("Location: ../homepage.html");
}

?>