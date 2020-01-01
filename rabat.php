<?php
require "header.php";
?>

<?php

if (isset($_SESSION['aid'])) {
	
require 'includes/dbh.inc.php';



$eid = $_SESSION['aid'];


mysqli_close($con);

require "header2.php";



}
else if (isset($_SESSION['eid'])) {
	
require 'includes/dbh.inc.php';


$eid = $_SESSION['eid'];


require "header4.php";
}
?>

<?php

require './includes/dbh.inc.php';

$rabaty=$_POST["rabaty"];
/*echo $rabaty;*/


$result = mysqli_query($con,"SELECT id_rabat FROM rabaty WHERE wartosc_rabat=$rabaty;");
$row = mysqli_fetch_assoc($result);
$idrabat = $row['id_rabat'];
/*echo $idrabat;*/



$wizyty=$_POST["idwizyta"];
/*echo $wizyty;*/

$suma=$_POST["sum"];
/*echo $suma;*/

if (isset($_POST['submit'])){


$rabaty=$_POST["rabaty"];
/*echo $rabaty;*/

$wynik = $suma - ($suma * $rabaty);
number_format($wynik, 2, '.', ' ');


$sql1 = "UPDATE wizyty SET cena_wizyta='$wynik', id_rabat='$idrabat' WHERE id_wizyta='$wizyty'";
$records1 = mysqli_query($con,$sql1);
mysqli_close($con);

/*header("refresh:0; url=../wizytyedit.php?id=$wizyty");*/

}
				
?>

<main>
<div class = "ml-2 mr-5 mt-2">

<h3>PODSUMOWANIE WIZYTY</h3>

<?php

require './includes/dbh.inc.php';



if ($records=mysqli_query($con,"SELECT 
wizyty.id_wizyta,
statusy_wizyt.nazwa_status,
Pracownicy.login_pracownik,
klienci.login_klient,
events.title,
events.start_event,
events.end_event
FROM
klienci, pracownicy, wizyty, events, statusy_wizyt
WHERE
pracownicy.id_pracownik=wizyty.id_pracownik
AND
klienci.id_klient=wizyty.id_klient
AND
events.id=wizyty.id_events
AND
statusy_wizyt.id_status=wizyty.id_status
AND
statusy_wizyt.id_status=1
AND
wizyty.id_wizyta=$wizyty
ORDER BY start_event
")) 
	echo "<table width='900' border='1' cellpadding='1' cellspacing='1'>";

	echo "<th>ID</th>";
	echo "<th>Pracownik</th>";
	echo "<th>Klient</th>";
	echo "<th>Opis</th>";
	echo "<th>Start</th>";
	echo "<th>Koniec</th>";
	echo "<th>Status</th>";

	
	while($pk=mysqli_fetch_assoc($records)){
	
	echo "<tr>";

	echo "<td>".$pk['id_wizyta']."</td>";
	echo "<td>".$pk['login_pracownik']."</td>";
	echo "<td>".$pk['login_klient']."</td>";
	echo "<td>".$pk['title']."</td>";
	echo "<td>".$pk['start_event']."</td>";
	echo "<td>".$pk['end_event']."</td>";
	echo "<td>".$pk['nazwa_status']."</td>";
	echo "</tr>";
	
	
}
	echo "</table>";


?>



<?php

require './includes/dbh.inc.php';



if ($records=mysqli_query($con,"SELECT 
r6.id_wizyta,
r6.id_zabieg,
zabiegi.nazwa_zabieg,
zabiegi.cena_zabieg,
zabiegi.czas_zabieg
FROM
r6, zabiegi
WHERE
r6.id_zabieg=zabiegi.id_zabieg
AND
r6.id_wizyta=$wizyty
")) 
	echo "<table width='900' border='1' cellpadding='1' cellspacing='1'>";

	echo "<th>ID</th>";
	echo "<th>Zabieg</th>";
	echo "<th>Cena</th>";
	echo "<th>Czas</th>";
	echo "<br />";

	
	while($pk=mysqli_fetch_assoc($records)){
	
	echo "<tr>";

	echo "<td>".$pk['id_wizyta']."</td>";
	echo "<td>".$pk['nazwa_zabieg']."</td>";
	echo "<td>".$pk['cena_zabieg']."</td>";
	echo "<td>".$pk['czas_zabieg']."</td>";
	echo "</tr>";
	
	
}
echo "</table>";
echo "Przed rabatem: $suma"; 
echo "<h4>Do zapłaty: $wynik zł</h4>"; 

?>

<?php

?>

<?php

/*$idwizyta = $_GET['id'];*/


require './includes/dbh.inc.php';
	echo "<form method='POST' action='./includes/zrealizuj.inc.php'>";
	echo "<input type=hidden name=idwizyta value='$wizyty'>";
	echo "<input type=submit name=submit value='ZREALIZUJ'>";
	echo "</form>";
	
	
?>


