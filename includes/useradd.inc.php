<?php

/*po nacisniecu zarejestruj*/
if (isset($_POST['user-submit'])) {
	
/*polaczenie z baza*/
	require './dbh.inc.php';
	
	$login = $_POST['login_klient'];
	$haslo1 = $_POST['haslo_klient'];
	$haslo2 = $_POST['haslo_klient-rep'];
	$imie = $_POST['imie_klient'];
	$nazwisko = $_POST['nazwisko_klient'];
	$tel = $_POST['email_klient'];
	$opis = $_POST['tel_klient'];
	
	
	
/*gdy user nie wypelni wszystkich pol*/
	if (empty($login) || empty($haslo1) || empty($haslo2)) {
		header ("Location: ../useradd.php?error=emptyfields");
		exit();
	}	
	
	
/*sprawdzanie powtorzonego hasla*/
	else if ($haslo1 !== $haslo2) {
		header ("Location: ../useradd.php?error=passwordcheck");
	}
	
	
/*sprawdzanie czy taki user juz istnieje*/
	else {
		
		$sql = "SELECT login_klient FROM klienci WHERE login_klient=?";
		$stmt = mysqli_stmt_init($con);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header ("Location: ../useradd.php?error=sqlerrorr");
			exit();
		} 
		
		else {
			mysqli_stmt_bind_param($stmt, "s", $login); /*zwiazane z powyzszym statementem*/
			mysqli_stmt_execute($stmt); /*execiute statement in db*/
			mysqli_stmt_store_result($stmt); /* stores data from db and stores under variable stmt */
			$resultCheck = mysqli_stmt_num_rows($stmt); /*how many rows we get from db as resoult - w tym przypadku jedna*/
			if ($resultCheck > 0) {
				header ("Location: ../useradd.php?error=usertaken");
				exit();
			}
			else {
				$sql = "INSERT INTO klienci (login_klient, haslo_klient, imie_klient, nazwisko_klient, email_klient, tel_klient) VALUES (?, ?, ?, ?, ?, ?) ";
				$stmt = mysqli_stmt_init($con);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					header ("Location: ../useradd.php?error=sqlerror");
					exit();
				} 
				else  {
					$hashedPwd = password_hash($haslo1, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt, "sssssd", $login, $hashedPwd, $imie, $nazwisko, $tel, $opis); 
					mysqli_stmt_execute($stmt); 
					header ("Location: ../useradd.php?signup=success");
					exit();
				
	
				}
			}
		
		}
		
	}
	mysqli_stmt_close($stmt);
	mysqli_close($con);
	

}
else { 
		header ("Location: ../adminusersession.php");
		exit();

}