<?php

    include '../db.php';

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $c1 = $_POST['c1'];
    $c2 = $_POST['c2'];
    $c3 = $_POST['c3'];
    $c4 = $_POST['c4'];
    $c5 = $_POST['c5'];
    $c6 = $_POST['c6'];
    $c7 = $_POST['c7'];

    $sql= "UPDATE data_alternatif SET nama = '$nama', c1 = '$c1', c2 = '$c2', c3 = '$c3', c4 = '$c4', c5 = '$c5', c6 = '$c6', c7 = '$c7' WHERE id = '$id'";
        
    $result=mysqli_query($con, $sql);
    
    //get raw data from DB
    if($result){
        echo "Suskes";
    }else{
        echo "Gagal";
    }  
?>