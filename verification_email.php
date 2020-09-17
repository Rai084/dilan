<?php
require 'config.php';
require 'configpdo.php';
$message = '';

if (isset($_GET['activation_code'])) {
    $query = "
		SELECT * FROM account 
		WHERE token = :user_activation_code
	";
    $statement = $p->prepare($query);
    $statement->execute(
        array(
            ':user_activation_code'            =>    $_GET['activation_code']
        )
    );
    $no_of_row = $statement->rowCount();

    if ($no_of_row > 0) {
        $result = $statement->fetchAll();
        foreach ($result as $row) {
            if ($row['status'] == 'Tidak Aktif') {
                $update_query = "
				UPDATE account 
				SET status = 'Aktif' 
				WHERE id = '" . $row['id'] . "'
				";
                $statement = $p->prepare($update_query);
                $statement->execute();
                $sub_result = $statement->fetchAll();
                if (isset($sub_result)) {
                    $message = '
                    <center>
                    <label class="text-success">Email Berhasil di Verifikasi</label>
                    <br>
                    <label>Mengalihkan laman dalam 3 detik...</label>
                    </center>';
                }
            } else {
                $message = '
                <center>
                <label class="text-info">Your Email Address Already Verified</label>
                <br>
                <label>Mengalihkan laman dalam 3 detik...</label>
                </center>';
            }
        }
    } else {
        header("Location: index");
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="3;url=https://miawapps.my.id/diklatonline" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="home.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway&display=swap" rel="stylesheet">
    <title>PHP Register Login Script with Email Verification</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<style language="text/css">
    .kotak {
        width: 350px;
        background: white;
        margin: 80px auto;
        padding: 30px 20px;
        box-shadow: -3px 6px 12px -6px rgba(0, 0, 0, 0.75);
        border-radius: 25px
    }
</style>

<body>
    <div class="kotak">
        <form action="" method="post">
            <div class="form-group m-auto mt-5">
                <?= $message ?>
            </div>
        </form>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>