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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
                <h1> CONFIRM DETAILS </h1>
                <h2> NAME: <?php echo $_COOKIE['name']."<br>"; ?> </h2>
                <h5>Order:</h5>
                <?php 
                    $totalPrice = 0;
                    foreach(json_decode($_COOKIE['order']) as $item){
                        $query = "SELECT price FROM menu WHERE menu_item = ?";
                        $stmt = $conn->prepare($query);
                        $stmt->bind_param('s', $item);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $row = $result->fetch_assoc();
                        $price = (int) $row['price'];
                        $totalPrice = $totalPrice + $price;
                        echo $item."<br>";
                    }
                ?>
                <br>
                <h6>Total Cost:</h6>
                <?php 
                    echo $totalPrice;
                ?>
        </div>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>