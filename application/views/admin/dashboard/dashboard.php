    <!-- End Navbar -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">person</i>
                </div>
                <p class="card-category">Pelamar</p>
                <h3 class="card-title"><?= $this->db->get('pelamar')->num_rows() ?>
              </h3>
            </div>
            <div class="card-footer">
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">account_balance</i>
              </div>
              <p class="card-category">Divisi</p>
              <h3 class="card-title"><?= $this->db->get('divisi_magang')->num_rows() ?></h3>
            </div>
            <div class="card-footer">
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">verified_user</i>
              </div>
              <p class="card-category">Administrator</p>
              <h3 class="card-title"><?= $this->db->get('administrator')->num_rows() ?></h3>
            </div>
            <div class="card-footer">
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card card-profile">
            <div class="card-body">
              <h6 class="card-category text-gray">ADMIN</h6>
              <h4 class="card-title"><?= $this->session->userdata('logged_in')['nama'] ?></h4>
              <p class="card-description">
                Admin dapat mengkonfirmasi dan me Ranking Pelamar Kerja
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
