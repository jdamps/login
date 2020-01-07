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


$eid = $_SESSION['uid'];


require "header3.php";

header ("Location: ./usersession.php?error=permissiondeny");
		exit();
}
?>
<main>



<?php

require './includes/dbh.inc.php';


$sql3 = "SELECT 
events.id,
events.start_event,
events.end_event
FROM
events
WHERE
events.id='$_GET[id]'
";


$records = mysqli_query($con,$sql3);

?>

	
	<?php
	while($row = mysqli_fetch_assoc($records))
		
		
	{
		echo "<tr><form method=POST action=includes/urlopyconfirm.inc.php>";
		echo "<br />";
		echo "ID event: ";
		echo "<td><input type=text readonly=readonly name=id_events value='".$row['id']."'></td>";
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
		echo "<td><input type=hidden name=id value='".$row['id']."'></td>";
		echo "</br >";
		echo "<input type=submit name=submit value=Potwierdź>";
		echo "</form></tr>";
		
	}
	
	?>





	
	
<?php
	require "footer.php";
?>