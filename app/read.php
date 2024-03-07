<?php
include "boots.php";
include "koneksi.php";


if(isset($_GET['id'])) {
    
    $id = $koneksi->real_escape_string($_GET['id']);

    $query = "SELECT * FROM listtamu WHERE no='$id'";
    $result = $koneksi->query($query);

    if($result->num_rows > 0) {
        
        $data = $result->fetch_assoc();
        ?>
<div class="card my-3 p-2">
    <table class="table table-bordered table-info table-hover">
        <thead class="thead-dark text-center">
            <h2>Detail Data</h2>
            <p><strong>Nama:</strong> <?php echo $data['nama']; ?></p>
            <p><strong>Sakit:</strong> <?php echo $data['sakit']; ?></p>
            <p><strong>Kelas:</strong> <?php echo $data['kelas']; ?></p>
            <p><strong>Jurusan:</strong> <?php echo $data['jurusan']; ?></p>
            <p><strong>Jenis Kelamin:</strong> <?php echo $data['jk']; ?></p>
            <p><strong>Waktu:</strong> <?php echo $data['waktu']; ?></p>
            <a href="tampilan.php"><button type="button" class="btn btn-secondary rounded-0">kembali</button></a>
        </thead>
</div>
<?php

    } else {
        echo "Data tidak ditemukan.";
    }

} else {
    echo "ID tidak diberikan.";
}

?>