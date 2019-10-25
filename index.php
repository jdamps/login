<?php
	require "header.php";
?>


	<main>
	
	
		<?php
		if (isset($_SESSION['uid'])) {
			echo '<form action="./usersession.php" method="post"></form>';
			
		}
		else {
			echo '<p>Jesteś wylogowany.</p>';
		}
		?>
		
		
	</main>
	
	
	
<?php
	require "footer.php";
?>