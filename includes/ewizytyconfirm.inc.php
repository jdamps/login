

<?php



if (isset($_POST['submit'])){
require './dbh.inc.php';

$pracownicy=$_POST["pracownicy"];
/*echo $pracownicy;*/

$klienci=$_POST["klienci"];
/*echo $klienci;*/

/*echo $_POST["id_wizyta"];*/

$sql = "UPDATE wizyty SET id_klient='$_POST[klienci]', id_pracownik='$_POST[pracownicy]', id_status=1 WHERE id_wizyta='$_POST[id_wizyta]'";
$records = mysqli_query($con,$sql);
mysqli_close($con);

 header("refresh:1; url=../ewizyty.php?signup=success");

}

?>