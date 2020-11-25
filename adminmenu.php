<?php 
require('handle-forms/menu_handle_form.php');
require('../../connect/dbconnect.inc.php');
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
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <div class="container">
        <a href="#"><button type="button" class="btn btn-primary btn-lg btn-block">Delete an order</button></a>
        <br>
        <a href="#"><button type="button" class="btn btn-primary btn-lg btn-block">Modify Order</button></a>
        <br>
        <a href="modifyMenu.php"><button type="button" class="btn btn-primary btn-lg btn-block">Add, delete, or modify menu item</button></a>
        <br>
        <a href="previouscustomers.php"><input type="submit" name="prevCustomers" value="View Previous Customers" class="btn btn-primary btn-lg btn-block"></a>
        <br>
        <a href="#"><button type="button" class="btn btn-primary btn-lg btn-block">View order history</button></a>
        <br>
        <form action="adminmenu.php" method="POST">
        <input type="submit" name="goback" value="Log out" class="btn btn-primary btn-lg btn-block">
        </form>
    </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>