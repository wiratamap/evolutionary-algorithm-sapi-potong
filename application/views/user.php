<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Alev - Sapi Potong</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url('assets/vendor/metisMenu/metisMenu.min.css'); ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/dist/css/sb-admin-2.css'); ?>" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url('assets/vendor/morrisjs/morris.css'); ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('assets/vendor/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

  <div id="wrapper">

      <!-- Navigation -->
      <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.html">Algoritma Evolusi - Optimasi Pakan Sapi Potong</a>
          </div>
          <!-- /.navbar-header -->

          <ul class="nav navbar-top-links navbar-right">
              <!-- /.dropdown -->
              <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-user">
                      <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                      </li>
                      <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                      </li>
                      <li class="divider"></li>
                      <li><a href="<?php echo base_url('auth/logout'); ?>" name="log" id="logout" onClick="return confirm('Apakah Anda Yakin Ingin Keluar?')"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                      </li>
                  </ul>
                  <!-- /.dropdown-user -->
              </li>
              <!-- /.dropdown -->
          </ul>
          <!-- /.navbar-top-links -->

          <div class="navbar-default sidebar" role="navigation">
              <div class="sidebar-nav navbar-collapse">
                  <ul class="nav" id="side-menu">
                      <li>
                          <a href="<?php echo base_url()?>user"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                      </li>

                  </ul>
              </div>
              <!-- /.sidebar-collapse -->
          </div>
          <!-- /.navbar-static-side -->
      </nav>

      <div id="page-wrapper">
        <style>
        #page-wrapper {
            padding-top: 30px;
        }</style>

          <div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header">Form Kebutuhan Nutrisi</h1>
              </div>
              <!-- /.col-lg-12 -->
          </div>
          <!-- /.row -->
          <div class="row">
              <div class="col-lg-12">
                  <div class="panel panel-default">
                      <div class="panel-heading">
                          Data Sapi dan pakan
                      </div>
                      <div class="panel-body">
                          <div class="row">
                              <div class="col-lg-6">
                              <?php echo validation_errors(); ?>
                              <?php echo form_open('user/hasil-optimasi'); ?>
                                      <div class="form-group">
                                          <label>Berat badan sapi</label>
                                          <input name="bb" class="form-control" placeholder="ex: 100 ~ 350 (dalam kg)" type="number" required="true">
                                      </div>
                                      <div class="form-group">
                                          <label>Target penambahan berat badan</label>
                                          <select name="pbb" class="form-control">
                                              <option value="0" selected>0 kg</option>
                                              <option value="0.25">0.25 kg</option>
                                              <option value="0.5">0.5 kg</option>
                                              <option value="0.75">0.75 kg</option>
                                              <option value="1">1 kg</option>
                                          </select>
                                      </div>
                                      <div class="form-group">
                                          <label>Pakan 1</label>
                                          <select name="pk1" class="form-control">
                                            <?php
                                              foreach($komposisi_bpakan as $row)
                                              {
                                                echo '<option value="'.$row->uuid_bpakan.'">'.$row->bahan_pakan.'</option>';
                                              }
                                            ?>
                                          </select>
                                      </div>
                                      <div class="form-group">
                                          <label>Pakan 2</label>
                                          <select name="pk2" class="form-control">
                                            <?php
                                              foreach($komposisi_bpakan as $row)
                                              {
                                                echo '<option value="'.$row->uuid_bpakan.'">'.$row->bahan_pakan.'</option>';
                                              }
                                            ?>
                                          </select>
                                      </div>
                                      <div class="form-group">
                                          <label>Pakan 3</label>
                                          <select name="pk3" class="form-control">
                                            <?php
                                              foreach($komposisi_bpakan as $row)
                                              {
                                                echo '<option value="'.$row->uuid_bpakan.'">'.$row->bahan_pakan.'</option>';
                                              }
                                            ?>
                                          </select>
                                      </div>
                                      <div class="form-group">
                                          <label>Crossover Rate (cr)</label>
                                          <input name="cr" class="form-control" placeholder="ex: 0.1 ~ 0.9" type="number" >
                                      </div>
                                      <div class="form-group">
                                          <label>Mutation Rate (mr)</label>
                                          <input name="mr" class="form-control" placeholder="ex: 0.1 ~ 0.9" type="number" >
                                      </div>
                                      <div class="form-group">
                                          <label>Populasi</label>
                                          <input name="popSize" class="form-control" placeholder="ex: 7 (kelipatan 7)" type="number">
                                      </div>
                                      <div class="form-group">
                                          <label>Jumlah generasi</label>
                                          <input name="generasi" class="form-control" placeholder="ex: 50 ~ 500" type="number">
                                      </div>
                                      <button type="submit" class="btn btn-outline btn-primary">Optimasikan</button>
                                      <button type="reset" class="btn btn-outline btn-primary">Reset</button>
                                  <?php echo form_close(); ?>
                              </div>
                          </div>
                          <!-- /.row (nested) -->
                      </div>
                      <!-- /.panel-body -->
                  </div>
                  <!-- /.panel -->
              </div>
              <!-- /.col-lg-12 -->
          </div>
          <!-- /.row -->
      </div>
      <!-- /#page-wrapper -->

  </div>
  <!-- /#wrapper -->


    <!-- jQuery -->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('assets/vendor/metisMenu/metisMenu.min.js'); ?>"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url('assets/vendor/raphael/raphael.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/morrisjs/morris.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/data/morris-data.js'); ?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('assets/dist/js/sb-admin-2.js'); ?>"></script>

</body>

</html>
