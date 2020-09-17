<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/101f283466.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/index2.css">
    <title>Kementerian Kesehatan</title>
</head>

<body style="background-color:#fff">
    <!-- Navbar -->
    <?php include(_THEME . "header.php"); ?>
    <!-- Akhir navbar -->

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid" style="background-image:url('image/imagehomes.jpg');">
        <div class="container">
            <a class="btn btnPilih" href="#pilihdiklat">Pilih Diklat</a>
            <p class="text-white">Diklat bertujuan untuk memberikan kesempatan kepada personil dalam meningkatkan kecakapan dan keterampilan mereka, terutama dalam bidang-bidang yang berhubungan dengan kepemimpinan atau manajerial yang diperlukan dalam pencapaian tujuan organisasi.</p>
        </div>
    </div>
    <!-- Akhir Jumbotron -->

<div id="pilihdiklat"></div>
    <!-- Content -->
    <div class="container Content">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Pilih Kelas Diklatmu</h1>
                <p class="mb-5">Dengan memilih pilihan kelas yang dibawakan oleh mentor ternama Indonesia.</p>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-lg-3 col-md-6 d-flex justify-content-center">
                <div class="card">
                    <div class="inner">
                        <img class="card-img-top" src="<?php
                        $datt = mysqli_query($p1, "SELECT * FROM posts WHERE category = 'substansi'");
                        $fetch = mysqli_fetch_assoc($datt);
                        echo $fetch['image'];
                        ?>" alt="Card image cap" onerror="this.src = './image/placeholders.png';" height="100%">
                    </div>
                    <div class="card-body">
                        <h6>Diklat Substansi Teknik <span style="display: block;">(Pola Pembiayaan PNBP)</span></h6>
                        <p class="card-text"></p>
                        <a href="?y=<?php echo session_id(); ?><?php echo session_id(); ?>&page=diklatsubstansi" class="btnContent">Pilih Diklat</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 d-flex justify-content-center">
                <div class="card">
                    <div class="inner">
                        <img class="card-img-top" src="<?php
                        $datt = mysqli_query($p1, "SELECT * FROM posts WHERE category = 'sertifikatnasional'");
                        $fetch = mysqli_fetch_assoc($datt);
                        echo $fetch['image'];
                        ?>" alt="Card image cap" onerror="this.src = './image/placeholders.png';" height="100%">
                    </div>
                    <div class="card-body">
                        <h6 class="mt-1">Sertifikat Nasional</h6>
                        <p class="card-text"></p>
                        <a href="?selectdiklat=<?php echo session_id(); ?><?php echo session_id(); ?>&page=sertifikatnasional" class="btnContent">Pilih Diklat</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 d-flex justify-content-center">
                <div class="card">
                    <div class="inner">
                        <img class="card-img-top" src="<?php
                        $datt = mysqli_query($p1, "SELECT * FROM posts WHERE category = 'diklatpenunjang'");
                        $fetch = mysqli_fetch_assoc($datt);
                        echo $fetch['image'];
                        ?>" alt="Card image cap" onerror="this.src = './image/placeholders.png';" height="100%">
                    </div>
                    <div class="card-body">
                        <h6 class="mt-3">Diklat Penunjang</h6>
                        <p class="card-text"></p>
                        <a href="?y=<?php echo session_id(); ?><?php echo session_id(); ?>&page=diklatpenunjang" class="btnContent">Pilih Diklat</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 d-flex justify-content-center">
                <div class="card">
                    <div class="inner">
                        <img class="card-img-top" src="<?php
                        $datt = mysqli_query($p1, "SELECT * FROM posts WHERE category = 'penjenjangan'");
                        $fetch = mysqli_fetch_assoc($datt);
                        echo $fetch['image'];
                        ?>" alt="Card image cap" onerror="this.src = './image/placeholders.png';" height="100%">
                    </div>
                    <div class="card-body">
                        <h6 class="mt-3">Diklat Penjenjangan Auditor</h6>
                        <p class="card-text"></p>
                        <a href="?y=<?php echo session_id(); ?><?php echo session_id(); ?>&page=diklatpenjenjanganauditor" class="btnContent">Pilih Diklat</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row text-center mt-5 readMore justify-content-center" style="display: none; opacity: 1; transition: 5s;">
            <div class="col-lg-3 col-md-6 d-flex justify-content-center">
                <div class="card">
                    <div class="inner">
                        <img class="card-img-top" src="<?php
                        $datt = mysqli_query($p1, "SELECT * FROM posts WHERE category = 'alokasi'");
                        $fetch = mysqli_fetch_assoc($datt);
                        echo $fetch['image'];
                        ?>" onerror="this.src = './image/placeholders.png';" height="100%" alt="Card image cap">
                    </div>
                    <div class="card-body">
                        <h6 class="mt-1">Alokasi Pertemuan/Workshop/Konferensi bidang pengawan tingkat nasional dan internasional</h6>
                        <p class="card-text"></p>
                        <a href="?y=<?php echo session_id(); ?><?php echo session_id(); ?>&page=alokasipertemuan" class="btnContent">Pilih Diklat</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 d-flex justify-content-center">
                <div class="card">
                    <div class="inner">
                        <img class="card-img-top" src="<?php
                        $datt = mysqli_query($p1, "SELECT * FROM posts WHERE category = 'pelatihankantorsendiri'");
                        $fetch = mysqli_fetch_assoc($datt);
                        echo $fetch['image'];
                        ?>" alt="Card image cap" onerror="this.src = './image/placeholders.png';" height="100%">
                    </div>
                    <div class="card-body">
                        <h6 class="mt-1">Pelatihan Kantor Sendiri/Sosialisasi Pengawasan</h6>
                        <p class="card-text"></p>
                        <a href="?selectdiklat=<?php echo session_id(); ?><?php echo session_id(); ?>&page=pelatihankantorsendiri" class="btnContent">Pilih Diklat</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row text-center mt-3">
            <div class="col-lg-12">
                <button class="btn" id="viewMore" onclick="openView()">View More</button>
            </div>
        </div>
    </div>
    <!-- Akhir Content -->

    <!-- footer -->
    <?php include(_THEME . "footer.php"); ?>
    <!-- endfooter -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scroll/16.1.0/smooth-scroll.min.js"></script>
    <script>
        const readMore = document.querySelector('.readMore');
        const viewMore = document.querySelector('#viewMore');

        function openView() {
            var i = 0;
            if (readMore.style.display == 'none') {
                setTimeout(function() {
                    readMore.style.display = 'flex'
                    viewMore.innerHTML = 'Read Less'
                }, 500)
            } else if (readMore.style.display == 'flex') {
                setTimeout(function() {
                    readMore.style.display = 'none'
                    viewMore.innerHTML = 'Read More'
                }, 500)
            }
        }

        // $('showMenu').hide();
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
        
        $(function(){
                var scroll = new SmoothScroll('a[href*="#"]', {
        	    speed: 1100,
        	    speedAsDuration: true
            });
        });
    </script>
</body>

</html>