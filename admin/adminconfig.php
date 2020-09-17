<?php
$servername = "localhost";
$username = "";
$password = "";
$database = "";
$p1 = mysqli_connect($servername, $username, $password) or die(mysqli_error($p1));
mysqli_select_db($p1, $database);
session_start();
if(!isset($_SESSION['idnip'])){
    header("Location: ../index.php");
}
if (isset($_SESSION['level']) && $_SESSION['level'] == "user") {
  header("Location: ../index.php");
}
?>