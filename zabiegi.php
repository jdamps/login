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
<div class = "ml-2 mr-5 mt-5">


<a href="zabiegadd.php" class="btn btn-light btn-lg active" role="button" aria-pressed="true">Dodaj nowy zabieg</a>
<br />
<br />


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

<br />


<?php

require './includes/dbh.inc.php';


if ($records=mysqli_query($con,"SELECT * FROM zabiegi"))
	echo "<table class=table>";
	echo "<tr class=table-secondary>";
	echo "<th>ID</th>";
	echo "<th>Nazwa</th>";
	echo "<th>Cena</th>";
	echo "<th>Minuty</th>";
	echo "<th>Opis</th>";
	echo "<th>Edytuj</th>";
	/*echo "<th>Usuń</th>";*/
	
	while($pk=mysqli_fetch_assoc($records)){
	
	echo "<tr>";
	
	echo "<td>".$pk['id_zabieg']."</td>";
	echo "<td>".$pk['nazwa_zabieg']."</td>";
	echo "<td>".$pk['cena_zabieg']."</td>";
	echo "<td>".$pk['czas_zabieg']."</td>";
	echo "<td>".$pk['opis_zabieg']."</td>";
	echo "<td><a href=zabiegedit.php?id=".$pk['id_zabieg'].">Edytuj</a></td>";
	/*echo "<td><a href=includes/zabiegdelete.inc.php?id=".$pk['id_zabieg'].">Usuń</a></td>";*/
	echo "</form>";
	echo "</tr>";
	
	
}



?>

</div>
</main>