<?php
session_start();
 error_reporting(0);

if(function_exists("session_register"))
{
	session_register("captcha_text");
}

define('DB_HOST', 'localhost');
define('DB_NAME', 'goodjob');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_CHARSET', 'utf8');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
mysqli_select_db($conn, DB_NAME);

mysqli_query($conn, 'SET CHARACTER SET utf8'); mysqli_query($conn, 'SET NAMES '.DB_CHARSET);

define('HTTP_HOST', 'http://localhost/GOODJOB1/');
include_once('firewall/firewall.php');

$res=mysqli_query($conn, "SELECT * FROM login WHERE id='$_SESSION[USER_ID]'");
$USER=mysqli_fetch_assoc($res);

define('PAATA_WEB','');

define('TBC_CLIEND_ID','7000220');
define('TBC_CLIENT_SECRET','12a2e4');
define('TBC_APIKEY','e4HQJK1ANQwxAKQTYyRBBM7qQrDx2AoA');
 

include "rating/2-core.php";

 ?>