<?php

require './dbh.inc.php';

	$sql = "DELETE FROM klienci WHERE id_klient='$_GET[id]'";

	if (mysqli_query($con, $sql)) {
    header("refresh:0; url=../adminusersession.php");

	}

else { 
		header ("Location: ../adminusersession.php");
		exit();

}
