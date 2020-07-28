<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-rose">
            <div class="row">
              <div class="col-md-10">
                <h4 class="card-title ">Nilai</h4>
                <p class="card-category">Table nilai</p>
              </div>
              <div class="col-xs-2">
                <a href="<?= base_url('index.php/Nilai2/create')?>" rel="tooltip" title="Tambah Data" class="btn btn-secondary">
                  <i class="material-icons">add_box</i>
                </a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover" cellspacing='0' width='100%'>
                <thead>
                  <tr>
                    <th>Nama Pelamar</th>                        
                    <th>Detail</th>                        
                  </tr>                        
                </thead>                        
                <tbody>
                  <?php if(!empty($nilai_object)){ $i=1;
                    foreach ($nilai_object as $key) { ?>
                      <tr>
                        <td>
                          <?php foreach ($alternatif as $k)
                          {
                            if($k->id_pelamar == $key->id_pelamar)
                              {?>

                                <?php echo $k->nama;
                              }
                            }
                            ?>
                          </td>
                          <td>
                           <div class="btn-group">
                             <a href="<?php echo site_url('Nilai2/detail/').$key->id_pelamar ?>" class="btn btn-info"><i class="fa fa-check-square" style="font-size:30px"></i></a>  
                             <a href="<?php echo site_url('Nilai2/delete_alternatif/').$key->id_pelamar ?>" class="btn btn-danger"><i class="fa fa-trash" style="font-size:30px"></i></a>                             
                           </div>                             

                         </td>                                                                  

                       </tr>
                     <?php }}else{ ?>
                      <tr>
                        <td colspan="1">Data Tidak Ada</td>
                        <td>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#example').DataTable();
      } );    
    </script>