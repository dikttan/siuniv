<?php

include '../connect.php';

$query = "SELECT id_dosen, nama_dosen FROM dosen";
$result = mysqli_query($connect, $query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Matakuliah</title>
</head>
<body>
<div>
        <h2>Tambah Data Matakuliah</h2>
    </div>

    <div>
        <form action="create.php" method="POST">
        <div>
            <label for="">Kode : </label>
            <input type="text" name="kode">
        </div>

        <div>
            <label for="">Matakuliah : </label>
            <input type="text" name="nama_matkul">
        </div>
        <div>
            <label for="">SKS : </label>
            <input type="text" name="sks">
        </div>
        <div>
            <label for="">Semester : </label>
            <input type="text" name="semester">
        </div>
        <div>
            <label for="">Dosen Pengajar : </label>
            <select name="id_dosen" id="nama_dosen">
            <option value="-">--Pilih salah satu--</option>
            <?php
                while ($data = mysqli_fetch_assoc($result)){
                    ?>
                <option value ="<?php echo $data['id_dosen'];?>">
                    <?php echo $data['nama_dosen']; ?>
                </option>
                <?php
                }
                ?>
            </select>
        </div>
        <button type = "submit" name = "btnSimpan">Simpan</button>
        </form>
</body>
</html>
