<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title ">Tambah Pelamar</h4>
            <p class="card-category">Menambah Pelamar kedalam daftar dengan informasi yang lengkap</p>
          </div>
          <div class="card-body">
            <form action="<?php base_url('index.php/Admin/Alternatif/update') ?>" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-sm-8">
                  <div class="form-group">
                    <label for="nama" class="bmd-label-floating">Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?php echo $pelamar->nama ?>" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="email" class="bmd-label-floating">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $pelamar->email ?>" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="pendidikan" class="bmd-label-floating">Pendidikan</label>
                    <input type="text" name="pendidikan" class="form-control" value="<?php echo $pelamar->pendidikan ?>" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="nama_sekolah" class="bmd-label-floating">Nama Sekolah</label>
                    <input type="text" name="nama_sekolah" class="form-control" value="<?php echo $pelamar->nama_sekolah ?>" required>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="custom-select" name="jenis_kelamin" required>
                      <option selected value="<?php echo $pelamar->jenis_kelamin?>"><?php echo $pelamar->jenis_kelamin ?></option>
                      <option>Laki - Laki</option>
                      <option>Perempuan</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-8">
                  <div class="form-group">
                    <label for="alamat" class="bmd-label-floating">Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="<?php echo $pelamar->alamat ?>" required>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="no_hp" class="bmd-label-floating">No HP</label>
                    <input type="number" name="no_hp" class="form-control" value="<?php echo $pelamar->no_hp ?>" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" name=tanggal_lahir class="form-control" value="<?php echo $pelamar->tanggal_lahir ?>" autofocus required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="username" class="bmd-label-floating">Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $pelamar->username ?>" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="password" class="bmd-label-floating">Password</label>
                    <input type="text" name="password" class="form-control" value="<?php echo $pelamar->password ?>" required>
                  </div>
                </div>
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