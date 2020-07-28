<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" sizes="76x76" href="<?= base_url('/assets/admin/img/eosoftdream/logo-potrait.png') ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>PT. Era Digital</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/material-dashboard-pro" />
    <!-- Bootstrap core CSS     -->
    <link href="<?= base_url('/assets/admin/css/bootstrap.min.css') ?>" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="<?= base_url('/assets/admin/css/material-dashboard.css') ?>" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?= base_url('/assets/admin/css/demo.css') ?>" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="<?= base_url('/assets/admin/css/font-awesome.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('/assets/admin/css/google-roboto-300-700.css') ?>" rel="stylesheet" />
</head>

<body>
    <?php echo  validation_errors() ?>
        <?php echo form_open('Login/login');?>
    <nav class="navbar navbar-primary navbar-transparent navbar-absolute">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../dashboard.html">PT. Era Sistem Digital</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="">
                        <a href="<?= base_url('index.php/Auth/auth_register') ?>">
                            <i class="material-icons">person_add</i> Register
                        </a>
                    </li>
                    <li class=" active ">
                        <a href="login.html">
                            <i class="material-icons">fingerprint</i> Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="wrapper wrapper-full-page">
        <div class="full-page login-page" filter-color="black" data-image="<?= base_url ('/assets/admin/img/login.jpg') ?>">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="content">
                <div class="container">
                    <div class="col-md-6">
                    <div class="row">
                        <div class="card">
                                <form id="LoginValidation" action="#" method="">
                                    <div class="card-header card-header-icon" data-background-color="rose">
                                        <i class="material-icons">contacts</i>
                                    </div>
                                    <div class="card-content">
                                        <h4 class="card-title">Login Form</h4>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Username
                                                <span class="star">*</span>
                                            </label>
                                            <input class="form-control" name="username" type="text" required="true" id="username" autocomplete="off"/>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Password
                                                <span class="star">*</span>
                                            </label>
                                            <input class="form-control" name="password" type="password" id="password" required="true" />
                                        </div>
                                        <div class="category form-category">
                                            <span class="star">*</span> 
                                            Required fields</div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-rose btn-fill btn-wd">Lets Go</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="http://www.creative-tim.com/">Creative Tim</a>, made with love for a better web
                    </p>
                </div>
            </footer>
        </div>
    </div>
    <?php echo form_close(); ?>
</body>
<!--   Core JS Files   -->
<script src="<?= base_url ('/assets/admin/js/jquery-3.1.1.min.js') ?>" type="text/javascript"></script>
<script src="<?= base_url ('/assets/admin/js/jquery-ui.min.js') ?>" type="text/javascript"></script>
<script src="<?= base_url ('/assets/admin/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<script src="<?= base_url ('/assets/admin/js/material.min.js') ?>" type="text/javascript"></script>
<script src="<?= base_url ('/assets/admin/js/perfect-scrollbar.jquery.min.js') ?>" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="<?= base_url ('/assets/admin/js/jquery.validate.min.js') ?>"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="<?= base_url('/assets/admin/js/moment.min.js') ?>"></script>
<!--  Charts Plugin -->
<script src="<?= base_url ('/assets/admin/js/chartist.min.js') ?>"></script>
<!--  Plugin for the Wizard -->
<script src="<?= base_url('/assets/admin/js/jquery.bootstrap-wizard.js') ?>"></script>
<!--  Notifications Plugin    -->
<script src="<?= base_url ('/assets/admin/js/bootstrap-notify.js') ?>"></script>
<!--   Sharrre Library    -->
<script src="<?= base_url ('/assets/admin/js/jquery.sharrre.js') ?>"></script>
<!-- DateTimePicker Plugin -->
<script src="<?= base_url ('/assets/admin/js/bootstrap-datetimepicker.js') ?>"></script>
<!-- Vector Map plugin -->
<script src="<?= base_url ('/assets/admin/js/jquery-jvectormap.js') ?>"></script>
<!-- Sliders Plugin -->
<script src="<?= base_url ('/assets/admin/js/nouislider.min.js') ?>"></script>
<!--  Google Maps Plugin    -->
<!--<script src="../assets/js/jquery.select-bootstrap.js"></script>-->
<!-- Select Plugin -->
<script src="<?= base_url ('/assets/admin/js/jquery.select-bootstrap.js') ?>"></script>
<!--  DataTables.net Plugin    -->
<script src="<?= base_url ('/assets/admin/js/jquery.datatables.js') ?>"></script>
<!-- Sweet Alert 2 plugin -->
<script src="<?= base_url ('/assets/admin/js/sweetalert2.js') ?>"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="<?= base_url ('/assets/admin/js/jasny-bootstrap.min.js') ?>"></script>
<!--  Full Calendar Plugin    -->
<script src="<?= base_url ('/assets/admin/js/fullcalendar.min.js') ?>"></script>
<!-- TagsInput Plugin -->
<script src="<?= base_url ('/assets/admin/js/jquery.tagsinput.js') ?>"></script>
<!-- Material Dashboard javascript methods -->
<script src="<?= base_url ('/assets/admin/js/material-dashboard.js') ?>"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?= base_url ('/assets/admin/js/demo.js') ?>"></script>
<script type="text/javascript">
    $().ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/pages/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:32:19 GMT -->
</html>