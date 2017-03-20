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

    <!-- DataTables CSS -->
    <link href="<?php echo base_url('assets/vendor/datatables-plugins/dataTables.bootstrap.css'); ?>" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url('assets/vendor/datatables-responsive/dataTables.responsive.css'); ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/dist/css/sb-admin-2.css'); ?>" rel="stylesheet">

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
                        <li><a href="<?php echo base_url('auth/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
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
                    <h1 class="page-header">Hasil Optimasi</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tabel Kebutuhan Nutrisi Sapi
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Berat Kering</th>
                                            <th>Protein Kering</th>
                                            <th>Total Digestible Nutrient (TDN)</th>
                                            <th>Kalsium</th>
                                            <th>Fosfor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                          <?php
                                            foreach($keb_nutrisi_sapi as $row)
                                            {
                                              echo '<td>'.$row->bk.'</td>';
                                              echo '<td>'.$row->pk.'</td>';
                                              echo '<td>'.$row->tdn.'</td>';
                                              echo '<td>'.$row->ca.'</td>';
                                              echo '<td>'.$row->p.'</td>';
                                            }
                                          ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tabel Kebutuhan Nutrisi Pakan
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Bahan Pakan</th>
                                        <th>Harga</th>
                                        <th>Berat Kering</th>
                                        <th>Protein Kering</th>
                                        <th>Total Digestible Nutrient (TDN)</th>
                                        <th>Kalsium</th>
                                        <th>Fosfor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    foreach($komposisi_bpakan as $row2)
                                    {
                                     echo '<tr>';

                                          echo '<td>'.$row2->bahan_pakan.'</td>';
                                          echo '<td>'.$row2->harga.'</td>';
                                          echo '<td>'.$row2->berat_kering.'</td>';
                                          echo '<td>'.$row2->protein_kering.'</td>';
                                          echo '<td>'.$row2->tot_digestible_nut.'</td>';
                                          echo '<td>'.$row2->calsium.'</td>';
                                          echo '<td>'.$row2->fosfor.'</td>';
                                     echo '</tr>';
                                    }

                                      ?>
                              </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tabel Inisialisasi Kromosom
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                              <tr>
                              <?php
                                foreach($komposisi_bpakan as $row2)
                                {
                                      echo '<th>'.$row2->bahan_pakan.'</th>';
                                }
                                  ?>
                                  <th>Harga</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              // $i=0;
                                // foreach($kromosom as $row2)
                                // {
                                for($a=0;$a<count($kromosom);$a++) {
                                 echo '<tr>';
                                      echo '<td>'.$kromosom[$a][0].'</td>';
                                      echo '<td>'.$kromosom[$a][1].'</td>';
                                      echo '<td>'.$kromosom[$a][2].'</td>';
                                      echo '<td>'.$harga_tot[$a].'</td>';
                                      // $i++;
                                      echo '</tr>';
                                }

                                  ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Offspring Crossover </br>
                <?php
                  echo "Nilai alpha 0: ".$nilai_a[0]."</br>";
                  echo "Nilai alpha 1: ".$nilai_a[1]."</br>";
                  echo "Nilai alpha 2: ".$nilai_a[2]."</br>";
                  for ($i=0; $i < count($choosed_parent_c); $i++) {
                    echo "Parent terpilih ke-".$i.": ".$choosed_parent_c[$i]."</br>";
                  }
                  // echo "Parent terpilih 1: ".$choosed_parent_c[0]."</br>";
                  // echo "Parent terpilih 2: ".$choosed_parent_c[1]."</br>";
                ?>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                          <?php
                            foreach($komposisi_bpakan as $row2)
                            {
                                  echo '<th>'.$row2->bahan_pakan.'</th>';
                            }
                              ?>
                              <!-- <th>Harga</th> -->
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          // $i=0;
                            // foreach($kromosom as $row2)
                            // {
                            for($a=0;$a<count($offSpringC);$a++) {
                             echo '<tr>';
                                  echo '<td>'.$offSpringC[$a][0].'</td>';
                                  echo '<td>'.$offSpringC[$a][1].'</td>';
                                  echo '<td>'.$offSpringC[$a][2].'</td>';
                                  // echo '<td>'.$harga_tot_baru[$a].'</td>';
                                  // $i++;
                                  echo '</tr>';
                            }

                              ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Offspring Mutasi
                <?php
                  echo "Nilai r: ".$nilai_r."</br>";
                  for ($i=0; $i < count($choosed_parent_m); $i++) {
                    echo "Parent terpilih ke-".$i.": ".$choosed_parent_m[$i]."</br>";
                  }
                  // echo "Parent terpilih: ".$choosed_parent_m[0]."</br>";
                  echo "Gen terpilih: ".$choosed_gen."</br>";
                  echo "Nilai max: ".$nilai_max."</br>";
                  echo "Nilai min: ".$nilai_min."</br>";
                ?>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                          <?php
                            foreach($komposisi_bpakan as $row2)
                            {
                                  echo '<th>'.$row2->bahan_pakan.'</th>';
                            }
                              ?>
                              <!-- <th>Harga</th> -->
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          // $i=0;
                            // foreach($kromosom as $row2)
                            // {
                            for($a=0;$a<count($offSpringM);$a++) {
                             echo '<tr>';
                                  echo '<td>'.$offSpringM[$a][0].'</td>';
                                  echo '<td>'.$offSpringM[$a][1].'</td>';
                                  echo '<td>'.$offSpringM[$a][2].'</td>';
                                  // echo '<td>'.$harga_tot_baru[$a].'</td>';
                                  // $i++;
                                  echo '</tr>';
                            }

                              ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Kromosom Baru
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                          <?php
                            foreach($komposisi_bpakan as $row2)
                            {
                                  echo '<th>'.$row2->bahan_pakan.'</th>';
                            }
                              ?>
                              <th>Harga</th>
                              <th>Fitness</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          // $i=0;
                            // foreach($kromosom as $row2)
                            // {
                            for($a=0;$a<count($kromosom_baru);$a++) {
                             echo '<tr>';
                                  echo '<td>'.$kromosom_baru[$a][0].'</td>';
                                  echo '<td>'.$kromosom_baru[$a][1].'</td>';
                                  echo '<td>'.$kromosom_baru[$a][2].'</td>';
                                  echo '<td>'.$harga_tot_baru[$a].'</td>';
                                  echo '<td>'.$fitness[$a].'</td>';
                                  // $i++;
                                  echo '</tr>';
                            }

                              ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Kromosom Hasil Elitism, Generasi ke: <?php echo $generasi."</br>"; ?>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                          <?php
                            foreach($komposisi_bpakan as $row2)
                            {
                                  echo '<th>'.$row2->bahan_pakan.'</th>';
                            }
                              ?>
                              <th>Harga</th>
                              <th>Pengeluaran Per tahun</th>
                              <th>Fitness</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          // $i=0;
                            // foreach($kromosom_sorted as $row2)
                            // {
                            for($a=0;$a<$pop_size;$a++) {
                             echo '<tr>';
                                  $hargaTahunan = $kromosom_sorted[$a][3]*365;
                                  echo '<td>'.$kromosom_sorted[$a][0].'</td>';
                                  echo '<td>'.$kromosom_sorted[$a][1].'</td>';
                                  echo '<td>'.$kromosom_sorted[$a][2].'</td>';
                                  echo '<td>'.$kromosom_sorted[$a][3].'</td>';
                                  echo '<td>'.$hargaTahunan.'</td>';
                                  echo '<td>'.$kromosom_sorted[$a][4].'</td>';
                                  // $i++;
                             echo '</tr>';
                            }

                              ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
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

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url('assets/vendor/datatables/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables-plugins/dataTables.bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables-responsive/dataTables.responsive.js'); ?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('assets/dist/js/sb-admin-2.js'); ?>"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
