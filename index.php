<?php 
  include 'config/connect.php'; 
  session_start();
  
    $_SESSION['slogan'] = "Kami hanyalah sebuah wadah & tak akan pernah eksis tanpa tertiupnya roh kesadaran & semangat egaliter dalam jiwa kita bersama !!!";
    
    $quWkt = mysqli_query($link,"SELECT * from wkt");
    if ($row = mysqli_fetch_array($quWkt)) {
      $nowTime =  date_create(date('d-m-Y', strtotime('now')));
      $timeBTS =  date_create(date('d-m-Y', strtotime($row['waktu'])));
      $inte = $nowTime->diff($timeBTS);
      $sH = $inte->format('%R%a');
      $sHT = (substr($sH ,0 , 1) == '+') ? substr($sH ,1) : substr($sH ,0) ;
      if ($sHT <= 0) {
        $_SESSION['waktu'] =  'pendaftaran ndc telah ditutup';
        // $_SESSION['waktu'] =  $sHT;

      }else{
        $_SESSION['waktu'] =  'pendaftaran ndc terbuka sampai tanggal '.date('d-m-Y', strtotime($row['waktu']));
      }
    }else{
      $_SESSION['waktu'] = 'pendaftaran ndc belum terbuka';  
    }
    if(!isset($_SESSION['LEVEL'])){
      $_SESSION['LEVEL'] = ''; 
    }

  // $_SESSION['user'] = '';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pendaftaran NDC</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="tp/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="tp/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="tp/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="tp/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="tp/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="tp/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="tp/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="tp/plugins/summernote/summernote-bs4.min.css">
    <!-- fullCalendar -->
  <link rel="stylesheet" href="tp/plugins/fullcalendar/main.css">
    <!-- Toastr -->
  <link rel="stylesheet" href="tp/plugins/toastr/toastr.min.css">
   <!-- DataTables -->
  <link rel="stylesheet" href="tp/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="tp/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="tp/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed ">
<?php include 'config/encryption.php'; $key = "ctrlsan";?>

<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button" id="pushmenujs"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        var p = true;
        $('#pushmenujs').click(function () {
          p = ($('body').hasClass('sidebar-collapse')) ? true : false;
          // alert(p);
          if (!p) {
            $('body').addClass('sidebar-closed');
            $('body').addClass('sidebar-collapse');

          }else{
            $('body').removeClass('sidebar-closed');
            $('body').removeClass('sidebar-collapse');
          }
        });
      });
    </script>
