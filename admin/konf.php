<?php
require 'adminconfig.php';
if (isset($_SESSION['level']) && $_SESSION['level'] != "superadmin") {
  header("Location: ../index.php");
}
if($_GET['edit']){
    $id = $_GET['edit'];
    mysqli_query($p1,"UPDATE registration SET verifikasi = 'yes' WHERE id = $id");
    header("Location: pengajuandiklat");
}
?>