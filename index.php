<?php
	require "header.php";
?>


	<main>
	
	
		<?php
		if (isset($_SESSION['uid'])) {
			echo '<p>Jesteś zalogowany.</p>';
		}
		else {
			echo '<p>Jesteś wylogowany.</p>';
		}
		?>
		
		
	</main>
	
	
	
<?php
	require "footer.php";
?>