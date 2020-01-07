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

else if (isset($_SESSION['uid'])) {
	
require 'includes/dbh.inc.php';


$uid = $_SESSION['uid'];


require "header3.php";

header ("Location: ./usersession.php?error=permissiondeny");
		exit();
}

?>

<main>
<div class = "ml-2 mr-5 mt-2">

<?php

require 'includes/dbh.inc.php';

	if (isset($_POST['submit-search'])) {
		$search = mysqli_real_escape_string($con, $_POST['search']);
		$sql = "SELECT 
wizyty.id_wizyta,
statusy_wizyt.nazwa_status,
pracownicy.login_pracownik,
klienci.login_klient,
klienci.imie_klient,
klienci.nazwisko_klient,
klienci.tel_klient,
events.start_event,
events.end_event
FROM
klienci, pracownicy, wizyty, events, statusy_wizyt
WHERE
pracownicy.id_pracownik=wizyty.id_pracownik
AND
events.id=wizyty.id_events
AND
statusy_wizyt.id_status=wizyty.id_status
AND
statusy_wizyt.id_status=1
AND
klienci.id_klient=wizyty.id_klient
AND
(klienci.login_klient LIKE '%$search%'
OR
klienci.nazwisko_klient LIKE '%$search%'
OR
klienci.imie_klient LIKE '%$search%'
OR
klienci.tel_klient LIKE '%$search%')
ORDER BY start_event";
		if ($records = mysqli_query($con, $sql));
		/*$queryResult = mysqli_num_rows($result);*/
		
		echo "<table width='900' border='1' cellpadding='1' cellspacing='1'>";
		echo "<th>ID</th> "; 
		echo "<th>Pracownik</th>";
		echo "<th>Klient</th>";
		
		/*echo "<th>Nazwisko</th>";*/
		/*echo "<th>Telefon</th>";*/
		echo "<th>Start</th>";
		echo "<th>Koniec</th>";
		echo "<th>Status Wizyty</th>";
		echo "<th>Edytuj/Zrealizuj</th>";
		echo "<th>Anuluj</th>";
	
			while ($row=mysqli_fetch_assoc($records)) {
			echo "<tr>";
			echo "<tr><form method=POST action=includes/anuluj.inc.php>";
			echo "<td>".$row['id_wizyta']."</td>";
			echo "<td>".$row['login_pracownik']."</td>";
			echo "<td>".$row['login_klient']."</td>";
			/*echo "<td>".$row['imie_klient']."</td>";*/
			/*echo "<td>".$row['nazwisko_klient']."</td>";*/
			/*echo "<td>".$row['tel_klient']."</td>";*/
			echo "<td>".$row['start_event']."</td>";
			echo "<td>".$row['end_event']."</td>";
			echo "<td>".$row['nazwa_status']."</td>";
			echo "<td><a href=wizytyedit.php?id=".$row['id_wizyta'].">Edytuj/Zrealizuj</a></td>";
			echo "<td><input type=hidden name=id_wizyta value='".$row['id_wizyta']."'><input type=submit name=submit value=Anuluj></td>";
		
			echo "</tr>";
		

	
		
		}
		echo "</table>";
		echo "<br />";

}
?>