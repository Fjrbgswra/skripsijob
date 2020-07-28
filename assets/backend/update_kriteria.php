<?php

    include '../db.php';

    $id = $_POST['id'];
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $atribut = $_POST['atribut'];
    $bobot = $_POST['bobot'];

    $sql= "UPDATE data_kriteria SET kode = '$kode', nama = '$nama', atribut = '$atribut', bobot = '$bobot' WHERE id = '$id'";
        
    $result=mysqli_query($con, $sql);
    
    //get raw data from DB
    if($result){
        echo "Suskes";
    }else{
        echo "Gagal";
    }  
?>