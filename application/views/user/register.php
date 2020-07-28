<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PT Andalan Bisturi </title>
  <link rel="icon" type="img/png" href="<?= base_url('/assets/user/img/logo-potrait.png') ?>">
  <!-- Font Icon -->
  <link rel="stylesheet" href="<?php echo base_url ('assets/register/') ?>fonts/material-icon/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" href="<?php echo base_url ('assets/register/') ?>vendor/nouislider/nouislider.min.css">

  <!-- Main css -->
  <link rel="stylesheet" href="<?php echo base_url ('assets/register/') ?>css/style.css">
</head>
<body>

  <div class="main">

    <div class="container">
      <div class="signup-content">
        <div class="signup-img">
          <img src="<?php echo base_url ('assets/register/') ?>images/form-img.jpg" alt="">
          <div class="signup-img-content">
            <h2>Register now </h2>
            <p>while seats are available !</p>
          </div>
        </div>
        <div class="signup-form">
          <?php echo form_open_multipart('',array('class'=>'register-form','id'=>'register-form')) ?>
          <div class="form-row">
            <?php echo validation_errors(); ?>
            <div class="form-group">
              <div class="form-input">
                <label for="nama" class="required">Name</label>
                <input type="text" name="nama" id="nama" />
              </div>
              <div class="form-input">
                <label for="email" class="required">Email</label>
                <input type="email" name="email" id="email" />
              </div>
              <div class="form-input">
                <label for="pendidikan" class="required">Pendidikan Terakhir</label>
                <input type="text" name="pendidikan" id="pendidikan" />
              </div>
              <div class="form-input">
                <label for="nama_sekolah" class="required">Nama Sekolah/ Perguruan tinggi</label>
                <input type="text" name="nama_sekolah" id="nama_sekolah" />
              </div>
              <div class="form-input">
                <label for="alamat" class="required">Alamat</label>
                <input type="text" name="alamat" id="alamat" />
              </div>
              <div class="form-input">
                <label for="no_hp" class="required">No Hp</label>
                <input type="text" name="no_hp" id="no_hp" />
              </div>
            </div>
            <div class="form-group">
              <div class="form-input">
                <label for="tempat_lahir" class="required">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" />
              </div>
              <div class="form-input">
                <label for="tanggal_lahir" class="required">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" />
              </div>
              <div class="form-radio">
                <div class="label-flex">
                  <label for="jenis_kelamin">Jenis Kelamin</label>
                </div>
                <div class="form-radio-group">
                  <div class="form-radio-item">
                    <input type="radio" name="jenis_kelamin" id="laki_laki"value="laki_laki" checked>
                    <label for="laki_laki">Laki-Laki</label>
                    <span class="check"></span>
                  </div>
                  <div class="form-radio-item">
                    <input type="radio" name="jenis_kelamin" id="perempuan"value="perempuan">
                    <label for="perempuan">Perempuan</label>
                    <span class="check"></span>
                  </div>
                </div>
              </div>
              <div class="form-input">
                <label for="username" class="required">Username</label>
                <input type="username" name="username" id="username" />
              </div>
              <div class="form-input">
                <label for="password" class="required">Password</label>
                <input type="password" name="password" id="password" />
              </div>
              <div class="form-input">
                <label for="aa" class="required">Nama Posisi</label>
                <input type="text" id="aa" value="<?php echo $posisi->nama_posisi ?>"/ readonly>
              </div>
            </div>
          </div>
          <div class="form-submit">
            <input type="submit" value="Submit" class="submit" id="submit" name="submit" />
            <input type="submit" value="Reset" class="submit" id="reset" name="reset" />
          </div>
        </form>
      </div>
    </div>
  </div>

</div>

<!-- JS -->
<script src="<?php echo base_url ('assets/register/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url ('assets/register/') ?>vendor/nouislider/nouislider.min.js"></script>
<script src="<?php echo base_url ('assets/register/') ?>vendor/wnumb/wNumb.js"></script>
<script src="<?php echo base_url ('assets/register/') ?>vendor/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="<?php echo base_url ('assets/register/') ?>vendor/jquery-validation/dist/additional-methods.min.js"></script>
<script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
