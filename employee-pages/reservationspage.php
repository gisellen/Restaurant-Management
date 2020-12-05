<?php
require('../../../connect/dbconnect.inc.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
    <div class="container">
        <?php 
        $limit = 5;
        //get date
        $date = "SELECT CURDATE()";
        $stmt = $conn->prepare($date);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        foreach($result as $item){
            $tDate = $item;
        }
        //total records
        $total = "SELECT COUNT(id) as R FROM reservation WHERE rdate = ?";
        $stmt = $conn->prepare($total);
        $stmt->bind_param('s', $tDate);
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
        $query ="SELECT id, rtime, guest, tableno FROM reservation WHERE rdate = ? LIMIT ?,?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sii", $tDate, $offset, $limit);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        if($result){
	    ?>
    <table border='1'>
        <tr>
            <th>ID</th>
            <th>time</th>
            <th>no. of guests</th>
            <th>table no.</th>
        </tr>
    <?php
    foreach($result as $reserve){
        echo "<tr>";
        echo "<td>".$reserve['id']."</td>";
        echo "<td>".$reserve['rtime']."</td>";
        echo "<td>".$reserve['guest']."</td>";
        echo "<td>".$reserve['tableno']."</td>";
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
                    echo '<a href="reservationspage.php?page='.($current_page-1).'"><button> Previous </button></a>';
        }
        if($current_page < $total_pages){
                echo '<a href="reservationspage.php?page='.($current_page+1).'"><button> Next </button></a>';
        }
        ?>
        <a href="adminmenu.php"><button type="button" class="btn btn-primary btn-lg btn-block">Go back</button> </a>
    </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>