<?php
require('../../../connect/dbconnect.inc.php');
require('delete.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>previous customers</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="../style.css"> 
    </head>
    <body>
    <div class="container">
    <?php
    $limit = 5;

    //get total records
    $total = "SELECT COUNT(OrderID) as R FROM orders";
    $stmt = $conn->prepare($total);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $records = $result['R'];

    //get page
    if ((isset($_GET['page']) && is_numeric($_GET['page']))){
        $current_page = htmlspecialchars($_GET['page']); //$page = 2 => the second customer page
    } else{
        $current_page = 1;
    }
    $offset = ($current_page-1) * $limit;
    //get number of pages
    if($records > $limit){
        $total_pages = ceil($records/$limit);
    } else{
        $total_pages = 1;
    }

    //get records each page
    $query ="SELECT OrderID, menuID, quantity, CustomerID FROM orders LIMIT ?,?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $offset, $limit);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    if($result){
	?>
    <table border='1'>
        <tr>
            <th>Order ID</th>
            <th>Menu Item</th>
            <th>Quantity</th>
            <th>Total price</th>
            <th>Customer</th>
            <th>Customer ID</th>
            <th>Delete</th>
        </tr>
    <?php
    foreach($result as $orders){
        //get customer
        $query = "SELECT CustomerID, first_name, last_name FROM customer WHERE CustomerID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $orders['CustomerID']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $name = $row['first_name']." ".$row['last_name'];
        $customerID = $row['CustomerID'];

        //get menu item
        $query = "SELECT menu_item, price FROM menu WHERE MenuID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $orders['menuID']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $menu_item = $row['menu_item'];
        $itemTotal = $orders['quantity'] * $row['price'];
        $id = $orders['OrderID'];

        echo "<tr>";
        echo "<td>".$orders['OrderID']."</td>";
        echo "<td>".$menu_item."</td>";
        echo "<td>".$orders['quantity']."</td>";
        echo "<td>".$itemTotal."</td>";
        echo "<td>".$name."</td>";
        echo "<td>".$customerID."</td>";
        echo "<form method='POST' action='orderhistory.php'>";
        echo "<td><input type='submit' name='deleteOrder' value='".$id."'></td>";
        echo "</form>";
        echo "</tr>";
    }   
    ?>
        </table>
        <?php
        } else{
            echo "<p>no records found</p>";
            echo "<a href='adminmenu.php'> go back </a>";
            exit();
        }
        $stmt->close();


        //page links
        if( $current_page > 1){
                echo '<a href="orderhistory.php?page='.($current_page-1).'"><button> Previous </button></a>';
        }
        if($current_page < $total_pages){
            echo '<a href="orderhistory.php?page='.($current_page+1).'"><button> Next </button></a>';
        }
        ?>
        <br>
    <a href="adminmenu.php"><button type="button" class="btn btn-primary btn-lg btn-block">Go back</button> </a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>