<?php

/*po nacisniecu zarejestruj*/
if (isset($_POST['udelete-submit'])) {

	
/*polaczenie z baza*/
	require './dbh.inc.php';
	
	$uid = $_POST['uid'];
	$sql = "DELETE FROM klienci WHERE id_klient='$_POST[uid]'";

	if (mysqli_query($con, $sql)) {
    header("refresh:1; url=../index.php");
	session_start();
	session_unset();
	session_destroy();

	}

else { 
		header ("Location: ../usersession.php");
		exit();

}
}