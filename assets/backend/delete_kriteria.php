<?php

    include '../db.php';

    $id = $_GET['id'];
  
    $sql= "DELETE FROM data_kriteria WHERE id = '$id'";
        
    $result=mysqli_query($con, $sql);
    
    //get raw data from DB
    if($result){
        echo "Suskes";
    }else{
        echo "Gagal";
    }  
?>