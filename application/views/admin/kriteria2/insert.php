<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title ">Tambah Kriteria</h4>
            <p class="card-category"> Menambah Kriteria untuk perhitungan moora</p>
          </div>
          <div class="card-body">
            <form action="<?php base_url('index.php/Kriteria2/create') ?>" method="post" enctype="multipart/form-data">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="nama_kriteria">Nama Kriteria</label>
                </div>
                <input class="form-control" placeholder="Masukkan Nama Kriteria" name="nama_kriteria"  type="text" value="" >
                <span class="text-danger"><font color='red'><?php echo form_error('nama_kriteria'); ?></font></span>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="tipe">Tipe</label>
                  <select class="custom-select" name="tipe" required>
                    <option value="0">Pilih Tipe</option>
                              <option value="Benefit">Benefit</option>
                              <option value="Cost">Cost</option>
                    <?php echo set_value('tipe') ?>
                  </select>
                </div>
              </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="bobot">Bobot</label>
              </div>
              <input class="form-control" placeholder="Masukkan Bobot" name="bobot"  type="text" value="" >
              <span class="text-danger"><font color='red'><?php echo form_error('bobot'); ?></font></span>
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
