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
$records = mysqli_query($con,$sql);

?>


<?php

require './includes/dbh.inc.php';
$sql1 = "UPDATE events SET  status_event = '1' WHERE id='$_GET[id]';";

$records = mysqli_query($con,$sql1);

?>

<?php
if ($records=mysqli_query($con,"SELECT 
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
"))
	echo "<table width='900' border='1' cellpadding='1' cellspacing='1'>";
	echo "<th>ID wizyta</th>";
	echo "<th>Event ID</th>";
	echo "<th>Start</th>";
	echo "<th>Koniec</th>";

	
	while($pk=mysqli_fetch_assoc($records)){
	
	echo "<tr>";
	echo "<td>".$pk['id_wizyta']."</td>";
	echo "<td>".$pk['id_events']."</td>";
	echo "<td>".$pk['start_event']."</td>";
	echo "<td>".$pk['end_event']."</td>";
	echo "</tr>";



	}
?>
	
	
<?php
	require "footer.php";
?>