<?php 
require('../../connect/dbconnect.inc.php');
require('handle-forms/order_handle_form.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Restaurant Management</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css"> 
    </head>

    <body>
        <div class="container">
        <h1>GEISTNASHVILLE ORDER FORM</h1>
        <form action="orderpage.php" method="POST">
        <label for="Name">Customer Name</label>
            <div class="form-row">
                <div class="col">
                    <input type="text" name="firstName" class="form-control" placeholder="First name" value=<?php if(!empty($_SESSION['fname'])){ echo $_SESSION['fname']; } ?>>
                </div>
                <div class="col">
                   <input type="text" name="lastName" class="form-control" placeholder="Last name" value=<?php if(!empty($_SESSION['lname'])){ echo $_SESSION['lname']; } ?>>
                </div>
            </div>
            <label for="phone number">Phone Number</label>
            <div class="form-row">
                <div class="col">
                    <input type="text" name="phoneNum" class="form-control" placeholder="x-xxx-xxx-xxxx"  size="20" maxlength="20" value="<?php if(!empty($_SESSION['phone'])){ echo $_SESSION['phone']; } ?>">
                </div>
            </div>
            <label for="address"> Address</label>
            <div class="form-row">
                <div class="col">
                   <input type="text" name="address" class="form-control" placeholder="Address" value="<?php if(!empty($_SESSION['address'])){ echo $_SESSION['address']; } ?>">
                </div>
            </div>
            <p>
                <!-- menu taken from https://www.geistnashville.com/brunch -->
                <label> Menu: </label>
                <br>
                <!-- getting the menu from database -->
                <?php 
                $query = "SELECT menu_item, price FROM menu";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                ?>
                <input type="checkbox" id="check"  name="menu[]" value="<?php echo $row["menu_item"];?>" <?php if(!empty($_SESSION['order'])){foreach(json_decode($_SESSION['order']) as $item){ if($item == $row["menu_item"]){ echo "checked"; }}}?>> <?php echo $row["menu_item"]." $".$row["price"]; ?>
                <div class="col-1">
                    <input type="number" class="form-control" name="quantity[<?php echo $row["menu_item"]; ?>]" min="0" max="5" placeholder="0"><br>
                </div>
                <?php 
                      }
                }
                ?>
            </p>
            <input class="btn btn-primary" type="submit" name="cancel" value="Cancel">
            <input class="btn btn-dark" type="submit" name="submit" value="submit">
                <?php if(count($errors)>0): ?>
                    <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Could not order</h4>
                    <ul>
                        <?php foreach($errors as $error => $description): ?>
                            <li>
                               <?php echo $description ?>
                            </li>
                        <?php endforeach;?>
                    </ul>
                    </div>
                <?php endif; ?>
        </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>            
        <script src=script.js></script>
        </body>
</html>
