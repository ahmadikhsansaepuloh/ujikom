<?php
include 'koneksi.php';
include 'boots.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Lakukan kueri penghapusan
    $deleteQuery = $koneksi->query("DELETE FROM listtamu WHERE no = $id");

    if ($deleteQuery) {
        echo  "<div class='alert alert-danger' role='alert'>
        Data berhasil di hapus!
      </div>";
    } else {
        echo "Gagal Menghapus Data: " . $koneksi->error;
    }
} else {
    echo "Permintaan tidak valid. Tidak ada ID yang ditentukan untuk dihapus.";
}
$koneksi->close();
?>