<?php $c_name = "Komentar" ?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">
              <div class="row">
                <div class="card card-profile">
                  <a href="<?php echo base_url('Barang/create')?>">
                    <div class="card-header card-header-info">
                      <h4 class="card-title">Komentar</h4>
                    </div>
                  </a>
                  <div class="card-body">
                    <h6 class="card-category text-gray">Komentar dan Masukan</h6>
                    <p class="card-description">
                      Menampung semua komentar dan saran yang diajukan ketika menggunakan aplikasi ini
                    </p>
                    <!-- <?php echo anchor('Barang/create', 'Tambah', array('class' => 'btn btn-info btn-round')); ?> -->
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="card">
                <div class="card-header card-header-rose">
                  <div class="row">
                    <div class="col-md-10">
                  <h4 class="card-title ">Komentar dan Masukan</h4>
                  <p class="card-category"> Menampung semua komentar dan saran yang diajukan ketika menggunakan aplikasi ini</p>
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
                        <th>Keterangan</th>
                        <th></th>
                      </thead>
                      <tbody>
                        <?php foreach ($data as $key => $value): ?>
                          <tr>
                            <td><?php echo ++$key; ?></td>
                            <td><?php echo $value->nama ?></td>
                            <td><?php echo $value->email ?></td>
                            <td><?php echo $value->keterangan ?></td>
                            <td>
                              <a class="btn btn-sm btn-success" href="#" rel="tooltip" title="Detail"><i class="material-icons">zoom_out_map</i></a>
                              <a class="btn btn-sm btn-warning" href="<?php echo site_url("Admin/".$c_name."/update/".$value->id_komentar) ?>"  rel="tooltip" title="Edit"><i class="material-icons">edit</i></a>
                              <a href="<?php echo site_url("Admin/".$c_name."/delete/".$value->id_komentar) ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-sm btn-danger"  rel="tooltip" title="Hapus"><i class="material-icons">delete</i></a>
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
