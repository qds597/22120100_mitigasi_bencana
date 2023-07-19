<?php
include "koneksi.php";
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Index Informasi</title>
  </head>
  <body>
    <center>
      <a href="index.php">Halaman Depan</a> |
      <a href="arsip_bencana.php">Arsip Bencana</a> |
      <a href="input_bencana.php">Input Bencana</a> |
      <a href="input_kategori.php">Input Kategori</a> 

      <br /><br />
      <h2>HALAMAN DEPAN ~ LIMA BENCANA TERBARU</h2>
    </center>
  </body>
</html>
<?php
$query = "SELECT B.*,K.* FROM informasi B,kategori K WHERE B.id_kategori=K.id_kategori";
$sql = mysqli_query ($conn,$query) ;
while ($hasil = mysqli_fetch_array($sql)) {
    $id_bencana = $hasil['id_bencana'];
    $kategori = $hasil['nm_kategori'];
    $judul = $hasil['judul'];
    $headline = $hasil['headline'];
    $pengirim = $hasil['pengirim'];
    $tanggal = $hasil['tanggal'];
//
//tampilan informasi
    echo "<font size=4><a href= 'informasi_lengkap.php?id=$id_bencana'>$judul</a></font><br>";
    echo "<small> Informasi dikirimkan oleh <b> $pengirim </b> pada tanggal <b> $tanggal</b> dalam kategori <b> $kategori </b> </small>";
    echo "<p>$headline</p>";
    echo "<hr>";
}
?>