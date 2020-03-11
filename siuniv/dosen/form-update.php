<?php

include '../connect.php';

$id_dosen = $_GET['id_dosen'];

$query = "SELECT * FROM dosen WHERE id_dosen = $id_dosen";

$result = mysqli_query($connect, $query);

$row = mysqli_fetch_assoc($result);

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <title></title>
     <link rel="stylesheet" href="fc.css">
   </head>
   <body>
     <header>
       <div id="logo">
         <h1>Update Data</h1>
       </div>
     </header>
     <div class="wrapper">
       <div class="form">
     <form class="" action="update.php" method="post">
           <input class="fi" type="text" name="nama_dosen" id="nama" value="<?php echo $row['nama_dosen']; ?>">
           <br><br>
           <input class="fi" type="text" name="telp" id="no_telp" value="<?php echo $row['telp']; ?> ">
           <br><br>
         <input type="hidden" name="id_dosen" value="<?php echo $row['id_dosen']; ?>">
         <input id="button" type="submit" name="btnSimpan" value="Simpan">
         <br>
         <a href="read.php">Kembali</a>
     </form>
   </div>
 </div>
   </body>
 </html>
