<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title ">Tambah Produk</h4>
            <p class="card-category"> Menambah produk kedalam daftar dengan informasi yang lengkap</p>
          </div>
          <div class="card-body">
            <form action="<?php base_url('index.php/Admin/Divisi/insert') ?>" method="post" enctype="multipart/form-data">
           
                <div class="col-sm-3">
                  <div class="form-group">
                    <label for="nama_divisi">Judul Produk</label>
                    <input type="text" class="form-control" name="judul">
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <label for="gambar">Gambar Produk</label>
                  </div>
                  <label class="file">
                    <input type="file" class="form-control-file" name="gambar">
                    <span class="file-custom"></span>
                    <?php echo (isset($error) ? $error : '')?>
                  </label>
                </div>
                <div class="col-sm-10">
                  <div class="form-group">
                    <label for="deskripsi">Deskripsi Produk</label>
                    <textarea class="form-control" name="deskripsi"></textarea>
                  </div>
                </div>
              </div>
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
