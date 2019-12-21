

<?php



if (isset($_POST['submit'])){
require './dbh.inc.php';

$pracownicy=$_POST["pracownicy"];
/*echo $pracownicy;*/


/*echo $_POST["id_wizyta"];*/

$sql = "UPDATE events SET id_pracownik='$_POST[pracownicy]' WHERE id='$_POST[id]'";
$records = mysqli_query($con,$sql);
mysqli_close($con);

 header("refresh:0; url=../urlopy.php?success=approved");

}
				
?>