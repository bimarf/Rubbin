<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>RUBBIN - Dashboard</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="<?=base_url()?>assets/img/favicon.png" rel="icon">
  <link href="<?=base_url()?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Titillium+Web:400,600,300,200&subset=latin,latin-ext" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<?=base_url()?>assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?=base_url()?>assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/lib/fancybox/fancybox.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet">


  <!-- =======================================================
    Template Name: Munter
    Template URL: https://templatemag.com/munter-bootstrap-one-page-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body data-spy="scroll" data-offset="58" data-target="#navigation">

  <!-- Fixed navbar -->
  <div id="navigation" class="navbar navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a class="smoothscroll"><img src="<?=base_url()?>assets/img/Logo.png"></a></li>
          <li class="active"><a href="#intro_dashboard" class="smoothscroll">Dashboard</a></li>
          <li><a type="button"  class="logout" href="http://localhost/rubbin/index.php/auth/logout">Logout</a></li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </div>

  <!-- === MAIN Background === -->
  <div class="slide story" id="intro_dashboard" data-slide="1">
    <div class="container">
      
      <div id="home-row-1" class="row clearfix">
        <div class="col-12">

        <div class="row title-row">
          <div class="col-12 font-thin"> RUB-<span class="font-semibold">BIN</span></div>
          <div class="row line-row"> 
            <div class="hr"> </div>
          </div>
        </div>

          <div id="home-row-2" class="row clearfix">

        <div class="col-12 col-sm-4">
          <a href="#tabungan" ><div class="home-hover navigation-slide"><img src="<?=base_url()?>assets/img/T-01.png"></div><span><button type="button" class="btn btn-primary" class="tbg">TABUNGAN</button></span></a>
        </div>

        <div class="col-12 col-sm-4">
          <a href="#poin" ><div class="home-hover navigation-slide"><img src="<?=base_url()?>assets/img/P-01.png"></div><span><button type="button" class="btn btn-primary" class="po">POIN</button></span></a>
        </div>

        <div class="col-12 col-sm-4">
          <a href="#reward" ><div class="home-hover navigation-slide"><img src="<?=base_url()?>assets/img/R-01.png"></div><span><button type="button" class="btn btn-primary" class="rwd">REWARD</button></span></a>
        </div>

        <div class="col-12 col-sm-4">
          <a href="#histori" ><div class="home-hover navigation-slide"><img src="<?=base_url()?>assets/img/H-01.png"></div><span><button type="button" class="btn btn-primary" class="hstr">HISTORI</button></span></a>
        </div>

      </div>
      <!-- /row -->

        </div>
        <!-- /col-12 -->
      </div>
      <!-- /row -->
      
    </div>
    <!-- /container -->
  </div>
  <!-- /slide1 -->

  <div id="copyrights">
    <div class="container">
      <p>
        &copy; Copyrights <strong>RUBBIN</strong>. All Rights Reserved
      </p>
      <div class="credits">
        <!--
          You are NOT allowed to delete the credit link to TemplateMag with free version.
          You can delete the credit link only if you bought the pro version.
          Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/munter-bootstrap-one-page-template/
          Licensing information: https://templatemag.com/license/
        -->
        Created with Munter template by <a href="https://templatemag.com/">TemplateMag</a>
      </div>
    </div>
  </div>

  <!-- JavaScript Libraries -->
  <script src="<?=base_url()?>assets/lib/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/lib/easing/easing.min.js"></script>
  <script src="<?=base_url()?>assets/lib/php-mail-form/validate.js"></script>
  <script src="<?=base_url()?>assets/lib/fancybox/fancybox.js"></script>

  <!-- Template Main Javascript File -->
  <script src="<?=base_url()?>assets/js/main.js"></script>

</body>
</html>