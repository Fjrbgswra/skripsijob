<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>PT. Andalan Bisturi Pratama</title>
  <!-- Bootstrap core CSS -->
  <link href="<?= base_url('/assets/user/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <!-- Custom fonts for this template -->
  <link href="<?= base_url('/assets/user/vendor/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
  <!-- Custom styles for this template -->
  <link href="<?= base_url('/assets/user/css/agency.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('/assets/user/css/agency.css') ?>" rel="stylesheet">
  <link rel="icon" type="img/png" href="<?= base_url('/assets/user/img/logo-potrait.png') ?>">
</head>
<body id="page-top">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">PT Andalan Bisturi Pratama</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fa fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#portfolio">Produk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#position">Position</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
          </li>
          <li class="nav-item">
            <?php if ($this->session->userdata('logged_in_user') != null): ?>
              <a class="nav-link js-scroll-trigger" href="<?= base_url('index.php/Login/logout') ?>"><?php echo $this->session->userdata('logged_in_user')['nama'] ?> Logout</a>
              <?php else: ?>
                <a class="nav-link js-scroll-trigger" href="<?= base_url('index.php/Login') ?>">Login</a>
              <?php endif ?>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <?php if ($this->session->userdata('logged_in_user') != null): ?>
            <h3 class="section-subheading text-primary mb-5" style="font-family: ">Welcome, <?php echo $this->session->userdata('logged_in_user')['nama'] ?></h3><br>
          <?php endif ?>
          <?php if ($this->session->userdata('logged_in_user') != null): ?>
            <?php if($this->session->userdata('logged_in_user')['status'] == 0): ?>
              <a class="btn btn-secondary btn-xl text-uppercase js-scroll-trigger" href="#">Tunggu Konfirmasi</a>
              <?php else: ?>
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="<?php echo site_url('Home/siswa_magang') ?>">List Siswa Magang</a>
              <?php endif ?>
              <?php else: ?>
              <?php endif ?>
            </div>
            <div>
              <a href="#position"><i><marquee>LOOKING POSITION FOR JOB CLICK HERE !!</marquee></i></a>
            </div>
          </div>
        </header>
        <!-- Portfolio Projek -->
        <section class="bg-light" id="portfolio">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Produk</h2>
                <h3 class="section-subheading text-muted">Produk-produk kami</h3>
              </div>
            </div>
            <div class="row">
              <?php foreach($this->db->get('portofolio')->result() as $key => $value): ?>
              <div class="col-md-4 col-sm-6 portfolio-item">
                <a class="portfolio-link" data-toggle="modal" href="#portofolio<?php echo $value->id ?>">
                  <img class="img-fluid" src="<?= base_url('assets/uploads/portofolio/'.$value->gambar) ?>" alt="">
                </a>
                <div class="portfolio-caption">
                  <h4><?php echo $value->judul ?></h4>
                </div>
              </div>
            <?php endforeach ?>
          </div>
        </div>
      </section>

      <?php foreach ($this->db->get('portofolio')->result() as $key => $value): ?>
      <div class="portfolio-modal modal fade" id="portofolio<?php echo $value->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
              <div class="lr">
                <div class="rl"></div>
              </div>
            </div>
            <div class="container">
              <div class="row">
                <div class="col-lg-8 mx-auto">
                  <div class="modal-body">
                    <!-- Project Details Go Here -->
                    <h2 class="text-uppercase"><?php echo $value->judul ?></h2>
                    <img class="img-fluid d-block mx-auto" src="<?= base_url('/assets/uploads/portofolio/'.$value->gambar)?>" alt="">
                    <center><p style="word-wrap: break-word;"></p></center>
                    <?php echo str_replace("-","<br>-", $value->deskripsi); ?>
                  </p>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                  Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  <!-- About -->
  <section id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">About</h2>
          <h3 class="section-subheading text-muted">Tentang Perusahaan</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <ul class="timeline">
            <li>
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="<?= base_url('/assets/user/img/about/1.jpg') ?>" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <!-- <h4>2009-2011</h4> -->
                  <h4 class="subheading">PT. Andalan Bisutri Pratama</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">Kami adalah perusahaan yang bergerak dalam bidang distributor alat kesehatan khususnya implant dan instrument Orthopedic. Menjalankan bisnis sejak tahun 2011 sebagai badan hukum CV, pada tahun 2017 perusahaan ini telah meningkatkan kapasitas badan hukumnya menjadi PT (Perseroan Terbatas). PT. Andalan Bisturi Pratama telah bekerja sama dengan beberapa Rumah Sakit dan dokter. Dengan komitmen memberikan pelayanan prima terhadap kebutuhan profesional dunia medis serta sangat peduli terhadap kepuasan pelanggan.Kami berupaya untuk menjadi pilihan utama penyedia alat  kesehatan yang berkualitas terbaik dengan harga yang kompetitif.</p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="<?= base_url('/assets/user/img/about/2.jpg') ?>" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>VISI KAMI</h4>
                  <!-- <h4 class="subheading">An Agency is Born</h4> -->
                </div>
                <div class="timeline-body">
                  <p class="text-muted">Menjadi  perusahaan alat kesehatan yang selalu bertumbuh, terpercaya, dan memberikan solusi dengan hati.
                  </p>
                </div>
              </div>
            </li>
            <li>
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="<?= base_url('/assets/user/img/about/3.jpg') ?>" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>MISI KAMI</h4>
                  <!-- <h4 class="subheading">Transition to Full Service</h4> -->
                </div>
                <div class="timeline-body">
                  <p class="text-muted">Misi kami adalah memastikan bahwa perusahaan selalu dalam keadaan progresif, dan pelayanan kepada para konsumen berjalan sesuai dengan kualitas yang tinggi melalui sistem manajemen yang efektif dan inovatif. Secara konsisten kami mengevaluasi kinerja setiap bagian dari anggota perseroan dan berkontribusi di bidang sosial, selain juga menetapkan praktik perilaku yang ramah diseluruh proses operasional.</p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <h4>Be Part
                  <br>Of Our
                  <br>Story!</h4>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- Position -->
    <section class="bg-light" id="position">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Position</h2>
            <h3 class="section-subheading text-muted">Position Recruitmen</h3>
          </div>
        </div>
        <div class="row">
          <?php foreach ($this->db->get('posisi_kerja')->result() as $key => $value): ?>
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#posisi<?php echo $value->id_posisi ?>">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                </div>
              </div>
              <img class="img-fluid" src="<?= base_url('/assets/uploads/posisi/'.$value->gambar) ?>" alt="">
            </a>
            <div class="portfolio-caption">
              <h4><?php echo $value->nama_posisi ?></h4>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <!-- Contact -->
  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Contact Us</h2>
          <h3 class="section-subheading text-muted">Office :
            Jl. Patimura No.3, RW.02, Klojen, Kec. Klojen, Kota Malang, Jawa Timur 65111 <br>
            Contact :
          +62 274 452155</h3>
        </div>
      </div>

    </form>
  </div>
