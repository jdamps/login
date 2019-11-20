<?php
	require "header.php";
?>

<?php
	require "header3.php";
?>

<main>
<div class = "mt-5">
		<div class=" mt-3 container bg-light">
		<div class="mx-auto" style="width: 500px;">
<br />
<h6>Czy jesteś pewna, że chcesz usunąc swoje konto?</h6>


<?php

if (isset($_SESSION['uid'])) {
	
require 'includes/dbh.inc.php';



$uid = $_SESSION['uid'];
}

?>
		
		<form action="includes/userdelete.inc.php" method="post"> 
			<input type="hidden" name="uid" value="<?php echo $uid; ?>">
			<button type="submit" formaction="./usersession.php">NIE</button>
			<button type="submit" name="udelete-submit">TAK</button>
			<br />
			<br />

		</form>
	</main>
	

	
<?php
	require "footer.php";
?>