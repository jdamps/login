<?php
require "header.php";
?>

<main>
<?php

if (isset($_SESSION['uid'])) {
	
require 'includes/dbh.inc.php';
echo "<br />";


$uid = $_SESSION['uid'];


if ($records=mysqli_query($con,"SELECT * FROM klienci WHERE id_klient=".$uid));
	
	
	while($pk=mysqli_fetch_assoc($records)){
	echo "<tr><form method=POST action=includes/userupdate.inc.php>";
	echo "<tr>"; 
	echo "<br />";
	echo "Twoje Dane:";
	echo "<td><input type=text readonly=readonly name=login_klient value='".$pk['login_klient']."'></td>";

	echo "<br />";
	echo "<br />";
	echo "Imię:";
	echo "<br />";
	echo "<td><input type=text name=imie_klient value='".$pk['imie_klient']."'></td>";
	echo "<button type=submit name=klient-submit>Dodaj/Zmień</button>";
	echo "<br />";
	echo "<br />";
	echo "Nazwisko:";
	echo "<br />";
	echo "<td><input type=text name=nazwisko_klient value='".$pk['nazwisko_klient']."'></td>";
	echo "<button type=submit name=klient-submit>Dodaj/Zmień</button>";
	echo "<br />";
	echo "<br />";
	echo "E-mail:";
	echo "<br />";
	echo "<td><input type=text name=email_klient value='".$pk['email_klient']."'></td>";
	echo "<button type=submit name=klient-submit>Dodaj/Zmień</button>";
	echo "<br />";
	echo "<br />";
	echo "Telefon:";
	echo "<br />";
	echo "<td><input type=text name=tel_klient value='".$pk['tel_klient']."'></td>";
	echo "<button type=submit name=klient-submit>Dodaj/Zmień</button>";
	echo "<br />";
	echo "</tr>";
	echo "<br />";
	echo '<a href="./userpwedit.php">Zmień hasło</a>';
	echo "<br />";
	echo '<a href="./userdelete.php">Usuń Konto</a>';
	echo "<br />";
	echo "<a href=strona>Moje wizyty</a>";
	echo "<br />";
	
	
	
}
 


mysqli_close($con);

}
?>

</main>