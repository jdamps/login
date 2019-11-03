<?php
	require "header.php";
?>

<main>
-------------------------------------------
<br />
Czy jesteś pewna, że chcesz usunąc swoje konto?


<?php

if (isset($_SESSION['uid'])) {
	
require 'includes/dbh.inc.php';
echo "<br />";


$uid = $_SESSION['uid'];
}

?>
		
		<form action="includes/userdelete.inc.php" method="post"> 
			<input type="hidden" name="uid" value="<?php echo $uid; ?>">
			<button type="submit" formaction="./usersession.php">NIE</button>
			<button type="submit" name="udelete-submit">TAK</button>

		</form>
	</main>
	

	
<?php
	require "footer.php";
?>