<?php
require('connect/dbconnect.inc.php');
        $rdate = $_POST['rdate']; 
        $rtime = $_POST['rtime']; 
        $rnguest = $_POST['rnguest']; 
        $rtno = $_POST['rtno']; 

        $currentdate = date("Y-m-d");

        $sql = "SELECT *FROM `reservation` WHERE `rdate`='$currentdate' AND `rtime`='$rtime' AND `tableno`='$rtno'";
        $data = mysqli_query($conn,$sql);
        $total = mysqli_num_rows($data);
        $value= mysqli_fetch_object($data);
        
        if($total > 0){
            echo "0";
        }
        else{
            $sql = "INSERT INTO `reservation`(`rdate`, `rtime`, `guest`, `tableno`) VALUES ('$rdate','$rtime','$rnguest','$rtno')";
            if($conn->query($sql)===TRUE){ 
                echo "1";
            }

        }
?>