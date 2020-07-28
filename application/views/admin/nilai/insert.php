<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title ">Tambah Nilai</h4>
            <p class="card-category"> Menambah nilai pelamar untuk perhitungan moora</p>
          </div>
          <div class="card-body">
            <form action="<?php base_url('index.php/Nilai/create') ?>" method="post" enctype="multipart/form-data">
              <div class="col-sm-4">
                <div class="form-group">
                  <label >Nama Alternatif</label>
                  <select class="form-control" id="type" name="type" required>
                    <option value="">Pilih Alternatif</option>   
                    <?php foreach ($karyawan as $key) { ?>
                      <option value="<?php echo $key->id_pelamar; ?>"><?php echo $key->nama; ?></option>
                    <?php } ?>                  
                  </select>
                  <span class="text-danger"><font color='red'><?php echo form_error('type', '<div class="Nilai Alternatif sudah ada">', '</div>'); ?></font></span>
                </div>
                <div class="form-group">
                  <label> Usia </label>
                  <input class="form-control" id="new-pass-control" placeholder="Masukkan Usia Pelamar" name="kriteria1"  type="number" step = "1" value="" >
                  <span class="text-danger"><font color='red'><?php echo form_error('kriteria1'); ?></font></span>
                </div>
                <div class="form-group">
                  <label>Nilai Matematika / Bisnis</label>
                  <select class="form-control" name ="kriteria2" id="kriteria2"> 
                    <option value="0"> Pilih Nilai Matematika / Bisnis </option>
                    <option value="4">A</option>
                    <option value="3.5">B+</option>
                    <option value="3">B</option>
                    <option value="2.5">C+</option>
                    <option value="2">C</option>
                    <option value="1">D</option>
                    <option value="0">E</option>
                  </select>
                  <span class="text-danger"><font color='red'><?php echo form_error('kriteria2'); ?></font></span>
                </div>
                <div class="form-group">
                  <label>Nilai Bahasa Inggris</label>
                  <select class="form-control" name ="kriteria3" id="kriteria3"> 
                    <option value="0"> Pilih Nilai Bahasa Inggris </option>
                    <option value="4">A</option>
                    <option value="3.5">B+</option>
                    <option value="3">B</option>
                    <option value="2.5">C+</option>
                    <option value="2">C</option>
                    <option value="1">D</option>
                    <option value="0">E</option>
                  </select>
                  <span class="text-danger"><font color='red'><?php echo form_error('kriteria3'); ?></font></span>
                </div>
                <div class="form-group">
                  <label>Nilai Bahasa Indonesia</label>
                  <select class="form-control" name ="kriteria4" id="kriteria4"> 
                    <option value="0"> Pilih Nilai Bahasa Indonesia </option>
                    <option value="4">A</option>
                    <option value="3.5">B+</option>
                    <option value="3">B</option>
                    <option value="2.5">C+</option>
                    <option value="2">C</option>
                    <option value="1">D</option>
                    <option value="0">E</option>
                  </select>
                  <span class="text-danger"><font color='red'><?php echo form_error('kriteria4'); ?></font></span>
                </div>
                <div class="form-group">
                  <label>Nilai Etika Administrasi / Profesi</label>
                  <select class="form-control" name ="kriteria5" id="kriteria5"> 
                    <option value="0"> Pilih Nilai Etika Administrasi / Profesi </option>
                    <option value="4">A</option>
                    <option value="3.5">B+</option>
                    <option value="3">B</option>
                    <option value="2.5">C+</option>
                    <option value="2">C</option>
                    <option value="1">D</option>
                    <option value="0">E</option>
                  </select>
                  <span class="text-danger"><font color='red'><?php echo form_error('kriteria5'); ?></font></span> 
                </div>
                <div class="form-group">
                  <label>Keahlian Pengopraian Komputer</label>
                  <select class="form-control" name ="kriteria6" id="kriteria6"> 
                    <option value="0"> Pilih keahlian pengoprasian komputer </option>
                    <option value="5">Baik</option>
                    <option value="3">Cukup</option>
                    <option value="1">Kurang</option>
                  </select>
                  <h5><label>Keahlian dalam hal Pengoprasian MS Office, dan Menjalankan Komputer</label></h5>
                  <span class="text-danger"><font color='red'><?php echo form_error('kriteria6'); ?></font></span> 
                </div>
                <div class="form-group">
                  <label>Masukkan Nilai Akhir IPK</label>
                  <input class="form-control" placeholder="Masukkan Nilai Akhir IPK" name="kriteria7"  type="text" step = "1" value="" >
                  <span class="text-danger"><font color='red'><?php echo form_error('kriteria7'); ?></font></span> 
                </div>
                <div class="form-group">
                  <input class="btn btn-info" type="submit" value="Simpan">
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
