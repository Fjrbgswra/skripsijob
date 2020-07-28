<?php $c_name = "Administrator" ?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img" src="<?= base_url('assets/admin/img/faces/marc.jpg') ?>" /></a>
                  </div>
                  <div class="card-body">
                    <h6 class="card-category text-gray">ADMIN</h6>
                    <h4 class="card-title"><?= $this->session->userdata('logged_in')['nama'] ?></h4>
                  <p class="card-description">
                    Admin Can Edit and Rangking
                  </p>
                </div>
              </div>
              <div class="row">
            </div>
          </div>
          <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-rose">
                  <div class="row">
                    <div class="col-md-10">
                  <h4 class="card-title ">Data Administrator</h4>
                  <p class="card-category">List Administrator</p>
                  </div>
                  <div class="col-xs-2">
                    <a href="<?= base_url('index.php/Admin/Administrator/insert')?>" rel="tooltip" title="Tambah Data" class="btn btn-secondary">
                      <i class="material-icons">add_box</i>
                    </a>
                  </div>
                </div>
              </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                    <thead class=" text-rose">
                      <th>ID.</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th></th>
                    </thead>
                    <tbody>
                      <?php foreach ($data as $key => $value): ?>
                        <tr>
                          <td><?php echo ++$key; ?></td>
                          <td><?php echo $value->nama ?></td>
                          <td><?php echo $value->email ?></td>
                          <td><?php echo $value->username ?></td>
                          <td><?php echo $value->password ?></td>
                          <td>
                            <a class="btn btn-sm btn-warning" href="<?php echo site_url("Admin/".$c_name."/update/".$value->id_administrator) ?>"  rel="tooltip" title="Edit"><i class="material-icons">edit</i></a>
                            <a href="<?php echo site_url("Admin/".$c_name."/delete/".$value->id_administrator) ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-sm btn-danger"  rel="tooltip" title="Hapus"><i class="material-icons">delete</i></a>
                          </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
