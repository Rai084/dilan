<?php
$servername = "localhost";
$username = ""
$password = "";
$database = "";
$p1 = mysqli_connect($servername, $username, $password) or die(mysqli_error($p1));
mysqli_select_db($p1, $database);
date_default_timezone_set('Asia/Jakarta');
session_start();
?>