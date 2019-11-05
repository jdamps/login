<?php

/*po nacisniecu zaloguj*/
if (isset($_POST['login-submit'])) {
	
	/*polaczenie z baza*/
	require './dbh.inc.php';
	
	/*logowanie za pomoca loginu lub emaila*/
	$loginmail = $_POST['loginmail'];
	$haslo = $_POST['haslo'];
	
	/*sprawdzanie czy pola sa wypelnione*/
	if (empty($loginmail) || empty($haslo)) {
		header ("Location: ../index.php?error=emptyfields");
		exit();
	}	
	else {
		
		$sql = "SELECT * FROM klienci WHERE login_klient=? OR email_klient=?;";
		$stmt = mysqli_stmt_init($con);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header ("Location: ../index.php?error=sqlerrorr");
			exit();
		} 
		else {
			
			mysqli_stmt_bind_param($stmt, "ss", $loginmail, $loginmail);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			/*sprawdzanie czy taki uzytkownik jest w bazie*/
			if ($row = mysqli_fetch_assoc($result)) {
				/*sprawdzanie czy haslo sie zgadza*/
				$checkpwd = password_verify($haslo, $row['haslo_klient']);
				if ($checkpwd == false) {
					header ("Location: ../index.php?error=wrongpwd");
					exit();	
				}
				else if ($checkpwd == true) {
					session_start();
					$_SESSION['uid'] = $row['id_klient'];
					$_SESSION['ulogin'] = $row['login_klient'];
					
					header ("Location: ../usersession.php?login=success");
					exit();
				}
				else {
					header ("Location: ../index.php?error=wrongpwd");
					exit();
				}			
			}
			
			else {
		
				$sql = "SELECT * FROM pracownicy WHERE login_pracownik=? AND admintag=1;";
				$stmt = mysqli_stmt_init($con);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
				header ("Location: ../index.php?error=sqlerrorr");
				exit();
				} 
				else {
			
					mysqli_stmt_bind_param($stmt, "s", $loginmail);
					mysqli_stmt_execute($stmt);
					$result = mysqli_stmt_get_result($stmt);
					/*sprawdzanie czy taki uzytkownik jest w bazie*/
					if ($row = mysqli_fetch_assoc($result)) {
					/*sprawdzanie czy haslo sie zgadza*/
					$checkpwd = password_verify($haslo, $row['haslo_pracownik']);
					if ($checkpwd == false) {
					header ("Location: ../index.php?error=wrongpwd");
					exit();	
					}
						else if ($checkpwd == true) {
						session_start();
						$_SESSION['aid'] = $row['id_pracownik'];
						$_SESSION['alogin'] = $row['login_pracownik'];
					
						header ("Location: ../adminsession.php?login=success");
						exit();
						}
						else {
							header ("Location: ../index.php?error=wrongpwd");
							exit();
							}			
				}
			
			
			else {
				$sql2 = "SELECT * FROM pracownicy WHERE login_pracownik=?;";
				$stmt2 = mysqli_stmt_init($con);
				if (!mysqli_stmt_prepare($stmt2, $sql2)) {
				header ("Location: ../index.php?error=sqlerrorr");
				exit();
			} 
				else {
			
					mysqli_stmt_bind_param($stmt2, "s", $loginmail);
					mysqli_stmt_execute($stmt2);
					$result = mysqli_stmt_get_result($stmt2);
					/*sprawdzanie czy taki uzytkownik jest w bazie*/
					if ($row = mysqli_fetch_assoc($result)) {
					/*sprawdzanie czy haslo sie zgadza*/
					$checkpwd = password_verify($haslo, $row['haslo_pracownik']);
					if ($checkpwd == false) {
					header ("Location: ../index.php?error=wrongpwd");
					exit();	
				}
					else if ($checkpwd == true) {
						session_start();
						$_SESSION['eid'] = $row['id_pracownik'];
						$_SESSION['elogin'] = $row['login_pracownik'];
					
						header ("Location: ../employsession.php?login=success");
						exit();
					}
					else {
						header ("Location: ../index.php?error=wrongses");
						exit();
					}	
				
			}
			
			else {
			 header ("Location: ../index.php?error=nouser");
			 exit();
			}

			}
			
			
		}
	}
	
	}
}

}
}