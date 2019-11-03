<?php
	require "header.php";
?>


	<main>
		<h1>------------------------------------</h1>
		<h1>Rejestracja</h1>
		
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
		
		<form action="includes/signup.inc.php" method="post"> 
		<br />
			<input type="text" name="login_klient" placeholder="Login"> 
			<br />
			<input type="text" name="email_klient" placeholder="E-mail"> 
			<br />
			<input type="password" name="haslo_klient" placeholder="Hasło"> 
			<br />
			<input type="password" name="haslo_klient-rep" placeholder="Powtórz Hasło"> 
			<br />
			<input type="checkbox" name="box" value=1 id="p1">
			<label for="p1"> <a href="./regulamin.php"> Zaakceptuj Regulamin</a></label>
			<br />
			<br />
			<button type="submit" name="signup-submit">Zarejestruj</button>
		</form>
	</main>
	
	
	
<?php
	require "footer.php";
?>