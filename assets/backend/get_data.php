<?php

    include 'db.php';


    function get_C1($usia){
        if($usia > 120){
            $c1 = 1;
        }else if($usia <= 120 && $usia >= 90){
            $c1 = 3;
            
        }else{
            $c1 = 5;
        }
        return $c1;
    }

    function get_C2($rata){
        if($rata >= 2 && $rata <= 5){
            $c2 = 1;
        }else if($rata <= 9 && $rata > 5){
            $c2 = 3;
            
        }else{
            $c2 = 5;
        }
        return $c2;
    }


    function get_C3($potensi){
        if($potensi >= 4 && $potensi <= 8){
            $c3 = 1;
        }else if($potensi <= 12 && $potensi > 8){
            $c3 = 3;
            
        }else{
            $c3 = 5;
        }
        return $c3;
    }


    function get_C4($berat){
        if($berat >= 200 && $berat <= 280){
            $c4 = 1;
        }else if($berat <= 360 && $berat > 280){
            $c4 = 3;
            
        }else{
            $c4 = 5;
        }
        return $c4;
    }


    function get_C5($p){
        if($p == "Kurang"){
            $c4 = 1;
        }else if($p == "Cukup"){
            $c4 = 3;
            
        }else{
            $c4 = 5;
        }
        return $c4;
    }


    $sql = "select c1,c2,c3,c4,c5,nama from data_jagung";
        

    //echo $sql;

    $result=mysqli_query($con,$sql);

    $matriks = [];
    
    $i = 0;
    

    //get raw data from DB
    if($result){
        while($row = mysqli_fetch_array($result)){
            $jagung = [];
            $jagung[0] = $row['c1'];
            $jagung[1] = $row['c2'];
            $jagung[2] = $row['c3'];
            $jagung[3] = $row['c4'];
            $jagung[4] = $row['c5'];
            $jagung[5] = $row['nama'];
            $matriks[$i] = $jagung;
            $i++;
        }
        
        
        
        
        
        //convert raw data to number (C1,C2,...)
        for($i = 0;$i<count($matriks);$i++){
            for($j = 0;$j<5;$j++){
                    
                if($j == 0){
                    
                    $matriks[$i][$j] = get_C1($matriks[$i][$j]);
                }
                if($j == 1){
                    
                    $matriks[$i][$j] = get_C2($matriks[$i][$j]);
                }
                if($j == 2){
                    
                    $matriks[$i][$j] = get_C3($matriks[$i][$j]);
                }
                if($j == 3){
                    
                    $matriks[$i][$j] = get_C4($matriks[$i][$j]);
                }
                if($j == 4){
                    
                    $matriks[$i][$j] = get_C5($matriks[$i][$j]);
                }
              
            }
        }
        
        
        
        $sumCS = [0,0,0,0,0];
        
        //sum the squared criteria
        for($i = 0;$i<count($matriks);$i++){
            for($j = 0;$j<5;$j++){
                    
                $sumCS[$j]+= pow($matriks[$i][$j],2);
              
            }
        }
        
        //Square root of sumCS
        for($i = 0;$i<5;$i++){
            
            $sumCS[$i] = sqrt($sumCS[$i]);
            //echo $sumCS[$i];
            //echo "<br>";
            
        }
        

        //matrix normalization
        for($i = 0;$i<count($matriks);$i++){
            for($j = 0;$j<5;$j++){
                $matriks[$i][$j] = $matriks[$i][$j] / $sumCS[$j];
              
            }
        }
        
        $cWeight = [0.25,0.25,0.25,0.1,0.15]; //weight for each criteria
        
        
        //normalized matrix * weight
        for($i = 0;$i<count($matriks);$i++){
            for($j = 0;$j<5;$j++){
                $matriks[$i][$j] = $matriks[$i][$j] * $cWeight[$j];
              
            }
        }
        
        $output = [];
        
        for($i = 0;$i<count($matriks);$i++){
            $tmp_sum = 0;
            for($j = 0;$j<5;$j++){
                $tmp_sum+=$matriks[$i][$j];
              
            }
            
            $output[$i] = [$matriks[$i][5],$tmp_sum];
        }
        
        
        $sql = "truncate from tmp_moora";
        
        $result=mysqli_query($con,$sql);
        
        if($result){
            
            $sql_values = '';
            for($i = 0;$i<count($output);$i++){
                $tmp = '';
                for($j = 0;$j<2;$j++){
                   
                    if($j == 0){
                        $tmp = $tmp."('".$output[$i][$j]."','";  
                        
                    }
                    
                    if($j == 1){
                        
                        $tmp = $tmp.$output[$i][$j]."')";
                        
                    }

                }
                
                if($i == count($output)-1){
                    
                    $sql_values = $sql_values.$tmp;
                    
                    
                }else{
                    
                    $sql_values = $sql_values.$tmp.",";
                    
                }

            }
          
            
            $sql = "INSERT INTO tmp_moora(nama, output) VALUES ".$sql_values;
            
            $result=mysqli_query($con,$sql);
            
            if($result){
   
                
            }
            
        }
        

    }else{

        echo "error";

    }  

?>