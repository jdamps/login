<?php
require "header.php";
?>

<main>
<?php

if (isset($_SESSION['eid'])) {
	
require 'includes/dbh.inc.php';
echo "<br />";
echo "to jest sesja pracownika";


$eid = $_SESSION['eid'];

	

if ($records=mysqli_query($con,"SELECT * FROM pracownicy WHERE id_pracownik=".$eid));


	while($pk=mysqli_fetch_assoc($records)){
	echo "<tr><form method=POST action=includes/employsesupdate.inc.php>";
	echo "<tr>"; 
	echo "<br />";
	echo "Twoje Dane:";
	echo "<td><input type=text readonly=readonly name=login_pracownik value='".$pk['login_pracownik']."'></td>";

	echo "<br />";
	echo "<br />";
	echo "Imię:";
	echo "<br />";
	echo "<td><input type=text name=imie_pracownik value='".$pk['imie_pracownik']."'></td>";
	
	echo "<br />";
	echo "Nazwisko:";
	echo "<br />";
	echo "<td><input type=text name=nazwisko_pracownik value='".$pk['nazwisko_pracownik']."'></td>";
	
	echo "<br />";
	echo "Telefon:";
	echo "<br />";
	echo "<td><input type=text name=tel_pracownik value='".$pk['tel_pracownik']."'></td>";
	
	echo "<br />";
	echo "Opis:";
	echo "<br />";
	echo "<td><input type=text name=opis_pracownik value='".$pk['opis_pracownik']."'></td>";
	echo "<br />";
	echo "<br />";
	echo "<button type=submit name=pracownik-submit>Dodaj/Zmień</button>";
	echo "<br />";
	echo "</tr>";
	echo "<br />";
	echo '<a href="./employsespwedit.php">Zmień hasło</a>';
	echo "<br />";
	echo "<a href=strona>Moje wizyty</a>";
	echo "<br />";
	
	
	
}
 


mysqli_close($con);

}
?>

</main>