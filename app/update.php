<?php
include 'koneksi.php';
include 'boots.php';

// Memastikan bahwa parameter 'id' telah diterima dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mendapatkan data dengan ID tertentu
    $query = $koneksi->prepare("SELECT * FROM listtamu WHERE no = ?");
    $query->bind_param("i", $id);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
    } else {
        // Redirect ke halaman utama jika data tidak ditemukan
        header("Location: index.php");
        exit();
    }

    // Proses form update jika data telah di-submit
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Ambil data dari form
        $nama = $_POST['nama'];
        $sakit = $_POST['sakit'];
        $kelas = $_POST['kelas'];
        $jurusan = $_POST['jurusan'];
        $jk = $_POST['jk'];
        // $agama = $_POST['agama'];

        // Validasi input data
        if (empty($nama) || empty($sakit) || empty($kelas) || empty($jurusan) || empty($jk)) {
            echo "Semua field harus diisi.";
        } else {
            // Query untuk melakukan update data
            $updateQuery = $koneksi->prepare("UPDATE listtamu SET nama=?, sakit=?, kelas=?, jurusan=?, jk=? WHERE no=?");
            $updateQuery->bind_param("sssssi", $nama, $sakit, $kelas, $jurusan, $jk, $id);

            if ($updateQuery->execute()) {
                // Tambahkan script JavaScript untuk menampilkan notifikasi
                echo "<div class='alert alert-warning' role='alert'>
                Data berhasil di ubah!
              </div>";
              
            
                // Redirect ke halaman utama setelah berhasil update
            } else {
                echo "Gagal melakukan update data.";
            }
            
        }
    }
} else {
    // Redirect ke halaman utama jika parameter 'id' tidak ditemukan
    header("Location: index.php");
    exit();
}
?>

<main class="container col-5">
    <div class="text-center">
        <h2>Form Update Data</h2>
    </div>
    <form method="post" action="" class="form-control">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="sakit" class="form-label">Sakit</label>
            <input type="text" class="form-control" id="sakit" name="sakit" value="<?= $data['sakit']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <input type="text" class="form-control" id="kelas" name="kelas" value="<?= $data['kelas']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= $data['jurusan']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="jk" class="form-label">Jenis Kelamin</label>
            <input type="text" class="form-control" id="jk" name="jk" value="<?= $data['jk']; ?>" required>
        </div>
        <!-- <div class="mb-3">
            <label for="agama" class="form-label">Agama</label>
            <input type="text" class="form-control" id="agama" name="agama" value="<?= $data['agama']; ?>" required>
        </div> -->
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="tampilan.php" class="btn btn-secondary">Kembali</a>
    </form>
</main>