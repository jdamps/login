<?php
	require "header.php";
?>
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
<div class = "mt-5">
		<div class="container bg-light">
		<div class="mx-auto" style="width: 200px;">

<?php

require './includes/dbh.inc.php';


$sql = "SELECT * FROM events WHERE id='$_GET[id]'";


$records = mysqli_query($con,$sql);

?>

	
	<?php
	while($row = mysqli_fetch_assoc($records))
		
		
	{
		echo "<tr><form method=POST action=includes/zabiegupdate.inc.php>";
		echo "<br />";
		echo "<td>Start:<input type=text name=start_event value='".$row['start_event']."'></td>";
		echo "</br >";
		echo "Koniec:";
		echo "</br >";
		echo "<td><input type=text name=end_event value='".$row['end_event']."'></td>";
		echo "</br >";
		echo "Opis:";
		echo "</br >";
		echo "<td><input type=text name=title value='".$row['title']."'></td>";
		echo "</br >";
		echo "<td><button type=submit name=submit >Dodaj/Zmień</button></th>";
		echo "<button type=submit formaction=./zabiegi.php>Powrót</button>";
		echo "</br >";
		echo "</br >";
		echo "</form></tr>";
		
	}
	
	?>


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
		
			<form action="includes/wizytyconfirm.inc.php" method="post"> 
			<input type="text" name="login_klient" placeholder="Klient">*
			<br />
			<input type="text" name="login_pracownik" placeholder="Pracownik">*
			<br />
			<button type="submit" name="wizyta-confirm">Potwierdź wizytę</button>
			<br />
		</form>
		
		</main>
	
	
<?php
	require "footer.php";
?>