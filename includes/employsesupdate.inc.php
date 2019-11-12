<?php

/*po nacisniecu zaloguj*/
if (isset($_POST['pracownik-submit'])) {
	
	/*polaczenie z baza*/
	require './dbh.inc.php';
	



$sql = "UPDATE pracownicy SET imie_pracownik='$_POST[imie_pracownik]', nazwisko_pracownik='$_POST[nazwisko_pracownik]', tel_pracownik='$_POST[tel_pracownik]', opis_pracownik='$_POST[opis_pracownik]' WHERE login_pracownik='$_POST[login_pracownik]'";


	if (mysqli_query($con, $sql)) 
		header("refresh:1; url=../employsession.php");
		

	else 
		echo "Nie udało się edytować danych";
	
	
}




?>