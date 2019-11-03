<?php
	require "header.php";
?>

<main>
-------------------------------------------
<br />
Zmiana hasła


<?php

if (isset($_SESSION['uid'])) {
	
require 'includes/dbh.inc.php';
echo "<br />";


$uid = $_SESSION['uid'];

	echo "$uid";



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
			<a href=./usersession.php>Powrót</a>
		</form>
	</main>
	

	
<?php
	require "footer.php";
?>