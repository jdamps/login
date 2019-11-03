<?php

/*po nacisniecu zarejestruj*/
if (isset($_POST['unewpw-submit'])) {

	
/*polaczenie z baza*/
	require './dbh.inc.php';
	
	$uid = $_POST['uid'];
	$haslo1 = $_POST['haslo_klient'];
	$haslo2 = $_POST['haslo_klient-rep'];
	

	
/*gdy user nie wypelni wszystkich pol*/
	if (empty($haslo1) || empty($haslo2)) {
		header ("Location: ../userpwedit.php?error=emptyfields");
		exit();
	}	

	
/*sprawdzanie powtorzonego hasla*/
	else if ($haslo1 !== $haslo2) {
		header ("Location: ../userpwedit.php?error=passwordcheck");
	}
	

			else {
				$sql = "UPDATE klienci SET haslo_klient=? WHERE id_klient='$_POST[uid]'";
				$stmt = mysqli_stmt_init($con);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					header ("Location: ../userpwedit.php?error=sqlerror");
					exit();
				} 
				else  {
					$hashedPwd = password_hash($haslo1, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt, "s", $hashedPwd ); 
					mysqli_stmt_execute($stmt); 
					header ("Location: ../usersession.php?signup=success");
					exit();
				
	
				}
			}
		

	mysqli_stmt_close($stmt);
	mysqli_close($con);
	
}


else { 
		header ("Location: ../userpwedit.php");
		exit();

}

