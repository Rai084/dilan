<?php
if (isset($_GET['details'])) {
    $id = $_GET['details'];

    $query = "
        SELECT * FROM posts 
        WHERE id = $id";
    $result = mysqli_query($p1, $query);
    $row = mysqli_fetch_assoc($result);
}
if (isset($_POST['buttondftr'])) {
    $q = "
        SELECT * FROM posts
        WHERE id = $id";
    $result = mysqli_query($p1, $query);
    $row = mysqli_fetch_assoc($result);
    $_SESSION['ada'] = $row['id'];
    $_SESSION['category'] = $row['category'];
    $_SESSION['title'] = $row['title'];
    $_SESSION['image'] = $row['image'];
}
if (isset($_POST['submit'])) {
    $username = $_POST['user'];
    $nip = $_POST['nip'];
    $email = $_POST['email'];
    $notelp = htmlspecialchars(trim($_POST['notelp']));
    $tempat = $_POST['tempat'];
    $gender = $_POST['gender'];
    $verifikasi = 'no';
    $query = mysqli_query($p1, "INSERT INTO registration(username,nip,email,notelp,tempat,gender,title,image,category,verifikasi,time) VALUES('$username','$nip','$email','$notelp','$tempat','$gender','" . $_SESSION['title'] . "','" . $_SESSION['image'] . "','" . $_SESSION['category'] . "','$verifikasi',NOW())");

    if ($query) {
        $update = mysqli_query($p1, "UPDATE account SET jumlahdiklat = jumlahdiklat + 1 WHERE nip = $_SESSION[idnip]");
        if($update){
            unset($_SESSION['ada']);
            unset($_SESSION['title']);
            unset($_SESSION['image']);
            unset($_SESSION['category']);
        }
    } else {
        die('error' . mysqli_error($p1));
    }
}

if (isset($_POST['batalreg'])) {
    unset($_SESSION['ada']);
    unset($_SESSION['title']);
    unset($_SESSION['image']);
    unset($_SESSION['category']);
}
?>
<style>
    @import url('https://fonts.googleapis.com/css?family=Nunito&display=swap');

    html {
        margin-bottom: 50px;
    }

    body {
        font-family: 'Nunito', sans-serif;
    }

    @media(min-width: 992px) {
        .showMenu {
            text-align: center;
            width: 100px;
            position: absolute;
            right: 100px;
            top: 55px;
            padding: 5px 10px;
            /* box-shadow: 0 0 10px 1px black; */
            display: none;
            transition: 1s;
            border-radius: 20px;
            overflow: hidden;
            background: white;
            opacity: 0;
        }

        #up {
            position: absolute;
            top: 20px;
            right: 91px;
            opacity: 0;
        }

        .showMenu a {
            font-size: 14px;
            margin-top: -10px !important;
            color: black;
            font-weight: 600;
            text-decoration: none;
            /* overflow: hidden; */
        }

        .showMenu a:hover {
            color: rgb(255, 0, 0);
        }

        .active {
            opacity: 1;
            top: 40px;
            display: block;
        }

        nav {
            margin-top: 0px;
        }

        .navbar-brand p {
            color: #DB1818;
            font-size: 20px;
            text-transform: uppercase;
            font-weight: 900;
        }

        .nav1 {
            color: #DB1818 !important;
            font-weight: 600;
            border: 2px solid #DB1818;
            border-radius: 20px;
            padding: 3px 20px !important;
            /* display: inline-block; */
            box-shadow: 0px 10px 10px -12px black;
            margin-right: 10px !important;
            transition: all .3s;
        }

        .nav1:hover {
            background-color: #DB1818;
            color: white !important;
            transform: scale(1.1);
        }

        .nav2 {
            margin-right: 10px;
        }

        .navbar-nav {
            margin-right: 80px;
        }

        .fa-angle-down {
            /* margin-left: 5px; */
            position: relative;
            left: 5px;
            top: 2px;
        }

        /* Jumbotron */
        .jumbotron {
            background-image: url('img/working.jpg');
            background-size: cover;
            height: 600px;
            text-align: center;
            z-index: 1;
            /* margin-top: -10px; */
            /* overflow: hidden; */
            /* background-position-y: 10px; */
        }

        .jumbotron::after {
            content: '';
            display: block;
            width: 100%;
            height: 110%;
            background-image: linear-gradient(to bottom, rgba(0, 0, 0, 1), rgba(0, 0, 0, 0));
            position: absolute;
            bottom: 0;
            z-index: -1;
        }

        .name {
            font-weight: 600;
            text-transform: capitalize;
            margin-right: 5px !important;
        }

        .name:hover {
            opacity: 0.8;
        }

        .btnPilih {
            margin-top: 37%;
            border: 2px solid #DB1818;
            color: #DB1818 !important;
            font-weight: 900;
            border-radius: 20px;
            padding: 5px 20px;
            transition: all .3s ease;
            /* text-shadow: 1px 1px 1px black; */
            box-shadow: 0px 10px 20px 5px black;
        }

        .btnPilih:hover {
            background-color: #DB1818;
            color: white !important;
            transform: scale(1.1);
        }

        .jumbotron p {
            margin-top: 10px;
            text-shadow: 1px 1px 1px black;
        }

    }

    .card {
        border: none;
        box-shadow: 0 0 12px 0px rgb(228, 227, 227);
        /* height: 340px; */
        transition: .4s;
    }

    #viewMore {
        border-radius: 20px;
        padding: 5px 20px;
        background-color: #db1818;
        color: white;
        font-size: 14px;
        font-weight: 500;
        transition: .4s;
        box-shadow: 0 0 10px -5px rgb(20, 20, 20);
        margin-top: 20px !important;
        margin-bottom: 100px;
    }

    .readMore {
        opacity: 0;
        transition: all 1s ease-out;
    }

    #viewMore:hover {
        font-weight: 600;
        margin-bottom: 98px;
        background: #fff;
        color: #db1818;
        border: 2px solid #db1818;
    }

    #viewMore:focus {
        box-shadow: none;
        outline: none;
    }

    .card-body {
        margin-top: -10px;
    }

    .Content {
        margin-top: 100px;
        display: grid;
        grid-template-columns: repeat(auto-fill);
        grid-row-gap: 10px;
    }

    .btnContent {
        border: 2px solid #DB1818;
        padding: 5px 15px;
        border-radius: 4px;
        color: #DB1818;
        font-size: 14px;
        font-weight: bold;
        transition: all .3s ease;
        text-decoration: none !important;
    }

    .btnContent:hover {
        background-color: #DB1818;
        color: white;
    }

    .card-text {
        font-size: 14px;
        font-weight: 100;
    }

    .inner {
        overflow: hidden;
    }

    .inner img {
        transition: all 1s ease;
    }

    .inner img:hover {
        transform: scale(1.1);
    }


    .col-lg {
        position: relative;
        left: 20px;
    }

    .card:hover {
        transform: scale(1);
    }
