<?php
include 'koneksi.php';
include 'boots.php';
$banyakDataPerHal = 5;
$banyakData = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM listtamu"));
$banyakHal = ceil($banyakData / $banyakDataPerHal);
if (isset($_GET["halaman"])) {
    $halamanAktif = $_GET["halaman"];
} else {
    $halamanAktif = 1;
}
$dataAwal = ($halamanAktif * $banyakDataPerHal) - $banyakDataPerHal;
$tampil = $koneksi->query("SELECT * FROM listtamu LIMIT $dataAwal, $banyakDataPerHal");


?>


<main class="container">
    <div class="row">
        <div class="col-md-7">
            <!-- <h1>Bioswa</h1> -->
        </div>
        <div class="col-md-5">
            <form action="" method="post" class="form-inline">
                <div class="input-group">
                    <input type="text" class="form-control" name="keywords" placeholder="Cari..." autocomplete="off"
                        autofocus>
                    <div class="input-group-append">
                        <button type="submit" name="cari" class="btn btn-secondary pl-4 pr-4"><i
                                class="bi bi-search">Search</i></button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <div class="card my-3 p-2">
        <div class="">
            <table class="table table-bordered table-secondary table-hover">
                <thead class="thead-dark text-center">
                    <tr class="text-nowrap">
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
                    if (isset($_POST['cari'])) {
                        $keywords = $_POST['keywords'];
                        $tampil = $koneksi->query("SELECT * FROM listtamu WHERE 
                    no LIKE '%$keywords%' OR
                    nama LIKE '%$keywords%' OR
                    sakit LIKE '%$keywords%' OR
                    kelas LIKE '%$keywords%' OR
                    jurusan LIKE '%$keywords%' OR
                    jk LIKE '%$keywords%' OR
                    waktu LIKE '%$keywords%'
                ");
                    } else {
                        $tampil = $koneksi->query("SELECT * FROM listtamu LIMIT $dataAwal, $banyakDataPerHal");
                    }




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
                        <td class="text-center text-nowrap">
                            <a href="update.php?id=<?= $s['no']; ?>"
                                onclick="return confirm('Apakah anda yakin ingin mengubah data ini?');">
                                <button class="btn btn-warning btn btn-sm">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                            </a>
                            <a href="delete.php?id=<?= $s['no']; ?>"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                <button class="btn btn-danger  btn btn-sm">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </a>
                            <a href="read.php?id=<?= $s['no']; ?>"
                                onclick="document.location.href='read.php?id=<?php echo $s['no']?>'">
                                <button class="btn btn-info btn btn-sm">
                                <i class="bi bi-search"></i>
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
    <nav>
        <ul class="pagination justify-content-center">
            <!-- previous -->
            <?php if ($halamanAktif <= 1) { ?>
            <li class="page-item disabled"><a href="?halaman=<?php echo $halamanAktif - 1; ?>"
                    class="page-link">Sebelumnya</a></li>
            <?php } else { ?>
            <li class="page-item"><a href="?halaman=<?php echo $halamanAktif - 1; ?>" class="page-link">Sebelumnya</a>
            </li>
            <?php } ?>
            <!-- end previous -->
            <?php
            for ($i = 1; $i <= $banyakHal; $i++) {
            ?>
            <li class="page-item ">
                <a href="?halaman=<?= $i; ?>" class="page-link"><?= $i; ?></a>
            </li>
            <?php
            }
            ?>
            <!-- next -->
            <?php if ($halamanAktif >= $banyakHal) { ?>
            <li class="page-item disabled"><a href="?halaman=<?php echo $halamanAktif + 1; ?>"
                    class="page-link">Selanjutnya</a></li>
            <?php } else { ?>
            <li class="page-item"><a href="?halaman=<?php echo $halamanAktif + 1; ?>" class="page-link">Selanjutnya</a>
            </li>
            <?php } ?>
            <!-- end next -->
        </ul>
    </nav>
</main>