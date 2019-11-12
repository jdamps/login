<?php
	require "header.php";
?>

<?php
	require "header2.php";
?>

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

<?php

require './includes/dbh.inc.php';


$sql = "SELECT * FROM klienci WHERE id_klient='$_GET[id]'";


$records = mysqli_query($con,$sql);

?>

	
	<?php
	while($row = mysqli_fetch_assoc($records))
		
		
	{
		echo "<tr><form method=POST action=includes/adminuserupdate.inc.php>";
		echo "<br />";
		echo "Edycja danych dla pracownika ";
		echo "<td><input type=text readonly=readonly name=login_klient value='".$row['login_klient']."'></td>";
		echo "</br >";
		echo "</br >";
		echo "Imię:";
		echo "</br >";
		echo "<td><input type=text name=imie_klient value='".$row['imie_klient']."'></td>";
		echo "</br >";
		echo "Nazwisko:";
		echo "</br >";
		echo "<td><input type=text name=nazwisko_klient value='".$row['nazwisko_klient']."'></td>";
		echo "</br >";
		echo "Telefon:";
		echo "</br >";
		echo "<td><input type=text name=email_klient value='".$row['email_klient']."'></td>";
		echo "</br >";
		echo "Opis:";
		echo "</br >";
		echo "<td><input type=text name=tel_klient value='".$row['tel_klient']."'></td>";
		echo "<input type=hidden name=id_klient value='".$row['id_klient']."'>";
		echo "</br >";
		echo "<td><button type=submit name=submit >Dodaj/Zmień</button></th>";
		echo "<button type=submit formaction=./adminusersession.php>Powrót</button>";
		echo "</form></tr>";
		
	}
	
	?>
	
	
<?php
	require "footer.php";
?>
