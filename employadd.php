<?php
	require "header.php";
?>


<main>
<h1>------------------------------------</h1>
<h1>Dodawanie nowego pracownika</h1>

		<?php
		if (isset($_GET['error'])) {
			if ($_GET['error'] == "emptyfields") {
				echo '<p>Wypełnij wszystkie pola.</p>';
			}
			else if ($_GET['error'] == "invalidemail") {
				echo '<p>Wprowadzony adres e-mail wydaje się być nieprawidłowy.</p>';
			}
			else if ($_GET['error'] == "passwordcheck") {
				echo '<p>Hasła nie są identyczne.</p>';
			}
			else if ($_GET['error'] == "usertaken") {
				echo '<p>Podany login jest niedostępny.</p>';
			}
			else if ($_GET['error'] == "sqlerrorr") {
				echo '<p>Błąd łączenia z bazą.</p>';
			}
			else if ($_GET['error'] == "boxerrorr") {
				echo '<p>Regulamin musi zostać zaakceptowany.</p>';
			}
		
		}
		else if (isset($_GET['signup'])) {
			if ($_GET['signup'] == "success") {
			echo '<p>Konto zostało zarejestrowane.</p>';
		}
		}
		?>

		<form action="includes/employadd.inc.php" method="post"> 
		<br />
			<input type="text" name="login_pracownik" placeholder="Login"> 
			<br />
			<input type="password" name="haslo_pracownik" placeholder="Hasło"> 
			<br />
			<input type="password" name="haslo_pracownik-rep" placeholder="Powtórz Hasło"> 
			<br />
			<button type="submit" name="employ-submit">Dodaj Pracownika</button>
		</form>
	</main>


<?php
	require "footer.php";
?>