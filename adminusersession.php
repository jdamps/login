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
}
?>

<main>
<div class = "ml-2 mr-5 mt-3">

<h3>NOWY KLIENT</h3>

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


<h1>------------------------------------</h1>
<h1>tu będzie szukajka</h1>

<h1>------------------------------------</h1>
<h3>KLIENCI</h3>

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

</div>
</main>