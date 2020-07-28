<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title ">Tambah Posisi Pekerjaan</h4>
            <p class="card-category">Menambah Posisi Pekerjaan kedalam daftar dengan informasi yang lengkap</p>
          </div>
          <div class="card-body">
            <form action="<?php base_url('index.php/Admin/Posisi/insert') ?>" method="post" enctype="multipart/form-data">

              <div class="row">
              <div class="col-sm-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Nama Posisi</label>
                        <input type="text" name="nama_posisi" value="" class="form-control">
                    </div>
                  </div>
                </div>
                    <div class="row">
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label for="nama_divisi">Pilih Divisi</label>
                          <select class="custom-select" name="fk_id_divisi"class="form-control">
                            <?php foreach ($this->db->get('divisi_magang')->result_array() as $key => $value): ?>
                              <option value="<?php echo $value['id_divisi'] ?>"><?php echo $value['nama_divisi'] ?></option>
                            <?php endforeach ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-input">
                        <label for="gambar" class="required">Gambar</label>
                        <input type="file" name="gambar" id="gambar" />
                        <?php echo (isset($error) ? $error : "") ?>
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Keterangan Pekerjaan</label>
                        <textarea type="text" id="input-keterangan" name="keterangan" class="form-control" value="<?php echo set_value("keterangan") ?>" rows="3" autocomplete="off"></textarea>
                    </div>
                  <div class="form-group">
                    <input class="btn btn-info" type="submit" value="Simpan">
                  </div>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
