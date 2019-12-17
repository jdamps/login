<?php

require './dbh.inc.php';

	$sql = "UPDATE pracownicy  SET login_pracownik='pracownik', imie_pracownik='pracownik', nazwisko_pracownik='pracownik', tel_pracownik='pracownik' WHERE id_pracownik='$_GET[id]';";

	if (mysqli_query($con, $sql)) {
    header("refresh:0; url=../adminsession.php");

	}

else { 
		header ("Location: ../adminsession.php");
		exit();

}
