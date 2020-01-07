<?php
	require "header.php";
?>
<?php

if (isset($_SESSION['eid'])) {
	
require 'includes/dbh.inc.php';



$eid = $_SESSION['eid'];


mysqli_close($con);

require "header4.php";



}
else if (isset($_SESSION['uid'])) {
	
require 'includes/dbh.inc.php';


$uid = $_SESSION['uid'];


require "header3.php";

header ("Location: ./usersession.php?error=permissiondeny");
		exit();
}
?>

<main>
<div class = "mt-3">
		<div class="container bg-light">
		<div class="mx-auto" style="width: 200px;">
<h3>Zmiana Hasła</h3>


<?php

if (isset($_SESSION['eid'])) {
	
require 'includes/dbh.inc.php';



$eid = $_SESSION['eid'];


		if (isset($_GET['error'])) {
			if ($_GET['error'] == "emptyfields") {
				echo '<div class="alert alert-danger" role="alert">Wypełnij wszystkie pola.</div>';
			}
			else if ($_GET['error'] == "passwordcheck") {
				echo '<div class="alert alert-danger" role="alert">Hasła nie są identyczne.</div>';
			}
			else if ($_GET['error'] == "sqlerror") {
				echo '<div class="alert alert-danger" role="alert">Błąd łączenia z bazą.</div>';
			}
		
		}
		else if (isset($_GET['success'])) {
			if ($_GET['success'] == "success") {
			echo '<div class="alert alert-info" role="alert">Hasło zostało poprawnie zmienione.</div>';
		}
		}
		
}
?>
		
		<form action="includes/employsespwedit.inc.php" method="post"> 
			<input type="hidden" name="eid" value="<?php echo $eid; ?>">

			<input type="password" name="haslo_pracownik" placeholder="Wpisz nowe hasło"> 
			<br />
			<input type="password" name="haslo_pracownik-rep" placeholder="Powtórz nowe hasło"> 
			<br />
			<button type="submit" name="enewpw-submit">Zmień Hasło</button>
			<button type="submit" formaction="./employsession.php">Powrót</button>
			<br />
			<br />
		</form>
	</main>
	

	
<?php
	require "footer.php";
?>