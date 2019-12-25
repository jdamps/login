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
<div class = "mt-5">


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
wizyty.id_wizyta='$_GET[id]'
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
	echo "</form>";
	echo "</tr>";
	echo "</table>";
	echo "<br />";
	
}



?>



<?php

$idwizyta = $_GET['id'];


require './includes/dbh.inc.php';
echo "<br />";
	echo "<form method='POST' action='./includes/zabiegiadd.inc.php'>";
	
	echo "<select size=15 name=zabiegi>";
	if ($records=mysqli_query($con,"SELECT * FROM zabiegi"))
	while($pk=mysqli_fetch_assoc($records)){
	echo '<option value="'.$pk['id_zabieg'].'">'.$pk['nazwa_zabieg'].'</option>'; 
}
	echo "<br />";
	echo "</select>";
	echo "<br />";
	echo "<input type=hidden name=idwizyta value='$idwizyta'>";
	echo "<input type=submit name=submit value=Dodaj Zabieg>";
	echo "</form>";
	
	
	
	

?>


	
	
<?php
	require "footer.php";
?>
