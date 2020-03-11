<?php

include '../connect.php';

$query = "SELECT id_dosen, nama_dosen FROM dosen";
$result = mysqli_query($connect,$query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="../dosen/fc.css">
</head>
<body>
  <header>
  <div id="logo">
    <h1>Tambah Data Matakuliah</h1>
  </div>
</header>
<br><br>
  <div class="wrapper">
    <div class="form">
    <form action="create.php" method="post">
     <input class="fi" type="text" name="kode" placeholder="Kode Matakuliah">
     <br><br>
     <input class="fi" type="text" name="nama_matkul" placeholder="Nama Matakuliah">
     <br><br>
     <input class="fi" type="text" name="sks" placeholder="SKS">
     <br><br>
     <input class="fi" type="text" name="semester" placeholder="Semester">
     <br><br>
     <select class="fi" name="id_dosen">
     <option value="-">--Pilih salah satu--</option>
     <?php
        while ($data = mysqli_fetch_assoc($result)) {
            ?>
        <option value="<?php echo $data['id_dosen']; ?>">
            <?php echo $data['nama_dosen']; ?>
        </option>
        <?php
        }
        ?>
     </select>
     <br>
      <input id="button" type="submit" name="" value="Simpan">
      <br>
      <a href="read.php">Kembali</a>
    </form>
  </div>
</div>
</body>
</html>
