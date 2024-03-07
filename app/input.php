<?php include "boots.php" ?>

<main class="container col-5">
    <form action="prosesinput.php" method="post" class="form-control">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="sekolah" class="form-label">Sakit</label>
            <input type="text" class="form-control" id="sakit" name="sakit" required>
        </div>
        <div class="mb-3">
            <label for="sekolah" class="form-label">Kelas</label>
            <input type="text" class="form-control" id="kelas" name="kelas" required>
        </div>
        <div class="mb-3">
            <label for="sekolah" class="form-label">Jurusan</label>
            <select class="form-select rounded-0" aria-label="Default select example" name="jurusan">
                <option selected></option>
                <option value="Rpl">Rpl</option>
                <option value]="Atph">Atph</option>
                <option value]="Tbsm">Tbsm</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Jenis Kelamin</label>
            <select class="form-select rounded-0" aria-label="Default select example" name="jk">
                <option selected></option>
                <option value="Laki-laki">Laki-laki</option>
                <option value]="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

</main>