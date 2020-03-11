<?php

include '../connect.php';

$kode = $_GET['kode'];

$query = "SELECT kode, nama_matkul, sks, semester, matakuliah.id_dosen, nama_dosen
            FROM matakuliah LEFT JOIN dosen USING(id_dosen)
            WHERE kode = '$kode'";

$result = mysqli_query($connect, $query);

$data_dosen = mysqli_fetch_assoc($result);

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
      <h1>Update Data Matakuliah</h1>
    </div>
  </header>
  <br><br>
  <div class="wrapper">
    <div class="form">
    <form action="update.php" method="post">
    <input class="fi" type="text" name="kode" id="kode" readonly value="<?php echo $data_dosen['kode']; ?>" >
    <br><br>
    <input class="fi" type="text" name="nama_matkul" id="nama_matkul" value="<?php echo $data_dosen['nama_matkul']; ?>" >
    <br><br>
    <input class="fi" type="text" name="sks" id="sks" value="<?php echo $data_dosen['sks']; ?>" >
    <br><br>
    <input class="fi" type="text" name="semester" id="semester" value="<?php echo $data_dosen['semester']; ?>" >
    <br><br>
    <select class="fi" name="id_dosen" id="nama_dosen">
    <option value=" - ">--Pilih salah satu--</option>
    <?php
    $query2 = "SELECT id_dosen, nama_dosen FROM dosen";
    $result2 = mysqli_query($connect, $query2);
    while ($data = mysqli_fetch_assoc($result2)) { ?>
            <option value="<?php echo $data['id_dosen']; ?>" <?php if($data_dosen['id_dosen'] == $data['id_dosen']) {echo "selected"; } ?>>
            <?php echo $data['nama_dosen']; ?>
            </option>
    <?php }
    ?>
    </select>
    <br>
    <input id="button" type="submit" value="Simpan">
    <br>
    <a href="read.php">Kembali</a>
    </form>
  </div>
</div>
</body>
</html>
