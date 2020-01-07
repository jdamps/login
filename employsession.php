<?php
require "header.php";
?>
<?php

if (isset($_SESSION['eid'])) {
	
require 'includes/dbh.inc.php';



$eid = $_SESSION['eid'];


mysqli_close($con);

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


	<?php
		if (isset($_GET['error'])) {
			 if ($_GET['error'] == "permissiondeny") {
				echo '<div class="alert alert-danger" role="alert">Nie masz dostępu do tej strony.</div>';
			}

		
		}
		else if (isset($_GET['signup'])) {
			if ($_GET['signup'] == "success") {
			echo '<div class="alert alert-info" role="alert">Wizyta została potwierdzona.</div>';
		}
		}
		?>
		
<main>
<div class = "mt-3">
		<div class="container bg-light">
		<div class="mx-auto" style="width: 200px;">
<?php

if (isset($_SESSION['eid'])) {
	
require 'includes/dbh.inc.php';



$eid = $_SESSION['eid'];



	

if ($records=mysqli_query($con,"SELECT * FROM pracownicy WHERE id_pracownik=".$eid));


	while($pk=mysqli_fetch_assoc($records)){
	echo "<tr><form method=POST action=includes/employsesupdate.inc.php>";
	echo "<tr>"; 
	echo "<br />";
	echo "<h4>Twoje Dane:</h4>";
	echo "<td><input type=text readonly=readonly name=login_pracownik value='".$pk['login_pracownik']."'></td>";

	echo "<br />";
	echo "<br />";
	echo "Imię:";
	echo "<br />";
	echo "<td><input type=text name=imie_pracownik value='".$pk['imie_pracownik']."'></td>";
	
	echo "<br />";
	echo "Nazwisko:";
	echo "<br />";
	echo "<td><input type=text name=nazwisko_pracownik value='".$pk['nazwisko_pracownik']."'></td>";
	
	echo "<br />";
	echo "Telefon:";
	echo "<br />";
	echo "<td><input type=text name=tel_pracownik value='".$pk['tel_pracownik']."'></td>";
	
	echo "<br />";
	echo "Opis:";
	echo "<br />";
	echo "<td><input type=text name=opis_pracownik value='".$pk['opis_pracownik']."'></td>";
	echo "<br />";
	echo "<br />";
	echo "<button type=submit name=pracownik-submit>Dodaj/Zmień</button>";
	echo "<br />";
	echo "</tr>";
	
		echo "<br />";
	
	
}
 


mysqli_close($con);

}
?>

</main>