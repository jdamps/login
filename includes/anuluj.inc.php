<?php

if (isset($_POST['submit'])){
require './dbh.inc.php';

echo $_POST['id_wizyta'];
$sql = "UPDATE wizyty SET id_status=3 WHERE id_wizyta='$_POST[id_wizyta]'";
$records = mysqli_query($con,$sql);
$sql2 = "UPDATE events SET start_event='0000-00-00 00:00:00' WHERE id_wizyta='$_POST[id_wizyta]'";
$records = mysqli_query($con,$sql2);
mysqli_close($con);

 header("refresh:5; url=../archiwum.php?signup=success");

}
				
?>