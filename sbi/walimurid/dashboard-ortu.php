<?php
require_once '../system/app.php';

// Start the session
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Sistem Informasi Monitoring Siswa | SBI</title>
  <!-- plugins:css -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js" integrity="sha512-3dZ9wIrMMij8rOH7X3kLfXAzwtcHpuYpEgQg1OA4QAob1e81H8ntUQmQm3pBudqIoySO5j0tHN4ENzA6+n2r4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="./../assets/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="./../assets/vendors/flag-icon-css/css/flag-icon.min.css">

  <link rel="stylesheet" href="./../assets/vendors/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="./../assets/vendors/chartist/chartist.min.css">
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="./../assets/vendors/select2/select2.min.css">
  <link rel="stylesheet" href="./../assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <link rel="stylesheet" href="./../assets/css/style.css" />
  <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
</head>

<body>
  <div class="container-scroller">
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex align-items-center">
        <a class="navbar-brand brand-logo ml-auto text-right" href="dashboard-ortu.html">
          <img src="./../assets/images/sbi-header-homepage.png" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="dashboard-ortu.html"><img src="./../assets/images/sbi-header-homepage.png" alt="logo" /></a>
      </div>
      <!--  -->
      <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">


        <div id="google_translate_element" class="ml-auto"></div>

        <ul class="navbar-nav navbar-nav-right ml-auto">
          <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown ">
            <a class="nav-link " id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle ml-2" src="./../assets/images/ebcd036a0db50db993ae98ce380f64191642082944.png" alt="Profile image"> 
              <span class="font-weight-normal dropdown-toggle">Hello, <?php echo isset($_SESSION['user']) ? $_SESSION['user']['username'] : ''; ?></span></a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header d-flex">
                <img class="img-md rounded-circle" src="./../assets/images/ebcd036a0db50db993ae98ce380f64191642082944.png" width="60px" alt="Profile image">
                <div>
                  <p class="mb-1 mt-3"></p>
                  <p class="font-weight-light text-muted mb-0"><?php echo isset($_SESSION['user']) ? $_SESSION['user']['email'] : ''; ?></p>
                </div>

              </div>
              <a class="dropdown-item" href="#"><i class="dropdown-item-icon icon-user text-primary"></i> My Profile</a>
              <a class="dropdown-item" href="#"><i class="dropdown-item-icon icon-energy text-primary"></i> Change
                Password</a>
              <a class="dropdown-item" href="../system/logout.php"><i class="dropdown-item-icon icon-power text-primary"></i>Sign
                Out</a>
            </div>
          </li>
          <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
            <a class="notif-icon" id="UserDropdown2" href="#" data-toggle="dropdown" aria-expanded="true"><i class="icon-paper-plane menu-icon"><span class="badge">2</span></i></a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown2">
              <div class="dropdown-header d-flex">
                <div>
                  <p>Notifikasi : Balasan Baru</p>
                  <hr>
                  <img class="img-md rounded-circle" src="./../assets/images/faces/face8.jpg" width="60px" alt="Profile image">
                  <p>Nama Wali Kelas: Handayani</p>
                  <hr>

                  <a href="balasan.html" class="mb-0 btn-sm btn-primary">Periksa</a> <a href="#" class="btn-sm btn-danger mb-0">Hapus</a>
                  <hr>
                  <p>Notifikasi : Pengumuman Baru</p>
                  <hr>
                  <a href="pengumuman.html" class="mb-0 btn-sm btn-primary">Periksa</a> <a href="#" class="btn-sm btn-danger mb-0">Hapus</a>
                </div>
              </div>


              <!-- </div> -->
              <!-- </div> -->

            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

      <!-- SIDEBAR MENUU -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item aktif">
            <a class="nav-link" href="dashboard-ortu.html">
              <i class="icon-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="detail-siswa-wali-murid.html">
              <i class="icon-user menu-icon"></i>
              <span class="menu-title">Data Siswa</span>
            </a>
          </li>
          <li class="nav-item" style="border-bottom: 1px solid rgb(236, 226, 226);">
            <a class="nav-link dropdown-toggle" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-doc menu-icon"></i>
              <span class="menu-title">Catatan</span>

            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="tambah-catatan.html"> Tambah Catatan</a></li>
                <li class="nav-item"> <a class="nav-link" href="kelola-catatan-wali-murid.html"> Kelola Catatan </a>
                </li>
                <li class="nav-item"> <a class="nav-link" href="balasan.html"> Balasan Wali Kelas</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pengumuman.html">
              <i class="icon-info menu-icon"></i>
              <span class="menu-title">Pengumuman</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="konsultasi-wali-murid.html">
              <i class="icon-bubbles menu-icon"></i>
              <span class="menu-title">Konsultasi</span>
            </a>
          </li>



          </li>
        </ul>
      </nav>
      <!-- SIDEBAR MENU -->
      <div class="main-panel ">
        <div class="content-wrapper " style="padding: 0;">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <!-- HEADER -->
                      <div class="row">
                        <div class="col-lg-12 ">
                          <h3 class="text-center border-primary" style="margin: 0 0 0 0; padding: 8px;  background-color: #386CB3; color: rgb(255, 255, 255);">
                            Selamat Datang Di Sistem Informasi Monitoring Siswa</h3>
                          <div class="card text-center" style="background-image: url('././../assets/images/header\ final_Mesa\ de\ trabajo\ 1.png'); background-size: cover; height: 250px; width: 100%;">


                          </div>
                        </div>
                      </div>
                      <!-- HEADER -->
                    </div>
                  </div>

                  <div class="row ">
                    <div class=" col-md-6 report-inner-cards-wrapper">
                      <div class="report-inner-card color-5">

                        <div class="inner-card-text text-white">
                          <span class="report-title">Total Siswa</span>
                          <h4>500</h4>

                        </div>
                        <div class="inner-card-icon">
                          <i class="icon-rocket"></i>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 report-inner-cards-wrapper">
                      <div class="report-inner-card color-5">
                        <div class="inner-card-text text-white">
                          <span class="report-title">Total Guru</span>
                          <h4>200</h4>

                        </div>
                        <div class="inner-card-icon ">
                          <i class="icon-user"></i>
                        </div>
                      </div>
                    </div>


                  </div>

                </div>
              </div>
            </div>
          </div>


        </div>
      </div>



      <script src="./../assets/vendors/js/vendor.bundle.base.js"></script>
      <!-- endinject -->
      <!-- Plugin js for this page -->
      <script src="./../assets/vendors/select2/select2.min.js"></script>
      <script src="./../assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
      <!-- End plugin js for this page -->
      <!-- inject:js -->
      <script src="./../assets/vendors/chart.js/Chart.min.js"></script>
      <script src="./../assets/vendors/moment/moment.min.js"></script>
      <script src="./../assets/vendors/daterangepicker/daterangepicker.js"></script>
      <script src="./../assets/vendors/chartist/chartist.min.js"></script>

      <script src="./../assets/js/off-canvas.js"></script>
      <script src="./../assets/js/bootstrap.min.js"></script>
      <!-- endinject -->
      <!-- Custom js for this page -->
      <script src="./../assets/js/typeahead.js"></script>
      <script src="./../assets/js/select2.js"></script>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script>
        function onReady(callback) {
          var intervalID = window.setInterval(checkReady, 1000);

          function checkReady() {
            if (document.getElementsByTagName('body')[0] !== undefined) {
              window.clearInterval(intervalID);
              callback.call(this);
            }
          }
        }

        function show(id, value) {
          document.getElementById(id).style.display = value ? 'block' : 'none';
        }

        onReady(function() {
          show('page', true);
          show('loading', false);
        });
      </script>
</body>

</html>