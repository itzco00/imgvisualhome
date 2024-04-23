<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

  <title>AVANTE IMAGEN VISUAL</title>
  <link rel="shortcut icon" type="image/png" href="<?= base_url() ?>assets/img/avanteprof_2.png" />
  <script src="<?= base_url() ?>assets/js/jquery.js"></script>
  <script src="<?= base_url() ?>assets/js/jquery-1.8.3.min.js"></script>
  <!-- Bootstrap core CSS -->
  <link href="<?= base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
  <!--external css-->
  <link href="<?= base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/js/gritter/css/jquery.gritter.css" />
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/lineicons/style.css">

  <!-- Custom styles for this template -->
  <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/css/style-responsive.css" rel="stylesheet">

  <!-- Chart Libraries -->
  <script src="<?= base_url() ?>assets/js/chart-master/Chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

  <!-- Date Picker -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <!-- Excel libraries -->
  <script src="https://unpkg.com/xlsx@0.16.9/dist/xlsx.full.min.js"></script>
  <script src="https://unpkg.com/file-saverjs@latest/FileSaver.min.js"></script>
  <script src="https://unpkg.com/tableexport@latest/dist/js/tableexport.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/phpspreadsheet@1.20.0/dist/PhpSpreadsheet.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

  <section id="container">
    <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header" style="background-color: black;">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <a href="<?= base_url() ?>Dashboard" class="logo"><b>AVANTE TEXTIL</b></a>
      <div class="sidebar-toggle-box"></div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" style="background-color: yellow; color: black" href="<?= base_url() ?>Dashboard/logout">CERRAR SESION</a></li>
        </ul>
        <!--<ul class="nav pull-right top-menu" style="padding-right: 15px; padding-top: 20px">
          <li><div style="color:white; font-size:1.3em"><?php echo $fullname; ?></div></li>
        </ul>-->
        <ul class="nav pull-right top-menu">
          <li><a class="logout" style="background-color: yellow; color: black; display:none;">Guardar</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->