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
                      <tr>
                        <td>

                          </td>
                          <td>
                           <div class="btn-group">
                             <a href="<?php echo site_url('Nilai/detail/').$key->id_pelamar ?>" class="btn btn-info"><i class="fa fa-check-square" style="font-size:30px"></i></a>  
                             <a href="<?php echo site_url('Nilai/delete_alternatif/').$key->id_pelamar ?>" class="btn btn-danger"><i class="fa fa-trash" style="font-size:30px"></i></a>                             
                           </div>                             

                         </td>                                                                  

                       </tr>
                      <tr>
                        <td colspan="1">Data Tidak Ada</td>
                        <td>

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