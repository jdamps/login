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
echo "<br />";
echo "to jest sesja admina dla klientów";


$eid = $_SESSION['aid'];


mysqli_close($con);

}
?>

<main>

<h1>------------------------------------</h1>
<h1>NOWY KLIENT</h1>

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
		</form>
	</main>

<h1>------------------------------------</h1>
<h1>tu będzie szukajka</h1>

<h1>------------------------------------</h1>
<h1>KLIENCI</h1>

<?php

require './includes/dbh.inc.php';


if ($records=mysqli_query($con,"SELECT * FROM klienci"))
	echo "<table width='900' border='1' cellpadding='1' cellspacing='1'>";
	echo "<th>ID</th>";
	echo "<th>Login</th>";
	echo "<th>Imię</th>";
	echo "<th>Nazwisko</th>";
	echo "<th>Email</th>";
	echo "<th>Telefon</th>";
	echo "<th>Edytuj</th>";
	echo "<th>Hasło</th>";
	echo "<th>Usuń</th>";
	
	while($pk=mysqli_fetch_assoc($records)){
	
	echo "<tr>";
	
	echo "<td>".$pk['id_klient']."</td>";
	echo "<td>".$pk['login_klient']."</td>";
	echo "<td>".$pk['imie_klient']."</td>";
	echo "<td>".$pk['nazwisko_klient']."</td>";
	echo "<td>".$pk['email_klient']."</td>";
	echo "<td>".$pk['tel_klient']."</td>";
	echo "<td><a href=adminuseredit.php?id=".$pk['id_klient'].">Edytuj</a></td>";
	echo "<td><a href=adminuserpwedit.php?id=".$pk['id_klient'].">Zmień</a></td>";
	echo "<td><a href=includes/adminuserdelete.inc.php?id=".$pk['id_klient'].">Usuń</a></td>";
	echo "</form>";
	echo "</tr>";
	
	
}



?>