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

else if (isset($_SESSION['uid'])) {
	
require 'includes/dbh.inc.php';


$eid = $_SESSION['uid'];


require "header3.php";
}
?>

<main>
<div class = "ml-2 mr-5 mt-5">


<?php

require './includes/dbh.inc.php';


if ($records=mysqli_query($con,"SELECT * FROM zabiegi"))
	echo "<table class=table>";
	echo "<tr class=table-active>";
	/*echo "<table width='900' border='1' cellpadding='1' cellspacing='1'>";*/
	echo "<th>Nazwa</th>";
	echo "<th>Cena</th>";
	echo "<th>Opis</th>";
	echo "</tr>";
	
	while($pk=mysqli_fetch_assoc($records)){
	
	echo "<tr>";
	echo "<td>".$pk['nazwa_zabieg']."</td>";
	echo "<td>".$pk['cena_zabieg']."</td>";
	echo "<td>".$pk['opis_zabieg']."</td>";
	echo "</form>";
	echo "</tr>";
	
	
}



?>

</div>
</main>
