<?php require('../../../connect/dbconnect.inc.php');

$year = date('Y');
$month = date('m');
$day = date('d',strtotime("-7 day"));
$time = "00:00:00";

$totalResults = array();
for($i = 0; $i<=7; $i++){
    $str1 = $year."-".$month."-".$day." ".$time;
    $day += 1;
    $str2 = $year."-".$month."-".$day." ".$time;
    $sql = "SELECT COUNT(ordertime) AS r FROM orders WHERE ordertime BETWEEN ? AND ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $str1, $str2);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    foreach($result as $total){
        foreach($total as $r){
            $totalResults[] = $r;
        }
    }
}  
$temp = json_encode($totalResults)
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
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
    <div class="container">
    <canvas id="myChart"></canvas>
    <a href="adminmenu.php"><button type="button" class="bt btn-primary btn-lg btn-block">Go back</button></a>
    </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
        var d = new Date();
        var week = new Array(7);
        week = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        var today = week[d.getDay()];
        var past7Days = new Array(7);
        var i=0;
        var index = week.indexOf(today);
        past7Days[0] = today;
        while(i<7){
            index++;
            i++;
            if(index > 6){
                index = 0;
            }
            var day = week[index];
            console.log(day);
            past7Days[i] = day;
        }
        $(document).ready(function(){
            showGraph();
        });

        function showGraph(){
            {
                $.post("statistics.php",
                function (data){
                var chartdata = {
                        labels: past7Days,
                        datasets: [
                            {
                                label: 'Total orders',
                                data: <?php echo $temp?>
                            }
                        ]
                    };
                    var graphTarget = $("#myChart");
                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });
                });
            }
        }
        </script>
    </body>
</html>