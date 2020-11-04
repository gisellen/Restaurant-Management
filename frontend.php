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
                <label for="menu"> Menu: </label>
                <br><small>Brunch</small><br>
                <input type="checkbox" name="menu[]" value="Omlette"> Omelette $6.00 <br>
                <input type="checkbox" name="menu[]" value="Egg Sandwich"> Egg Sandwich $5.00<br>
                <input type="checkbox" name="menu[]" value="Avocado Burger"> Avocado Burger $9.00<br>
                <input type="checkbox" name="menu[]" value="Fries"> Fries $3.00<br>
                <br><small>Drinks</small><br>
                <input type="checkbox" name="menu[]" value="Coffee"> Coffee $2.50<br>
                <input type="checkbox" name="menu[]" value="Tea"> Tea $2.00<br>
                <br>
            </p>
            <p>
                <input type="submit" name="submit" value="order!">
            </p>
            </fieldset>
        </form>
        <script src="" async defer></script>
    </body>
</html>