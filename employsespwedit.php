<?php
	require "header.php";
?>
<?php
	require "header4.php";
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
				echo '<p>Wypełnij wszystkie pola.</p>';
			}
			else if ($_GET['error'] == "passwordcheck") {
				echo '<p>Hasła nie są identyczne.</p>';
			}
			else if ($_GET['error'] == "sqlerror") {
				echo '<p>Błąd łączenia z bazą.</p>';
			}
		
		}
		else if (isset($_GET['enewpw-submit'])) {
			if ($_GET['enewpw-submit'] == "success") {
			echo '<p>Hasło zostało poprawnie zmienione.</p>';
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