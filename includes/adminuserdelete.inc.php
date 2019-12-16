<?php

require './dbh.inc.php';

	$sql = "UPDATE klienci  SET login_klient='anonim', imie_klient='anonim', nazwisko_klient='anonim', tel_klient='000000000', email_klient='anonim' WHERE id_klient='$_GET[id]';";

	if (mysqli_query($con, $sql)) {
    header("refresh:0; url=../adminusersession.php");

	}

else { 
		header ("Location: ../adminusersession.php");
		exit();

}
