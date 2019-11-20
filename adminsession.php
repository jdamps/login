<?php
require "header.php";
?>

<?php
require "header2.php";
?>

<main>
<?php

if (isset($_SESSION['aid'])) {
	
require 'includes/dbh.inc.php';



$eid = $_SESSION['aid'];


mysqli_close($con);

}
?>
<main>
<div class = "ml-2 mr-5 mt-3">




<h3>NOWY PRACOWNIK</h3>



		<?php
		if (isset($_GET['error'])) {
			if ($_GET['error'] == "emptyfields") {
				echo '<div class="alert alert-danger" role="alert">Wypełnij wszystkie pola oznaczone gwiazdką.</div>';
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
		else if (isset($_GET['pw'])) {
			if ($_GET['success'] == "pw") {
			echo '<div class="alert alert-info" role="alert">Konto zostało zarejestrowane.</div>';
		}
		}
		}
		?>


		<form action="includes/employadd.inc.php" method="post"> 
			<input type="text" name="login_pracownik" placeholder="Login">*
			<br />
			<input type="password" name="haslo_pracownik" placeholder="Hasło">*
			<br />
			<input type="password" name="haslo_pracownik-rep" placeholder="Powtórz Hasło">*
			<br />
			<input type="text" name="imie_pracownik" placeholder="Imię"> 
			<br />
			<input type="text" name="nazwisko_pracownik" placeholder="Nazwisko"> 
			<br />
			<input type="text" name="tel_pracownik" placeholder="Telefon"> 
			<br />
			<textarea cols="18" rows="5" type="text" name="opis_pracownik"></textarea> 
			<br />
			<button type="submit" name="employ-submit">Dodaj Pracownika</button>
			<br />
		</form>



<br />


<h3>PRACOWNICY</h3>

<?php

require './includes/dbh.inc.php';


if ($records=mysqli_query($con,"SELECT * FROM pracownicy"))
	echo "<table width='900' border='1' cellpadding='1' cellspacing='1'>";
	echo "<th>ID</th>";
	echo "<th>Login</th>";
	echo "<th>Imię</th>";
	echo "<th>Nazwisko</th>";
	echo "<th>Telefon</th>";
	echo "<th>Opis</th>";
	echo "<th>Edytuj</th>";
	echo "<th>Hasło</th>";
	echo "<th>Usuń</th>";
	
	while($pk=mysqli_fetch_assoc($records)){
	
	echo "<tr>";
	
	echo "<td>".$pk['id_pracownik']."</td>";
	echo "<td>".$pk['login_pracownik']."</td>";
	echo "<td>".$pk['imie_pracownik']."</td>";
	echo "<td>".$pk['nazwisko_pracownik']."</td>";
	echo "<td>".$pk['tel_pracownik']."</td>";
	echo "<td>".$pk['opis_pracownik']."</td>";
	echo "<td><a href=employedit.php?id=".$pk['id_pracownik'].">Edytuj</a></td>";
	echo "<td><a href=employpwedit.php?id=".$pk['id_pracownik'].">Zmień</a></td>";
	echo "<td><a href=includes/employdelete.inc.php?id=".$pk['id_pracownik'].">Usuń</a></td>";
	echo "</form>";
	echo "</tr>";
	
	
}



?>

</div>
</main>
