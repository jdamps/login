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

<a href="useradd.php" class="btn btn-light btn-lg active" role="button" aria-pressed="true">Dodaj nowego klienta</a>
<br />
<br />


<form action="search.php" method="POST">
	<input type="text" name="search" placeholder="Klient">
	<button type="submit" name="submit-search">Szukaj</button>
</form>
<br />


<h3>KLIENCI</h3>

<?php

require './includes/dbh.inc.php';


if ($records=mysqli_query($con,"SELECT * FROM klienci WHERE login_klient!='anonim'"))
	echo "<table width='900' border='1' cellpadding='1' cellspacing='1'>";
	echo "<th>ID</th>";
	echo "<th>Login</th>";
	echo "<th>Imię</th>";
	echo "<th>Nazwisko</th>";
	echo "<th>Email</th>";
	echo "<th>Telefon</th>";
	echo "<th>Edytuj</th>";
	echo "<th>Hasło</th>";
	echo "<th>Usuń</th>";
	
	while($pk=mysqli_fetch_assoc($records)){
	
	echo "<tr>";
	
	echo "<td>".$pk['id_klient']."</td>";
	echo "<td>".$pk['login_klient']."</td>";
	echo "<td>".$pk['imie_klient']."</td>";
	echo "<td>".$pk['nazwisko_klient']."</td>";
	echo "<td>".$pk['email_klient']."</td>";
	echo "<td>".$pk['tel_klient']."</td>";
	echo "<td><a href=adminuseredit.php?id=".$pk['id_klient'].">Edytuj</a></td>";
	echo "<td><a href=adminuserpwedit.php?id=".$pk['id_klient'].">Zmień</a></td>";
	echo "<td><a href=includes/adminuserdelete.inc.php?id=".$pk['id_klient'].">Usuń</a></td>";
	echo "</form>";
	echo "</tr>";
	
	
}



?>

<?php

require './includes/dbh.inc.php';


if ($records=mysqli_query($con,"SELECT * FROM klienci WHERE login_klient='anonim'"))
	echo "<table width='900' border='1' cellpadding='1' cellspacing='1'>";
	echo "<br />";
	echo "<h3>ARCHIWUM</h3>";
	
	
	while($pk=mysqli_fetch_assoc($records)){
	
	echo "<tr>";
	
	echo "<td>".$pk['id_klient']."</td>";
	echo "<td>".$pk['login_klient']."</td>";
	echo "</tr>";
	
	
}



?>

</div>
</main>