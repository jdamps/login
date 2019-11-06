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

