<?php

/*po nacisniecu zarejestruj*/
if (isset($_POST['signup-submit'])) {
	
/*polaczenie z baza*/
	require './dbh.inc.php';
	
	$login = $_POST['login_klient'];
	$email = $_POST['email_klient'];
	$haslo1 = $_POST['haslo_klient'];
	$haslo2 = $_POST['haslo_klient-rep'];
	
/*gdy user nie wypelni wszystkich pol*/
	if (empty($login) || empty($email) || empty($haslo1) || empty($haslo2)) {
		header ("Location: ../signup.php?error=emptyfields&uid=".$login."&mail=".$email."&Password");
		exit();
	}	
	
/*sprawdzanie emaila*/
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header ("Location: ../signup.php?error=invalidemail&uid=".$login);
	}
	
/*sprawdzanie powtorzonego hasla*/
	else if ($haslo1 !== $haslo2) {
		header ("Location: ../signup.php?error=passwordcheck&uid=".$login."&mail=".$email);
	}
	
/*sprawdzanie czy taki user juz istnieje*/
	else {
		
		$sql = "SELECT login_klient FROM klienci WHERE login_klient=?";
		$stmt = mysqli_stmt_init($con);
		if (!mysqli_stmt_init($stmt, $sql)) {
			header ("Location: ../signup.php?error=sqlerror");
			exit();
		} 
		
		else {
			mysqli_stmt_bind_param($stmt, "s", $login);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
		
		}
		
	}

}


