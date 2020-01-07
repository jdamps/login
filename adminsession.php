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
header ("Location: ./employsession.php?error=permissiondeny");
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
<?php

if (isset($_SESSION['aid'])) {
	
require 'includes/dbh.inc.php';



$eid = $_SESSION['aid'];


mysqli_close($con);

}
?>
<main>
<div class = "ml-2 mr-5 mt-5">

<a href="adminemployadd.php" class="btn btn-light btn-lg active" role="button" aria-pressed="true">Dodaj nowego pracownika</a>
<br />
<br />


<h3>PRACOWNICY</h3>

<?php

require './includes/dbh.inc.php';


if ($records=mysqli_query($con,"SELECT * FROM pracownicy WHERE login_pracownik!='pracownik'"))
	echo "<table class=table>";
	echo "<tr class=table-secondary>";
	echo "<th>ID</th>";
	echo "<th>Login</th>";
	echo "<th>Imię</th>";
	echo "<th>Nazwisko</th>";
	echo "<th>Telefon</th>";
	echo "<th>Opis</th>";
	echo "<th>Edytuj</th>";
	echo "<th>Hasło</th>";
	echo "<th>Usuń</th>";
	
	while($pk=mysqli_fetch_assoc($records)){
	
	echo "<tr>";
	
	echo "<td>".$pk['id_pracownik']."</td>";
	echo "<td>".$pk['login_pracownik']."</td>";
	echo "<td>".$pk['imie_pracownik']."</td>";
	echo "<td>".$pk['nazwisko_pracownik']."</td>";
	echo "<td>".$pk['tel_pracownik']."</td>";
	echo "<td>".$pk['opis_pracownik']."</td>";
	echo "<td><a href=employedit.php?id=".$pk['id_pracownik'].">Edytuj</a></td>";
	echo "<td><a href=employpwedit.php?id=".$pk['id_pracownik'].">Zmień</a></td>";
	echo "<td><a href=includes/employdelete.inc.php?id=".$pk['id_pracownik'].">Usuń</a></td>";
	echo "</form>";
	echo "</tr>";
	
	
}



?>


<?php

require './includes/dbh.inc.php';


if ($records=mysqli_query($con,"SELECT * FROM pracownicy WHERE login_pracownik='pracownik'"))
	echo "<table width='900' border='1' cellpadding='1' cellspacing='1'>";
	echo "<br />";
	echo "<h3>ARCHIWUM</h3>";
	
	echo "<table class=table>";
	echo "<tr class=table-secondary>";
	echo "<th>ID</th>";
	echo "<th>Login</th>";
	echo "<th>Opis</th>";
	echo "</tr>";
	
	
	while($pk=mysqli_fetch_assoc($records)){
	
	echo "<tr>";
	
	echo "<td>".$pk['id_pracownik']."</td>";
	echo "<td>".$pk['login_pracownik']."</td>";
	echo "<td>".$pk['opis_pracownik']."</td>";
	echo "</tr>";
	
	
}



?>

</div>
</main>
