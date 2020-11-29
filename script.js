function myFunction() {
    var obj = document.getElementById("addItem");
    obj.remove(); 
}

$('#reservation').submit(function (e) {
    event.preventDefault();
    $.ajax({
        method: "POST",
        url: "reservation.php",
        data:   $("#reservation").serialize(),
        success: function(textStatus, status){
        if(textStatus == 1){
            alert("Your Table Has been Reserved!")
        }
        else{
            alert("This table hass been already reserved on the selected date and time.");
        }
        },
        error: function(xhr, textStatus, error) {
            console.log(xhr.responseText);
            console.log(xhr.statusText);
            console.log(textStatus);
            console.log(error);
        }
    });
});

    function validateForm() {
    var x = $('#tableno').val();
    if (x == "") {
        alert("You havent reserved a table yet!");
        return false;
    }
    }