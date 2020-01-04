<?php
	session_start();
?>


<!DOCTYPE html>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Wirtualna Recepcja</title>
  </head>
	</head>
	<body>
	
		<header>
		<nav class="navbar navbar-dark text-white" style="background-color: #d0b0d9;">
		<a class="logo" href="index.php">
		<img src="img/logo1.jpg" atl="logo">
		</a> 
		<ul class="nav">
		<li class="nav-item">
		<a class="nav-link" href="index.php">Start</a>
		</li>
		<li class="nav-item">
		<a class="nav-link" href="uslugi.php">Usługi</a>
		</li>
		<li class="nav-item">
		<a class="nav-link" href="#">Kontakt</a>
		</li>
		<li class="nav-item">
		<a class="nav-link" href="#">Regulamin</a>
		</li>
		</ul>


			<div>
				<?php
					if (isset($_SESSION['uid'])) {
						echo $_SESSION['ulogin'];
						echo ' jesteś zalogowana';
						echo '<form action="includes/logout.inc.php" method="post">
						<button type="submit" name="logout-submit">Wyloguj</button>
					</form>';
					}
	
						
						else if (isset($_SESSION['eid'])) {
						echo $_SESSION['elogin'];
						echo ' jesteś zalogowana';
						echo '<form action="includes/logout.inc.php" method="post">
						<button type="submit" name="logout-submit">Wyloguj</button>
					</form>';
						}
						
						
						else if (isset($_SESSION['aid'])) {
						echo $_SESSION['alogin'];
						echo ' jesteś zalogowana';
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
					<a href="./signup.php">Utwórz nowe konto</a>';
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
		<!--JavaScript at end of body for optimized loading-->
 
	   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>