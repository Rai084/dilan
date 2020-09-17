<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/101f283466.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Nunito&display=swap');

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

        .card:hover {
            transform: scale(1.1);
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

        .inner::after {}

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

        h3 .judul::after {
            content: '';
            display: block;
            margin-top: 5px;
            width: 30px;
            border-radius: 20px;
            border-bottom: 2px solid white;
        }

        .card:hover {
            transform: scale(1);
        }
    </style>
    <title>Diklat Substansi Teknik</title>

</head>

<body>
    <div class="container" style="margin-top: 3%;">
        <div class="row mb-4">
            <div class="col-lg-12">
                <a href="/"><i class="fas fa-arrow-left fa-2x" style="color: #db1818;"></i></a>
            </div>
        </div>
        <?php
        $query = "
        SELECT * FROM posts
        WHERE category = 'substansi'";
        $result = mysqli_query($p1, $query);
        $ha = mysqli_fetch_assoc($result);
        if ($ha > 0) {
        ?>
            <div class="row">
                <?php
                $query = "
                SELECT * FROM posts
                WHERE category = 'substansi'";
                $result = mysqli_query($p1, $query);
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="col-lg-6 col-md-6 m-auto mb-5">
                        <div class="card mb-3" style="overflow: hidden; box-shadow: 0 0 20px -10px black; border-radius: 10px;">
                            <div class="row no-gutters">
                                <div class="col-md-12">
                                    <img class="placeholder" src="<?php echo $row['image'];?>" class="card-img" alt="" height="250px" width="100%">
                                    <h3 class="judul" style="position: absolute; z-index: 1; top: 10px; left: 10px; color: white; font-size: 15px; text-shadow: 0 0px 20px black; font-weight: 500;"><?php echo $row['title']; ?></h3>
                                    <?php
                                      $daa = $row['tanggal'];
                                      $da = $row['tanggal_end'];
                                      $date = date("d-m-Y", strtotime($daa));
                                      $dateend = date("d-m-Y", strtotime($da));
                                    ?>
                                    <h3 style="position: absolute; z-index: 1; bottom: 0; left: 10px; color: white; font-size: 15px; text-shadow: 0 0px 20px black; font-weight: 500;background-color:#db1818;padding:5px;border-radius:7px;"><?= $date ?> s/d <?= $dateend?></h3>
                                    <a href="?<?php echo $row['title']; ?>=<?php echo session_id(); ?>&details=<?php echo $row['id']; ?>&page=details" class="btn btn-warning" style="position: absolute; right: 10px; bottom: 10px; z-index: 1; border-radius: 20px; padding: 5px 20px; font-weight: 600;">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        <?php
        } else {
            echo '<div style="margin-left: auto;margin-right:auto;display: block;"><img src="image/notfound.png" style="width: 300px;margin-left: auto;margin-right:auto;display: block;"></img><br><p style="color: black;text-align:center;font-weight:bold;font-size:35px;">Belum ada diklat yang tersedia<br><p style="text-align:center;color:#919191;">Nanti kalau sudah ada, diklat akan muncul disini</p></p></div>';
        }
        ?>
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
        
        $(document).ready(function(){  
          $("img.placeholder").each(function(i,ele){
              $("<img/>").attr("src",$(ele).attr("src")).on('error', function() {             
                  $(ele).attr( "src", "image/placeholders.png" );
              })
          });
          
          $("img.test").on("error", function(){      
            $(this).attr( "src", "http://vyfhealth.com/wp-content/uploads/2015/10/yoga-placeholder1.jpg" );  
          });
        });
    </script>
    <footer>
        <div class="footer-copyright">Copyrights &copy; 2020 Inspektorat Jenderal Kementerian Kesehatan.</div>
    </footer>
    <style>
        footer{
           color: #707070;
           background-color:#fff;
           border-top: 1px solid rgba(0,0,0,.125);
           padding-top: 30px;
           padding-bottom: 30px;
           margin-top:15px;
           text-align:center;
        }
    </style>
</body>

</html>