<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    PT. Andalan Bisturi Pratama
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?= base_url('/assets/admin/css/material-dashboard.css?v=2.1.1') ?>" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?= base_url('/assets/admin/demo/demo.css') ?>" rel="stylesheet" />
  <!-- File Icons -->
  <link rel="icon" type="img/png" href="<?= base_url('/assets/admin/img/logo-potrait.png') ?>">
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange" data-background-color="white" data-image="<?= base_url('/assets/admin/img/sidebar-1.jpg') ?>">
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          ADMIN
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('index.php/Admin/Dashboard') ?>">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('index.php/Admin/Alternatif') ?>">
              <i class="material-icons">people</i>
              <p>Pelamar Kerja</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('index.php/Admin/Administrator') ?>">
              <i class="material-icons">assignment_ind</i>
              <p>Administrator</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('index.php/Admin/Divisi') ?>">
              <i class="material-icons">group_work</i>
              <p>Divisi</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('index.php/Admin/Portofolio') ?>">
              <i class="material-icons">content_paste</i>
              <p>Produk</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('index.php/Admin/Posisi') ?>">
              <i class="material-icons">toc</i>
              <p>Posisi</p>
            </a>
          </li>
          <div class="dropdown">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
              HRD Perusahaan &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            </button>
            <div class="dropdown-menu">
              <div class="dropdown-header">HRD Perusahaan</div>
              <a class="dropdown-item" href="<?= base_url('index.php/Kriteria') ?>">Kriteria HRD Perusahaan</a>
              <a class="dropdown-item" href="<?= base_url('index.php/Nilai') ?>">Nilai Pelamar</a>
              <a class="dropdown-item" href="<?= base_url('index.php/Perhitungan') ?>">Rangking</a>
            </div>
          </div>  
          <div class="dropdown">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
              Kepala Administrasi
            </button>
            <div class="dropdown-menu">
              <div class="dropdown-header">kepala administrasi</div>
              <a class="dropdown-item" href="<?= base_url('index.php/Kriteria2') ?>">Kriteria Kepala Administrasi</a>
              <a class="dropdown-item" href="<?= base_url('index.php/Nilai2') ?>">Nilai Pelamar</a>
              <a class="dropdown-item" href="<?= base_url('index.php/Perhitungan2') ?>">Rangking</a>
            </div>
          </div>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('index.php/Borda') ?>">
              <i class="material-icons">show_chart</i>
              <p>Borda</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('index.php/Login/logout') ?>">
              <i class="material-icons">assignment_return</i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">Produk</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
          </div>
        </div>
      </nav>
