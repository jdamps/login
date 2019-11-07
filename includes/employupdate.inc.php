<?php

require './dbh.inc.php';

$sql = "UPDATE pracownicy SET login_pracownik='$_POST[login_pracownik]', imie_pracownik='$_POST[imie_pracownik]', nazwisko_pracownik='$_POST[nazwisko_pracownik]', tel_pracownik='$_POST[tel_pracownik]', opis_pracownik='$_POST[opis_pracownik]' WHERE id_pracownik='$_POST[id_pracownik]'";


	if (mysqli_query($con, $sql)) 
		header("refresh:1; url=../adminsession.php");

	else 
		echo "Nie udało się edytować danych pracownika";


?>