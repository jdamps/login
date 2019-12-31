<?php


/*$wizyty=$_POST["idwizyta"];
echo $wizyty;
$zabiegi=$_POST["zabiegi"];
echo $zabiegi;*/

require './dbh.inc.php';
if (isset($_POST['submit'])){

$wizyty=$_POST["idwizyta"];
$zabiegi=$_POST["zabiegi"];


$sql = "INSERT INTO r6 (id_wizyta, id_zabieg) VALUES ($wizyty, $zabiegi)";
$records = mysqli_query($con,$sql);
mysqli_close($con);

header("refresh:0; url=../wizytyedit.php?id=$wizyty");

}
				
?>