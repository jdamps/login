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

<main>
<div class = "mt-5">
		<div class="container bg-light">
		<div class="mx-auto" style="width: 200px;">
<h4>Zmiana hasła dla</h4>

<?php

require './includes/dbh.inc.php';


$sql = "SELECT * FROM klienci WHERE id_klient='$_GET[id]'";



$records = mysqli_query($con,$sql);

$uid = "$_GET[id]";

while($pk=mysqli_fetch_assoc($records)){
	
	echo "<td>".$pk['login_klient']."</td>";
}

?>


<?php



		if (isset($_GET['error'])) {
			if ($_GET['error'] == "emptyfields") {
				echo '<p>Wypełnij wszystkie pola.</p>';
			}
			else if ($_GET['error'] == "passwordcheck") {
				echo '<p>Hasła nie są identyczne.</p>';
			}
			else if ($_GET['error'] == "sqlerror") {
				echo '<p>Błąd łączenia z bazą.</p>';
			}
		
		}
		else if (isset($_GET['unewpw-submi'])) {
			if ($_GET['unewpw-submi'] == "success") {
			echo '<p>Hasło zostało poprawnie zmienione.</p>';
		}
		}
		

?>
		
		<form action="includes/adminuserpwedit.inc.php" method="post"> 
			<input type="hidden" name="uid" value="<?php echo "$_GET[id]"; ?>">
		<br />
			<input type="password" name="haslo_klient" placeholder="Wpisz nowe hasło"> 
			<br />
			<input type="password" name="haslo_klient-rep" placeholder="Powtórz nowe hasło"> 
			<br />
			<button type="submit" name="unewpw-submit">Zmień Hasło</button>
			<button type="submit" formaction="./adminusersession.php">Powrót</button>
			
		</form>
	</main>
	

	
<?php
	require "footer.php";
?>