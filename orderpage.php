<?php 
require('../../connect/dbconnect.inc.php');
require('handle_form.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Restaurant Management</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <form action="orderpage.php" method="POST">
            <fieldset>
            <p>
                <label>Customer Name:</label>
                    <input type="text" name="name" size="20" maxlength="20">
            </p>
            <p>
                <!-- menu taken from https://www.geistnashville.com/brunch -->
                <label> Menu: </label>
                <br>
                <?php 
                $query1 = "SELECT menu_item, price FROM menu";
                $stmt = $conn->prepare($query1);
                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                ?>
                <input type="checkbox" name="menu[]" value="<?php echo $row["menu_item"]; ?>"> <?php echo $row["menu_item"]." $".$row["price"]; ?>               
                <br>
                <?php 
                      }
                }
                ?>
            </p>
            <p>
                <input type="submit" name="submit" value="order!">
            </p>
                <?php if(count($errors)>0): ?>
                    <ul>
                        <?php foreach($errors as $error => $description): ?>
                        <li>
                            <?php echo $description ?>
                        </li>
                        <?php endforeach;?>
                    </ul>
                <?php endif; ?>
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
