<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title ">Tambah Divisi</h4>
            <p class="card-category"> Menambah Divisi kedalam daftar dengan informasi yang lengkap</p>
          </div>
          <div class="card-body">
            <form action="<?php base_url('index.php/Admin/Divisi/insert') ?>" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-sm-3">
                  <div class="form-group">
                    <label for="nama_divisi">Nama Divisi</label>
                    <input class="form-control" placeholder="Masukkan Nama Divisi" name="nama_divisi"  type="text" value="" >
                    <span class="text-danger"><font color='red'><?php echo form_error('nama_divisi'); ?></font></span>
                  </div>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <label for="gambar">Gambar</label>
                </div>
                <label class="file">
                  <input type="file" class="form-control-file" name="gambar">
                  <span class="file-custom"></span>
                </label>
              </div>
              <div class="form-group">
                <label class="bmd-label-floating">Keterangan Divisi</label>
                <textarea type="text" id="keterangan" name="keterangan" class="form-control" value="<?php echo set_value('keterangan') ?>"  cols="10" rows="3" ></textarea>
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
