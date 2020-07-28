<?php

    include '../db.php';

    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $atribut = $_POST['atribut'];
    $bobot = $_POST['bobot'];


    $sql="INSERT INTO data_kriteria(kode, nama, atribut, bobot)
        VALUES('$kode', '$nama', '$atribut', '$bobot')";
        
    $result=mysqli_query($con,$sql);
    
    //get raw data from DB
    if($result){
        echo "Sukses";
    }else{
        echo "Gagal";
    }  

?>