<?php
include "koneksi.php";
?>
<html>
    <head>
        <title>
            Arsip Bencana
        </title>
        <link rel="stylesheet" href="style.css">
        <script language="javascript">
            function tanya() {
                if (confirm("Apakah Anda yakin akan menghapus berita ini?")) {
                    return true;
                } 
                else {
                    return false;
                }
            }
        </script>
    </head>
    <body>
        <a href="index.php">Halaman Depan</a> |
        <a href="arsip_bencana.php">Arsip Bencana</a> |
        <a href="input_bencana.php">Input Bencana</a> 
        <br><br>
        <h2>Arsip Bencana</h2>
        <ol>
            <?php
            $query = "SELECT B.id_bencana, K.nm_kategori,
            B.judul, B.pengirim, B.tanggal, B.headline
            FROM bencana B, kategori K WHERE
            B.id_kategori = K.id_kategori
            ORDER BY B.id_bencana DESC";
                $sql = mysqli_query($conn, $query);
                while ($hasil = mysqli_fetch_array($sql)) {
                    $id_bencana = $hasil['id_bencana'];
                    $kategori = $hasil['nm_kategori'];
                    $judul = $hasil['judul'];
                    $headline = $hasil['headline'];
                    $pengirim = $hasil['pengirim'];
                    $tanggal = $hasil['tanggal'];
                    //
                    //tampilkan arsip bencana
                    echo "<li><a href = 'informasi_lengkap.php?id= $id_bencana'>$judul</a><br>";
                    echo "<small>Informasi dikirimkan oleh <b>$pengirim</b>pada tanggal <b>$tanggal</b> dalam kategori<b>$kategori</b><br>";
                    echo "<b>Action : </b><a href='edit_informasi.php?id=$id_bencana'>Edit</a> | ";
                    echo "<a href='delete_bencana.php?id=$id_bencana' onClik='return tanya()'>Delete</a>";
                    echo "</small></li><br><br>";                        
                }
            ?>
        </ol>
    </body>
</html>