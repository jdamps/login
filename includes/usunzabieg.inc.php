<?php

require './dbh.inc.php';

if (isset($_POST['submit'])){
$wizyta=$_POST["idwizyta"];
$zabieg=$_POST["idzabieg"];



$sql = "DELETE FROM r6 WHERE id_zabieg=$zabieg;";

$recors = mysqli_query($con, $sql);
mysqli_close($con);

header("refresh:0; url=../wizytyedit.php?id=$wizyta");


	

}

?>