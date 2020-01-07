<?php
	require "header.php";
?>

<?php

if (isset($_SESSION['aid'])) {
	
require 'includes/dbh.inc.php';



$aid = $_SESSION['aid'];


mysqli_close($con);

require "header2.php";



}
else if (isset($_SESSION['eid'])) {
	
require 'includes/dbh.inc.php';


$eid = $_SESSION['eid'];


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

if (isset($_SESSION['aid'])) {
	
require 'includes/dbh.inc.php';



$eid = $_SESSION['aid'];


mysqli_close($con);

}
?>

<main>
<div class = "mt-5">
		<div class="container bg-light">
		<div class="mx-auto" style="width: 200px;">

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
		echo "<h4>Edycja danych dla</h4>";
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
