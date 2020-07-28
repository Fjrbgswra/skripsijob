<div class="container">
            <br><br> 
  <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
  <div class="panel panel-default">
    <div class="panel-body">
      <table class="table table-hover table-bordered" hidden="">
          <thead>
            <tr>
              <th>Alternatif</th>
              <?php foreach ($kriteria as $key): ?>
                <th>C<?= $key->id_kriteria ?></th>
              <?php endforeach ?>
              
            </tr>
          </thead>
          <tbody>
            <?php if ($alternatif==NULL): ?>
              <tr>
                <td class="text-center" colspan="<?= 2+count($kriteria)  ?>">Silahkan lengkapi data di halaman <a href="<?= base_url('alternatif') ?>" class="text-black"><u>Data.</u></a></td>
              </tr>
            <?php endif ?>

            <?php foreach ($alternatif as $keys): ?>
              <tr>
                <td><?= $keys->nama ?></td>
                <?php foreach ($kriteria as $key): ?>
                  <td>
                    <?php 
                      $data_pencocokan = $this->perhitungan_model->data_nilai($keys->id_pelamar,$key->id_kriteria);
                      echo $data_pencocokan['nilai'];                     
                    ?>
                  </td>
                <?php endforeach ?>    
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>

      <table class="table table-hover table-bordered" hidden="">
          <thead>
          <tr>
              <th>Alternatif</th>
              <?php foreach ($kriteria as $key): ?>
                <th>C<?= $key->id_kriteria ?></th>
              <?php endforeach ?>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($alternatif as $keys): ?>
          <tr>
                <td><?= $keys->nama ?></td>
                <?php foreach ($kriteria as $key): ?>
                  <td>
                    <?php 
                      $data_pencocokan = $this->perhitungan_model->data_nilai($keys->id_pelamar,$key->id_kriteria);
                    
                      $pembagi=$this->perhitungan_model->nilai_pembagi($key->id_kriteria);
                      
                      $normalisasi=round($data_pencocokan['nilai']/$pembagi['pembagi'],3);
                        echo $normalisasi;
                      
                    ?>
                  </td>
                <?php endforeach ?>

               
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>

      <table class="table table-hover table-bordered" hidden="">
          <thead>
          <tr>
              <th>Alternatif</th>
              <th>max(C2+C3+C4+C5+C6+C7)</th>
              <th>min(c1)</th>
              <th>Yi = max - min</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($alternatif as $keys): ?>
          <tr>
                <td><?= $keys->nama  ?> 
                <?php 
                $max=0;
                $min=0;
                foreach ($kriteria as $key): ?>
                  
                    <?php 
                    $data_pencocokan = $this->perhitungan_model->data_nilai($keys->id_pelamar,$key->id_kriteria);
                    $pembagi=$this->perhitungan_model->nilai_pembagi($key->id_kriteria);
                    $pembobotan=$this->perhitungan_model->pembobotan($key->id_kriteria);

                      if($pembobotan['tipe']==='Benefit'){
                          
                          $max += round($data_pencocokan['nilai']/$pembagi['pembagi']*$pembobotan['bobot'],4);
                          
                        // $max[]=$key->id_kriteria;
                      }else{
                         
                          $min += round($data_pencocokan['nilai']/$pembagi['pembagi']*$pembobotan['bobot'],4);
                        // $min[]=$key->id_kriteria;
                      }
                    
                      $yi=$max-$min;
                      
                      //echo var_dump($min);
                    ?>
                    
                    <?php endforeach ;?>
                      <?php $optimasi[]=$yi; 
                      $optim[]=$yi;
                      $id[]=$keys->id_pelamar;
                            
                      ?>
                   <td><?php echo $max ?></td>
                    <td><?php echo $min ?></td>
                    <td><?php echo $yi ?></td>
                
                    
               
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      <h2>Ranking HRD </h2>
      <table class="table table-hover table-bordered">
        <tr>
          <td>Ranking</td>
          <td>Alternatif</td>
          <td>Optimasi</td>
        </tr>
              <?php
              
              $a=1;for($i=0; $i<5; $i++) { 
                //perankingan
                rsort($optimasi);
                $id_optimasi = array_search($optimasi[$i], $optim);
                $id_pelamar = $id[$id_optimasi];
                $alternatif = $this->perhitungan_model->hasil($id_pelamar);
                //mencari alternatif terpilih
                $optimasi_tertinggi=max($optimasi);
                $id_optimasi2 = array_search($optimasi_tertinggi, $optim);
                $id_pelamar2 = $id[$id_optimasi2];
                $alternatif_terpilih=$this->perhitungan_model->hasil($id_pelamar2);
         
                ?>
        <tr>
          <td><?php echo $a; ?></td>
          <td><?php echo  $alternatif['nama'] ?></td>
          <td><?php echo $optimasi[$i]; ?></td>
        </tr>
        <?php  $a++; } ?>
      </table>
      <hr>
      <h2>Perhitungan Point Borda </h2>
      <table class="table table-hover table-bordered">
        <tr>
          <td>Ranking</td>
          <td>Alternatif</td>
          <td>Optimasi</td>
          <td>Point borda</td>
          <td>Hasil</td>
        </tr>
              <?php
              
              $a=1;
              $b=6;
              for($i=0; $i<5; $i++) { 
                //perankingan
                rsort($optimasi);
                $id_optimasi = array_search($optimasi[$i], $optim);
                $id_pelamar = $id[$id_optimasi];
                $alternatif = $this->perhitungan_model->hasil($id_pelamar);
                //mencari alternatif terpilih
                $optimasi_tertinggi=max($optimasi);
                $id_optimasi2 = array_search($optimasi_tertinggi, $optim);
                $id_pelamar2 = $id[$id_optimasi2];
                $alternatif_terpilih=$this->perhitungan_model->hasil($id_pelamar2);
                if ($a>$i) {
                  # code...
                  $b--;
                }
                $total = $optimasi[$i] * $b;
                ?>
              
        <tr>
          <td><?php echo $a; ?></td>
          <td><?php echo  $alternatif['nama'] ?></td>
          <td><?php echo $optimasi[$i]; ?></td>
          <td><?php echo $b; ?></td>
          <td><?php echo $total; ?></td>
        </tr>
        <?php  $a++; } ?>
      </table>
      <hr>
      
      <!-- <h2>Kesimpulan</h2>
      <h4>Hasil perhitungan menggunakan metode MOORA. Alternatif terbaik adalah  <b><?= $alternatif_terpilih['nama']?></b> dengan jumlah <b><?= "Optimasi=".$optimasi_tertinggi ?>.</b></h4> -->
      <!-- <button id="printbtn" onClick="window.print();">Print</button> -->

      <table class="table table-hover table-bordered" hidden>
          <thead>
            <tr>
              <?php foreach ($kriteria as $key): ?>
                <th>C<?= $key->id_kriteria ?></th>
              <?php endforeach ?>
              
            </tr>
          </thead>
          <tbody>
            <?php if ($alternatif==NULL): ?>
              <tr>
                <td class="text-center" colspan="<?= 2+count($kriteria)  ?>">Silahkan lengkapi data di halaman <a href="<?= base_url('alternatif') ?>" class="text-black"><u>Data.</u></a></td>
              </tr>
            <?php endif ?>

            <?php foreach ($alternatif2 as $keys): ?>
              <tr>
                <td><?= $keys->nama ?></td>
                <?php foreach ($kriteria2 as $key): ?>
                  <td>
                    <?php 
                      $data_pencocokan = $this->perhitungan_model2->data_nilai($keys->id_pelamar,$key->id_kriteria);
                    
                      echo $data_pencocokan['nilai'];
                      
                    ?>
                  </td>
                <?php endforeach ?>
              </tr>
             
            <?php endforeach ?>
          </tbody>
        </table>

      <table class="table table-hover table-bordered" hidden="">
          <thead>
          <tr>
              <th>Alternatif</th>
              <?php foreach ($kriteria as $key): ?>
                <th>C<?= $key->id_kriteria ?></th>
              <?php endforeach ?>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($alternatif2 as $keys): ?>
          <tr>
                <td><?= $keys->nama ?></td>
                <?php foreach ($kriteria2 as $key): ?>
                  <td>
                    <?php 
                      $data_pencocokan = $this->perhitungan_model2->data_nilai($keys->id_pelamar,$key->id_kriteria);
                    
                      $pembagi=$this->perhitungan_model2->nilai_pembagi($key->id_kriteria);
                      
                      $normalisasi=round($data_pencocokan['nilai']/$pembagi['pembagi'],3);
                        echo $normalisasi;
                      
                    ?>
                  </td>
                <?php endforeach ?>

               
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      <table class="table table-hover table-bordered" hidden="">
          <thead>
          <tr>
              <th>Alternatif</th>
              <th>max(C1+C2+C3+C4+C5+C6+C7)</th>
              <th>Yi = max - min</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($alternatif2 as $keys): ?>
          <tr>
                <td><?= $keys->nama  ?> 
                <?php 
                $max=0;
                $min=0;
                foreach ($kriteria2 as $key): ?>
                  
                    <?php 
                    $data_pencocokan = $this->perhitungan_model2->data_nilai($keys->id_pelamar,$key->id_kriteria);
                    $pembagi=$this->perhitungan_model2->nilai_pembagi($key->id_kriteria);
                    $pembobotan=$this->perhitungan_model2->pembobotan($key->id_kriteria);

                      if($pembobotan['tipe']==='Benefit'){
                          
                          $max += round($data_pencocokan['nilai']/$pembagi['pembagi']*$pembobotan['bobot'],4);
                          
                        // $max[]=$key->id_kriteria;
                      }else{
                         
                          $min += round($data_pencocokan['nilai']/$pembagi['pembagi']*$pembobotan['bobot'],4);
                        // $min[]=$key->id_kriteria;
                      }
                    
                      $yi=$max-$min;
                      
                      //echo var_dump($min);
                    ?>
                    
                    <?php endforeach ;?>
                      <?php $optimasi2[]=$yi; 
                      $optim[]=$yi;
                      $id[]=$keys->id_pelamar;
                            
                      ?>
                   <td><?php echo $max ?></td>
                    <td><?php echo $yi ?></td>
                
                    
               
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
        <hr>
      <h2>Rangking Kepala Administrasi </h2>
      <table class="table table-hover table-bordered">
        <tr>
          <td>Ranking</td>
          <td>Alternatif</td>
          <td>Optimasi</td>
        </tr>
              <?php
              
              $a=1;for($i=0; $i<5; $i++) { 
                //perankingan
                rsort($optimasi2);
                $id_optimasi = array_search($optimasi2[$i], $optim);
                $id_pelamar = $id[$id_optimasi];
                $alternatif = $this->perhitungan_model2->hasil($id_pelamar);
                //mencari alternatif terpilih
                $optimasi_tertinggi=max($optimasi2);
                $id_optimasi2 = array_search($optimasi_tertinggi, $optim);
                $id_pelamar2 = $id[$id_optimasi2];
                $alternatif_terpilih=$this->perhitungan_model2->hasil($id_pelamar2);
         
                ?>
        <tr>
          <td><?php echo $a; ?></td>
          <td><?php echo  $alternatif['nama'] ?></td>
          <td><?php echo $optimasi2[$i]; ?></td>
        </tr>
        <?php  $a++; } ?>
      </table>

      <hr>
      <h2>Perhitungan Point Borda </h2>
      <table class="table table-hover table-bordered">
        <tr>
          <td>Ranking</td>
          <td>Alternatif</td>
          <td>Optimasi</td>
          <td>Point borda</td>
          <td>Hasil</td>
        </tr>
              <?php
              
              $a=1;
              $b=6;
              for($i=0; $i<5; $i++) { 
                //perankingan
                rsort($optimasi2);
                $id_optimasi = array_search($optimasi2[$i], $optim);
                $id_pelamar = $id[$id_optimasi];
                $alternatif = $this->perhitungan_model->hasil($id_pelamar);
                //mencari alternatif terpilih
                $optimasi_tertinggi=max($optimasi2);
                $id_optimasi2 = array_search($optimasi_tertinggi, $optim);
                $id_pelamar2 = $id[$id_optimasi2];
                $alternatif_terpilih=$this->perhitungan_model->hasil($id_pelamar2);
                if ($a>$i) {
                  # code...
                  $b--;
                }
                $total2 = $optimasi2[$i] * $b;
                ?>
              
        <tr>
          <td><?php echo $a; ?></td>
          <td><?php echo  $alternatif['nama'] ?></td>
          <td><?php echo $optimasi2[$i]; ?></td>
          <td><?php echo $b; ?></td>
          <td><?php echo $total2; ?></td>
        </tr>
        <?php  $a++; } ?>
      </table>

      <hr>
      <h2>Ranking </h2>
      <table class="table table-hover table-bordered">
        <tr>
          <td>Ranking</td>
          <td>Alternatif</td>
          <td>Rangking HRD</td>
          <td>Alternatif</td>
          <td>Rangking Kepala Administrasi</td>
        </tr>
              <?php
              $hasil_dds = array();
              $a=1;
              $b=6;
              for($i=0; $i<5; $i++) { 
                //perankingan
                ksort($optimasi);
                $id_optimasi = array_search($optimasi[$i], $optim);
                $id_pelamar = $id[$id_optimasi];
                $alternatif = $this->perhitungan_model->hasil($id_pelamar);
                //rangking2
                ksort($optimasi2);
                $id_optimasi2 = array_search($optimasi2[$i], $optim);
                $id_pelamar2 = $id[$id_optimasi];
                $alternatif2 = $this->perhitungan_model->hasil($id_pelamar);
                //rangking3
                
                //mencari alternatif terpilih
                $optimasi_tertinggi=max($optimasi);
                $id_optimasi3 = array_search($optimasi_tertinggi, $optim);
                $id_pelamar3 = $id[$id_optimasi2];
                $alternatif_terpilih=$this->perhitungan_model->hasil($id_pelamar3);
                if ($a>$i) {
                  # code...
                  $b--;
                }
                $total = $optimasi[$i] * $b;
                $total2 = $optimasi2[$i] * $b;

                $end = $total + $total2;
                ?>
              <?php 
                array_push($hasil_dds, array('nama'=>$alternatif['nama'], 'nilai'=>$total));
                array_push($hasil_dds, array('nama'=>$alternatif_terpilih['nama'], 'nilai'=>$total2));
              ?>
        <tr>
          <td><?php echo $a; ?></td>
          <td><?php echo $alternatif['nama'] ?></td>
          <td><?php echo $total; ?></td>
          <td><?php echo $alternatif_terpilih['nama'] ?></td>
          <td><?php echo $total2; ?></td>
        </tr>
        <?php  $a++; } ?>
      </table>
      
      <hr>
      <table class="table table-hover table-bordered">
          <tr>
          <td>Nama</td>
          <td>Nilai</td>
          </tr>  
          <tr>
        <?php $total_dds = array();
          foreach($hasil_dds as $row){
            $total_dds[$row['nama']] = 0;
          }?>
        <?php foreach($hasil_dds as $row){
            $nilai = (float)$row['nilai'];
            $total_dds[$row['nama']] += $nilai;
          }
          ?>
          </tr>    
        <!-- <?php print_r($total_dds)?> -->
        
        <?php 
        arsort($total_dds);
        foreach ($total_dds as $key => $value): ?>
                  <?php echo 
                    '<tr>
                      <td>'.$key.'</td>
                      <td>'.$value.'</td>
                    </tr>'
                   ?>
                <?php endforeach ?>        
      </table>
    </div>
  </div>
  </div>
</div><!-- /.container -->

<!-- ISI TTP -->

        

<script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );    
        </script>