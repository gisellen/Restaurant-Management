<?php 
require('../../../connect/dbconnect.inc.php');
require('../handle-forms/modifymenu_handle_form.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>modify menu</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <!-- show current menu, then have the options to modify the menu  -->
        <div class="container">
        <p> Current menu: </p>
        <?php 
        $query = "SELECT MenuID, menu_item, price FROM menu";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo $row["MenuID"]." ".$row["menu_item"]." $".$row["price"]."<br>";
            }
        }
        ?>
        <form action="modifyMenu.php" method="POST">
        <input class="btn btn-dark" type="submit" name="addItem" value="Add Item">
        <input class="btn btn-dark" type="submit" name="deleteItem" value="Delete Item">
        <input class="btn btn-dark" type="submit" name="modifyItem" value="Modify Item">
        <div id="addItem">        
        <?php 
            if(isset($_POST['addItem'])){
                echo "<br>";
                addItem();
                echo "<br> <br>";
            } else if(isset($_POST['deleteItem'])){
                deleteItem();
            } else if(isset($_POST['modifyItem'])){
                modifyItem();
            }
        ?>
        </div>
        </form>
        <a href="adminmenu.php"> <button type="button" class="btn btn-primary btn-lg btn-block"> Go back?</button></a>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="../script.js" async defer></script>
    </body>
</html>
