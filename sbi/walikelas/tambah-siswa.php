<?php
require_once '../system/app.php';
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: ../walikelas/login.html');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Sistem Informasi Monitoring Siswa | SBI</title>
  <!-- plugins:css -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js" integrity="sha512-3dZ9wIrMMij8rOH7X3kLfXAzwtcHpuYpEgQg1OA4QAob1e81H8ntUQmQm3pBudqIoySO5j0tHN4ENzA6+n2r4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="../assets/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">

  <link rel="stylesheet" href="../assets/vendors/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../assets/vendors/chartist/chartist.min.css">
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../assets/vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/style.css" />
  <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
</head>

<body>
  <div class="container-scroller">
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex align-items-center">
        <a class="navbar-brand brand-logo ml-auto text-right" href="dashboard.html">
          <img src="./../assets/images/sbi-header-homepage.png" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="dashboard.html"><img src="./../assets/images/sbi-header-homepage.png" width="300px" alt="logo" /></a>
      </div>
      <!--  -->
      <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">


        <div id="google_translate_element" class="ml-auto"></div>

        <ul class="navbar-nav navbar-nav-right ml-auto">

          <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="true">
              <img class="img-xs rounded-circle ml-2" src="./../assets/images/faces/face8.jpg" alt="Profile image"> <span class="font-weight-normal">Hello, <?php echo $_SESSION['user']['username']; ?></span></a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header d-flex">
                <img class="img-md rounded-circle" src="./../assets/images/faces/face8.jpg" width="60px" alt="Profile image">
                <div>
                  <p class="mb-1 mt-3"></p>
                  <p class="font-weight-light text-muted mb-0"><?php echo $_SESSION['user']['email']; ?></p>
                </div>
              </div>
              <a class="dropdown-item" href="#"><i class="dropdown-item-icon icon-user text-primary"></i> My Profile</a>
              <a class="dropdown-item" href="#"><i class="dropdown-item-icon icon-energy text-primary"></i> Change Password</a>
              <a class="dropdown-item" href="Login.html"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
            </div>
          </li>
          <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
            <a class="notif-icon" id="UserDropdown2" href="#" data-toggle="dropdown" aria-expanded="true"><i class="icon-paper-plane menu-icon"><span class="badge">1</span></i></a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown2">
              <div class="dropdown-header d-flex">
                <div>
                  <p>Notifikasi : Catatan Baru</p>
                  <hr>
                  <img class="img-md rounded-circle" src="./../assets/images/ebcd036a0db50db993ae98ce380f64191642082944.png" width="60px" alt="Profile image">
                  <p>Nama Wali Murid: Syarif</p>
                  <hr>
                  <a href="kelola-catatan.html" class="mb-0 btn-sm btn-primary">Periksa</a> <a href="#" class="btn-sm btn-danger mb-0">Hapus</a>
                </div>
              </div>

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
          <li class="nav-item">
            <a class="nav-link" href="dashboard.html">
              <i class="icon-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link dropdown-toggle" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layers menu-icon"></i>
              <span class="menu-title">Kelas</span>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="tambah-kelas.php">Tambah Kelas</a></li>
                <li class="nav-item"> <a class="nav-link" href="kelola-kelas.php">Kelola Kelas</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item  aktif">
            <a class="nav-link dropdown-toggle" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic1">
              <i class="icon-people menu-icon"></i>
              <span class="menu-title">Siswa / i</span>
            </a>
            <div class="collapse" id="ui-basic1">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="tambah-siswa.php">Tambah Siswa/i</a></li>
                <li class="nav-item"> <a class="nav-link" href="kelola-siswa.php">Kelola Siswa/i</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="kelola-catatan.html">
              <i class="icon-doc menu-icon"></i>
              <span class="menu-title">Catatan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cari-siswa.html">
              <i class="icon-magnifier menu-icon"></i>
              <span class="menu-title">Cari Siswa</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="konsultasi-wali-kelas.html">
              <i class="icon-bubbles menu-icon"></i>
              <span class="menu-title">Konsultasi</span>
            </a>
          </li>
          </li>
        </ul>
      </nav>
      <!-- SIDEBAR MENU -->
      <!-- KELOLA KELAS -->
      <!-- KELOLA KELAS -->
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title"> Tambah Siswa </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.html">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Tambah Siswa</li>
              </ol>
            </nav>
          </div>
          <div class="row">

            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">


                  <form action="../system/add_siswa.php" class="forms-sample row" method="post" enctype="multipart/form-data">

                    <div class="form-group col-md-6">
                      <label for="exampleInputName1">Nama Siswa</label>
                      <input type="text" name="nama_siswa" value="" class="form-control" style="border: solid rgb(187, 187, 187) 1px" required='true'>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputName1">Email Siswa</label>
                      <input type="email" name="email_siswa" value="" class="form-control" style="border: solid rgb(187, 187, 187) 1px" required='true'>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail3">Kelas Siswa</label>
                      <select name="kelas_siswa" class="form-control" style="border: solid rgb(187, 187, 187) 1px" required='true'>
                        <option value="">Pilih Kelas</option>
                        <?php
                          $sql = "SELECT * FROM kelas";
                          $conn = new PDO('mysql:host=localhost;dbname=sbi', 'root', '');
                          $result = $conn->query($sql);
                          while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='" . $row['id'] . "'>" . $row['nama_kelas']. " - " . $row['bagian'] . "</option>";
                          }
                        ?>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputName1">Jenis Kelamin</label>
                      <select name="jk" value="" class="form-control" style="border: solid rgb(187, 187, 187) 1px" required='true'>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Pria">Pria</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputName1">Tanggal Lahir</label>
                      <input type="date" name="tgl_lahir" value="" class="form-control" style="border: solid rgb(187, 187, 187) 1px" required='true'>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="exampleInputName1">ID Siswa</label>
                      <input type="text" name="id_siswa" value="<?php echo rand(1000, 9999); ?>" class="form-control" style="border: solid rgb(187, 187, 187) 1px" readonly>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputName1">Foto Siswa</label>
                      <input type="file" name="foto_siswa" value="" class="form-control" style="border: solid rgb(187, 187, 187) 1px" required='true'>
                    </div>
                    <h3 class="col-md-12">Orangtua / Wali Murid</h3>
                    <div class="form-group col-md-6">
                      <label for="exampleInputName1">Nama Ayah</label>
                      <input type="text" name="nama_ayah" value="" class="form-control" style="border: solid rgb(187, 187, 187) 1px" required='true'>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputName1">Nama Ibu</label>
                      <input type="text" name="nama_ibu" value="" class="form-control" style="border: solid rgb(187, 187, 187) 1px" required='true'>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputName1">Nomor Hp</label>
                      <input type="number" name="no_hp" value="" class="form-control" style="border: solid rgb(187, 187, 187) 1px" required='true' maxlength="10" pattern="[0-9]+">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputName1">Nomor Hp Alternatif</label>
                      <input type="number" name="hp_alternatif" value="" class="form-control" style="border: solid rgb(187, 187, 187) 1px" required='true' maxlength="10" pattern="[0-9]+">
                    </div>
                    <div class="form-group col-md-12">
                      <label for="exampleInputName1">Alamat</label>
                      <textarea name="alamat" class="form-control" style="border: solid rgb(187, 187, 187) 1px"></textarea>
                        </div>
                    <button type="submit" class="btn btn-primary mr-2" name="submit">Tambah</button>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->

        <!-- container-scroller -->
        <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="../assets/vendors/select2/select2.min.js"></script>
        <script src="../assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="../assets/vendors/chart.js/Chart.min.js"></script>
        <script src="../assets/vendors/moment/moment.min.js"></script>
        <script src="../assets/vendors/daterangepicker/daterangepicker.js"></script>
        <script src="../assets/vendors/chartist/chartist.min.js"></script>

        <script src="../assets/js/off-canvas.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="../assets/js/typeahead.js"></script>
        <script src="../assets/js/select2.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <!-- <script src="../assets/js/dashboard.js"></script> -->
        <!-- End custom js for this page -->
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