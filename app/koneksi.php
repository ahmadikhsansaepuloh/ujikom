<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "bkutamu_uks";

$koneksi = mysqli_connect($hostname, $username, $password, $database);

if ($koneksi->connect_error) {
    echo "koneksi rusak";
    die("Koneksi Gagal: " . $koneksi->connect_error);
}

?>
