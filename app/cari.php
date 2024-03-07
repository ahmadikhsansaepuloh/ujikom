<?php
include 'koneksi.php';
include 'boots.php';
?>
<main class="container">
    <div class="card my-3 p-2">
        <div class="card-body">
            <table class="table table-bordered table-secondary table-hover">
                <thead class="thead-dark text-center">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Sakit</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Jenis kelamin</th>
                        <th>Waktu</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $tampil = $koneksi->query("SELECT * FROM listtamu WHERE nama LIKE '%$_POST[cari]%' OR sakit LIKE '%$_POST[cari]%'");
                    $i = 1;
                    while ($s = $tampil->fetch_array()) {
                    ?>
                        <tr>
                            <th scope="row" class="text-center"><?= $i++; ?></th>
                            <td class="text-center"><?= $s['nama']; ?></td>
                            <td class="text-center"><?= $s['sakit']; ?></td>
                            <td class="text-center"><?= $s['kelas']; ?></td>
                            <td class="text-center"><?= $s['jurusan']; ?></td>
                            <td class="text-center"><?= $s['jk']; ?></td>
                            <td class="text-center"><?= $s['waktu']; ?></td>
                            <td class="text-center">
                                <a href="update.php?id=<?= $s['no']; ?>" onclick="return confirm('Apakah anda yakin ingin mengubah data ini?');">
                                    <button class="btn btn-warning">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                </a>
                                <a href="delete.php?id=<?= $s['no']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                    <button class="btn btn-danger">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>