<?php

require './dbh.inc.php';

	$sql = "DELETE FROM zabiegi WHERE id_zabieg='$_GET[id]'";

	if (mysqli_query($con, $sql)) {
    header("refresh:0; url=../zabiegi.php");

	}

else { 
		header ("Location: ../zabiegi.php");
		exit();

}
