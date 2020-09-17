<?php
require 'adminconfig.php';
if (isset($_SESSION['level']) && $_SESSION['level'] != "admin") {
  header("Location: ../index");
}
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  mysqli_query($p1, "SELECT * FROM posts WHERE id='$id'");
}
if (isset($_POST['editdiklat'])) {
  $title = $_POST['title'];
  $tggl = $_POST['tanggal'];
  $tgglend = $_POST['tanggalend'];
  $tempat = $_POST['tempat'];
  $gambar = $_POST['pilihgmbr'];
  $deskripsi = $_POST['deskripsi'];
  $category = $_POST['kategori'];
  $queque = mysqli_query($p1, "UPDATE posts SET title = '$title',tempat = '$tempat',tanggal = '$tggl',tanggal_end = '$tgglend',image='$gambar',category='$category', description='$deskripsi' WHERE id=$id ");
  if ($queque) {
      header("Location: adddiklat");
  } else {
    die('error' . mysqli_error($p1));
  }
}

if (isset($_POST['canceledit'])){
    header("Location: adddiklat");
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tambah Diklat</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini sidebar-collapse layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index" class="nav-link">Home</a>
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
      <!-- <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a> -->

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= $_SESSION['img']; ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block" style="text-transform: capitalize"><?= $_SESSION['user']; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./index" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dashboard</p>
                  </a>
                </li>
              </ul>
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
              <h1>Edit diklat</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">General Form</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <form action="" method="POST">
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <!-- left column -->
              <div class="col-md-6">
                <!-- Form Element sizes -->
                <div class="card card-success">
                  <div class="card-header">
                    <h3 class="card-title"></h3>
                  </div>
                  <?php
                  $ss = mysqli_query($p1,"SELECT * FROM posts WHERE id=$id");
                  $fetch = mysqli_fetch_assoc($ss);
                  ?>
                  <div class="card-body">
                    <label>Judul Diklat</label>
                    <input value="<?= $fetch['title']; ?>" class="form-control" name="title" type="text" placeholder="Masukan judul" required>
                    <br>
                    <label>Tempat</label>
                    <input value="<?= $fetch['tempat']; ?>" class="form-control" name="tempat" type="text" placeholder="Masukan judul" required>
                    <br>
                    <label>Tanggal Mulai</label>
                    <input value="<?= $fetch['tanggal']; ?>" class="form-control" name="tanggal" type="date" placeholder="Masukan tanggal mulai" required>
                    <br>
                    <label>Tanggal Selesai</label>
                    <input value="<?= $fetch['tanggal_end']; ?>" class="form-control" name="tanggalend" type="date" placeholder="Masukan tanggal berakhir" required>
                    <br>
                    <label>Gambar</label>
                    <input value="<?= $fetch['image']; ?>" class="form-control" name="pilihgmbr" type="text" placeholder="Link gambar (Optional)">
                    <!--<div class="custom-file">-->
                    <!--  <input type="file" class="custom-file-input" name="pilihgmbr" id="exampleInputFile">-->
                    <!--  <label class="custom-file-label" for="exampleInputFile">Pilih gambar</label>-->
                    <!--</div>-->
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
              <!--/.col (left) -->
              <!-- right column -->
              <div class="col-md-6">
                <!-- general form elements disabled -->
                <div class="card card-warning">
                  <div class="card-header">
                    <h3 class="card-title"></h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      <div class="row">
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <!-- select -->
                          <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control" name="kategori" required>
                              <option value="<?= $fetch['category'] ?>">
                                  <?php
                                  if ($fetch['category'] == 'substansi') {
                                    echo 'Diklat Substansi Teknis';
                                  }elseif($fetch['category'] == 'sertifikatnasional'){
                                    echo 'Sertifikasi';
                                  }elseif($fetch['category'] == 'diklatpenunjang'){
                                    echo 'Diklat Penunjang';
                                  }elseif($fetch['category'] == 'penjenjangan'){
                                    echo 'Diklat Penjenjangan Auditor';
                                  }elseif($fetch['category'] == 'alokasi'){
                                    echo 'Alokasi Pertemuan/Workshop/Konferensi bidang pengawasan tingkat nasional dan internasional';
                                  }elseif($fetch['category'] == 'pelatihankantorsendiri'){
                                    echo 'Pelatihan Kantor Sendiri/Sosialisasi Pengawasan';
                                  }
                                  ?>
                              </option>
                              <option value="substansi">Diklat Substansi Teknis (Pola Pembiayaan PNBO)</option>
                              <option value="sertifikatnasional">Sertifikasi</option>
                              <option value="diklatpenunjang">Diklat Penunjang</option>
                              <option value="penjenjangan">Diklat Penjenjangan Auditor</option>
                              <option value="alokasi">Alokasi Pertemuan/Workshop/Konferensi bidang pengawan tingkat nasional dan internasional</option>
                              <option value="pelatihankantorsendiri">Pelatihan Kantor Sendiri/Sosialisasi Pengawasan</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <!-- textarea -->
                          <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="7" placeholder="Deskripsi ..." required><?= $fetch['description']; ?></textarea>
                          </div>
                        </div>
                      </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" name="canceledit" class="float-left btn btn-primary">Cancel</button>
                    <button type="submit" name="editdiklat" class="float-right btn btn-danger">Submit</button>
                  </div>
                </div>
                <!-- /.card -->
              </div>
              <!--/.col (right) -->
            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </section>
      </form>
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
  <!-- bs-custom-file-input -->
  <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
</body>
</html>