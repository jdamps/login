
<?php

require 'dbh.inc.php';

$rabaty=$_POST["rabaty"];
echo $rabaty;
echo "<br />";

$result = mysqli_query($con,"SELECT id_rabat FROM rabaty WHERE wartosc_rabat=$rabaty;");
$row = mysqli_fetch_assoc($result);
$idrabat = $row['id_rabat'];
echo $idrabat;
echo "<br />";


$wizyty=$_POST["idwizyta"];
echo $wizyty;
echo "<br />";
$suma=$_POST["sum"];
echo $suma;
echo "<br />";
if (isset($_POST['submit'])){
require './dbh.inc.php';

$rabaty=$_POST["rabaty"];
echo $rabaty;

$wynik = $suma - ($suma * $rabaty);
number_format($wynik, 2, '.', ' ');
echo  "<h3>Po rabacie: $wynik </h3>";
echo "<br />";
echo "<br />";


$sql1 = "UPDATE wizyty SET cena_wizyta='$wynik' WHERE id_wizyta='$wizyty'";
$records1 = mysqli_query($con,$sql1);
mysqli_close($con);

header("refresh:30; url=../wizytyedit.php?id=$wizyty");

}
				
?>