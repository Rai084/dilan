<?php
session_start();
require 'adminconfig.php';
if (isset($_SESSION['level']) && $_SESSION['level'] != "admin") {
  header("Location: ../index");
}
if (isset($_POST['tambahdiklat'])) {
  $title = $_POST['title'];
  $tggl = $_POST['tanggal'];
  $tgglend = $_POST['tanggalend'];
  $gambar = $_POST['pilihgmbr'];
  $tempat = $_POST['tempat'];
  $deskripsi = $_POST['deskripsi'];
  $category = $_POST['kategori'];
  $queque = mysqli_query($p1, "INSERT INTO posts(image,title,tempat,category,description,tanggal,tanggal_end) VALUES('$gambar','$title','$tempat','$category','$deskripsi','$tggl','$tgglend')");
  if ($queque) {
  } else {
    die('error' . mysqli_error($p1));
  }
}
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  mysqli_query($p1, "DELETE FROM posts WHERE id='$id'");
  header("Location: adddiklat");
}
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  mysqli_query($p1, "SELECT * FROM posts WHERE id='$id'");
  
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
              <h1>Tambah Diklat Baru</h1>
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
                  <div class="card-body">
                    <label>Judul Diklat</label>
                    <input class="form-control" name="title" type="text" placeholder="Masukan judul" required>
                    <br>
                    <label>Tempat Dilaksanakan</label>
                    <input class="form-control" name="tempat" type="text" placeholder="Tempat dilaksanakannya Diklat" required>
                    <br>
                    <label>Tanggal Mulai</label>
                    <input class="form-control" name="tanggal" type="date" placeholder="Masukan tanggal mulai" required>
                    <br>
                    <label>Tanggal Selesai</label>
                    <input value="<?php echo $fetch['tanggal_end']; ?>" class="form-control" name="tanggalend" type="date" placeholder="Masukan tanggal berakhir" required>
                    <br>
                    <label>Gambar</label>
                    <input class="form-control" name="pilihgmbr" type="text" placeholder="Link gambar (Optional)">
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
                    <form role="form">
                      <div class="row">
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <!-- select -->
                          <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control" name="kategori" required>
                              <option value="" selected disabled>-- Pilih Kategori --</option>
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
                            <textarea name="deskripsi" class="form-control" rows="7" placeholder="Deskripsi ..." required></textarea>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                        <button type="submit" name="tambahdiklat" class="btn btn-danger float-right" title="Tambah">Submit</button>
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
    <?php
        $qqq = mysqli_query($p1, "SELECT * FROM posts ORDER BY id DESC");
        $fetch = mysqli_fetch_assoc($qqq);
        if ($fetch > 0) {
    ?>
    <div class="col-md-12">
        <div class="card">
          <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Judul Diklat</th>
                    <th>Tempat</th>
                    <th>Kategori</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <?php
                $rw = mysqli_query($p1, "SELECT * FROM posts ORDER BY id DESC");
                while ($fetch = mysqli_fetch_assoc($rw)) {
                ?>
                  <tr>
                    <td><?= $fetch['title'] ?></td>
                    <td><?= $fetch['tempat'] ?></td>
                    <td>
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
                    </td>
                    <td><div style="text-align: justify;text-justify: inter-word;"><?php echo $fetch['description'] ?></div></td>
                    <td>
                      <img style="width:70px;height:auto;" src=" <?php echo $fetch['image'] ?>" alt="<?php echo $fetch['title'] ?>">
                    </td>
                    <td>
                    <?php
                      $daa = $fetch['tanggal'];
                      $date = date("d-m-Y", strtotime($daa));
                      echo $date;
                    ?>
                    </td>
                    <td>
                    <?php
                      $daa1 = $fetch['tanggal_end'];
                      $date_end = date("d-m-Y", strtotime($daa1));
                      echo $date_end;
                    ?>
                    </td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="edit?edit=<?= $fetch['id'] ?>" class="btn btn-info" title="Edit"><i class="fas fa-edit"></i></a>
                        <a class="deletediklat btn btn-danger" href="?delete=<?= $fetch['id'] ?>" title="Hapus"><i class="fas fa-trash"></i></a>
                      </div>
                    </td>
                  </tr>
                <?php
                }
                ?>
                <tfoot>
                  <tr>
                    <th>Judul Diklat</th>
                    <th>Tempat</th>
                    <th>Kategori</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Edit</th>
                  </tr>
                </tfoot>
              </table>
          </div>
        </div>
      </div>
    <?php
    }
    ?>
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
  <script src="plugins/datatables/jquery.dataTables.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script type="text/javascript">
    $('.deletediklat').on('click', function(e) {
      e.preventDefault();
      const href = $(this).attr('href')

      Swal.fire({
        title: 'Yakin?',
        text: 'Diklat akan dihapus',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete!',
        allowOutsideClick: false
      }).then((result) => {
        if (result.value) {
          document.location.href = href;
        }
      });
    });
  
    $(document).ready(function() {
      bsCustomFileInput.init();
    });
    
    $(function() {
        $('#example1').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": true,
        });
    });
  </script>
</body>
</html>