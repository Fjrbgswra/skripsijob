<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-success">
            <h4 class="card-title ">Tambah Administrator</h4>
            <p class="card-category">Tambah Data Administrator</p>
          </div>
          <div class="card-body">
            <form action="<?php base_url('index.php/Admin/Administrator/insert') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="bmd-label-floating">Nama</label>
                        <input type="text" id="input-nama" name="nama" class="form-control" value="<?php echo set_value("nama") ?>" required>
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Email</label>
                        <input type="email" id="input-email" name="email" class="form-control" value="<?php echo set_value("email") ?>" required>
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Username</label>
                        <input type="text" id="input-username" name="username" class="form-control" value="<?php echo set_value("username") ?>" required>
                    </div>
                    <div class="form-group">
                            <label class="bmd-label-floating">Password</label>
                            <input type="password" id="input-password" name="password" class="form-control" value="<?php echo set_value("password") ?>" required>
                    </div>
                    <div class="form-group" >
                            <label class="bmd-label-floating">Status</label>
                            <input type="fk_id_level" id="input-fk_id_level" name="fk_id_level" class="form-control" value="1" required readonly="">
                    </div>
                  <div class="form-group">
                    <input class="btn btn-success" type="submit" value="Simpan">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
