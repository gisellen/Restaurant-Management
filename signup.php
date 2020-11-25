<?php 
require('handle-forms/signup_handle_form.php');
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
        <center>
        <form action="signup.php" method="POST">
        <div class="col-4">
            <input type="text" name="username" placeholder="username" class="form-control">
        </div>
        <br>
        <div class="col-4">
            <input type="password" name="password" placeholder="password" class="form-control">
        </div>
        <br>
        <div class="col-4">
            <input type="password" name="confirmPassword" placeholder="confirm password" class="form-control">
        </div>
        <br>
        <div class="col-4">
            <input type="text" name="code" placeholder="code" class="form-control">
        </div>
            <a class="btn btn-primary" href="homepage.html" role="button">Go Back</a>
            <input class="btn btn-dark" type="submit" name="signup" value="signup">
        </form>
        <?php if(count($errors)>0): ?>
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Could not sign up</h4>
                    <ul>
                        <?php foreach($errors as $error => $description): ?>
                            <li>
                               <?php echo $description ?>
                            </li>
                    <?php endforeach;?>
                </ul>
            </div>
        <?php endif; ?>
        </center>
    </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="script.js"></script>
    </body>
</html>