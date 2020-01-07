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
header ("Location: ./employsession.php?error=permissiondeny");
		exit();
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
	<?php
		if (isset($_GET['success'])) {
			 if ($_GET['success'] == "approved") {
				echo '<div class="alert alert-info" role="alert">Urlop został potwierdzony.</div>';
			}

		
		}
		if (isset($_GET['success'])) {
			if ($_GET['success'] == "del") {
			echo '<div class="alert alert-danger" role="alert">Urlop został usunięty.</div>';
		}
		}
		?>
<div class = "ml-2 mr-5 mt-5">

<h3>Urlopy</h3>



<?php

require './includes/dbh.inc.php';



if ($records=mysqli_query($con,"SELECT 
pracownicy.login_pracownik,
pracownicy.id_pracownik,
events.title,
events.id,
events.start_event,
events.end_event,
events.id_pracownik
FROM
events
LEFT JOIN pracownicy ON pracownicy.id_pracownik=events.id_pracownik
WHERE title LIKE '%urlop%'
ORDER BY start_event"))
	echo "<table class=table>";
	echo "<tr class=table-secondary>";
	echo "<th>ID</th>";
	echo "<th>Start</th>";
	echo "<th>Koniec</th>";
	echo "<th>Opis</th>";
	echo "<th>Pracownik</th>";
	echo "<th>Edycja</th>";
	echo "<th>Usuń</th>";

	
	while($pk=mysqli_fetch_assoc($records)){
	
	echo "<tr>";
	
	echo "<td>".$pk['id']."</td>";
	echo "<td>".$pk['start_event']."</td>";
	echo "<td>".$pk['end_event']."</td>";
	echo "<td>".$pk['title']."</td>";
	echo "<td>".$pk['login_pracownik']."</td>";
	echo "<td><a href=urlopyedit.php?id=".$pk['id'].">OK</a></td>";
	echo "<td><a href=includes/urlopydelete.inc.php?id=".$pk['id'].">Usuń</a></td>";
	echo "</form>";
	echo "</tr>";
	
	
}

echo "</table>";

?>

<br>
<h3>Święta</h3>

<?php

require './includes/dbh.inc.php';



if ($records=mysqli_query($con,"SELECT 
pracownicy.login_pracownik,
pracownicy.id_pracownik,
events.title,
events.id,
events.start_event,
events.end_event,
events.id_pracownik
FROM
events
LEFT JOIN pracownicy ON pracownicy.id_pracownik=events.id_pracownik
WHERE title LIKE '%wolne%'
ORDER BY start_event"))
	echo "<table class=table>";
	echo "<tr class=table-secondary>";
	echo "<th>ID</th>";
	echo "<th>Start</th>";
	echo "<th>Koniec</th>";
	echo "<th>Opis</th>";
	echo "<th>Pracownik</th>";
	echo "<th>Edycja</th>";
	echo "<th>Usuń</th>";

	
	while($pk=mysqli_fetch_assoc($records)){
	
	echo "<tr>";
	
	echo "<td>".$pk['id']."</td>";
	echo "<td>".$pk['start_event']."</td>";
	echo "<td>".$pk['end_event']."</td>";
	echo "<td>".$pk['title']."</td>";
	echo "<td>".$pk['login_pracownik']."</td>";
	echo "<td><a href=urlopyedit.php?id=".$pk['id'].">OK</a></td>";
	echo "<td><a href=includes/urlopydelete.inc.php?id=".$pk['id'].">Usuń</a></td>";
	echo "</form>";
	echo "</tr>";
	
	
}



?>



</div>
</main>