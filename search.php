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
<div class = "mt-3">
		<div class="container bg-light">
		<div class="mx-auto" style="width: 200px;">

<?php

require 'includes/dbh.inc.php';

	if (isset($_POST['submit-search'])) {
		$search = mysqli_real_escape_string($con, $_POST['search']);
		$sql = "SELECT * FROM klienci WHERE login_klient LIKE '%$search%' OR imie_klient LIKE '%$search%' OR nazwisko_klient LIKE '%$search%' OR tel_klient LIKE '%$search%' ";
		$result = mysqli_query($con, $sql);
		$queryResult = mysqli_num_rows($result);
		
		if ($queryResult > 0) {
			while ($row=mysqli_fetch_assoc($result)) {
		

	echo "<tr><form method=POST action=includes/searchuserupdate.inc.php>";
	echo "<tr>"; 
	echo "<br />";
	echo "<h4>Twoje Dane:</h4>";
	echo "<td><input type=text readonly=readonly size=5 name=login_klient value='".$row['login_klient']."'></td>";

	echo "<br />";
	echo "<br />";
	echo "Imię:";
	echo "<br />";
	echo "<td><input type=text name=imie_klient value='".$row['imie_klient']."'></td>";
	echo "<br />";
	echo "Nazwisko:";
	echo "<br />";
	echo "<td><input type=text name=nazwisko_klient value='".$row['nazwisko_klient']."'></td>";
	echo "<br />";
	echo "E-mail:";
	echo "<br />";
	echo "<td><input type=text name=email_klient value='".$row['email_klient']."'></td>";
	echo "<br />";
	echo "Telefon:";
	echo "<br />";
	echo "<td><input type=text name=tel_klient value='".$row['tel_klient']."'></td>";
	echo "<br />";
	echo "<br />";
	echo "<button type=submit name=klient-submit>Dodaj/Zmień</button>";
	echo "<button type=submit formaction=./adminusersession.php>Powrót</button>";
	echo "<br />";
	echo "</tr>";
	echo "<br />";
		
			
		} 
		
		}
		else {
			echo "Nie ma takiego klienta";

	}
	

}
?>
