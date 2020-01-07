<?php
require "header.php";
?>

<?php
	require "header3.php";
?>

<main>

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
		
<div class = "mt-3">
		<div class="container bg-light">
		<div class="mx-auto" style="width: 200px;">
		
		

<?php

if (isset($_SESSION['uid'])) {
	
require 'includes/dbh.inc.php';



$uid = $_SESSION['uid'];


if ($records=mysqli_query($con,"SELECT * FROM klienci WHERE id_klient=".$uid));
	
	
	while($pk=mysqli_fetch_assoc($records)){
	echo "<tr><form method=POST action=includes/userupdate.inc.php>";
	echo "<tr>"; 
	echo "<br />";
	echo "<h4>Twoje Dane:</h4>";
	echo "<td><input type=text readonly=readonly size=5 name=login_klient value='".$pk['login_klient']."'></td>";

	echo "<br />";
	echo "<br />";
	echo "Imię:";
	echo "<br />";
	echo "<td><input type=text name=imie_klient value='".$pk['imie_klient']."'></td>";
	echo "<br />";
	echo "Nazwisko:";
	echo "<br />";
	echo "<td><input type=text name=nazwisko_klient value='".$pk['nazwisko_klient']."'></td>";
	echo "<br />";
	echo "E-mail:";
	echo "<br />";
	echo "<td><input type=text name=email_klient value='".$pk['email_klient']."'></td>";
	echo "<br />";
	echo "Telefon:";
	echo "<br />";
	echo "<td><input type=text name=tel_klient value='".$pk['tel_klient']."'></td>";
	echo "<br />";
	echo "<br />";
	echo "<button type=submit name=klient-submit>Dodaj/Zmień</button>";
	echo "<br />";
	echo "</tr>";
	echo "<br />";
	
	
	
	
}
 


mysqli_close($con);

}
?>

</main>