<?php


$wizyty=$_POST["idwizyta"];
echo $wizyty;


require './dbh.inc.php';
if (isset($_POST['submit'])){

$wizyty=$_POST["idwizyta"];



$sql = "UPDATE wizyty SET id_status=4 WHERE id_wizyta='$_POST[idwizyta]'";
$records = mysqli_query($con,$sql);
mysqli_close($con);

header("refresh:0; url=../archiwum.php?success=done");

}
				
?>