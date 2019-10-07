<?php
$con=mysqli_connect("localhost","jdamps","admin123","recepcja1");
if (mysqli_connect_errno())
{
echo "Błąd połączenia z
MySQL: " . mysqli_connect_error();
}