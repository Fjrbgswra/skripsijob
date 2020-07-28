<html>
    <head>
    </head>
    <body>
        <table>
            <tr>
                <th>Ranking</th>
                <th>Nama</th>
                <th>Output</th>
            </tr>
        
            <?php
                include 'db.php';
            
                $sql = "select nama,output from tmp_moora order by output desc";
            
                $output_string = '';

                $result=mysqli_query($con,$sql);
            
                $count = 1;
            
                if($result){
                    while($row = mysqli_fetch_array($result)){
                        
                        $output_string .= '<tr><td>'.$count.'</td> <td>'.$row['nama'].'</td> <td>'.$row['output'].'</td> </tr>';
                        $count++;
                    }
                    
                    echo $output_string;
                }

            ?>
        </table>
    </body>
</html>