</div>
</div>
</section>
<!-- Footer -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
      </div>
      <div class="col-md-4">
        <ul class="list-inline social-buttons">
          <li class="list-inline-item">
            <a href="https://twitter.com/erasistemdigita?lang=en">
              <i class="fa fa-twitter"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="https://www.facebook.com/pages/PT-Era-Sistem-Digital/1864389653640290">
              <i class="fa fa-facebook"></i>
            </a>
          </li>
        </li>
      </ul>
    </div>
    <li class="list-inline-item">
    </li>
    <li class="list-inline-item">
    </li>
  </ul>
</div>
</div>
</div>
</footer>
<!-- Portfolio Projek -->
<!-- Modal 1 -->
<?php foreach ($this->db->get('posisi_kerja')->result() as $key => $value): ?>
<div class="portfolio-modal modal fade" id="posisi<?php echo $value->id_posisi ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="close-modal" data-dismiss="modal">
        <div class="lr">
          <div class="rl"></div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <div class="modal-body">
              <!-- Project Details Go Here -->
              <h2 class="text-uppercase"><?php echo $value->nama_posisi ?></h2>
              <img class="img-fluid d-block mx-auto" src="<?= base_url('/assets/uploads/posisi/'.$value->gambar)?>" alt="">
              <center><p style="word-wrap: break-word;"></p></center>
              <?php echo str_replace("-","<br>-", $value->keterangan); ?>
            </p>
            <button class="btn btn-primary" data-dismiss="modal" type="button">
              <i class="fa fa-times"></i>
            Closet</button>
            <?php if ($this->session->userdata('logged_in_user') == null): ?>
              <a class="btn btn-success" href="<?php echo base_url('index.php/Register/index/'.$value->id_posisi); ?>">
                <i class="fa fa-times"></i>
              Register</a>
            <?php endif ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php endforeach; ?>
<!-- Bootstrap core JavaScript -->
<script src="<?= base_url('/assets/user/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('/assets/user/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- Plugin JavaScript -->
<script src="<?= base_url('/assets/user/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
<!-- Contact form JavaScript -->
<script src="<?= base_url('/assets/user/js/jqBootstrapValidation.js')?>"></script>
<script src="<?= base_url('/assets/user/js/contact_me.js')?>"></script>
<!-- Custom scripts for this template -->
<script src="<?= base_url('/assets/user/js/agency.min.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<?php if ($this->session->flashdata('message') != ""): ?>
  <script>
    Swal.fire(
      'Pesan',
      '<?php echo $this->session->flashdata('message'); ?>',
      'success'
      )
    </script>
  <?php endif ?>
</body>
</html>
