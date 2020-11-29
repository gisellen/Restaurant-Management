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

            <div class="form-row mt-3 mb-3">
                <div class="col">
                <a style="width:100%;"  class="btn btn-lg btn-primary" data-toggle="modal" data-target="#exampleModal"> Click To Reserve a Table</a>
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
                <!-- check if customer wants take out or dine in -->
                <label> Take out or dine-in? </label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Take out
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                        Dine in
                    </label>
                </div>
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

        <!-- modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            
            <div class="modal-body">
                <form method="post" id="reservation">
            <label for="address">Reservation Date</label>
                    <div class="form-row">
                        <div class="col">
                        <input type="date" name="rdate" class="form-control"  >
                        </div>
                    </div>

                    <label for="address">Reservation Time</label>
                    <div class="form-row">
                        <div class="col">
                        <select class="form-control" name="rtime">
                            <option value="">Any time</option>
                            <option value="07:00 AM">07:00 AM</option>
                            <option value="07:30 AM">07:30 AM</option>
                            <option value="08:00 AM">08:00 AM</option>
                            <option value="08:30 AM">08:30 AM</option>
                            <option value="09:00 AM">09:00 AM</option>
                            <option value="09:30 AM">09:30 AM</option>
                            <option value="10:00 AM">10:00 AM</option>
                            <option value="10:30 AM">10:30 AM</option>
                            <option value="11:00 AM">11:00 AM</option>
                            <option value="11:30 AM">11:30 AM</option>
                            <option value="12:00 PM">12:00 PM</option>
                            <option value="12:30 PM">12:30 PM</option>
                            <option value="01:00 PM">01:00 PM</option>
                            <option value="01:30 PM">01:30 PM</option>
                            <option value="02:00 PM">02:00 PM</option>
                            <option value="02:30 PM">02:30 PM</option>
                            <option value="03:00 PM">03:00 PM</option>
                            <option value="03:30 PM">03:30 PM</option>
                            <option value="04:00 PM">04:00 PM</option>
                            <option value="04:30 PM">04:30 PM</option>
                            <option value="05:00 PM">05:00 PM</option>
                            <option value="05:30 PM">05:30 PM</option>
                            <option value="06:00 PM">06:00 PM</option>
                            <option value="06:30 PM">06:30 PM</option>
                            <option value="07:00 PM">07:00 PM</option>
                            <option value="07:30 PM">07:30 PM</option>
                            <option value="08:00 PM">08:00 PM</option>
                            <option value="08:30 PM">08:30 PM</option>
                            <option value="09:00 PM">09:00 PM</option>
                            <option value="09:30 PM">09:30 PM</option>
                            <option value="10:00 PM">10:00 PM</option>
                            <option value="10:30 PM">10:30 PM</option>
                            <option value="11:00 PM">11:00 PM</option>
                            <option value="11:30 PM">11:30 PM</option>
                
                          </select>
                        </div>
                    </div>
                    <label for="address">Number of Guests</label>
                    <div class="form-row">
                        <div class="col">
                        <input type="number" name="rnguest" class="form-control"  >
                        </div>
                    </div>

                    <label for="address">Table Number</label>
                    <div class="form-row">
                        <div class="col">
                        <input type="number" name="rtno" id="tableno" class="form-control"  >
                        </div>
                    </div>
                    <div class="text-center mt-3">
                    <button type="submit" name="reserve" id="reserve" class="btn btn-primary">Reserve</button>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>            
        <script src=script.js></script>
        </body>
</html>
