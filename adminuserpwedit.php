<?php
	require "header.php";
?>

<?php
	require "header2.php";
?>

<main>
-------------------------------------------
<br />
Zmiana hasła dla klienta 

<?php

require './includes/dbh.inc.php';


$sql = "SELECT * FROM klienci WHERE id_klient='$_GET[id]'";



$records = mysqli_query($con,$sql);

$uid = "$_GET[id]";

while($pk=mysqli_fetch_assoc($records)){
	
	echo "<td>".$pk['login_klient']."</td>";
}

?>


<?php



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
		else if (isset($_GET['unewpw-submi'])) {
			if ($_GET['unewpw-submi'] == "success") {
			echo '<p>Hasło zostało poprawnie zmienione.</p>';
		}
		}
		

?>
		
		<form action="includes/adminuserpwedit.inc.php" method="post"> 
			<input type="hidden" name="uid" value="<?php echo "$_GET[id]"; ?>">
		<br />
			<input type="password" name="haslo_klient" placeholder="Wpisz nowe hasło"> 
			<br />
			<input type="password" name="haslo_klient-rep" placeholder="Powtórz nowe hasło"> 
			<br />
			<button type="submit" name="unewpw-submit">Zmień Hasło</button>
			<button type="submit" formaction="./adminusersession.php">Powrót</button>
			
		</form>
	</main>
	

	
<?php
	require "footer.php";
?>