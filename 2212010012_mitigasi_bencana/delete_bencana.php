<?php
include "koneksi.php";
if (isset($_GET['id'])){
    $id_bencana = $_GET['id'];
} else {
    die ("Error. No id Selected! ");
}
?>
<html>
  <head>
    <title>Delete Bencana</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <a href="index.php">Halaman Depan</a> |
    <a href="arsip_bencana.php">Arsip Bencana</a> |
    <a href="input_bencana.php">Input Bencana</a>
    <br /><br />
  <?php
    //proses delete informasi 
    if (!empty($id_bencana) && $id_bencana != "") { 
        $query = "DELETE FROM bencana WHERE id_bencana='$id_bencana'"; 
        $sql = mysqli_query($conn,$query); 
        if ($sql) { 
            echo "<h2><font color=blue> Informasi telah berhasil dihapus </font></h2>"; 
        } else { 
            echo "<h2><font color=red> Informasi gagal dihapus </font></h2>"; 
        } 
            echo "Klik <a href='arsip_bencana.php'>di sini</a>untuk kembali ke halaman arsip bencana"; 
    } else { 
        die ("Access Denied"); 
    }
 ?>
  </body>
</html>
