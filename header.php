<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="opis" content="opis.">
		<meta name=viewpoint content="width=device-width, initial-scale=1">
		<title>Wirtualna Recepcja</title>
		<link rel="stylesheet" href="style.css">
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
					<form action="includes/login.inc.php" method="post">
						<input type="text" name="login" placeholder="Nazwa użytkownika">
						<input type="password" name="haslo" placeholder="Hasło">
						<button type="submit" name="login-submit">Zaloguj</button>
					</form>
					<a href="singup.php">Zarejestruj się</a>
					<form action="includes/logout.inc.php" method="post">
						<button type="submit" name="logout-submit">Wyloguj</button>
					</form>
				</div>
			</nav>	
		</header>