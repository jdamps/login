<?php
require "header.php";
?>



<main>
<?php

if (isset($_SESSION['aid'])) {
	
require 'includes/dbh.inc.php';



$aid = $_SESSION['aid'];


mysqli_close($con);

require "header2.php";



}
else if (isset($_SESSION['eid'])) {
	
require 'includes/dbh.inc.php';


$eid = $_SESSION['eid'];


require "header4.php";
}


else if (isset($_SESSION['uid'])) {
	
require 'includes/dbh.inc.php';


$uid = $_SESSION['uid'];


require "header3.php";

header ("Location: ./usersession.php?error=permissiondeny");
		exit();
}
?>
<main>
<div class = "mt-5">
		<div class="container bg-light">
		<div class="mx-auto" style="width: 200px;">

<h3>NOWY KLIENT</h3>

		<?php
		if (isset($_GET['error'])) {
			if ($_GET['error'] == "emptyfields") {
				echo '<div class="alert alert-danger" role="alert">Wypełnij pola oznaczone gwiazdką.</div>';
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

		
		}
		else if (isset($_GET['signup'])) {
			if ($_GET['signup'] == "success") {
			echo '<div class="alert alert-info" role="alert">Konto zostało zarejestrowane.</div>';
		}
		}
		?>

		<form action="includes/useradd.inc.php" method="post"> 
			<input type="text" name="login_klient" placeholder="Login">*
			<br />
			<input type="password" name="haslo_klient" placeholder="Hasło">*
			<br />
			<input type="password" name="haslo_klient-rep" placeholder="Powtórz Hasło">*
			<br />
			<input type="text" name="imie_klient" placeholder="Imię"> 
			<br />
			<input type="text" name="nazwisko_klient" placeholder="Nazwisko"> 
			<br />
			<input type="text" name="email_klient" placeholder="Email"> 
			<br />
			<input type="text" name="tel_klient" placeholder="Telefon"> 
			<br />
			<button type="submit" name="user-submit">Dodaj Klienta</button>
			<button type="submit" formaction=./adminusersession.php>Powrót</button>
			<br />
		</form>
		<br />
		
		
		</main>