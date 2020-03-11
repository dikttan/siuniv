<?php

include '../connect.php';

$cari = $_GET['cari'];
$query = "SELECT * FROM dosen WHERE nama_dosen LIKE '%$cari%'";
$result = mysqli_query($connect, $query);
$num = mysqli_num_rows($result);
?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
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
             <li><a href="read.php">Kembali</a></li>
             <li><a href="form-create.php">Tambah Data</a></li>
             <li><a href="../login/logout.php">Logout</a></li>
           </ul>
         </nav>

       </div>
     </header>
     <div class="wrapper">
       <div class="tbl">
   <table border="1">
     <div class="form">
     <tr>
       <th>No.</th>
       <th>Nama Dosen</th>
       <th>Telepon</th>
       <th>Aksi</th>
     </tr>

<?php
  if($num > 0)
  {
    $no = 1;
    while ($data = mysqli_fetch_assoc($result))
    {
      echo "<tr>";
      echo "<td class='no'>" . $no . "</td>";
      echo "<td class='hm'>" . $data['nama_dosen'] . "</td>";
      echo "<td class='hm'>" . $data['telp'] . "</td>";
      echo "<td class='aksi'><a href = 'form-update.php?id_dosen=" . $data['id_dosen']."'>Edit</a>     ";
      echo "<a href = 'delete.php?id_dosen=" . $data['id_dosen']."'onclick='return confirm(\"Apakah Anda yakin ingin menghapus data?\")'>Hapus</a>  ";
      echo "<tr>";
      $no++;
    }
  }
  else
  {
    echo "<td colspan = '3'>Tidak ada data</td>";
  }
?>
</div>
   </table>
   </div>
   </div>
   </body>
 </html>
