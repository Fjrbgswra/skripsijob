<?php $c_name = "Divisi" ?>
<!-- End Navbar -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-rose">
            <div class="row">
              <div class="col-md-10">
                <h4 class="card-title ">Divisi Pekerjaan</h4>
                <p class="card-category">Table Divisi</p>
              </div>
              <div class="col-xs-2">
                <a href="<?= base_url('index.php/Admin/Divisi/insert') ?>" rel="tooltip" title="Tambah Data" class="btn btn-secondary">
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
                  <th>Nama Divisi</th>
                  <th>Gambar</th>
                  <th>Keterangan</th>
                  <th></th>
                </thead>
                <tbody>
                  <?php foreach ($data as $key => $value): ?>
                    <tr>
                      <td><?php echo ++$key; ?></td>
                      <td><?php echo $value->nama_divisi ?></td>
                      <td><img src="<?php echo base_url('assets/uploads/divisi/'.$value->gambar) ?>" alt="" width="100px"></td>
                      <td><?php echo $value->keterangan ?></td>
                      <td>
                        <a class="btn btn-sm btn-warning" href="<?php echo site_url("Admin/".$c_name."/update/".$value->id_divisi) ?>"  rel="tooltip" title="Edit"><i class="material-icons">edit</i></a>
                        <a href="<?php echo site_url("Admin/".$c_name."/delete/".$value->id_divisi) ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-sm btn-danger"  rel="tooltip" title="Hapus"><i class="material-icons">delete</i></a>
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
