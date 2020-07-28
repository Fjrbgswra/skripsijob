<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title ">Tambah Pelamar Kerja</h4>
            <p class="card-category"> Menambah Pelamar kerja untuk perhitungan moora</p>
          </div>
          <div class="card-body">
            <form action="<?php base_url('index.php/Alternatif/create') ?>" method="post" enctype="multipart/form-data">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="nama_kriteria">Nama Pelamar</label>
                </div>
                <input class="form-control" placeholder="Masukkan Nama Pelamar" name="nama_alternatif"  type="text" value="" >
                <span class="text-danger"><font color='red'><?php echo form_error('nama_kriteria'); ?></font></span>
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
