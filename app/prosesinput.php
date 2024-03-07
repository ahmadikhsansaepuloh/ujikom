<?php
include "koneksi.php";
include "boots.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi input data
    $nama = $_POST['nama'];
    $sakit = $_POST['sakit'];
    $jk = $_POST['jk'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $waktu = date('Y-m-d H:i:s');



    if (empty($nama) || empty($sakit) || empty($kelas) || empty($jurusan) || empty($jk)) {
        echo "Semua field harus diisi.";
    } else {
        // Escape string hanya untuk data string, bukan karakter
        $nama = mysqli_real_escape_string($koneksi, $nama);
        $sakit = mysqli_real_escape_string($koneksi, $sakit);
        $kelas = mysqli_real_escape_string($koneksi, $kelas);
        $jurusan = mysqli_real_escape_string($koneksi, $jurusan);

        // Query dengan parameterisasi
        $query = $koneksi->prepare("INSERT INTO listtamu (nama, sakit, jk, kelas, jurusan, waktu) VALUES (?, ?, ?, ?, ?, CURRENT_TIMESTAMP)");
        $query->bind_param("sssss", $nama, $sakit, $jk, $kelas, $jurusan);


        if ($query->execute()) {
            echo  "<div class='container'><div class='alert alert-success' role='alert'>
            Data berhasil di tambahkan!
          </div></div>";
        } else {
            echo "Error: " . $query->error;
        }

        $query->close();
        $koneksi->close();
    }
}
