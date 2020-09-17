<?php
include "config.php";
include "configpdo.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'mail/Exception.php';
require 'mail/PHPMailer.php';
require 'mail/SMTP.php';

// Load Composer's autoloader
require 'vendor/autoload.php';
$message = '';
if (isset($_POST['btntosbmt'])) {
    $password_verification = mysqli_real_escape_string($p1, $_POST['pass']);
    $query = "
    SELECT * FROM account 
    WHERE nip= :user_nip
    ";
    $statement = $p->prepare($query);
    $statement->execute(
        array(
            'user_nip' => $_POST["nip"]
        )
    );
    $count = $statement->rowCount();
    if ($count > 0) {
        $result = $statement->fetchAll();
        foreach ($result as $row) {
            if ($row['status'] == 'Aktif' && $row['nip'] > 0) {
                if (password_verify($password_verification, $row["password"])) {
                    $_SESSION['idnip'] = $row['nip'];
                    $_SESSION['user'] = $row['username'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['notelp'] = $row['notelp'];
                    $_SESSION['tempat'] = $row['tempat'];
                    $_SESSION['img'] = $row['img'];
                    $_SESSION['gender'] = $row['gender'];
                    $_SESSION['tgllahir'] = $row['tanggal_lahir'];
                    $_SESSION['level'] = $row['level'];
                    if ($row['level'] == 'superadmin' && $row['nip'] > 0) {
                        $_SESSION['level'] = "superadmin";
                        header("Location: admin/index");
                    } elseif ($row['level'] == 'admin' && $row['nip'] > 0) {
                        $_SESSION['level'] = "admin";
                        header("Location: admin/");
                    } else {
                        $_SESSION['level'] = "user";
                        header("Location: ./");
                    }
                } else {
                    $message = "<p class='text-danger'>Wrong Password</p>";
                }
            } else {
                $message = "<p class='text-danger'>Please First Verify, your email address</p>";
            }
        }
    }else{
        $message = "<p class='text-danger'>The NIP you entered does not match any account</p>";
    }
}

// if(isset($_POST["passwordchange"])){
//     $email = $_POST["email"];
//     $email = filter_var($email, FILTER_VALIDATE_EMAIL);
//     $email = filter_var($email, FILTER_VALIDATE_EMAIL);
//     if(!$email){
//         $error .="Invalid email address please type a valid email address!";
//     }else{
//         $cekmail = "SELECT * FROM account WHERE email='".$email."'";
//         $results = mysqli_query($p1,$cekmail);
//         $row = mysqli_num_rows($results);
//         if ($row==""){
//         $error .= "No user is registered with this email address!";
//         }
//     }
//         if($error!=""){
//             echo '';
//         }else{
//             $expFormat=mktime(
//                 date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y"));
//             $expDate = date("Y-m-d H:i:s",$expFormat);
//             $key = md5(rand());
//             $addkey = substr(md5(uniqid(rand(),1)),3,10);
//             $key = $key . $addKey;
            
//             $inse = mysqli_query($p1, "INSERT INTO password_reset_temp(email,key,expDate) VALUES('".$email."', '".$key."', '".$expDate."')");
                
//                 if($inse){
//                     $output ='<p><a href="https://miawapps.my.id/diklatonline/reset-password.php?key='.$key.'&email='.$email.'&action=reset" target="_blank"></a></p>'; 
//                     $email_to = $email;
//                     $mail = new PHPMailer(true);
//                     //Server settings
//                     $mail->isSMTP();
//                     $mail->SMTPDebug = 0;
//                     $mail->Host       = 'mail.miawapps.my.id';
//                     $mail->SMTPAuth   = true;
//                     $mail->Username   = 'support@miawapps.my.id';
//                     $mail->Password   = 'IN?;T&]WRm?R';
//                     $mail->SMTPSecure = 'ssl';
//                     $mail->CharSet = "UTF-8";
//                     $mail->Port       = 465;
    
//                     //Recipients
//                     $mail->setFrom('support@miawapps.my.id', 'Diklat Online');
//                     $mail->addAddress($email_to);
//                     $mail->addReplyTo('support@miawapps.my.id', 'Diklat Online');
//                     $mail->AddCustomHeader("X-MSMail-Priority: High");
//                     $mail->Priority = 1;
//                     // $mail->addCC('cc@example.com');
//                     // $mail->addBCC('bcc@example.com');
    
//                     // // Attachments
//                     // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//                     // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    
//                     // Content
//                     $mail->isHTML(true);
//                     $mail->Subject = '[Diklat Online] Password Reset!';
//                     $mail->Body    = $output;
//                     // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
//                     $mail->SMTPOptions = array(
//                         'ssl' => array(
//                             'verify_peer' => false,
//                             'verify_peer_name' => false,
//                             'allow_self_signed' => true
//                         )
//                     );
    
//                     if ($mail->send()) {
//                         $mail->clearAllRecipients();
//                         $mail->clearAddresses();
//                         $mail->clearAttachments();
//                         header("Location: index");
//                     }
//                 }
                
//         }
// }
?>
<html>

<head>
    <!-- Required meta tags -->
    <link rel="shortcut icon" type="image/ico" href="favicon.ico"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap-v4.4.1.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/index1.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway&display=swap" rel="stylesheet">
    <title>Diklat Online Kementrian Kesehatan</title>
      <style>
    @import url('https://fonts.googleapis.com/css?family=Nunito&display=swap');
    @import url('https://fonts.googleapis.com/css?family=Lemonada|Lobster+Two|Montserrat|Roboto+Mono&display=swap');

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    body {
      font-family: 'Nunito', sans-serif;
    }

    p {
      color: grey;
    }

    .login {
      margin-bottom: 40px;
      font-size: 28px;
      font-weight: 600;
      margin-top: 20px;
    }

    .login::after {
      content: '';
      display: block;
      width: 20px;
      border-bottom: 3px solid #db1818;
      border-radius: 50px;
      margin: auto;
      margin-top: 5px;
    }

    .Home {
      padding: 20px;
    }

    .formLogin {
      height: auto;
      border-radius: 10px;
    }

    .form-control {
      border-radius: 20px;
      padding: 20px;
    }

    .form-group p {
      margin-top: 10%;
    }

    .form-group a {
      margin-top: 10%;
      text-decoration: none;
      color: #db1818;
    }

    .btn {
      position: relative;
      bottom: -20px;
      border-radius: 20px;
      font-weight: 600;
    }

    .arrow {
      width: 100px;
      display: flex;
      margin: auto;
      position: relative;
    }

    .About {
      margin-top: 100px;
    }

    .card1,
    .card2,
    .card3,
    .card4 {
      box-shadow: 0 0 20px -10px black;
      border-radius: 10px;
      overflow: hidden;
      transition: .4s;
      margin-bottom: 10px;
    }

    .col-lg-3:hover {
      box-shadow: 0 0 20px -5px black;
    }

    small {
      color: white;
      position: relative;
      right: -5px;
      top: -5px;
    }

    .Tujuan {
      padding: 20px;
    }


    .col-lg-3::after {
      content: '';
      width: 100px;
      height: 100px;
      background-color: #db1818;
      display: inline-block;
      position: absolute;
      border-radius: 50%;
      z-index: -1;
      bottom: 0;
      top: 90px;
      right: 0px;
      left: 400px;
      transition: all 1s linear;
    }



    @media (min-width: 768px) and (max-width: 992px) {

      .card1,
      .card2,
      .card3,
      .card4 {
        box-shadow: 0 0 20px -10px black;
        border-radius: 10px;
        overflow: hidden;
        transition: .4s;
        margin-bottom: 10px;
      }

      .card1 {
        position: relative;
        left: -10px;
      }

      .card3 {
        position: relative;
        left: -10px;
      }

      .col-lg-3:hover {
        box-shadow: 0 0 20px -5px black;
      }

      small {
        color: white;
        position: relative;
        right: -5px;
        top: -5px;
      }

      .Tujuan {
        padding: 20px;
      }


      .col-lg-3::after {
        content: '';
        width: 100px;
        height: 100px;
        background-color: #db1818;
        display: inline-block;
        position: absolute;
        border-radius: 50%;
        z-index: -1;
        bottom: 0;
        top: 100px;
        right: 0px;
        left: 300px;
        transition: all 1s linear;
      }
    }


    @media(min-width: 992px) {
      .formLogin {
        border-radius: 10px;
        position: relative;
        top: 20px;
        padding: 20px;
        height: auto;
      }

      .card1 {
        position: relative;
        left: -10px;
      }

      .card3 {
        position: relative;
        right: -10px;
      }

      .card4 {
        position: relative;
        right: -20px;
      }

      .col-lg-3::after {
        content: '';
        width: 100px;
        height: 100px;
        background-color: #db1818;
        display: inline-block;
        position: absolute;
        border-radius: 50%;
        z-index: -1;
        bottom: 0;
        top: 115px;
        right: 0px;
        left: 240px;
        transition: all 1s linear;
      }

      .Tujuan {
        padding: 0px;
      }


    }
  </style>
</head>

<body>
    <svg class="svg1" viewBox="0 0 1440 320" xmlns="http://www.w3.org/2000/svg">
        <path d="m0 160 48-10.7c48-10.3 144-32.3 240-10.6 96 21.3 192 85.3 288 90.6 96 5.7 192-48.3 288-90.6 96-42.7 192-74.7 288-53.4 96 21.7 192 95.7 240 133.4l48 37.3v-256h-48-240-288-288-288-240-48z" fill="#db1818" style="height:100% !important"></path>
    </svg>
    <div class="container">
    <div class="row Home">
      <div class="col-lg-8 col-md-8 col-xs-12">
        <img src="image/kemenkes.png" width="250px">
        <p class="paragraf"><span class="ml-2"></span> Diklat (Pendidikan dan Pelatihan) adalah suatu program dengan
          metode terpadu untuk meningkatkan pengetahuan, pemahaman serta kompetensi pesertanya. Metode yang digunakan
          dalam diklat adalah memadukan pendidikan dan latihan secara efisien dan efektif dalam waktu yang relatif
          singkat. Secara umum diklat diperlukan untuk meningkatkan kecakapan dan keterampilan individu (personil) yang
          berkaitan dengan lingkungan kerja atau organisasi agar dapat meningkatkan kompetensi dalam melakukan
          pekerjaannya. Sedangkan penyelenggara diklat biasanya adalah pusat pendidikan dan latihan (pusdiklat).</p>
        <a href="#about">
          <img src="arrow.gif" alt="Arrow Gif" class="arrow">
        </a>
      </div>

      <div class="col-lg-4 formLogin col-md-4 col-xs-12 shadow">
        <h4 class="login text-center">Login</h4>
        <h6 class="verif"><?= $message ?></h6>
        <form action="" method="post">
          <div class="form-group">
            <input type="number" name="nip" class="nipd form-control" placeholder="NIP (Nomor Induk Penduduk)">
          </div>

          <div class="form-group">
            <input type="password" name="pass" class="form-control" placeholder="Password">
          </div>
          
          <button class="btn btn-danger btn-block" name="btntosbmt">Login</button>
          
          <div class="form-group">
            <a href="#" class="d-flex justify-content-center" style="font-size: 15px;">Forgot password?</a>
          </div>
          
          <div class="form-group">
            <p class="d-flex justify-content-left" style="font-size: 15px;color: grey;">Don't have an account yet?</a>
          </div>
          
          <button style="bottom:0" class="btn btn-success btn-block">
              <a href="signup" class="d-flex justify-content-center" style="font-size: 15px;text-decoration:none;color:white;">Sign up for Diklat</a>
          </button>
        </form>
      </div>
    </div>

    <div class="row About">
      <div class="col-12 text-center">
        <h2 style="margin-bottom: 20px;" id="about">Tujuan</h2>
      </div>

      <div class="col-lg-6 text-justify">
        <p class="pKanan">
          <span style="margin-left: 10px;">Secara </span>umum Pendidikan dan Pelatihan (Diklat) bertujuan untuk
          memberikan kesempatan kepada personil dalam meningkatkan kecakapan dan keterampilan mereka, terutama dalam
          bidang-bidang yang berhubungan dengan kepemimpinan atau manajerial yang diperlukan dalam pencapaian tujuan
          organisasi.
          Pelaksanaan diklat merupakan suatu proses yang akan menghasilkan suatu perubahan perilaku berbentuk
          peningkatan mutu kemampuan, sehingga diklat memiliki tujuan sesuai dengan sasaran yang diharapkan. Info Bimtek
          Pusdiklat Pemendagri Untuk Pengembangan SDM.
        </p>
      </div>

      <div class="col-lg-6 text-justify">
        <p class="pKiri"> <span style="margin-left: 10px;">Tujuan</span> Pendidikan dan Pelatihan (Diklat) adalah
          sebagai berikut :
          <br>1.Diklat bertujuan untuk meningkatkan prestasi kerja pegawai dalam menghadapi pekerjaan-pekerjaan yang
          sedang dihadapi.
          <br>2.Diklat diharapkan dapat membentuk sikap dan tingkah laku para pegawai dalam melakukan pekerjaannya.
          Menitikberatkan pada peningkatan partisipasi dari para pegawai, kerjasama antar pegawai dan loyalitas terhadap
          organisasi.
          <br>3.Diklat membantu memecahkan masalah-masalah operasional organisasi sehari-hari seperti mengurangi
          kecelakaan kerja, mengurangi absen, mengurangi labor turnover, dan lain-lain.</p>
      </div>
    </div>

    <div class="row mt-5 Tujuan">
      <div class="col-lg-3 col-md-6 card1">
        <span class="d-flex justify-content-center mb-3 mt-2" style="font-weight: 600;">Diklat Learning</span>
        <p class="d-flex justify-content-center">Trik memulai Diklat learning sesuai dengan gadget yang dimiliki dan
          akses internet yang ada.</p>
        <small class="d-flex justify-content-end">1</small>
      </div>
      <div class="col-lg-3 col-md-6 card2">
        <span class="d-flex justify-content-center mb-3 mt-2" style="font-weight: 600;">Diklat Learning</span>
        <p class="d-flex justify-content-center">Trik memulai Diklat learning sesuai dengan gadget yang dimiliki dan
          akses internet yang ada.</p>
        <small class="d-flex justify-content-end">2</small>
      </div>
      <div class="col-lg-3 col-md-6 card3">
        <span class="d-flex justify-content-center mb-3 mt-2" style="font-weight: 600;">Diklat Learning</span>
        <p class="d-flex justify-content-center">Trik memulai Diklat learning sesuai dengan gadget yang dimiliki dan
          akses internet yang ada.</p>
        <small class="d-flex justify-content-end">3</small>
      </div>
      <div class="col-lg-3 col-md-6 card4">
        <span class="d-flex justify-content-center mb-3 mt-2" style="font-weight: 600;">Diklat Learning</span>
        <p class="d-flex justify-content-center">Trik memulai Diklat learning sesuai dengan gadget yang dimiliki dan
          akses internet yang ada.</p>
        <small class="d-flex justify-content-end">4</small>
      </div>
    </div>
  </div>
    <!-- footer -->
    <?php include(_THEME . "footer.php"); ?>
    <!-- endfooter -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.0.min.js"></script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scroll/16.1.0/smooth-scroll.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/101f283466.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
    $(function(){
            var scroll = new SmoothScroll('a[href*="#"]', {
    	    speed: 1100,
    	    speedAsDuration: true
        });
    });
    
    // Not Allow key E,- and +
    document.querySelector(".nipd").addEventListener("keypress", function (evt) {
    if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57)
    {
        evt.preventDefault();
    }
    });
    </script>
</body>

</html>