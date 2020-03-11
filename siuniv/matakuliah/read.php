<?php

include '../connect.php';

$query = "SELECT kode, nama_matkul, sks, semester, nama_dosen
        FROM matakuliah LEFT JOIN dosen
        USING (id_dosen)
        ORDER BY kode";

$result = mysqli_query($connect, $query);

$num = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="read.css">
</head>
<body>
  <header>
    <div id="logo">
      <nav>
        <ul>
          <li><h1>Data dosen</h1></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li><a href="../dosen/read.php">Data Dosen</a></li>
          <li><a href="form-create.php">Tambah Data</a></li>
          <li><a href="../login/logout.php">Logout</a></li>
        </ul>
      </nav>

    </div>
  </header>
  <div class="wrapper">
  <div class="tbl">
  <form class="" action="search.php" method="get">
    <input class="input" type="search" name="cari" placeholder="Masukkan Pencarian">
    <select class="input" name="kategori">
      <option value="sks">SKS</option>
      <option value="nama_matkul">Matakuliah</option>
      <option value="semester">Semester</option>
    </select>
    <input class="cr" type="submit" value="cari">
    <br><br>
  </form>
    <table border="1">
      <div class="form">
    <tr>
    <th>No.</th>
    <th>Kode</th>
    <th>Matakuliah</th>
    <th>SKS</th>
    <th>Semester</th>
    <th>Dosen Pengajar</th>
    <th>Aksi</th>
    </tr>
    <?php
        if($num > 0)
        {
            $no = 1;
            while ($data = mysqli_fetch_assoc($result)) { ?>

                <tr>
                <td class="no"> <?php echo $no; ?> </th>
                <td class="kd"> <?php echo $data['kode'] ?> </td>
                <td class="hm"> <?php echo $data['nama_matkul'] ?> </td>
                <td class="kd"> <?php echo $data['sks'] ?> </td>
                <td class="kd"> <?php echo $data['semester'] ?> </td>
                <td class="aksi"> <?php
                      if($data['nama_dosen'] != NULL )
                      { echo $data['nama_dosen']; }
                      else { echo "-"; }
                      ?>
                </td>
                <td class="aksi"> <a href="form-update.php?kode=<?php echo $data['kode']; ?>">Edit </a>
                    <a href="delete.php?kode=<?php echo $data['kode']; ?>" onclick="return confirm('Anda yakin ingin menghapus data?')">Hapus</a>
                </td>
                </tr>

                <?php
                $no++;
            }
        }
        else
        {
            echo "<tr> <td colspan='7'> Tidak Ada Data </td></tr>";
        }
        ?>
    </table>
  </div>
    </div>
</body>
</html>
