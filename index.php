<?php
	require "header.php";
?>


	<main>
	
	
		<?php
		if (isset($_SESSION['uid'])) {
			echo '<form action="./usersession.php" method="post"></form>';
			
		}
		
		if (isset($_SESSION['aid'])) {
			echo '<form action="./adminsession.php" method="post"></form>';
			
		}
		
		if (isset($_SESSION['eid'])) {
			echo '<form action="./employsession.php" method="post"></form>';
			
		}
		
		else {
			echo '<p>Jesteś wylogowana.</p>';
		}
		?>
		
		
	</main>
	
	
	
<?php
	require "footer.php";
?>