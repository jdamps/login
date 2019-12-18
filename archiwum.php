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
<form action="searchwizyty.php" method="POST">
	<input type="text" name="search" placeholder="Klient/Pracownik/Data">
	<button type="submit" name="submit-search">Szukaj</button>
</form>
<br />


	<?php
		if (isset($_GET['error'])) {
			 if ($_GET['error'] == "sqlerrorr") {
				echo '<p>Błąd łączenia z bazą.</p>';
			}

		
		}
		else if (isset($_GET['signup'])) {
			if ($_GET['signup'] == "success") {
			echo '<div class="alert alert-danger" role="alert">Wizyta została anulowana.</div>';
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
	echo "<td><a href=#?id=".$pk['id_wizyta'].">Szczegóły</a></td>";
	echo "</form>";
	echo "</tr>";
	
	
}



?>

</div>
</main>
