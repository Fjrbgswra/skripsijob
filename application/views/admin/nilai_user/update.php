<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title ">Update Pelamar Kerja</h4>
            <p class="card-category"> Update Pelamar Kerja untuk perhitungan moora</p>
          </div>
          <div class="card-body">
            <form action="<?php base_url('index.php/Nilai/update') ?>" method="post" enctype="multipart/form-data">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="nilai">Nilai</label>
                </div>
                <input class="form-control" placeholder="Masukkan Nama Pelamar Kerja" name="nilai"  type="text" value="<?php echo $nilai[0]->nilai ?>" >
                <span class="text-danger"><font color='red'><?php echo form_error('nilai'); ?></font></span>
              </div>
          </div>
          <div class="form-group">
            <input class="btn btn-info" type="submit" value="Simpan" >
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
