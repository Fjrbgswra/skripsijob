<?php $c_name = "Alternatif" ?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
          <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-rose">
                  <div class="row">
                    <div class="col-md-10">
                  <h4 class="card-title ">Pelamar Kerja</h4>
                  <p class="card-category">List Pelamar Kerja</p>
                  </div>
                  <div class="col-xs-2">
                    <a href="<?= base_url('index.php/Admin/Alternatif/insert')?>" rel="tooltip" title="Tambah Data" class="btn btn-secondary">
                      <i class="material-icons">add_box</i>
                    </a>
                  </div>
                </div>
              </div>
                <div class="card-body">
                    <table class="table" id="tes">
                    <thead class=" text-rose" >
                      <th>ID.</th>
                      <th>Nama Pelamar</th>
                      <th>Email</th>
                      <th>Pendidikan Terakhir</th>
                      <th>Nama Sekolah/Perguruan tinggi</th>
                      <th>Alamat</th>
                      <th>No. HP</th>
                      <th>Jenis Kelamin</th>
                      <th>Status</th>
                      <th></th>
                    </thead>
                    <tbody>
                      <?php foreach ($data as $key => $value): ?>
                        <tr>
                          <td><?php echo ++$key; ?></td>
                          <td><?php echo $value->nama ?></td>
                          <td><?php echo $value->email ?></td>
                          <td><?php echo $value->pendidikan ?></td>
                          <td><?php echo $value->nama_sekolah ?></td>
                          <td><?php echo $value->alamat ?></td>
                          <td><?php echo $value->no_hp ?></td>
                          <td><?php echo $value->jenis_kelamin ?></td>
                          <td><?php
                            switch($value->status){
                              case 0:
                                echo "<a href='".site_url('Admin/Alternatif/changestatus/'.$value->id_pelamar.'/3')."' class='badge badge-secondary'>Belum Diterima";
                              break;
                              case 1:
                                echo "<a href='".site_url('Admin/Alternatif/changestatus/'.$value->id_pelamar.'/2')."' class='badge badge-primary'>Diterima";
                              break;
                              case 2:
                                echo "<a href='#' class='badge badge-success'>Sudah Keluar";
                                break;
                              case 3:
                                  echo "<a href='#' class='badge badge-warning'>Menunggu Verifikasi Pelamar";
                                  break;
                              break;

                            }
                          ?></td>
                          <td>
                            <a class="btn btn-sm btn-warning" href="<?php echo site_url("Admin/".$c_name."/update/".$value->id_pelamar) ?>"  rel="tooltip" title="Edit"><i class="material-icons">edit</i></a>
                            <a href="<?php echo site_url("Admin/".$c_name."/delete/".$value->id_pelamar) ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-sm btn-danger"  rel="tooltip" title="Hapus"><i class="material-icons">delete</i></a>
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
<script type="text/javascript">
  $(document).ready( function () {
    $('#tes').DataTable();
} );
</script>