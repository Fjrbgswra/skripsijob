<?php

    include '../db.php';

    $nama = $_POST['nama'];
    $c1 = $_POST['c1'];
    $c2 = $_POST['c2'];
    $c3 = $_POST['c3'];
    $c4 = $_POST['c4'];
    $c5 = $_POST['c5'];
    $c6 = $_POST['c6'];
    $c7 = $_POST['c7'];


    $sql="INSERT INTO data_alternatif(nama, c1, c2, c3, c4, c5, c6, c7)
        VALUES('$nama', '$c1', '$c2', '$c3', '$c4', '$c5', '$c6', '$c7')";
        
    $result=mysqli_query($con,$sql);
    
    //get raw data from DB
    if($result){
        echo "Sukses";
    }else{
        echo "Gagal";
    }  

?>