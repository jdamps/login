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
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header ("Location: ../signup.php?error=sqlerrorr");
			exit();
		} 
		
		else {
			mysqli_stmt_bind_param($stmt, "s", $login); /*zwiazane z powyzszym statementem*/
			mysqli_stmt_execute($stmt); /*execiute statement in db*/
			mysqli_stmt_store_result($stmt); /* stores data from db and stores under variable stmt */
			$resultCheck = mysqli_stmt_num_rows($stmt); /*how many rows we get from db as resoult - w tym przypadku jedna*/
			if ($resultCheck > 0) {
				header ("Location: ../signup.php?error=usertaken&mail=".$email);
				exit();
			}
			else {
				$sql = "INSERT INTO klienci (login_klient, email_klient, haslo_klient) VALUES (?, ?, ?) ";
				$stmt = mysqli_stmt_init($con);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					header ("Location: ../signup.php?error=sqlerror");
					exit();
				} 
				else  {
					$hashedPwd = password_hash($haslo1, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt, "sss", $login, $email, $hashedPwd ); 
					mysqli_stmt_execute($stmt); 
					header ("Location: ../signup.php?success=signup");
					exit();
				
	
				}
			}
		
		}
		
	}
	mysqli_stmt_close($stmt);
	mysqli_close($con);
	

}
else { 
		header ("Location: ../signup.php");
		exit();

}

