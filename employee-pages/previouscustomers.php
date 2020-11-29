<?php
require('../../../connect/dbconnect.inc.php');
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
        <link rel="stylesheet" href="style.css"> 
    </head>
    <body>
    <div class="container">
    <?php
    $limit = 10;
    //get total records
    $total = "SELECT COUNT(CustomerID) as R FROM customer";
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
    $query ="SELECT first_name, last_name, phone_num, `address` FROM customer LIMIT ?,?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $offset, $limit);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    if($result){
	?>
    <table border='1'>
        <tr>
            <th>Customer Name</th>
            <th>Phone Num</th>
            <th>Address</th>
        </tr>
    <?php
    foreach($result as $customer){
        echo "<tr>";
        echo "<td>".$customer['first_name']." ".$customer['last_name']."</td>";
        echo "<td>".$customer['phone_num']."</td>";
        echo "<td>".$customer['address']."</td>";
        echo "</tr>";
    }
    ?>
        </table>
        <?php
        } else{
            echo "<p>no records found</p>";
            exit();
        }
        $stmt->close();
        
        //page links
        if( $current_page > 1){
                echo '<a href="previouscustomers.php?page='.($current_page-1).'"><button> Previous </button></a>';
        }
        if($current_page < $total_pages){
            echo '<a href="previouscustomers.php?page='.($current_page+1).'"><button> Next </button></a>';
        }
        ?>
    <a href="adminmenu.php"><button type="button" class="btn btn-primary btn-lg btn-block">Go back</button> </a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>