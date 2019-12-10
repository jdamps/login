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
<div class = "ml-2 mr-5 mt-5">

<h3>Zaplanowane Wizyty</h3>

</br>

<?php

require './includes/dbh.inc.php';



if ($records=mysqli_query($con,"SELECT * FROM events WHERE status_event=0 AND title NOT LIKE 'urlop' ORDER BY start_event"))
	echo "<table width='900' border='1' cellpadding='1' cellspacing='1'>";
	echo "<th>ID</th>";
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
	echo "<td><a href=wizytyconfirm.php?id=".$pk['id'].">OK</a></td>";
	echo "<td><a href=includes/employdelete.inc.php?id=".$pk['id'].">Usuń</a></td>";
	echo "</form>";
	echo "</tr>";
	
	
}



?>

</div>
</main>