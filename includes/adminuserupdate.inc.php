<?php

require './dbh.inc.php';

$sql = "UPDATE klienci SET login_klient='$_POST[login_klient]', imie_klient='$_POST[imie_klient]', nazwisko_klient='$_POST[nazwisko_klient]', email_klient='$_POST[email_klient]', tel_klient='$_POST[tel_klient]' WHERE id_klient='$_POST[id_klient]'";


	if (mysqli_query($con, $sql)) 
		header("refresh:1; url=../adminusersession.php");

	else 
		echo "Nie udało się edytować danych pracownika";


?>