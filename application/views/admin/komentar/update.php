<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-success">
            <h4 class="card-title ">Edit Komentar</h4>
            <p class="card-category">Komentar dan Masukan dari User</p>
          </div>
          <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="bmd-label-floating">Nama</label>
                        <input type="text" id="input-nama" name="nama" class="form-control" value="<?php echo $komentar->nama ?>">
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Email</label>
                        <input type="email" id="input-email" name="email" class="form-control" value="<?php echo $komentar->email ?>">
                    </div>
                    <div class="form-group">
                            <label class="bmd-label-floating">Keterangan</label>
                            <input type="text" id="input-keterangan" name="keterangan" class="form-control" value="<?php echo $komentar->keterangan ?>">
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
