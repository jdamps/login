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


$sql = "SELECT * FROM zabiegi WHERE id_zabieg='$_GET[id]'";


$records = mysqli_query($con,$sql);

?>

	
	<?php
	while($row = mysqli_fetch_assoc($records))
		
		
	{
		echo "<tr><form method=POST action=includes/zabiegupdate.inc.php>";
		echo "<br />";
		echo "Nazwa:";
		echo "</br >";
		echo "<td><input type=text name=nazwa_zabieg value='".$row['nazwa_zabieg']."'></td>";
		echo "</br >";
		echo "Cena:";
		echo "</br >";
		echo "<td><input type=text name=cena_zabieg value='".$row['cena_zabieg']."'></td>";
		echo "</br >";
		echo "Minuty:";
		echo "</br >";
		echo "<td><input type=text name=czas_zabieg value='".$row['czas_zabieg']."'></td>";
		echo "</br >";
		echo "Opis:";
		echo "</br >";
		echo "<td><input type=text name=opis_zabieg value='".$row['opis_zabieg']."'></td>";
		echo "<input type=hidden name=id_zabieg value='".$row['id_zabieg']."'>";
		echo "</br >";
		echo "<td><button type=submit name=submit >Dodaj/Zmień</button></th>";
		echo "<button type=submit formaction=./zabiegi.php>Powrót</button>";
		echo "</br >";
		echo "</br >";
		echo "</form></tr>";
		
	}
	
	?>
	
	
<?php
	require "footer.php";
?>