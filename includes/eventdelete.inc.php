<?php

require './dbh.inc.php';

	$sql = "DELETE FROM events WHERE id='$_GET[id]';";

	if (mysqli_query($con, $sql)) {
    header("refresh:1; url=../wizytyplan.php?success=del");

	}

else { 
		header ("Location: ../wizyty.php");
		exit();

}
