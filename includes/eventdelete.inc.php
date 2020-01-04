<?php

require './dbh.inc.php';

	$sql = "DELETE FROM events WHERE id='$_GET[id]';";

	if (mysqli_query($con, $sql)) {
    header("refresh:1; url=../wizytyplan.php?success=del");

	}

else if (isset($_SESSION['aid']))  { 
		header ("Location: ../wizyty.php");
		exit();

}

else if (isset($_SESSION['eid']))  { 
		header ("Location: ../ewizyty.php");
		exit();

}

