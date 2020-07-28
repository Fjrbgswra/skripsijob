<div class="content">
  <div class="container-fluid">
    <div class="row"> 
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-success">
            <h4 class="card-title ">Edit Posisi</h4>
            <p class="card-category">Edit Posisi Pekerjaan</p>
          </div>
          <div class="card-body">
            <form action="<?php base_url('index.php/Admin/Posisi/update') ?>" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nama Posisi</label>
                    <select class="custom-select" name="nama_posisi" >
                      <?php foreach ($this->db->get('posisi_kerja')->result_array() as $key => $value): ?>
                      <option value="<?php echo $value['nama_posisi'] ?>"><?php echo $value['nama_posisi'] ?></option>
                      <?php endforeach ?>
                    </select>
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
              <img src="<?php echo base_url('./assets/uploads/posisi/'.$posisi_kerja->gambar.'');?>" height="150px" width="150px">
              <label class="file">
                <input type="file" class="form-control-file" name="gambar">
                <span class="file-custom"></span>
              </label>
              <br>
              <div class="form-group">
                <label class="bmd-label-floating">Keterangan</label>
                <input type="text" id="input-keterangan" name="keterangan" class="form-control" value="<?php echo $posisi_kerja->keterangan ?>">
              </div>
            <div class="form-group">
              <input class="btn btn-success" type="submit" value="Update">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>