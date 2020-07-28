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
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover" cellspacing='0' width='100%'>
                <thead>
                  <tr>
                    <th>Nama Pelamar Kerja</th>                        
                    <th>Kriteria</th>
                    <th>Skor</th>                           
                    <th width="10%"><center>Action</center></th>                     
                  </tr>                        
                </thead>                        
                <tbody>
                  <?php $i=1;
                  foreach ($nilai_object as $key) { ?>
                    <tr>
                      <td><?php echo $key->nama?></td>
                      <td><?php echo $key->nama_kriteria?></td>
                      <td><?php echo $key->nilai?></td>
                      <td>
                        <div class="btn-group">
                         <a href="<?php echo site_url('Nilai2/update/').$key->id_nilai?>" class="btn btn-info"><i class="fa fa-check-square" style="font-size:30px"></i></a>
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