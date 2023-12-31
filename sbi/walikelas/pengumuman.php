<?php
session_start(); // Start the session first
error_reporting(0);
require_once('../system/app.php');

$conn = mysqli_connect("localhost", "root", "", "sbi");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $tanggal = $_POST['tanggal'];
    $isi = $_POST['isi'];
    $sql = "INSERT INTO pengumuman (judul, tanggal, isi) VALUES ('$judul', '$tanggal', '$isi')";
    $query = $conn->prepare($sql);
    $query->execute();
    header("location: pengumuman.php");
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
                            <img class="img-xs rounded-circle ml-2" src="./../assets/images/faces/face8.jpg" alt="Profile image">
                            <span class="font-weight-normal">Hello, <?php echo $_SESSION['user']['username']; ?></span></a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header d-flex">
                                <img class="img-md rounded-circle" src="./../assets/images/faces/face8.jpg" width="60px" alt="Profile image">
                                <div>
                                    <p class="mb-1 mt-3"></p>
                                    <p class="font-weight-light text-muted mb-0"><?php echo $_SESSION['user']['email']; ?></p>
                                </div>
                            </div>
                            <a class="dropdown-item" href="#"><i class="dropdown-item-icon icon-user text-primary"></i> My Profile</a>
                            <a class="dropdown-item" href="#"><i class="dropdown-item-icon icon-energy text-primary"></i> Change
                                Password</a>
                            <a class="dropdown-item" href="Login.html"><i class="dropdown-item-icon icon-power text-primary"></i>Sign
                                Out</a>
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
                                <li class="nav-item"> <a class="nav-link" href="tambah-kelas.html">Tambah Kelas</a></li>
                                <li class="nav-item"> <a class="nav-link" href="kelola-kelas.html">Kelola Kelas</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item  ">
                        <a class="nav-link dropdown-toggle" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic1">
                            <i class="icon-people menu-icon"></i>
                            <span class="menu-title">Siswa / i</span>
                        </a>
                        <div class="collapse" id="ui-basic1">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="tambah-siswa.html">Tambah Siswa/i</a></li>
                                <li class="nav-item"> <a class="nav-link" href="kelola-siswa.html">Kelola Siswa/i</a></li>
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
                    <li class="nav-item aktif">
                        <a class="nav-link" href="pengumuman.php">
                            <i class="icon-info menu-icon"></i>
                            <span class="menu-title">Pengumuman</span>
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
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> Pengumuman </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Pengumuman</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex " style="width: 100%; gap: 2rem;">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-sm-flex align-items-center mt-1">
                        <h4 align="center">Tambah Pengumuman </h4>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-5">
                                <div class="card-body">
                                    <form class="form-sample" action="" method="post">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Judul Pengumuman</label>
                                            <input type="text" class="form-control" id="exampleInputName1" name="judul" placeholder="Judul Pengumuman">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Tanggal</label>
                                            <input type="date" class="form-control" id="exampleInputName1" name="tanggal" placeholder="Tanggal">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Isi Pengumuman</label>
                                            <textarea class="form-control" id="exampleTextarea1" rows="4" name="isi"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-sm-flex align-items-center mt-1">
                        <h4 align="center">Data Pengumuman </h4>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive border rounded p-1">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="font-weight-bold">No</th>
                                            <th class="font-weight-bold">Judul Pengumuman</th>
                                            <th class="font-weight-bold">Tanggal</th>
                                            <th class="font-weight-bold">Isi Pengumuman</th>
                                            <th class="font-weight-bold">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Assuming you have a database connection in this script
                                        $conn = mysqli_connect("localhost", "root", "", "sbi");

                                        // Perform the database query to get announcements
                                        $sql = "SELECT * FROM pengumuman ORDER BY id ASC";
                                        $result = mysqli_query($conn, $sql);
                                        $no = 1;

                                        // Check if any announcements are returned
                                        if (mysqli_num_rows($result) > 0) {
                                            // Loop through the results and display the announcements in the table
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<tr>";
                                                echo "<td>" . $no++ . "</td>";
                                                echo "<td>" . $row['judul'] . "</td>";
                                                echo "<td>" . date('Y-m-d', strtotime($row['tanggal'])) . "</td>";
                                                echo "<td>" . $row['isi'] . "</td>";
                                                echo "<td><a href='../system/edit_pengumuman.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm'><i class='icon-pencil'></i></a> <a href='../system/delete_pengumuman.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah kamu yakin menghapus data ini?\");'><i class='icon-trash'></i></a></td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            // No announcements found
                                            echo "<tr><td colspan='5' class='text-center'>No announcements found</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="pagination-container mt-3">
                        <ul class="pagination justify-content-end">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </div>
                    <style>
                        .table {
                            width: 100%;
                            border-collapse: collapse;
                        }

                        .table th,
                        .table td {
                            padding: 10px;
                            text-align: left;
                            border-bottom: 1px solid #ddd;
                        }

                        .table th {
                            background-color: #cee3fa;
                        }

                        .table tbody tr:nth-child(even) {
                            background-color: #f9f9f9;
                        }

                        .table tbody tr:hover {
                            background-color: #e6e6e6;
                        }
                    </style>
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