<?php
	session_start();
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="opis" content="opis.">
		<meta name=viewpoint content="width=device-width, initial-scale=1">
		<title>Wirtualna Recepcja</title>
		<!--<link rel="stylesheet" href="style.css">-->
	</head>
	<body>
	
		<header>
			<nav class="navbar">
				<a class="logo" href="index.php">
					<img src="img/logo.jpg" atl="logo"
				</a> 
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="#">strona1</a></li>
					<li><a href="#">strona2</a></li>
					<li><a href="#">strona3</a></li>
					<li><a href="#">strona4</a></li>
				</ul>
				<div>
				<?php
					if (isset($_SESSION['uid'])) {
						echo '<form action="includes/logout.inc.php" method="post">
						<button type="submit" name="logout-submit">Wyloguj</button>
					</form>';
					}
						else {
						echo '<form action="includes/login.inc.php" method="post">
						<input type="text" name="loginmail" placeholder="Login lub E-mail">
						<input type="password" name="haslo" placeholder="Hasło">
						<button type="submit" name="login-submit">Zaloguj</button>
					</form>
					<a href="./signup.php">Zarejestruj się</a>';
						}
				
				?>
				
				<?php
					if (isset($_GET['error'])) {
						if ($_GET['error'] == "wrongpwd") {
							echo '<p>Hasło jest nie prawidłowe.</p>';
						}
						else if ($_GET['error'] == "nouser") {
							echo '<p>Użytkownik o podanym loginie nie istnieje.</p>';
						}
					}
				?>	
				
					
					
				</div>
			</nav>	
		</header>