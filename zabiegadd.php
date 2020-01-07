<?php
require "header.php";
?>


<main>
<?php

if (isset($_SESSION['aid'])) {
	
require 'includes/dbh.inc.php';



$eid = $_SESSION['aid'];


mysqli_close($con);

require "header2.php";



}
else if (isset($_SESSION['eid'])) {
	
require 'includes/dbh.inc.php';


$eid = $_SESSION['eid'];


require "header4.php";
header ("Location: ./employsession.php?error=permissiondeny");
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

<h3>Nowy Zabieg </h3>



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
			else if ($_GET['error'] == "nametaken") {
				echo '<div class="alert alert-danger" role="alert">Taki zabieg już istnieje.</div>';
			}
			else if ($_GET['error'] == "sqlerrorr") {
				echo '<div class="alert alert-danger" role="alert">Błąd łączenia z bazą.</div>';
			}

		
		}
		else if (isset($_GET['signup'])) {
			if ($_GET['signup'] == "success") {
			echo '<div class="alert alert-info" role="alert">Zabieg został dodany.</div>';
		}
		else if (isset($_GET['pw'])) {
			if ($_GET['success'] == "pw") {
			echo '<div class="alert alert-info" role="alert">Konto zostało zarejestrowane.</div>';
		}
		}
		}
		?>
		
			<form action="includes/zabiegadd.inc.php" method="post"> 
			<input type="text" name="nazwa_zabieg" placeholder="Nazwa">*
			<br />
			<input type="text" name="cena_zabieg" placeholder="0,00">*
			<br />
			<input type="text" name="czas_zabieg" placeholder="Czas trwania w minutach"> 
			<br />
			Opis:
			<br />
			<textarea cols="25" rows="5" type="text" name="opis_zabieg"></textarea> 
			<br />
			<button type="submit" name="zabieg-submit">Dodaj Zabieg</button>
			<br />
		</form>
		
		</main>