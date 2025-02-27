<?php
 error_reporting(0);
$connection = mysql_connect("localhost", 
                            "root", 
                            "vertrigo");
mysql_select_db("paata_mtavari", $connection);

mysql_query('SET CHARACTER SET utf8'); mysql_query('SET NAMES utf8');?>