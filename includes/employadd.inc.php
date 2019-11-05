<?php

/*po nacisniecu zarejestruj*/
if (isset($_POST['employ-submit'])) {
	
/*polaczenie z baza*/
	require './dbh.inc.php';
	
	$login = $_POST['login_pracownik'];
	$haslo1 = $_POST['haslo_pracownik'];
	$haslo2 = $_POST['haslo_pracownik-rep'];
	$imie = $_POST['imie_pracownik'];
	$nazwisko = $_POST['nazwisko_pracownik'];
	$tel = $_POST['tel_pracownik'];
	$opis = $_POST['opis_pracownik'];
	
	
	
/*gdy user nie wypelni wszystkich pol*/
	if (empty($login) || empty($haslo1) || empty($haslo2)) {
		header ("Location: ../employadd.php?error=emptyfields");
		exit();
	}	
	
	
/*sprawdzanie powtorzonego hasla*/
	else if ($haslo1 !== $haslo2) {
		header ("Location: ../employadd.php?error=passwordcheck");
	}
	
	
/*sprawdzanie czy taki user juz istnieje*/
	else {
		
		$sql = "SELECT login_pracownik FROM pracownicy WHERE login_pracownik=?";
		$stmt = mysqli_stmt_init($con);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header ("Location: ../employadd.php?error=sqlerrorr");
			exit();
		} 
		
		else {
			mysqli_stmt_bind_param($stmt, "s", $login); /*zwiazane z powyzszym statementem*/
			mysqli_stmt_execute($stmt); /*execiute statement in db*/
			mysqli_stmt_store_result($stmt); /* stores data from db and stores under variable stmt */
			$resultCheck = mysqli_stmt_num_rows($stmt); /*how many rows we get from db as resoult - w tym przypadku jedna*/
			if ($resultCheck > 0) {
				header ("Location: ../employadd.php?error=usertaken");
				exit();
			}
			else {
				$sql = "INSERT INTO pracownicy (login_pracownik, haslo_pracownik, imie_pracownik, nazwisko_pracownik, tel_pracownik, opis_pracownik) VALUES (?, ?, ?, ?, ?, ?) ";
				$stmt = mysqli_stmt_init($con);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					header ("Location: ../employadd.php?error=sqlerror");
					exit();
				} 
				else  {
					$hashedPwd = password_hash($haslo1, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt, "ssssds", $login, $hashedPwd, $imie, $nazwisko, $tel, $opis); 
					mysqli_stmt_execute($stmt); 
					header ("Location: ../employadd.php?signup=success");
					exit();
				
	
				}
			}
		
		}
		
	}
	mysqli_stmt_close($stmt);
	mysqli_close($con);
	

}
else { 
		header ("Location: ../employadd.php");
		exit();

}