<?php

$servername = "localhost";
$dbuser = "jdamps";
$dbpasswd = "admin123";
$dbname = "recepcja1";


$con=mysqli_connect($servername,$dbuser,$dbpasswd,$dbname);


if (!con) {
	die("Connection failed: ".mysqli_connect_error());
	
}