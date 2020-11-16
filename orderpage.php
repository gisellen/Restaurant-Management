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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css"> 
    </head>
    <body>
        <div class="container">
        <form action="orderpage.php" method="POST">
        <label for="Name">Customer Name</label>
            <div class="form-row">
                <div class="col">
                    <input type="text" name="firstName" class="form-control" placeholder="First name" value=<?php if(!empty($fname)){ echo $fname; } ?>>
                </div>
                <div class="col">
                   <input type="text" name="lastName" class="form-control" placeholder="Last name" value=<?php if(!empty($lname)){ echo $lname; } ?>>
                </div>
            </div>
            <label for="phone number">Phone Number</label>
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" id="phoneNum" size="20" maxlength="20">
                </div>
            </div>
            <p>
                <!-- menu taken from https://www.geistnashville.com/brunch -->
                <label> Menu: </label>
                <br>
                <?php 
                $query = "SELECT menu_item, price FROM menu";
                $stmt = $conn->prepare($query);
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
                <input class="btn btn-dark" type="submit" name="submit" value="submit">
            </p>
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
                <!-- use cookies for this -->
                <!-- if user is logged in, show: -->
                <small> Signed in as ___ </small>
                <!-- if user is not logged in, show: -->
                <small>not signed in, sign up?</small>
        </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>
