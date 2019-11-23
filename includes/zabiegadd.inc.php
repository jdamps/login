<?php

/*po nacisniecu zarejestruj*/
if (isset($_POST['zabieg-submit'])) {
	
/*polaczenie z baza*/
	require './dbh.inc.php';
	
	$znazwa = $_POST['nazwa_zabieg'];
	$zcena = $_POST['cena_zabieg'];
	$zczas = $_POST['czas_zabieg'];
	$zopis = $_POST['opis_zabieg'];
	
	
	
	if (empty($znazwa) || empty($zcena)) {
		header ("Location: ../zabiegadd.php?error=emptyfields");
		exit();
	}	
	
	
/*sprawdzanie czy taki user juz istnieje*/
	else {
		
		$sql = "SELECT nazwa_zabieg FROM zabiegi WHERE nazwa_zabieg=?";
		$stmt = mysqli_stmt_init($con);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header ("Location: ../zabiegadd.php?error=sqlerrorr1");
			exit();
		} 
		
		else {
			mysqli_stmt_bind_param($stmt, "s", $login); /*zwiazane z powyzszym statementem*/
			mysqli_stmt_execute($stmt); /*execiute statement in db*/
			mysqli_stmt_store_result($stmt); /* stores data from db and stores under variable stmt */
			$resultCheck = mysqli_stmt_num_rows($stmt); /*how many rows we get from db as resoult - w tym przypadku jedna*/
			if ($resultCheck > 0) {
				header ("Location: ../zabiegadd.php?error=nametaken");
				exit();
			}
			else {
				$sql = "INSERT INTO zabiegi (nazwa_zabieg, cena_zabieg, czas_zabieg, opis_zabieg) VALUES (?, ?, ?, ?) ";
				$stmt = mysqli_stmt_init($con);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					header ("Location: ../zabiegadd.php?error=sqlerror");
					exit();
				} 
				else  {
					$hashedPwd = password_hash($haslo1, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt, "sdds", $znazwa, $zcena, $zczas, $zopis); 
					mysqli_stmt_execute($stmt); 
					header ("Location: ../zabiegadd.php?signup=success");
					exit();
				
	
				}
			}
		
		}
		
	}
	mysqli_stmt_close($stmt);
	mysqli_close($con);
	

}
else { 
		header ("Location: ../zabiegi.php");
		exit();

}