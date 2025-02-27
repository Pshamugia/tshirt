<?php
session_start();
error_reporting(0); 
if(function_exists("session_register"))
{
	session_register("captcha_text");
} 

$conn = mysqli_connect("localhost", 
                            "pencente_ge", 
                           "adamiani1983");
mysqli_select_db($conn, "pencente_ge");

mysqli_query($conn, 'SET CHARACTER SET utf8'); mysqli_query($conn, 'SET NAMES utf8');

define('HTTP_HOST', 'https://www.pencenter.ge/ENG/');

 ?>
