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

<?php
require './includes/dbh.inc.php';
$sql = "INSERT INTO wizyty (id_events) VALUES ('$_GET[id]');";
if(mysqli_query($con,$sql)){

$wizyty_id = mysqli_insert_id($con);
}
?>



<?php
require './includes/dbh.inc.php';
$sql1 = "UPDATE events  SET id_wizyta='$wizyty_id', status_event = '1' WHERE id='$_GET[id]';";
$records = mysqli_query($con,$sql1);
?>




<?php

require './includes/dbh.inc.php';


$sql3 = "SELECT 
wizyty.id_wizyta,
wizyty.id_events,
events.start_event,
events.end_event
FROM
wizyty, events
WHERE
wizyty.id_events=events.id
AND
wizyty.id_events='$_GET[id]'
";


$records = mysqli_query($con,$sql3);

?>

	
	<?php
	while($row = mysqli_fetch_assoc($records))
		
		
	{
		echo "<tr><form method=POST action=includes/wizytyconfirm.inc.php>";
		echo "<br />";
		echo "ID wizyta: ";
		echo "<td><input type=text readonly=readonly name=id_wizyta value='".$row['id_wizyta']."'></td>";
		echo "</br >";
		echo "ID event: ";
		echo "<td><input type=text readonly=readonly name=id_events value='".$row['id_events']."'></td>";
		echo "</br >";
		echo "Start: ";
		echo "<td><input type=text readonly=readonly name=start_event value='".$row['start_event']."'></td>";
		echo "</br >";
		echo "Koniec: ";
		echo "<td><input type=text readonly=readonly name=end_event value='".$row['end_event']."'></td>";
		echo "</br >";
		
		
		
		echo "Pracownik: ";
		$resultSet = mysqli_query($con,"SELECT id_pracownik, login_pracownik FROM pracownicy");
		echo "<select name=pracownicy>";
		while ($rows = $resultSet->fetch_assoc()){
		$login_pracownik = $rows['login_pracownik'];
		$id_pracownik = $rows['id_pracownik'];
		echo "<option value='".$rows['id_pracownik']."'>$login_pracownik $id_pracownik</option>";
		}
		echo "</select>";
		echo "<td><input type=hidden name=id_wizyta value='".$row['id_wizyta']."'></td>";
		
	
		
		echo "</br >";
		echo "Klient: ";
		$resultSet = mysqli_query($con,"SELECT id_klient, login_klient FROM klienci WHERE login_klient!='anonim'");
		echo "<select name=klienci>";
		while ($rows = $resultSet->fetch_assoc()){
		$login_klient = $rows['login_klient'];
		$id_klient = $rows['id_klient'];
		echo "<option value='".$rows['id_klient']."'>$login_klient $id_klient</option>";
		}
		echo "</select>";
		echo "</br >";


		echo "<td><input type=hidden name=id_wizyta value='".$wizyty_id."'></td>";
		echo "<input type=submit name=submit value=Potwierdź>";
		echo "</form></tr>";
		
	}
	
	?>





	
	
<?php
	require "footer.php";
?>