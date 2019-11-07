<?php
require "header.php";
?>

<main>
<?php

if (isset($_SESSION['aid'])) {
	
require 'includes/dbh.inc.php';
echo "<br />";
echo "to jest sesja admina";


$eid = $_SESSION['aid'];


mysqli_close($con);

}
?>

<main>
<h1>------------------------------------</h1>
<h1>NOWY PRACOWNIK</h1>

		<?php
		if (isset($_GET['error'])) {
			if ($_GET['error'] == "emptyfields") {
				echo '<p>Wypełnij wszystkie pola oznaczone gwiazdką.</p>';
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

		
		}
		else if (isset($_GET['signup'])) {
			if ($_GET['signup'] == "success") {
			echo '<p>Konto zostało zarejestrowane.</p>';
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
		</form>
	</main>

<h1>------------------------------------</h1>
<h1>PRACOWNICY</h1>

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