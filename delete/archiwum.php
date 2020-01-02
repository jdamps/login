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

<main>
<div class = "ml-2 mr-5 mt-2">

<h3>ARCHIWUM</h3>



<br />
<form action="archiwum.php" method="POST">
	<input type="text" name="search" placeholder="Osoba/Data/Status">
	<button type="submit" name="submit-search">Szukaj</button>
</form>
<br />

<?php
require 'includes/dbh.inc.php';




	if (isset($_POST['submit-search'])) {
		$search = mysqli_real_escape_string($con, $_POST['search']);
		$sql5 = "SELECT 
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
statusy_wizyt.id_status!=1
AND
klienci.id_klient=wizyty.id_klient
AND
(klienci.login_klient LIKE '%$search%'
OR
klienci.nazwisko_klient LIKE '%$search%'
OR
klienci.imie_klient LIKE '%$search%'
OR
klienci.tel_klient LIKE '%$search%'
OR
pracownicy.login_pracownik LIKE '%$search%'
OR
events.end_event LIKE '%$search%'
OR
statusy_wizyt.nazwa_status LIKE '%$search%')
ORDER BY start_event";
		if ($records = mysqli_query($con, $sql5));
		/*$queryResult = mysqli_num_rows($result);*/
		
		echo "<table width='900' border='1' cellpadding='1' cellspacing='1'>";
		echo "<th>ID</th> "; 
		echo "<th>Pracownik</th>";
		echo "<th>Klient</th>";
		/*echo "<th>Nazwisko</th>";*/
		/*echo "<th>Telefon</th>";*/
		/*echo "<th>Data</th>";*/
		echo "<th>Koniec</th>";
		echo "<th>Status Wizyty</th>";
		echo "<th>Szczegóły</th>";
	
			while ($row=mysqli_fetch_assoc($records)) {
			echo "<tr>";
			echo "<tr><form method=POST action=includes/anuluj.inc.php>";
			echo "<td>".$row['id_wizyta']."</td>";
			echo "<td>".$row['login_pracownik']."</td>";
			echo "<td>".$row['login_klient']."</td>";
			/*echo "<td>".$row['imie_klient']."</td>";*/
			/*echo "<td>".$row['nazwisko_klient']."</td>";*/
			/*echo "<td>".$row['tel_klient']."</td>";*/
			/*echo "<td>".$row['start_event']."</td>";*/
			echo "<td>".$row['end_event']."</td>";
			echo "<td>".$row['nazwa_status']."</td>";
			$idwizyta = $row['id_wizyta'];
			echo "<input type=hidden name=idwizyta value='$idwizyta'>";
			echo "<td><a href=summary.php?id=".$row['id_wizyta'].">Szczegóły</a></td>";
			echo "</tr>";
			echo "</form>";
			
			
		
	
		
		}
		echo "</table>";
		echo "<br />";
}
?>


	<?php
		if (isset($_GET['error'])) {
			 if ($_GET['error'] == "sqlerrorr") {
				echo '<p>Błąd łączenia z bazą.</p>';
			}
		
		}
		else if (isset($_GET['cancel'])) {
			if ($_GET['cancel'] == "cancel") {
			echo '<div class="alert alert-danger" role="alert">Wizyta została anulowana.</div>';
		}
		}
				else if (isset($_GET['success'])) {
			if ($_GET['success'] == "done") {
			echo '<div class="alert alert-info" role="alert">Wizyta została zrealizowana.</div>';
		}
		}
		?>

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
statusy_wizyt.id_status!=1
ORDER BY start_event
"))
	echo "<table width='900' border='1' cellpadding='1' cellspacing='1'>";
	echo "<th>ID</th>";
	echo "<th>Pracownik</th>";
	echo "<th>Klient</th>";
	echo "<th>Opis</th>";
	echo "<th>Data</th>";
	echo "<th>Status Wizyty</th>";
	echo "<th>Szczegóły</th>";
	
	while($pk=mysqli_fetch_assoc($records)){
	
	echo "<tr>";
	
	echo "<td>".$pk['id_wizyta']."</td>";
	echo "<td>".$pk['login_pracownik']."</td>";
	echo "<td>".$pk['login_klient']."</td>";
	echo "<td>".$pk['title']."</td>";
	echo "<td>".$pk['end_event']."</td>";
	echo "<td>".$pk['nazwa_status']."</td>";
	$idwizyta = $pk['id_wizyta'];
	echo "<input type=hidden name=idwizyta value='$idwizyta'>";
	echo "<td><a href=summary.php?id=".$pk['id_wizyta'].">Szczegóły</a></td>";
	echo "</form>";
	echo "</tr>";
	
	
}
?>

</div>
</main>