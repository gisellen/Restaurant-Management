<?php require('../../connect/dbconnect.inc.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Restaurant Management</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <form action="" method="POST">
            <fieldset>
            <p>
                <label>Customer Name:
                    <input type="text" name="name" size="20" maxlength="20">
                </label>
            </p>
            <p>
                <!-- menu take from https://www.geistnashville.com/brunch -->
                <label for="menu"> Menu: </label>
                <br><small>Small Plates</small><br>

                <?php 
                $query1 = "SELECT menu_item, price FROM menu";
                $stmt = $conn->prepare($query1);
                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                ?>
                <input type="checkbox" name="menu[]" value="<?php echo $row["menu_item"]?>"> <?php echo $row["menu_item"]." $".$row["price"]?>               
                <br>
                <?php 
                      }
                }
                ?>
                <br><small>Drinks</small><br>
                <input type="checkbox" name="menu[]" value="Coffee"> Coffee $2.50<br>
                <input type="checkbox" name="menu[]" value="Tea"> Tea $2.00<br>
                <br>
            </p>
            <p>
                <input type="submit" name="submit" value="order!">
            </p>
            <p>
                <!-- use cookies for this -->
                <!-- if user is logged in, show: -->
                <small> Signed in as ___ </small>
                <!-- if user is not logged in, show: -->
                <small>not signed in, sign up?</small>
            </p>
            </fieldset>
        </form>
        <script src="" async defer></script>
    </body>
</html>