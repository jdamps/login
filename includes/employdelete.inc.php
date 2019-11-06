<?php

require './dbh.inc.php';

	$sql = "DELETE FROM pracownicy WHERE id_pracownik='$_GET[id]'";

	if (mysqli_query($con, $sql)) {
    header("refresh:0; url=../adminsession.php");

	}

else { 
		header ("Location: ../adminsession.php");
		exit();

}
