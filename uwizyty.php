<?php
require "header.php";
?>


<?php

if (isset($_SESSION['uid'])) {
	
require 'includes/dbh.inc.php';



$uid = $_SESSION['uid'];


mysqli_close($con);

require "header3.php";



}

?>

<main>
<div class = "ml-2 mr-5 mt-5">

<h3>Potwierdzone Wizyty</h3>

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
klienci.id_klient=$uid
AND
events.id=wizyty.id_events
AND
statusy_wizyt.id_status=wizyty.id_status
AND
statusy_wizyt.id_status=1
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
	echo "<th>Zrealizuj</th>";
	echo "<th>Anuluj</th>";

	
	while($pk=mysqli_fetch_assoc($records)){
	
	echo "<tr>";
	echo "<tr><form method=POST action=includes/anuluj.inc.php>";
	echo "<td>".$pk['id_wizyta']."</td>";
	echo "<td>".$pk['login_pracownik']."</td>";
	echo "<td>".$pk['login_klient']."</td>";
	echo "<td>".$pk['title']."</td>";
	echo "<td>".$pk['start_event']."</td>";
	echo "<td>".$pk['end_event']."</td>";
	echo "<td>".$pk['nazwa_status']."</td>";
	echo "<td><a href=wizytyedit.php?id=".$pk['id_wizyta'].">OK</a></td>";
	echo "<td><input type=hidden name=id_wizyta value='".$pk['id_wizyta']."'><input type=submit name=submit value=Anuluj></td>";
	echo "</form>";
	echo "</tr>";
	
}



?>

</div>
</main>
