<?php

include '../connect.php';

$id_dosen = $_GET['id_dosen'];

$query = "DELETE FROM dosen WHERE id_dosen = $id_dosen";

$result = mysqli_query($connect, $query);

$num = mysqli_affected_rows($connect);

if($num > 0) {
  header("location: read.php");
}
else {
  echo "Gagal Update Data <br>";
}
echo "<a href='read.php'>Lihat Data</a>" ;
 ?>
