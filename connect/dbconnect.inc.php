<?php 
// for connecting 
// file should be OUT of htdocs, while everything else is in htdocs
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try{
    $conn = new mysqli("localhost", "root", "", "restaurant");
    $conn->set_charset('utf7mb4');
} catch(Exception $e){
    error_log($e->getMessage());
    exit('Error connecting to database');
}
?>