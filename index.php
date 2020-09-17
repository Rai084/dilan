<?php
session_start();
define('APP_PATH', dirname(__FILE__) . '/');
define('_THEME', APP_PATH . 'pages/web/');
define('_INCS', APP_PATH . 'includes/');
//CORE
require_once('config.php');
require_once('configpdo.php');

if (!isset($_SESSION['idnip'])) {
    include(_THEME . 'indexhome.php');
} elseif (isset($_GET['page'])) {
    include(_THEME . 'indexblog.php');
} else {
    include(_THEME . 'indexhome2.php');
}
?>