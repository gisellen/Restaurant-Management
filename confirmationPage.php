<?php 
require('../../connect/dbconnect.inc.php');
require('handle_form.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>confirm</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
    <form action="" method="">
        CONFIRM DETAILS: <br>
        CUSTOMER NAME: 
            <?php 
            echo $_COOKIE['name']."<br>";
            foreach(json_decode($_COOKIE['order']) as $item){
                echo $item."<br>";
            }
        ?>
       </form>
        <script src="" async defer></script>
    </body>
</html>