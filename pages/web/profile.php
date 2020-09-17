<?php
   if(isset($_POST['updatepassword'])) {
      $oldpassword = $_POST['oldpassword'];
      $newpassword = $_POST['newpassword'];

      $query = "SELECT * FROM account WHERE id = $_SESSION[idnip]";
      $result = mysqli_query($p1, $query);
      if(mysqli_num_rows($result) === 1) {

         $row = mysqli_fetch_assoc($result);
         
         //Cek Apakah password lama itu sama dengan di database
         if(password_verify($oldpassword, $row['password'])) {
            $newpassword = password_hash($newpassword, PASSWORD_DEFAULT);
            $k = mysqli_query($p1, "UPDATE account SET password = '$newpassword' WHERE id = $_SESSION[idnip]");
            if($k){
                header("Location:index.php");
            }
         } else {
            echo "Old Password is not valid!";
         }
      }
   }
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/101f283466.js" crossorigin="anonymous"></script>
    <title>Edit Profile</title>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="./css/adminlte.min.css">
</head>

<body class="hold-transition">
    <div class="wrapper">
        <div style="margin-left:2%;margin-right:2%;margin-top:5px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h2>Profile</h2>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <!--<li class="breadcrumb-item"><a href="#">Home</a></li>-->
                                <!--<li class="breadcrumb-item active">User Profile</li>-->
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">

                            <!-- Profile Image -->
                            <?php
                            $profile = mysqli_query($p1,"SELECT * FROM informasiuser WHERE nip = $_SESSION[idnip]");
                            $ro = mysqli_fetch_assoc($profile);
                            ?>
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" src="<?php echo $_SESSION['img']; ?>" onerror="this.src = './image/profilegirl.png';" alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center" style="text-transform:capitalize;"><?php echo $_SESSION['user'];?></h3>

                                    <p class="text-muted text-center"><?= $ro['jabatan']?></p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Jabatan</b> <a class="float-right"><?= $ro['jabatan']?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Unit Kerja</b> <a class="float-right"><?= $ro['unitkerja']?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Nomor Induk Pegawai</b> <a class="float-right"><?= $ro['nip']?></a>
                                        </li>
                                    </ul>

                                    <!--<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>-->
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <!-- About Me Box -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">About Me</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <strong><i class="fas fa-book mr-1"></i> Education</strong>

                                    <p class="text-muted">
                                        <?= $ro['pendidikan']?>
                                    </p>

                                    <hr>

                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                                    <p class="text-muted">Malibu, California</p>

                                    <hr>

                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                                    <p class="text-muted">
                                        <span class="tag tag-danger">UI Design</span>
                                        <span class="tag tag-success">Coding</span>
                                        <span class="tag tag-info">Javascript</span>
                                        <span class="tag tag-warning">PHP</span>
                                        <span class="tag tag-primary">Node.js</span>
                                    </p>

                                    <hr>

                                    <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim
                                        neque.</p>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#history" data-toggle="tab">Progress</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="history">
                                          <!-- COPY INI -->
                                          <div class="post">
                                            <div class="user-block">
                                              <?php
                                              $rw2 = mysqli_query($p1, "SELECT * FROM registration WHERE (username = '$_SESSION[user]' AND verifikasi='yes')");
                                              while ($fetch2 = mysqli_fetch_assoc($rw2)) {
                                              ?>
                                                <div class="card">
                                                  <div class="card-header" style="background-color:#c6ffc0">
                                                    <div class="card-title">
                                                      <span style="text-align: center">Ditanggapi</span>
                                                    </div>
                                                  </div>
                    
                                                  <div class="card-body">
                                                    <div class="user-block">
                                                      <img class="img-circle img-bordered-sm" src="<?php echo $fetch2['image']; ?>" onerror="this.src = './image/placeholder.png';" alt="User Image">
                                                      <span class="username">
                                                        <a href="?<?php echo $row['title']; ?>=<?php echo session_id(); ?>&details=<?php echo $row['id']; ?>&page=diklats"><?php echo $fetch2['title']; ?></a>
                                                      </span>
                                                      <span class="description">Inspektur memberikan persetujuan - 3 days ago</span>
                                                    </div>
                                                  </div>
                                                </div>
                                              <?php
                                              }
                                              ?>
                                              <?php
                                              $rw2 = mysqli_query($p1, "SELECT * FROM registration WHERE (username = '$_SESSION[user]' AND verifikasi='no')");
                                              while ($fetch2 = mysqli_fetch_assoc($rw2)) {
                                              ?>
                                                <div class="card">
                                                  <div class="card-header" style="background-color:pink">
                                                    <div class="card-title">
                                                      <span style="text-align: center">Belum ditanggapi</span>
                                                    </div>
                                                  </div>
                    
                                                  <div class="card-body">
                                                    <div class="user-block">
                                                      <img class="img-circle img-bordered-sm" src="<?php echo $fetch2['image']; ?>" onerror="this.src = './image/placeholder.png';" alt="User Image">
                                                      <span class="username">
                                                        <a href="#"><?php echo $fetch2['title']; ?></a>
                                                      </span>
                                                      <span class="description">Menunggu Inspektur memberikan persetujuan - 3 days ago</span>
                                                    </div>
                                                  </div>
                                                </div>
                                              <?php
                                              }
                                              ?>
                                            </div>
                                            <!-- /.user-block -->
                                            <?php
                                            $rw2 = mysqli_query($p1, "SELECT * FROM registration WHERE (username = '$_SESSION[user]')");
                                            $fetch2 = mysqli_fetch_assoc($rw2);
                                            if($fetch2 == 0){
                                            ?>
                                            <div style="margin-left: auto;margin-right:auto;display: block;">
                                                <img src="image/notfound.png" style="width: 250px;margin-left: auto;margin-right:auto;display: block;">
                                                </img>
                                                <br>
                                                <p style="color: black;text-align:center;font-weight:bold;font-size:30px;">Kamu belum mendaftar Diklat!
                                                <p style="text-align:center;color:#919191;margin-top:-15px;">Setelah mendaftar, kamu bisa pantau prosesnya disini.</p>
                                                <p style="text-align:center;margin-top:-15px;"><a style="color:#db1818" href="./index.php#pilihdiklat">Daftar Sekarang</a></p></p>
                                            </div>
                                            <?php 
                                            }
                                            ?>
                                            <br>
                                            <br>
                                          </div>
                                          <!-- /.COPY INI -->
                                        </div>
                                        <!-- /.tab-pane -->
                                        <!--tab pane-->
                                        <div class="tab-pane" id="timeline">
                                          <!-- The timeline -->
                    
                                          <div class="timeline timeline-inverse">
                                            <!-- timeline time label -->
                                            <?php
                                            $datt = mysqli_query($p1, "SELECT * FROM registration WHERE (username = '$_SESSION[user]' AND verifikasi='yes') ORDER BY time DESC");
                                            while ($timmlnn = mysqli_fetch_assoc($datt)) {
                                            ?>
                                              <div class="time-label">
                                                <span class="bg-danger">
                                                  <?php
                                                  $daa = $timmlnn['time'];
                                                  $date = date("d-m-Y", strtotime($daa));
                                                  echo $date;
                                                  ?>
                                                </span>
                                              </div>
                                              <!-- /.timeline-label -->
                                              <!-- timeline item -->
                                              <div>
                                                <?php
                                                // if($timmlnn)
                                                ?>
                                                <img class="img-circle img-bordered-sm" style="margin-left: 10px;" width="45px" height="45px" src="<?php echo $timmlnn['image']; ?>" onerror="this.src = './image/profilegirl.png';" alt="User Image">
                    
                                                <div class="timeline-item">
                                                  <span class="time"><i class="far fa-clock"></i>1 hours ago</span>
                    
                                                  <h3 class="timeline-header border-0"><a href="#"><?php echo $timmlnn['title'] ?></a><br><br>Selesai
                                                  </h3>
                                                </div>
                                              </div>
                                              <!-- END timeline item -->
                                              <!-- timeline time label -->
                                            <?php
                                            }
                                            ?>
                                          </div>
                    
                                        </div>
                                        <!--./tab timeline-->
                                        <!--/.tab pane-->
                                        
                                        <!--tab setting-->
                                        <style>
                                          .profil a {
                                            color: red;
                                          }
                    
                                          .profil {
                                            margin: auto;
                                            /* width: 50%; */
                                            margin-top: 5px;
                                            border-radius: 20px;
                                            padding: 20px;
                                            border: 1px solid #ccc;
                                          }
                    
                                          .kontak {
                                            margin: auto;
                                            border-radius: 20px;
                                            padding: 20px;
                                            border: 1px solid #ccc;
                                            margin-top: 30px;
                                          }
                    
                                          .tablekontak {
                                            margin-top: 35px;
                                          }
                    
                                          .fas1 {
                                            position: absolute;
                    
                                            right: 15px;
                                            bottom: 22px;
                                          }
                    
                                          .fassandi {
                                            position: absolute;
                                          }
                    
                                          .fas2 {
                                            top: 77px;
                                            right: 15px;
                                          }
                    
                                          .fas3 {
                                            top: 127px;
                                            right: 15px;
                                          }
                    
                                          .fas4 {
                                            top: 177px;
                                            right: 15px;
                                          }
                    
                                          .tr:hover,
                                          .tr2:hover,
                                          .tr3:hover,
                                          .tr4:hover {
                                            cursor: pointer;
                                            background-color: #f1f1f1;
                                          }
                    
                                          .profil th {
                                            color: #5f6368;
                                          }
                                        </style>
                                        
                                        <div class="tab-pane" id="settings">
                                          <form class="form-horizontal">
                                            <div class="container">
                                              <div class="row profil">
                                                <div class="col-lg-12 mt-3">
                                                  <h3>Profile</h3>
                                                  <p class="mb-3">Beberapa info mungkin tidak diubah. <a href="#">Pelajari lebih lanjut</a></p>
                                                  <table class="table table-borderless">
                                                    <tr style="border-bottom: 1px solid #b7b7b7">
                                                      <th>Nama</th>
                                                      <td style="text-transform:uppercase;"><?php echo $_SESSION['user']; ?></td>
                                                    </tr>
                    
                                                    <tr style="border-bottom: 1px solid #b7b7b7">
                                                      <th>Tanggal Lahir</th>
                                                      <td><?php echo $_SESSION['tgllahir']; ?></td>
                                                    </tr>
                    
                                                    <tr style="border-bottom: 1px solid #b7b7b7">
                                                      <th>Jenis Kelamin</th>
                                                      <td><?php echo $_SESSION['gender']; ?></td>
                                                    </tr>
                    
                                                    <tr style="border-bottom: 1px solid #b7b7b7">
                                                      <th>NIP</th>
                                                      <td><?php echo $_SESSION['idnip']; ?></td>
                                                    </tr>
                    
                                                    <tr data-toggle="modal" data-target="#KataSandi" class="tr">
                                                      <th>Kata Sandi</th>
                                                      <td style="-webkit-text-security: disc;">1234567</td>
                                                    </tr>
                                                  </table>
                                                </div>
                                              </div>
                    
                                              <div class="row kontak">
                                                <div class="col-lg-12 mt-3">
                                                  <h3>Informasi Kontak</h3>
                                                  <table class="table tablekontak table-borderless">
                                                    <tr style="border-bottom: 1px solid #b7b7b7" class="tr2" data-toggle="modal" data-target="#Email">
                                                      <th>Email</th>
                                                      <td><?php echo $_SESSION['email']; ?></td>
                                                    </tr>
                    
                                                    <tr style="border-bottom: 1px solid #b7b7b7" class="tr3" data-toggle="modal" data-target="#NoTlp">
                                                      <th>No.Telp</th>
                                                      <td><?php echo $_SESSION['notelp']; ?></td>
                                                    </tr>
                    
                                                    <tr class="tr4" data-toggle="modal" data-target="#Tempat">
                                                      <th>Tempat</td>
                                                      <td><?php echo $_SESSION['tempat']; ?></td>
                                                    </tr>
                                                  </table>
                                                </div>
                                              </div>
                                            </div>
                                            <!-- Modal -->
                                            <div class="modal fade" id="KataSandi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                               <div class="modal-dialog modal-dialog-centered" role="document">
                                                 <div class="modal-content">
                                                   <div class="modal-header">
                                                     <!-- <h5 class="modal-title" id="exampleModalCenterTitle"></h5> -->
                                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                       <span aria-hidden="true">&times;</span>
                                                     </button>
                                                   </div>
                                                   <form action="" method="POST">
                                                   <div class="modal-body">
                                                           <div class="form-group">
                                                              <label for="pass">Kata sandi lama</label>
                                                              <input type="password" class="form-control" id="pass" name="oldpassword">
                                                           </div>
                                            
                                                           <div class="form-group">
                                                              <label for="pass2">Kata sandi baru</label>
                                                              <input type="password" class="form-control" id="pass2" name="newpassword">
                                                           </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary" name="updatepassword">Save changes</button>
                                                     </form>
                                                   </div>
                                                 </div>
                                               </div>
                                             </div>
                    
                                            <div class="modal fade" id="Email" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                              <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <!-- <h5 class="modal-title" id="exampleModalCenterTitle"></h5> -->
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <form action="" method="POST">
                                                      <div class="form-group">
                                                        <label for="pass">Email lama</label>
                                                        <input type="password" class="form-control" id="pass">
                                                      </div>
                    
                                                      <div class="form-group">
                                                        <label for="pass2">Email baru</label>
                                                        <input type="password" class="form-control" id="pass2">
                                                      </div>
                                                    </form>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                    
                    
                                            <div class="modal fade" id="NoTlp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                              <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <!-- <h5 class="modal-title" id="exampleModalCenterTitle"></h5> -->
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <form action="" method="POST">
                                                      <div class="form-group">
                                                        <label for="pass">No.Telp lama</label>
                                                        <input type="password" class="form-control" id="pass">
                                                      </div>
                    
                                                      <div class="form-group">
                                                        <label for="pass2">No.Telp baru</label>
                                                        <input type="password" class="form-control" id="pass2">
                                                      </div>
                                                    </form>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                    
                                            <div class="modal fade" id="Tempat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                              <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <!-- <h5 class="modal-title" id="exampleModalCenterTitle"></h5> -->
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <form action="" method="POST">
                                                      <div class="form-group">
                                                        <label for="pass">Tempat lama</label>
                                                        <input type="password" class="form-control" id="pass">
                                                      </div>
                    
                                                      <div class="form-group">
                                                        <label for="pass2">Tempat baru</label>
                                                        <input type="password" class="form-control" id="pass2">
                                                      </div>
                                                    </form>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <!-- Akhir Modal -->
                                          </form>
                                        </div>
                                        <!-- /.tab-pane -->
                                    </div>
                                    <!-- /.tab-content -->
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.nav-tabs-custom -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <footer style="text-align: center">
            <strong>Copyright &copy; 2020 Inspektorat Jenderal Kementerian Kesehatan.</strong>
        </footer>
        <style>
            footer{
               color: #707070;
               background-color:#fff;
               border: 1px solid rgba(0,0,0,.125);
               padding-top: 30px;
               padding-bottom: 30px;
            }
        </style>

    </div>
    <!-- ./wrapper -->
        
    <script src="./js/adminlte.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>