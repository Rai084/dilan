<?php
require 'config.php';
require 'configpdo.php';
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'mail/Exception.php';
require 'mail/PHPMailer.php';
require 'mail/SMTP.php';

$message = '';
if (isset($_SESSION['idnip'])) {
    header("Location:./index");
}
// Load Composer's autoloader
require 'vendor/autoload.php';

if (isset($_POST['btntosbmt'])) {

    $query = "
	SELECT * FROM account 
	WHERE email = :user_email
	";
    $statement = $p->prepare($query);
    $statement->execute(
        array(
            ':user_email'    =>    $_POST['email']
        )
    );
    $no_of_row = $statement->rowCount();
    if ($no_of_row > 0) {
        $message = '<center><label class="text-danger">Email Already Exist</label></center>';
    } else {
        $password = mysqli_real_escape_string($p1, $_POST['password']);
        $email = mysqli_real_escape_string($p1, $_POST['email']);
        $gender = $_POST['gender'];
        $telp = trim($_POST['notelp']);
        $tggllahir = $_POST['tanggal_lahir'];
        $im = "https://img.icons8.com/dotty/80/000000/profile-face.png";
        $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
        $randomnip = mysqli_real_escape_string($p1, $_POST['nip']);
        $activation_code = md5(rand());
        $signup = "
        INSERT INTO account(username,img,nip,gender,email,password,token,notelp,tempat,status,tanggal_lahir,level)
        VALUES(:user_name,:image,:randomnip,:gender,:user_email,:user_password,:user_activation_code,:telp,:tempat,:user_status,:tanggal_lahir,:user_level);
        INSERT INTO informasiuser(nip) VALUES(:randomnip);
        ";
        $statement = $p->prepare($signup);
        $statement->execute(
            array(
                ':user_name' => mysqli_real_escape_string($p1, $_POST['username']),
                ':image' => $im,
                ':randomnip' => $randomnip,
                ':gender' => $gender,
                ':user_email' => $email,
                ':user_password' => $encrypted_password,
                ':user_activation_code' => $activation_code,
                ':telp' => $telp,
                ':tempat' => 'Kementerian Kesehatan',
                ':user_status' => 'Tidak Aktif',
                ':tanggal_lahir' => $tggllahir,
                ':user_level' => 'user'
            )
        );

        $result = $statement->fetchAll();
        if (isset($result)) {
            $url = 'https://' . $_SERVER['SERVER_NAME'] . '/diklatonline/verification_email.php?activation_code=' . $activation_code;
            $mail_body = "
            <div dir='ltr'>
    <u></u>
    <div style='margin: 0px; padding: 0px;'>
      <div>
        <table style='border-collapse: collapse; table-layout: fixed; border-spacing: 0px; vertical-align: top; min-width: 320px; margin: 0px auto; width: 100%;' cellspacing='0' cellpadding='0'>
          <tbody>
            <tr style='vertical-align: top;'>
              <td style='word-break: break-word; border-collapse: collapse!important; vertical-align: top;'>
                <table border='0' width='100%' cellspacing='0' cellpadding='0'>
                  <tbody>
                    <tr>
                      <td align='center'>
                        <div style='background-color: transparent;'>
                          <div style='margin: 0 auto; max-width: 500px; word-wrap: break-word; min-width: 320px; background-color: transparent; word-break: break-word;'>
                            <div style='display: table; border-collapse: collapse; width: 100%; background-color: transparent;'>
                              <table border='0' width='100%' cellspacing='0' cellpadding='0'>
                                <tbody>
                                  <tr>
                                    <td style='background-color: transparent;' align='center'>
                                      <table style='width: 500px;' border='0' cellspacing='0' cellpadding='0'>
                                        <tbody>
                                          <tr style='background-color: transparent;'>
                                            <td style='width: 500px; border: 0px solid transparent; padding: 5px 0px 30px 0px;' align='center' valign='top' width='500'>
                                              <div style='min-width: 320px; display: table-cell; max-width: 500px; vertical-align: top;'>
                                                <div style='width: 100%!important; background-color: transparent;'>
                                                  <div style='padding: 5px 0px 30px 0px;'>
                                                    <div>
                                                      <table border='0' width='100%' cellspacing='0' cellpadding='0'>
                                                        <tbody>
                                                          <tr>
                                                            <td style='padding: 10px;'>
                                                              <div style='color: #555555; line-height: 120%; font-family: Georgia,Times,'Times New Roman',serif;'>
                                                                <div style='line-height: 14px;'>
                                                                  <p style='margin: 0px; line-height: 14px; text-align: center;'>
                                                                    <span style='font-size: 42px;'>Hello</span>
                                                                  </p>
                                                                  <p style='font-size: 12px; margin: 0px; line-height: 14px; text-align: center;'>
                                                                    <span style='font-size: 88px; line-height: 105px; color: #db1818;'>" . $_POST['username'] . "!</span>
                                                                  </p>
                                                                </div>
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </tbody>
                                                      </table>
                                                    </div>
                                                    <div style='padding-left: 0px; padding-right: 0px;' align='center'>
                                                      <table border='0' width='100%' cellspacing='0' cellpadding='0'>
                                                        <tbody>
                                                          <tr style='line-height: 0px;'>
                                                            <td style='padding-right: 0px; padding-left: 0px;' align='center'>
                                                              <img style='outline: none; clear: both; border: 0px; height: auto; float: none; width: 100%; max-width: 375px; display: block !important;' title='Image' src='image/welcome.svg' alt='Image' width='375' align='center' border='0'>
                                                            </td>
                                                          </tr>
                                                        </tbody>
                                                      </table>
                                                    </div>
                                                    <div>
                                                      <table border='0' width='100%' cellspacing='0' cellpadding='0'>
                                                        <tbody>
                                                          <tr>
                                                            <td style='padding: 30px 30px 0px 30px;'>
                                                              <div style='color: #555555; line-height: 120%; font-family: Georgia,Times,Times New Roman,serif;'>
                                                                <div style='line-height: 14px;'>
                                                                  <p style='margin: 0px; line-height: 14px; text-align: center;'>
                                                                    <span style='font-size: 30px;'>
                                                                      <em>Your account has been created</em>
                                                                    </span>
                                                                  </p>
                                                                </div>
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </tbody>
                                                      </table>
                                                    </div>
                                                    <div>
                                                      <table border='0' width='100%' cellspacing='0' cellpadding='0'>
                                                        <tbody>
                                                          <tr>
                                                            <td style='padding: 10px;'>
                                                              <div style='color:#db1818;line-height: 120%;font-family: Georgia,Times,Times New Roman,serif;'>
                                                                <div style='line-height: 14px;'>
                                                                  <p style='margin: 0px; line-height: 17px; text-align: center;'>
                                                                    <span style='font-size: 22px;'>Complete your registration with a click!</span>
                                                                  </p>
                                                                </div>
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </tbody>
                                                      </table>
                                                    </div>
                                                    <div>
                                                      <span style='color: #989898; font-family: Georgia, Times, Times New Roman, serif;'>Ignore this email if you have never registered</span>
                                                    </div>
                                                    <div align='center'>
                                                      <div style='margin: 10px;'>
                                                        <table style='border-spacing: 0; border-collapse: collapse;' border='0' cellspacing='0' cellpadding='0'>
                                                          <tbody>
                                                            <tr>
                                                              <td style='word-break: break-word; border-radius: 5px; background-clip: padding-box; text-align: center; border-collapse: collapse; padding: 5px 20px 5px 20px;' align='center' bgcolor='#db1818'>
                                                                <a href=" . $url . " style='font-family: Georgia,Times,Times New Roman,serif; width: auto; display: inline-block;text-decoration:none; text-decoration-line: none; color: #ffffff; border-radius: 5px; border: 1px solid #db1818;' target='_blank' rel='noopener'>
                                                                  <span style='font-size: 16px;color:#fff;line-height: 32px;'>VERIFICATION!</span>
                                                                </a>
                                                              </td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                        <div>
                          <div style='margin: 0 auto; max-width: 500px; word-wrap: break-word; min-width: 320px; background-color: transparent; word-break: break-word;'>
                            <div style='display: table; border-collapse: collapse; width: 100%; background-color: transparent;'>
                              <table border='0' width='100%' cellspacing='0' cellpadding='0'>
                                <tbody>
                                  <tr>
                                    <td align='center'>
                                      <table style='width: 500px;' border='0' cellspacing='0' cellpadding='0'>
                                        <tbody>
                                          <tr style='background-color: transparent;'>
                                            <td style='width: 500px; border: 0px solid transparent; padding: 0px;' align='center' valign='top' width='500'>
                                              <div style='min-width: 320px; display: table-cell; max-width: 500px; vertical-align: top;'>
                                                <div style='width: 100%!important; background-color: transparent;'>
                                                  <div style='padding: 0px;'>
                                                    <div style='padding-left: 0px; padding-right: 0px;' align='center'>
                                                      <table border='0' width='100%' cellspacing='0' cellpadding='0'>
                                                        <tbody>
                                                          <tr style='line-height: 0px;'>
                                                            <td style='padding-right: 0px; padding-left: 0px;' align='center'>
                                                              <div style='font-size: 1px; line-height: 15px;'>&nbsp;</div>
                                                              <span style='outline: none; text-decoration-line: none; clear: both; border: none; height: auto; float: none; width: 100%; text-align: center; color: #000; display: block !important; padding-top: 15px;'>Copyright &copy; <script>document.write(new Date().getFullYear())</script> Diklat Online. All Rights Reserved</span>
                                                              <div style='font-size: 1px; line-height: 15px;'>&nbsp;</div>
                                                            </td>
                                                          </tr>
                                                        </tbody>
                                                      </table>
                                                    </script>
                                                    <table style='border-collapse: collapse; table-layout: fixed; border-spacing: 0; vertical-align: top; min-width: 100%;' border='0' width='100%' cellspacing='0' cellpadding='0'>
                                                      <tbody>
                                                        <tr style='vertical-align: top;'>
                                                          <td style='word-break: break-word; border-collapse: collapse!important; vertical-align: top; min-width: 100%; padding: 0px;'>
                                                            <table style='border-collapse: collapse; table-layout: fixed; border-spacing: 0; vertical-align: top; border-top: 0px solid transparent;' border='0' width='100%' cellspacing='0' cellpadding='0' align='center'>
                                                              <tbody>
                                                                <tr style='vertical-align: top;'>
                                                                  <td style='word-break: break-word; border-collapse: collapse!important; vertical-align: top;'>&nbsp;</td>
                                                                </tr>
                                                              </tbody>
                                                            </table>
                                                          </td>
                                                        </tr>
                                                      </tbody>
                                                    </table>
                                                  </div>
                                                </div>
                                              </div>
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
			";
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->isSMTP();
                $mail->SMTPDebug = 0;
                $mail->Host       = 'mail.miawapps.my.id';
                $mail->SMTPAuth   = true;
                $mail->Username   = '';
                $mail->Password   = '';
                $mail->SMTPSecure = 'ssl';
                $mail->CharSet = "UTF-8";
                $mail->Port       = 465;

                //Recipients
                $mail->setFrom('support@miawapps.my.id', 'Diklat Online');
                $mail->addAddress($_POST['email'], $_POST['username']);     // Add a recipient
                $mail->addReplyTo('support@miawapps.my.id', 'Diklat Online');
                $mail->AddCustomHeader("X-MSMail-Priority: High");
                $mail->Priority = 1;
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                // // Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                // Content
                $mail->isHTML(true);
                $mail->Subject = '[Diklat Online] Email Verification!';
                $mail->Body    = $mail_body;
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

                if ($mail->send()) {
                    $mail->clearAllRecipients();
                    $mail->clearAddresses();
                    $mail->clearAttachments();
                    header("Location: index");
                }
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap-v4.4.1.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Righteous|Russo+One&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/101f283466.js" crossorigin="anonymous"></script>
    <title>Register Diklat Online</title>
    <style type="text/css">
        .row {
            width: 400px;
        }

        .fas1 {
            position: absolute;
            right: 10px;
            z-index: 1
        }

        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            -ms-appearance: none;
            appearance: none;
            outline: 0;
            box-shadow: none;
            background: #fff;
            background-image: none;
            flex: 1;
            padding: 0 .5em;
            border: 1px solid #ced4da;
            border-radius: .25em;
            color: #495057;
            cursor: pointer;
            font-size: 1em;
            /* font-family: 'Open Sans', sans-serif; */
        }

        select::-ms-expand {
            display: none;
        }

        .select {
            position: relative;
            display: flex;
            width: 50%;
            height: 3em;
            margin-left: 3%;
            line-height: 3;
            background: #fff;
            overflow: hidden;
            border-radius: .25em;
        }

        .select::after {
            content: '\25BC';
            position: absolute;
            top: 0;
            right: 0;
            padding: 0 1em;
            background: #ced4da;
            cursor: pointer;
            pointer-events: none;
            transition: .25s all ease;
        }

        .select:hover::after {
            color: #dc3545;
        }
        
        input[type="date"]:before {
            content: attr(placeholder) !important;
            color: #495057;
            margin-right: 0.5em;
        }
        
        input[type="date"]:focus:before,
        input[type="date"]:valid:before {
            content: "";
        }
    </style>
</head>

<body>
    <div class="container" style="margin-top: 3%;margin-bottom:3%;">
        <div class="row shadow p-3 m-auto">
            <div class="col-12 login text-center">
                <h3 class="mb-4">Register</h3>
                <?= $message; ?>
                <form action="" method="POST">
                    <!-- USERNAME -->
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                        <input minlength="10" type="text" class="form-control input1 search-input" placeholder="Username" name="username" required>
                    </div>
                    <!-- NIP -->
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-sort-numeric-up-alt"></i>
                            </div>
                        </div>
                        <input type="number" class="form-control input1 search-input" placeholder="Nomor Induk Pegawai" name="nip" required>
                    </div>
                    <!-- EMAIL -->
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="far fa-envelope"></i>
                            </div>
                        </div>
                        <input type="email" class="form-control input1 search-input" placeholder="Email" name="email" required>
                    </div>
                    <!-- TELP -->
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control input1 search-input" placeholder="+62" maxlength="22" id="notelp" name="notelp" required>
                    </div>
                    <!-- GENDER -->
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-venus-mars"></i>
                            </div>
                        </div>
                        <div class="select">
                            <select name="gender" required>
                                <option value="" selected disabled>Select Gender</option>
                                <option value="Laki - Laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <!-- TANGGAL LAHIR -->
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-calendar-week"></i>
                            </div>
                        </div>
                        <input type="date" class="form-control input1 search-input" placeholder="Tanggal Lahir" name="tanggal_lahir" required>
                    </div>
                    <!-- PASSWORD -->
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-lock"></i>
                                <i class="fas fa-eye-slash fas1" id="showPass"></i>
                                <i class="fas fa-eye fas2" id="hidePass"></i>
                            </div>
                        </div>
                        <input type="password" id="Pass" class="form-control input1 search-input" placeholder="Password" name="password" required>
                    </div>
                    <div>
                        Sudah punya akun?
                        <a href="./" style="color:#db1818;text-decoration:none;margin-bottom:10px;" class="d-flex justify-content-center">Login</a>
                    </div>
                    <!-- SUBMIT -->
                    <button class="btn btn-danger btn-block" type="submit" name="btntosbmt">Submit</button>
                    
                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="js/imask.js"></script>
    <script type="text/javascript">
        $('#hidePass').hide();
        $('#showPass').on('click', function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            if ($('#Pass').attr('type') === 'password') {
                $('#Pass').attr('type', 'text');
            } else {
                $('#Pass').attr('type', 'password')
            }
        });
        setTimeout(() => {
            $('p').remove();
        }, 2000)
    </script>
    <script>
        var phoneMask = IMask(
            document.getElementById('notelp'), {
                mask: '+{62} 000-0000-0000-0000'
            });
    </script>
</body>

</html>