<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-success">
            <h4 class="card-title ">Edit Administrator</h4>
            <p class="card-category">Edit Data Administrator</p>
          </div>
          <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="bmd-label-floating">Nama</label>
                        <input type="text" id="input-nama" name="nama" class="form-control" value="<?php echo $administrator->nama ?>" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Email</label>
                        <input type="email" id="input-email" name="email" class="form-control" value="<?php echo $administrator->email ?>" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Username</label>
                        <input type="text" id="input-username" name="username" class="form-control" value="<?php echo $administrator->username ?>" autocomplete="off">
                    </div>
                    <div class="form-group">
                            <label class="bmd-label-floating">Password</label>
                            <input type="password" id="input-password" name="password" class="form-control" value="<?php echo $administrator->password ?>" autocomplete="off">
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
