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

<h3>Zaplanowane Wizyty</h3>

</br>



<?php
require './includes/dbh.inc.php';
if ($records=mysqli_query($con,"SELECT * FROM events WHERE status_event=0 AND title NOT LIKE '%urlop%' AND title NOT LIKE '%wolne%' ORDER BY start_event"))
	echo "<table class=table>";
	echo "<tr class=table-secondary>";
	echo "<th>ID event</th>";
	echo "<th>Start</th>";
	echo "<th>Koniec</th>";
	echo "<th>Opis</th>";
	echo "<th>Potwierdź wizytę</th>";
	echo "<th>Usuń</th>";
	
	while($pk=mysqli_fetch_assoc($records)){
	
	echo "<tr>";
	
	echo "<td>".$pk['id']."</td>";
	echo "<td>".$pk['start_event']."</td>";
	echo "<td>".$pk['end_event']."</td>";
	echo "<td>".$pk['title']."</td>";
	echo "<td><a href=ewizytyconfirm.php?id=".$pk['id'].">OK</a></td>";
	echo "<td><a href=includes/eventdelete.inc.php?id=".$pk['id'].">Usuń</a></td>";
	echo "</form>";
	echo "</tr>";
	
	
}
?>

	<?php
		if (isset($_GET['error'])) {
			 if ($_GET['error'] == "sqlerrorr") {
				echo '<p>Błąd łączenia z bazą.</p>';
			}

		
		}
		else if (isset($_GET['success'])) {
			if ($_GET['success'] == "del") {
			echo '<div class="alert alert-danger" role="alert">Wizyta została anulowana.</div>';
		}
		}
		?>

</div>
</main>