<?php
	require "header.php";
?>


	<main>
		<div class = "mt-5">
		<div class="container bg-light">
		<div class="mx-auto" style="width: 200px;">
		<h1>Rejestracja</h1>
		
		<?php
		if (isset($_GET['error'])) {
			if ($_GET['error'] == "emptyfields") {
				echo '<div class="alert alert-danger" role="alert">Wypełnij wszystkie pola.</div>';
			}
			else if ($_GET['error'] == "invalidemail") {
				echo '<div class="alert alert-danger" role="alert">Wprowadzony adres e-mail wydaje się być nieprawidłowy.</div>';
			}
			else if ($_GET['error'] == "passwordcheck") {
				echo '<div class="alert alert-danger" role="alert">Hasła nie są identyczne.</div>';
			}
			else if ($_GET['error'] == "usertaken") {
				echo '<div class="alert alert-danger" role="alert">Podany login jest niedostępny.</div>';
			}
			else if ($_GET['error'] == "sqlerrorr") {
				echo '<div class="alert alert-danger" role="alert">Błąd łączenia z bazą.</div>';
			}
			else if ($_GET['error'] == "boxerrorr") {
				echo '<div class="alert alert-danger" role="alert">Regulamin musi zostać zaakceptowany.</div>';
			}
		
		}
		else if (isset($_GET['signup'])) {
			if ($_GET['signup'] == "success") {
			echo '<div class="alert alert-info" role="alert">Konto zostało zarejestrowane.</div>';
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
		</div>
		</div>
	</main>
	
	
	
<?php
	require "footer.php";
?>