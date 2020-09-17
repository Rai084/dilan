<?php
session_start();
require 'adminconfig.php';
if (isset($_SESSION['hash']) && $_SESSION['hash'] != "admin") {
  header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pendaftar Diklat - Diperal</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
</head>

<body class="hold-transition sidebar-mini sidebar-collapse layout-fixed">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <!--<a href="index3.html" class="brand-link">-->
      <!--  <img src="dist/img/AdminLTELogo.png" alt=" Logo" class="brand-image img-circle elevation-3" style="opacity: .8">-->
      <!--  <span class="brand-text font-weight-light">Admin Diperal</span>-->
      <!--</a>-->

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?php echo $_SESSION['img']; ?>" onerror="this.src = '../image/profilegirl.png';" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block" style="text-transform: capitalize"><?php echo $_SESSION['user']; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="index.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dashboard v1</p>
                  </a>
                </li>
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
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Pendaftar Diklat</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Pendaftar Diklat</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- Default box -->
                <!--diklat substansi-->
                <?php
                $rw = mysqli_query($p1, "SELECT * FROM registration WHERE category= 'substansi'");
                $fetch = mysqli_fetch_assoc($rw);
                if ($fetch > 0) {
                ?>
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title" style="text-transform: uppercase;">
                        Kategori - Substansi
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Nama</th>
                            <th>Judul Diklat</th>
                            <th>NIP</th>
                            <th>Email</th>
                            <th>No Telp</th>
                            <th>Tempat</th>
                            <th>Jenis Kelamin</th>
                            <th>Gambar Diklat</th>
                            <th>&nbsp;</th>
                          </tr>
                        </thead>
                        <?php
                        $rw = mysqli_query($p1, "SELECT * FROM registration WHERE category = 'substansi'");
                        while ($fetch = mysqli_fetch_assoc($rw)) {
                        ?>
                          <tr>
                            <td style="text-transform: uppercase;"><?php echo $fetch['username'] ?></td>
                            <td><?php echo $fetch['title'] ?></td>
                            <td><?php echo $fetch['nip'] ?></td>
                            <td><?php echo $fetch['email'] ?></td>
                            <td><?php echo $fetch['notelp'] ?></td>
                            <td><?php echo $fetch['tempat'] ?></td>
                            <td><?php echo $fetch['gender'] ?></td>
                            <td>
                              <img style="width:70px;height:auto;" src=" <?php echo $fetch['image'] ?>" alt="<?php echo $fetch['title'] ?>">
                            </td>
                            <td>
                              <?php
                              if($fetch['verifikasi'] == 'yes'){
                              ?>
                              <i style="color: green;text-align:left;" class="fas fa-check-circle"></i>
                              <?php
                              }else{
                              ?>
                              <i class="fas fa-times-circle" style="color:#db1818;text-align:left;"></i>
                              <?php
                              }
                              ?>
                            </td>
                          </tr>
                        <?php
                        }
                        ?>
                        <tfoot>
                          <tr>
                            <th>Nama</th>
                            <th>Judul Diklat</th>
                            <th>NIP</th>
                            <th>Email</th>
                            <th>No Telp</th>
                            <th>Tempat</th>
                            <th>Jenis Kelamin</th>
                            <th>Gambar Diklat</th>
                            <th>&nbsp;</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                <?php
                }
                ?>
                <!-- /.card -->
              
              <!-- Default box -->
              <!--diklat sertifikasi-->
                <?php
                $rw = mysqli_query($p1, "SELECT * FROM registration WHERE category= 'sertifikatnasional'");
                $fetch = mysqli_fetch_assoc($rw);
                if ($fetch > 0) {
                ?>
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title" style="text-transform: uppercase;">
                        Kategori - Diklat Sertifikasi
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Nama</th>
                            <th>Judul Diklat</th>
                            <th>NIP</th>
                            <th>Email</th>
                            <th>No Telp</th>
                            <th>Tempat</th>
                            <th>Jenis Kelamin</th>
                            <th>Gambar Diklat</th>
                            <th>&nbsp;</th>
                          </tr>
                        </thead>
                        <?php
                        $rw = mysqli_query($p1, "SELECT * FROM registration WHERE category = 'sertifikatnasional'");
                        while ($fetch = mysqli_fetch_assoc($rw)) {
                        ?>
                          <tr>
                            <td style="text-transform: uppercase;"><?php echo $fetch['username'] ?></td>
                            <td><?php echo $fetch['title'] ?></td>
                            <td><?php echo $fetch['nip'] ?></td>
                            <td><?php echo $fetch['email'] ?></td>
                            <td><?php echo $fetch['notelp'] ?></td>
                            <td><?php echo $fetch['tempat'] ?></td>
                            <td><?php echo $fetch['gender'] ?></td>
                            <td>
                              <img style="width:70px;height:auto;" src=" <?php echo $fetch['image'] ?>" alt="<?php echo $fetch['title'] ?>">
                            </td>
                            <td>
                              <?php
                              if($fetch['verifikasi'] == 'yes'){
                              ?>
                              <i style="color: green;text-align:left;" class="fas fa-check-circle"></i>
                              <?php
                              }else{
                              ?>
                              <i class="fas fa-times-circle" style="color:#db1818;text-align:left;"></i>
                              <?php
                              }
                              ?>
                            </td>
                          </tr>
                        <?php
                        }
                        ?>
                        <tfoot>
                          <tr>
                            <th>Nama</th>
                            <th>Judul Diklat</th>
                            <th>NIP</th>
                            <th>Email</th>
                            <th>No Telp</th>
                            <th>Tempat</th>
                            <th>Jenis Kelamin</th>
                            <th>Gambar Diklat</th>
                            <th>&nbsp;</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                <?php
                }
                ?>
                <!--diklat penunjang-->
                <?php
                $rw = mysqli_query($p1, "SELECT * FROM registration WHERE category= 'diklatpenunjang'");
                $fetch = mysqli_fetch_assoc($rw);
                if ($fetch > 0) {
                ?>
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title" style="text-transform: uppercase;">
                        Kategori - Diklat Penunjang
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Nama</th>
                            <th>Judul Diklat</th>
                            <th>NIP</th>
                            <th>Email</th>
                            <th>No Telp</th>
                            <th>Tempat</th>
                            <th>Jenis Kelamin</th>
                            <th>Gambar Diklat</th>
                            <th>&nbsp;</th>
                          </tr>
                        </thead>
                        <?php
                        $rw = mysqli_query($p1, "SELECT * FROM registration WHERE category = 'diklatpenunjang'");
                        while ($fetch = mysqli_fetch_assoc($rw)) {
                        ?>
                          <tr>
                            <td style="text-transform: uppercase;"><?php echo $fetch['username'] ?></td>
                            <td><?php echo $fetch['title'] ?></td>
                            <td><?php echo $fetch['nip'] ?></td>
                            <td><?php echo $fetch['email'] ?></td>
                            <td><?php echo $fetch['notelp'] ?></td>
                            <td><?php echo $fetch['tempat'] ?></td>
                            <td><?php echo $fetch['gender'] ?></td>
                            <td>
                              <img style="width:70px;height:auto;" src=" <?php echo $fetch['image'] ?>" alt="<?php echo $fetch['title'] ?>">
                            </td>
                            <td>
                              <?php
                              if($fetch['verifikasi'] == 'yes'){
                              ?>
                              <i style="color: green;text-align:left;" class="fas fa-check-circle"></i>
                              <?php
                              }else{
                              ?>
                              <i class="fas fa-times-circle" style="color:#db1818;text-align:left;"></i>
                              <?php
                              }
                              ?>
                            </td>
                          </tr>
                        <?php
                        }
                        ?>
                        <tfoot>
                          <tr>
                            <th>Nama</th>
                            <th>Judul Diklat</th>
                            <th>NIP</th>
                            <th>Email</th>
                            <th>No Telp</th>
                            <th>Tempat</th>
                            <th>Jenis Kelamin</th>
                            <th>Gambar Diklat</th>
                            <th>&nbsp;</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                <?php
                }
                ?>
                <!--table diklat penjenjangan-->
                <?php
                $rw = mysqli_query($p1, "SELECT * FROM registration WHERE category= 'penjenjangan'");
                $fetch = mysqli_fetch_assoc($rw);
                if ($fetch > 0) {
                ?>
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title" style="text-transform: uppercase;">
                        Kategori - Diklat Penjenjangan Auditor
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Nama</th>
                            <th>Judul Diklat</th>
                            <th>NIP</th>
                            <th>Email</th>
                            <th>No Telp</th>
                            <th>Tempat</th>
                            <th>Jenis Kelamin</th>
                            <th>Gambar Diklat</th>
                            <th>&nbsp;</th>
                          </tr>
                        </thead>
                        <?php
                        $rw = mysqli_query($p1, "SELECT * FROM registration WHERE category = 'penjenjangan'");
                        while ($fetch = mysqli_fetch_assoc($rw)) {
                        ?>
                          <tr>
                            <td style="text-transform: uppercase;"><?php echo $fetch['username'] ?></td>
                            <td><?php echo $fetch['title'] ?></td>
                            <td><?php echo $fetch['nip'] ?></td>
                            <td><?php echo $fetch['email'] ?></td>
                            <td><?php echo $fetch['notelp'] ?></td>
                            <td><?php echo $fetch['tempat'] ?></td>
                            <td><?php echo $fetch['gender'] ?></td>
                            <td>
                              <img style="width:70px;height:auto;" src=" <?php echo $fetch['image'] ?>" alt="<?php echo $fetch['title'] ?>">
                            </td>
                            <td>
                              <?php
                              if($fetch['verifikasi'] == 'yes'){
                              ?>
                              <i style="color: green;text-align:left;" class="fas fa-check-circle"></i>
                              <?php
                              }else{
                              ?>
                              <i class="fas fa-times-circle" style="color:#db1818;text-align:left;"></i>
                              <?php
                              }
                              ?>
                            </td>
                          </tr>
                        <?php
                        }
                        ?>
                        <tfoot>
                          <tr>
                            <th>Nama</th>
                            <th>Judul Diklat</th>
                            <th>NIP</th>
                            <th>Email</th>
                            <th>No Telp</th>
                            <th>Tempat</th>
                            <th>Jenis Kelamin</th>
                            <th>Gambar Diklat</th>
                            <th>&nbsp;</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                <?php
                }
                ?>
                <!--table diklat alokasi-->
                <?php
                $rw = mysqli_query($p1, "SELECT * FROM registration WHERE category= 'alokasi'");
                $fetch = mysqli_fetch_assoc($rw);
                if ($fetch > 0) {
                ?>
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title" style="text-transform: uppercase;">
                        Kategori - Alokasi Workshop
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Nama</th>
                            <th>Judul Diklat</th>
                            <th>NIP</th>
                            <th>Email</th>
                            <th>No Telp</th>
                            <th>Tempat</th>
                            <th>Jenis Kelamin</th>
                            <th>Gambar Diklat</th>
                            <th>&nbsp;</th>
                          </tr>
                        </thead>
                        <?php
                        $rw = mysqli_query($p1, "SELECT * FROM registration WHERE category = 'alokasi'");
                        while ($fetch = mysqli_fetch_assoc($rw)) {
                        ?>
                          <tr>
                            <td style="text-transform: uppercase;"><?php echo $fetch['username'] ?></td>
                            <td><?php echo $fetch['title'] ?></td>
                            <td><?php echo $fetch['nip'] ?></td>
                            <td><?php echo $fetch['email'] ?></td>
                            <td><?php echo $fetch['notelp'] ?></td>
                            <td><?php echo $fetch['tempat'] ?></td>
                            <td><?php echo $fetch['gender'] ?></td>
                            <td>
                              <img style="width:70px;height:auto;" src=" <?php echo $fetch['image'] ?>" alt="<?php echo $fetch['title'] ?>">
                            </td>
                            <td>
                              <?php
                              if($fetch['verifikasi'] == 'yes'){
                              ?>
                              <i style="color: green;text-align:left;" class="fas fa-check-circle"></i>
                              <?php
                              }else{
                              ?>
                              <i class="fas fa-times-circle" style="color:#db1818;text-align:left;"></i>
                              <?php
                              }
                              ?>
                            </td>
                          </tr>
                        <?php
                        }
                        ?>
                        <tfoot>
                          <tr>
                            <th>Nama</th>
                            <th>Judul Diklat</th>
                            <th>NIP</th>
                            <th>Email</th>
                            <th>No Telp</th>
                            <th>Tempat</th>
                            <th>Jenis Kelamin</th>
                            <th>Gambar Diklat</th>
                            <th>&nbsp;</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                <?php
                }
                ?>
                <!--diklat kantor sendiri-->
                <?php
                $rw = mysqli_query($p1, "SELECT * FROM registration WHERE category= 'pelatihankantorsendiri'");
                $fetch = mysqli_fetch_assoc($rw);
                if ($fetch > 0) {
                ?>
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title" style="text-transform: uppercase;">
                        Kategori - Pelatihan Kantor Sendiri
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Nama</th>
                            <th>Judul Diklat</th>
                            <th>NIP</th>
                            <th>Email</th>
                            <th>No Telp</th>
                            <th>Tempat</th>
                            <th>Jenis Kelamin</th>
                            <th>Gambar Diklat</th>
                            <th>&nbsp;</th>
                          </tr>
                        </thead>
                        <?php
                        $rw = mysqli_query($p1, "SELECT * FROM registration WHERE category = 'pelatihankantorsendiri'");
                        while ($fetch = mysqli_fetch_assoc($rw)) {
                        ?>
                          <tr>
                            <td style="text-transform: uppercase;"><?php echo $fetch['username'] ?></td>
                            <td><?php echo $fetch['title'] ?></td>
                            <td><?php echo $fetch['nip'] ?></td>
                            <td><?php echo $fetch['email'] ?></td>
                            <td><?php echo $fetch['notelp'] ?></td>
                            <td><?php echo $fetch['tempat'] ?></td>
                            <td><?php echo $fetch['gender'] ?></td>
                            <td>
                              <img style="width:70px;height:auto;" src=" <?php echo $fetch['image'] ?>" alt="<?php echo $fetch['title'] ?>">
                            </td>
                            <td>
                              <?php
                              if($fetch['verifikasi'] == 'yes'){
                              ?>
                              <i style="color: green;text-align:left;" class="fas fa-check-circle"></i>
                              <?php
                              }else{
                              ?>
                              <i class="fas fa-times-circle" style="color:#db1818;text-align:left;"></i>
                              <?php
                              }
                              ?>
                            </td>
                          </tr>
                        <?php
                        }
                        ?>
                        <tfoot>
                          <tr>
                            <th>Nama</th>
                            <th>Judul Diklat</th>
                            <th>NIP</th>
                            <th>Email</th>
                            <th>No Telp</th>
                            <th>Tempat</th>
                            <th>Jenis Kelamin</th>
                            <th>Gambar Diklat</th>
                            <th>&nbsp;</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                <?php
                }
                ?>
                <?php
                $rw22 = mysqli_query($p1, "SELECT * FROM registration");
                $fetch22 = mysqli_fetch_assoc($rw22);
                if($fetch22 == 0) {
                ?>
                <div style="margin-left: auto;margin-right:auto;display: block;"><img src="https://firebasestorage.googleapis.com/v0/b/diklatapps.appspot.com/o/notfound.png?alt=media&token=23c187ac-32de-4e28-b8b7-f968a78cb52b" style="width: 300px;margin-left: auto;margin-right:auto;display: block;"></img><br><p style="color: black;text-align:center;font-weight:bold;font-size:35px;">Belum ada diklat yang tersedia<br><p style="text-align:center;color:#919191;">Nanti kalau sudah ada, diklat akan muncul disini</p></p></div>
                <?php
                }
                ?>
              <!-- /.card -->
            </div>
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer" style="text-align: center">
      <strong>Copyright &copy; 2020 Inspektorat Jenderal Kementerian Kesehatan.</strong>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- DataTables -->
  <script src="plugins/datatables/jquery.dataTables.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- page script -->
  <script>
    $(function() {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
      });
    });
  </script>

</body>

</html>