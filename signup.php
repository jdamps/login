<?php
	require "header.php";
?>


	<main>
		<h1>------------------------------------</h1>
		<h1>Rejestracja</h1>
		<form action="includes/signup.inc.php" method="post"> 
		<br />
			<input type="text" name="login_klient" placeholder="Nazwa użytkownika"> 
			<br />
			<input type="text" name="email_klient" placeholder="E-mail"> 
			<br />
			<input type="password" name="haslo_klient" placeholder="Hasło"> 
			<br />
			<input type="password" name="haslo_klient-rep" placeholder="Powtórz Hasło"> 
			<br />
			<button type="submit" name="signup-submit">Zarejestruj</button>
		</form>
	</main>
	
	
	
<?php
	require "footer.php";
?>