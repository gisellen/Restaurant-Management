<?php 
require('../../connect/dbconnect.inc.php');
require('handle-forms/order_handle_form.php');
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
                <h1>CONFIRM DETAILS </h1>
                <h2>NAME: <?php echo $_SESSION['name']."<br>"; ?> </h2>
                <h4>PHONE NUMBER: <?php echo $_SESSION['phone']."<br>"; ?> </h4>
                <h4>ADDRESS: <?php echo $_SESSION['address']; ?> </h4>
                <h5>ORDER DETAILS:</h5>
                <?php 
                    $totalPrice = 0;
                    // get query statement
                            foreach(json_decode($_SESSION['order']) as $item){
                                $query = "SELECT price FROM menu WHERE menu_item = ?";
                                $stmt = $conn->prepare($query);
                                $stmt->bind_param('s', $item);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                $row = $result->fetch_assoc();
                                //putting the results into an array
                                $itemArr[] = $item;
                                $price[] = (int) $row['price'];
                            }
                            //putting the quantity into an array
                            foreach (json_decode($_SESSION['quantity']) as $key => $value){
                                if($value != null){
                                    $quant[] = (int) $value;
                                }
                            }

                            //combining both 
                            function getValues($key, $val) {
                                return array($key=>$val);
                             }
                            $orderArr = array_map('getValues', $itemArr, $quant);
                            foreach($orderArr as $order){
                                foreach($order as $key => $value){
                                    echo $key." x".$value."<br>"; 
                                }
                            }
                            $arr=array_map('getValues', $price, $quant);
                            foreach($arr as $order){
                                foreach($order as $key => $value){
                                    $totalPrice += $key * $value;
                                }
                            }
                ?>
                <br>
                <h6>Total Cost:</h6>
                <?php 
                    echo $totalPrice;
                ?>

                <!-- confirm order or edit -->
                <br><a href="orderpage.php">Edit Order Details</a>

                <form action="confirmationPage.php" method="POST">
                <input type="submit" name="confirm" value="confirm order">
                <?php if(isset($_POST['confirm'])){ ?>
                    <p> Order has been placed. </p>
                    <a href="homepage.html">Go back to homepage</a>
                <?php } ?>
                </form>
        </div>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>