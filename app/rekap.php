<?php
session_start();
$user = $_SESSION['user'];
if ($user == "") {
?>
<script>
document.location = 'rekap.php';
</script>
<?php
} else {
}
include "boots.php";

?>

<body class="bg-white-subtle">

    <form action="" method="get">

        <div class="row g-3 align-items-center mt-3">
            <div class="col-auto">
                <label for="inputPassword6" class="col-form-label"></label>
            </div>
            <div class="col-auto">
                <input type="date" name="awal" id="inputPassword6" class="form-control"
                    aria-describedby="passwordHelpInline">
            </div>
            <div class="col-auto">
                <label for="inputPassword6" class="col-form-label"></label>
            </div>
            <div class="col-auto">
                <input type="date" name="akhir" id="inputPassword6" class="form-control"
                    aria-describedby="passwordHelpInline">
            </div>
            <div class="col-auto">
                <button type="submit" name="cari" value="<?php ['id']; ?>" class="btn btn-dark"><i
                        class="bi bi-search"></i></button>
            </div>
            <div class="col d-grid gap-2 md-flex justify-content-md-end me-2">
                <button class="btn btn-dark" onclick="printDiv('print')" type="submit"><i
                        class="bi bi-printer-fill"></i></button>
            </div>
    </form>
    </div>
    </div>
    <fieldset id="print">
        <table class="table class text-center bg-info-emphasis mt-3 table-bordered">
            <thead class="table-secondary">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Sakit</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>Jenis Kelamin</th>
                    <th>Waktu</th>

                </tr>
            </thead>
            <?php include "koneksi.php";
            @$cari = $_GET['awal'];
            if ($cari == "") {


                $tampil = $koneksi->query("select * from listtamu");
                while ($s = $tampil->fetch_array()) {
                    @$no++;
            ?>
            <tbody class="table mt-3 table-secondary">
                <tr>
                    <th scope="row" class="table-secondary text-center"><?= $no; ?></th>
                    <td class="text-center"><?= $s['nama']; ?></td>
                    <td class="text-center"><?= $s['sakit']; ?></td>
                    <td class="text-center"><?= $s['kelas']; ?></td>
                    <td class="text-center"><?= $s['jurusan']; ?></td>
                    <td class="text-center"><?= $s['jk']; ?></td>
                    <td class="text-center"><?= $s['waktu']; ?></td>
                    <?php
                    }
                } else {


                    $listtamu = $_GET['cari'];

                    $tampil = $koneksi->query("select * from listtamu where waktu between'$_GET[awal]' and '$_GET[akhir]'");
                    while ($s = $tampil->fetch_array()) {
                        @$no++;
                        ?>
            <tbody class="table mt-3">
                <tr>
                    <th scope="row" class="table-secondary text-center"><?= $no; ?></th>
                    <td class="text-center"><?= $s['nama']; ?></td>
                    <td class="text-center"><?= $s['sakit']; ?></td>
                    <td class="text-center"><?= $s['kelas']; ?></td>
                    <td class="text-center"><?= $s['jurusan']; ?></td>
                    <td class="text-center"><?= $s['jk']; ?></td>
                    <td class="text-center"><?= $s['waktu']; ?></td>
                    <?php
                    }
                }
                    ?>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <script type="text/javascript">
    function printDiv(el) {
        var a = document.body.innerHTML;
        var b = document.getElementById(el).innerHTML;

        document.body.innerHTML = b;
        window.print();
        document.body.innerHTML = a;
    }
    </script>