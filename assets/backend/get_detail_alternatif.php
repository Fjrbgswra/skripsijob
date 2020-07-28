<?php

    include '../db.php';

    $id = $_GET['id'];

    $sql="SELECT * FROM data_alternatif WHERE id = '".mysqli_real_escape_string($con, $id)."'";
        
    $result=mysqli_query($con, $sql);
    
    //get raw data from DB
    if($result){
        $row = mysqli_fetch_array($result);
        echo json_encode($row);
    }else{
        echo "Gagal";
    }  
?>