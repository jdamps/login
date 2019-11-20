<?php
	require "header.php";
?>

<?php
	require "header3.php";
?>

<main>
<main>
<div class = "mt-5">
		<div class="container bg-light">
		<div class="mx-auto" style="width: 200px;">
<br />
<h3>Zmiana Hasła</h3>


<?php

if (isset($_SESSION['uid'])) {
	
require 'includes/dbh.inc.php';



$uid = $_SESSION['uid'];


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
		else if (isset($_GET['unewpw-submit'])) {
			if ($_GET['unewpw-submit'] == "success") {
			echo '<p>Hasło zostało poprawnie zmienione.</p>';
		}
		}
		
}
?>
		
		<form action="includes/userpwedit.inc.php" method="post"> 
			<input type="hidden" name="uid" value="<?php echo $uid; ?>">
		<br />
			<input type="password" name="haslo_klient" placeholder="Wpisz nowe hasło"> 
			<br />
			<input type="password" name="haslo_klient-rep" placeholder="Powtórz nowe hasło"> 
			<br />
			<button type="submit" name="unewpw-submit">Zmień Hasło</button>
			<button type="submit" formaction="./usersession.php">Powrót</button>
			<br />
			<br />
		</form>
	</main>
	

	
<?php
	require "footer.php";
?>