</style>
<?php if (!isset($_SESSION['ada'])) : ?>
    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../index2.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/101f283466.js" crossorigin="anonymous"></script>
        <script rel="stylesheet" src="./css/bootstrap-4.min.css"></script>
        <title>Details</title>
    </head>

    <body>
        <form method="POST">
            <div class="container" style="margin-top: 10%;">
                <div class="row mb-4">
                    <div class="col-lg-12">
                        <a href="index#pilihdiklat"><i class="fas fa-arrow-left fa-2x" style="color: #db1818;"></i></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center m-auto">
                        <div class="card mb-3" style="width: 100%;">
                            <div class="row no-gutters">
                                <div class="col-md-6">
                                    <img src="<?php echo $row['image']; ?>" onerror="this.src = './image/placeholder.png';" class="card-img" alt="" height="100%;" style="border-radius: 5px 0 0 5px">
                                </div>
                                <div class="col-md-6 p-3 text-center">
                                    <div class="card-body">
                                        <h5 class="card-title text-center mb-3 ml-3" style="font-weight: 600; font-size: 25px;"><?php echo $row['title']; ?></h5>
                                        <p class="card-text text-justify" style="font-size: 15px"><span class="ml-3">
                                        </span>Tempat: <span style="font-weight:600;"><?php echo $row['tempat']; ?></span></p>
                                        <p class="card-text text-justify" style="font-size: 15px"><span class="ml-3"></span>
                                        <?php
                                        $daa = $row['tanggal'];
                                        $da = $row['tanggal_end'];
                                        $date = date("d-m-Y", strtotime($daa));
                                        $dateend = date("d-m-Y", strtotime($da));
                                        ?>  
                                        Dari tanggal: <span style="font-weight: 600;"><?= $date ?></span> <span style="color:#db1818;font-size:10pt;font-weight: 600;">s.d</span> <span style="font-weight: 600;"><?= $dateend ?></span></p>
                                        <hr style="border:1px solid #666;border-radius:1px">
                                        <p class="card-text text-justify" style="font-size: 15px"><span class="ml-3"></span><?php echo $row['description']; ?></p>
                                        <button type="submit" name="buttondftr" class="btn btn-success m-auto" style="border-radius: 20px; position:relative; top: 0px; padding: 6px 25px;">Daftar Sekarang</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>

        <div class="row">
            <div class="col-lg-12">
                <a href="index#pilihdiklat" class="btn btn-info" style="border-radius: 20px; padding: 5px 20px;">Kembali</a>
            </div>
        </div>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script>
            $('.Menu').on('mouseover', function() {
                $('.showMenu').css({
                    'display': 'block',
                    'opacity': '1',
                    'top': '40px',
                })
                $('#up').css({
                    'opacity': '1'
                })

                $('#down').css({
                    'opacity': '0'
                })
            });

            $('body').on('mouseout', function() {
                $('.showMenu').css({
                    'display': 'none'
                })

                $('#up').css({
                    'opacity': '0'
                })

                $('#down').css({
                    'opacity': '1'
                })
            });
        </script>
    </body>

    </html>
