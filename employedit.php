<?php
	require "header.php";
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

<?php

require './includes/dbh.inc.php';


$sql = "SELECT * FROM pracownicy WHERE id_pracownik='$_GET[id]'";

$records = mysqli_query($con,$sql);

?>

	
	<?php
	while($row = mysqli_fetch_assoc($records))
	{
		echo "<tr><form method=POST action=includes/employupdate.php>";
		
		echo "<br />";
		echo "<td><input type=text readonly=readonly name=login_pracownik value='".$row['login_pracownik']."'></td>";
		echo "</br >";
		echo "Imię:";
		echo "</br >";
		echo "<td><input type=text name=imie_pracownik value='".$row['imie_pracownik']."'></td>";
		echo "</br >";
		echo "Nazwisko:";
		echo "</br >";
		echo "<td><input type=text name=nazwisko_pracownik value='".$row['nazwisko_pracownik']."'></td>";
		echo "</br >";
		echo "Telefon:";
		echo "</br >";
		echo "<td><input type=text name=tel_pracownik value='".$row['tel_pracownik']."'></td>";
		echo "</br >";
		echo "Opis:";
		echo "</br >";
		echo "<td><input type=text name=opis_pracownik value='".$row['opis_pracownik']."'></td>";
		echo "<input type=hidden name=id_pracownik value='".$row['id_pracownik']."'>";
		echo "</br >";
		echo "<td><button type=submit name=submit >Dodaj/Zmień</button></th>";
		echo "<button type=submit formaction=./adminsession.php>Powrót</button>";
		echo "</form></tr>";
		

		
	}
	
	
	
	?>
	
<?php
	require "footer.php";
?>