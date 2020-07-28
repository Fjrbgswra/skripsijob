<div class="content">
      <div class="container-fluid">
          <div class="row">
          <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-rose">
                  <div class="row">
                    <div class="col-md-10">
                  <h4 class="card-title ">Kriteria</h4>
                  <p class="card-category">Table Kriteria</p>
                  </div>
                  <div class="col-xs-2">
                    <a href="<?= base_url('index.php/Kriteria2/create')?>" rel="tooltip" title="Tambah Data" class="btn btn-secondary">
                      <i class="material-icons">add_box</i>
                    </a>
                  </div>
                </div>
              </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover" id="example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kriteria</th>
                                        <th>Tipe</th>
                                        <th>Bobot</th>
                                       
                                        <th width="10%"><center>Action</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i=1;
                                 foreach ($kriteria_object as $key) { ?>
                                
                                    <tr>
                                        <td><?php echo $i++?></td>
                                        <td><?php echo $key->nama_kriteria ?></td>
                                        <td><?php echo $key->tipe ?></td>
                                        <td><?php echo $key->bobot ?></td>
                                        <td>
                                         <div class="btn-group">
                                            <a href="<?php echo site_url('Kriteria2/update/').$key->id_kriteria ?>" class="btn btn-info"><i class="fa fa-check-square" style="font-size:30px"></i></a>
                                            <a href="<?php echo site_url('Kriteria2/delete/').$key->id_kriteria ?>" class="btn btn-danger" onClick="return confirm('Apakah Anda Yakin?')"><i class="fa fa-trash" style="font-size:30px"></i></a>   
                                         </div>
                                        </td>
                                    </tr>
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