<?php else : ?>
    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <title>Hello, world!</title>
        <style>
            @import url('https://fonts.googleapis.com/css?family=Nunito&display=swap');

            body {
                font-family: 'Nunito';
            }

            input {
                position: relative;
                left: -10%;
                width: 112% !important;
            }

            label {
                font-weight: 600;
                color: #707070;
                margin-top: 5px;
            }

            h3 {
                font-size: 22px;
                text-transform: uppercase;
            }

            h3::after {
                content: '';
                margin-top: 9px !important;
                width: 50px;
                height: 3px;
                border-radius: 50px;
                background-color: #1641ff;
                display: block;
                margin: auto;
                /* border-bottom: 2px solid black; */
            }
        </style>
    </head>

    <body>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 shadow p-4">
                    <h3 class="text-center mb-4" style="color: #000">Daftar Diklat</h3>
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-3 mb-3">
                                <label for="nama">Nama </label>
                            </div>
                            <div class="col-9">
                                <input value="<?php echo $_SESSION['user']; ?>" type="text" id="nama" disabled class="form-control" style="width: 100%;">
                                <input value="<?php echo $_SESSION['user']; ?>" style="text-transform: uppercase" type="hidden" id="nama" name="user" class="form-control" style="width: 100%;">
                            </div>

                            <div class="col-3 mb-3">
                                <label for="tgl">NIP </label>
                            </div>
                            <div class="col-9">
                                <input type="text" value="<?php echo $_SESSION['idnip']; ?>" disabled id="tgl" class="form-control" style="width: 100%;">
                                <input value="<?php echo $_SESSION['idnip']; ?>" style="text-transform: uppercase" type="hidden" id="nama" name="nip" class="form-control" style="width: 100%;">
                            </div>

                            <div class="col-3 mb-3">
                                <label for="klmn">Email </label>
                            </div>
                            <div class="col-9">
                                <input type="text" disabled value="<?php echo $_SESSION['email']; ?>" id="klmn" class="form-control" style="width: 100%;">
                                <input value="<?php echo $_SESSION['email']; ?>" style="text-transform: uppercase" type="hidden" id="nama" name="email" class="form-control" style="width: 100%;">
                            </div>

                            <div class="col-3 mb-3">
                                <label for="klmn">Tempat </label>
                            </div>
                            <div class="col-9">
                                <input type="text" id="klmn" value="<?php echo $_SESSION['tempat']; ?>" disabled class="form-control" style="width: 100%;">
                                <input value="<?php echo $_SESSION['tempat']; ?>" style="text-transform: uppercase" type="hidden" id="nama" name="tempat" class="form-control" style="width: 100%;">
                            </div>

                            <div class="col-3 mb-3">
                                <label for="klmn">Gender </label>
                            </div>
                            <div class="col-9">
                                <input type="text" disabled value="<?php echo $_SESSION['gender']; ?>" id="klmn" class="form-control" style="width: 100%;">
                                <input value="<?php echo $_SESSION['gender']; ?>" style="text-transform: uppercase" type="hidden" id="nama" name="gender" class="form-control" style="width: 100%;">
                            </div>

                            <div class="col-3 mb-3">
                                <label for="klmn">Telp </label>
                            </div>
                            <div class="col-9">
                                <input type="text" value="<?php echo $_SESSION['notelp']; ?>" id="klmn" name="notelp" class="form-control" style="width: 100%;">
                            </div>
                        </div>
                        <button class="mt-3 btn btn-success btn-block swalDefaultSuccess" id="daftrrswal" type="submit" name="submit">Daftar</button>
                        <button class="mt-3 btn btn-danger btn-block" type="submit" name="batalreg">Batal</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="./js/sweetalert2.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script type="text/javascript">
            $("#daftrrswal").click(function() {
                swal({
                    title: "Yeah kamu berhasil mendaftar!",
                    icon: "success",
                    button: "Aww yiss!",
                });
            })
        </script>
    </body>

    </html>

<?php endif; ?>