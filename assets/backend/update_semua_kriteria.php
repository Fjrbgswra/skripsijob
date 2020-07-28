<?php

    include '../db.php';
    $arr = [];
    $arr[0] = $_POST['C1'];
    $arr[1] = $_POST['C2'];
    $arr[2] = $_POST['C3'];
    $arr[3] = $_POST['C4'];
    $arr[4] = $_POST['C5'];
    $arr[5] = $_POST['C6'];
    $arr[6] = $_POST['C7'];


    $i = 0;

    while($i < 7){

        $tmp1 = $arr[$i];

        $tmp2 = $i + 1;
    
        $sql= "UPDATE data_kriteria SET bobot = '$tmp1' WHERE id = '$tmp2'";

        $result=mysqli_query($con, $sql);

        $i += 1;
    }


   
   
    
    //get raw data from DB
      
?>