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

<h3>WIZYTA</h3>

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
	echo "<table class=table>";
	echo "<tr class=table-secondary>";

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
	echo "<input type=submit name=submit value='Dodaj Zabieg'>";
	echo "</form>";
	echo "<br />";
	

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
r6.id_wizyta='$_GET[id]'
")) 
	echo "<table width='900' border='1' cellpadding='1' cellspacing='1'>";

	echo "<th>ID</th>";
	echo "<th>Zabieg</th>";
	echo "<th>Cena</th>";
	echo "<th>Czas</th>";
	echo "<th>Usuń</th>";

	echo "<tr><form method=POST action=includes/usunzabieg.inc.php>";
	while($pk=mysqli_fetch_assoc($records)){	
	$idwizyta = $_GET['id'];
	$idzabieg = $pk['id_zabieg'];
	
	echo "<td>".$pk['id_zabieg']. "</td>";
	echo "<td>".$pk['nazwa_zabieg']."</td>";
	echo "<td>".$pk['cena_zabieg']."</td>";
	echo "<td>".$pk['czas_zabieg']."</td>";
	echo "<input type=hidden name=idwizyta value='$idwizyta'>";
	echo "<input type=hidden name=idzabieg value='$idzabieg'>";
	echo "<td><input type=submit name=submit value=Usuń></td>";
	echo "</tr></form>";
	
	
	
}
echo "</table>";



?>

<?php
require './includes/dbh.inc.php';



$result = mysqli_query($con,"SELECT SUM(zabiegi.czas_zabieg) AS 'czas'
FROM
r6, zabiegi
WHERE
r6.id_zabieg=zabiegi.id_zabieg
AND
r6.id_wizyta='$_GET[id]'
");

$row = mysqli_fetch_assoc($result);
$time = $row['czas'];



function hour_min($time){// Total
   if($time <= 0) return '0 h 0 min';
else    
   return sprintf("%2d",floor($time / 60)).' h '.sprintf("%02d",str_pad(($time % 60), 2, "0", STR_PAD_LEFT)). " min";
}
echo "Czas trwania:"; echo hour_min($time);
?>



<?php
require './includes/dbh.inc.php';



$result = mysqli_query($con,"SELECT SUM(zabiegi.cena_zabieg) AS 'cena'
FROM
r6, zabiegi
WHERE
r6.id_zabieg=zabiegi.id_zabieg
AND
r6.id_wizyta='$_GET[id]'
");

$row = mysqli_fetch_assoc($result);
$sum = $row['cena'];
echo "<br />";
echo "<br />";
echo "<h3>Suma: $sum </h3>"; 	



?>


<?php



$idwizyta = $_GET['id'];
$sum = $row['cena'];

	
		echo "<tr><form method=POST action=rabat.php>";
		echo "Rabat: ";
		$resultSet = mysqli_query($con,"SELECT id_rabat, procent_rabat, wartosc_rabat FROM rabaty");
		echo "<select name=rabaty>";
		while ($rows = $resultSet->fetch_assoc()){
		$id_rabat= $rows['id_rabat'];
		$procent_rabat = $rows['procent_rabat'];
		$wartosc_rabat = $rows['wartosc_rabat'];
		echo "<option value='".$rows['wartosc_rabat']."'>$procent_rabat</option>";
		}
		echo "</select>";
		echo "<input type=hidden name=idwizyta value='$idwizyta'>";
		echo "<input type=hidden name=sum value='$sum'>";
		echo "<input type=submit name=submit value=Przelicz>";
		echo "</form></tr>";
		
	
	
	?>

	
<?php
	require "footer.php";
?>
