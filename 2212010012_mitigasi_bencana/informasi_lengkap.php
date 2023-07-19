<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id_bencana = $_GET['id'];
} else {
    die ("Error. No Id Selected! ");
}
?>
<html>
    <head>
        <title>
            Informasi Lengkap
        </title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <a href="index.php">Halaman Depan</a> |
        <a href="arsip_bencana.php">Arsip Bencana</a> |
        <a href="input_bencana.php">Input Bencana</a> 
        <br><br>
        <h2>Informasi Lengkap</h2>
        <?php
        $query = "SELECT B. id_bencana, K. nm_kategori,B. judul, B.isi, B.pengirim, B.tanggal FROM bencana B, kategori K WHERE B. id_kategori = K. id_kategori && B. id_bencana = '$id_bencana'";
            $sql = mysqli_query ($conn,$query) ;
            $hasil = mysqli_fetch_array ($sql);
            $id_bencana = $hasil ['id_bencana'];
            $kategori =$hasil['nm_kategori'];
            $judul =$hasil['judul'];
            $isi =$hasil['isi'];
            $pengirim =$hasil['pengirim'];
            $tanggal =$hasil['tanggal'];
            //
            //tampilkan Informasi
            echo "<font size=5 color=blue>$judul</font><br>";
            echo "<small>Informasi dikirim oleh <b>$pengirim</b> pada tanggal <b>$tanggal</b> dalam kategori <b>$kategori</b></small>";
            echo "<p>$isi</p>";
        ?>
    </body>
</html>