<!-- sidebar-closed sidebar-collapse -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <div class="nav-link" data-widget="navbar-search" href="#" role="button" id="btnSC" style="display: block;" onclick="onSC('boxSC');">
          <i class="fas fa-search"></i>
        </div>
        <div class="navbar-search-block" id="boxSC" style="display: none;">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search" onclick="onSC('btnSC');">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
        <script type="text/javascript">
          function onSC(x) {
            var w = (x == 'boxSC') ? 'btnSC' :'boxSC';
            document.getElementById(x).style.display = (document.getElementById(x).style.display == 'none') ? 'block' : 'none';
            document.getElementById(w).style.display = (document.getElementById(x).style.display == 'none') ? 'block' : 'none';
            
            // document.getElementById(x).innerHTML = "hay";
          }
        </script>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="img/ndc.png" alt="NDC" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">NDC</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>  
      </div>


      <?php 
          $liCon = ['home','company','login','logout','addUser', 'dataTerinput','dataRegistrasi'];
          $ac = ['','','','','','',''];
          if (isset($_GET['page'])) {
              $con = base64_decrypt($_GET['page'],$key);
              if($con == ""){
                  $con = 'home';
              }
              if (!file_exists('content/'.$con.'.php')) {
                  $con = 'home';
              }
              if ($con == 'addUser' && $_SESSION['LEVEL'] == 'User') {
                  $con = 'addUser';
              }else if (($con == 'dataTerinput' || $con == 'dataRegistrasi' || $con == 'editUser') && $_SESSION['LEVEL'] == 'Admin') {
                $con = $con;
                // continue;
              }else if ($con == 'login' || $con == 'logout') {
                $con = $con;
              }else if($con == 'company'){
                $con = $con;
              }else{
                $con = 'home';
              }
              $am = '';
              $coi = '';
              for ($i=0; $i < count($liCon); $i++) { 
                  if ($con == $liCon[$i]) {
                      $ac[$i] = 'active';
                      if($i < 2){
                          $am = '';
                          $coi = '';
                      }else{
                          $am = 'active';
                          $coi = 'menu-is-opening menu-open';
                      }
                  }else{
                      $ac[$i] = '';
                  }
                  
              }
          }else{
              $con = 'home';
              $ac[0] = 'active';
              $coi = "";
              $am = "";

          }
         
       ?>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true" id="navbarMenu">
          <li class="nav-item">
            <a href="?page=<?php echo base64_encrypt('home',$key)?>" class="nav-link <?= $ac[0] ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
                
              </p>
            </a>
          </li>
          <li class="nav-item <?= $coi?>" id="liMenu">
            <a href="#" class="nav-link <?= $am?>">
              <i class="nav-icon fas fa-th-list"></i>
              <p>
                Menu
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" id="ulMenu">

              
              <?php
               if ($_SESSION['LEVEL'] == 'User') { ?>
              
              <li class="nav-item">
                <a href="?page=<?php echo base64_encrypt('addUser',$key)?>" class="nav-link <?= $ac[4] ?>">
                  <i class="fas fa-user-plus nav-icon"></i>
                  <p>
                    Add
                  </p>
                </a>
              </li>
              <?php }else if ($_SESSION['LEVEL'] == 'Admin'){ ?>
              <li class="nav-item">
                <a href="?page=<?php echo base64_encrypt('dataTerinput',$key)?>" class="nav-link <?= $ac[5] ?>">
                  <i class="fas fa-user nav-icon"></i>
                  <p>
                    Data Terinput
                    <!-- <span class='right badge badge-danger'>New</span> -->
                  </p>
                </a>
              </li>
               <li class="nav-item">
                <a href="?page=<?php echo base64_encrypt('dataRegistrasi',$key)?>" class="nav-link <?= $ac[6] ?>">
                  <i class="fas fa-user-plus nav-icon"></i>
                  <p>
                    Data Registrasi
                    <!-- <span class='right badge badge-danger'>New</span> -->
                  </p>
                </a>
              </li>
              
              <?php }else{ ?>
              <li class="nav-item">
                <a href="?page=<?php echo base64_encrypt('login',$key)?>" class="nav-link <?= $ac[2] ?>">
                  <i class="fas fa-sign-in-alt nav-icon"></i>
                  <p id="ap">
                    Login
                  </p>
                </a>
              </li>
              <?php } ?>

              <?php if ($_SESSION['LEVEL'] == 'User' || $_SESSION['LEVEL'] == 'Admin') { ?>
              <li class="nav-item" >
                <a href="content/logout.php" class="nav-link <?= $ac[3] ?>">
                  <i class="fas fa-sign-out-alt nav-icon"></i>
                  <p id="ap">
                    Logout
                  </p>
                </a>
              </li>
            <?php } ?>
              
              
            
            </ul>
          </li>
          <script type="text/javascript">
            $(document).ready(function(){
              $('#liMenu').click(function () {
                $(this).removeClass('menu-is-opening menu-open');
              })
              $('ul#ulMenu li.nav-item').click(function () {
                $('#liMenu').addClass('menu-is-opening menu-open');
              })
            });
          </script>
          <li class="nav-item">
            <a href="?page=<?php echo base64_encrypt('company',$key)?>" id="Company" class="nav-link <?= $ac[1] ?>" >
              <!-- <i class="nav-icon fas fa-th"></i> -->
              <i class="far fa-building nav-icon"></i>
              <p>
                <!-- <script type="text/javascript"> -->
                      <!-- // document.getElementById('Company').innerHTML += "<span class='right badge badge-danger'>New</span>"; -->
                    <!-- </script> -->
                Company
                
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0">Home</h1> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="">Home</a></li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
      <?php 
          include 'content/'.$con.'.php';
      ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong class="text-black color-palette" style="color: black;"> 
      &copy; 2020 Niphaz Diploma Club |  Created By : 
      <a style="color: black;" href="https://www.instagram.com/elhaunaldi5/" target="_blank">
          Naldi Ahmad Nur Patty
      </a>
    </strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="tp/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="tp/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Bootstrap -->
<script src="tp/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="tp/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="tp/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="tp/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="tp/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="tp/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="tp/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="tp/plugins/moment/moment.min.js"></script>
<script src="tp/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="tp/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="tp/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="tp/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="tp/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="tp/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="tp/dist/js/pages/dashboard.js"></script>
<!-- SweetAlert2 -->
<script src="tp/plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- Toastr -->
<script src="tp/plugins/toastr/toastr.min.js"></script>

<script src="tp/dist/js/adminlte.min.js"></script>
<!-- jquery-validation -->
<script src="tp/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="tp/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- InputMask -->
<script src="tp/plugins/moment/moment.min.js"></script>
<script src="tp/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="tp/plugins/moment/moment.min.js"></script>
<script src="tp/plugins/fullcalendar/main.js"></script>
<!-- jQuery UI -->
<script src="tp/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="tp/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="tp/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="tp/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="tp/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="tp/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="tp/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="tp/plugins/jszip/jszip.min.js"></script>
<script src="tp/plugins/pdfmake/pdfmake.min.js"></script>
<script src="tp/plugins/pdfmake/vfs_fonts.js"></script>
<script src="tp/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="tp/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="tp/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- icon -->
<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
</body>
</html>
