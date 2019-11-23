<?php

/*po nacisniecu zaloguj*/
if (isset($_POST['submit'])) {
	
	/*polaczenie z baza*/
	require './dbh.inc.php';
	



$sql = "UPDATE zabiegi SET nazwa_zabieg='$_POST[nazwa_zabieg]', cena_zabieg='$_POST[cena_zabieg]', czas_zabieg='$_POST[czas_zabieg]', opis_zabieg='$_POST[opis_zabieg]' WHERE id_zabieg='$_POST[id_zabieg]'";


	if (mysqli_query($con, $sql)) 
		header("refresh:1; url=../zabiegi.php");
		

	else 
		echo "Nie udało się edytować danych";
	
	
}




?>