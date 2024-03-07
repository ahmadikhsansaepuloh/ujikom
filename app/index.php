<?php
session_start();
$user=$_SESSION['user'];

if ($user==""){
  ?>
  <script>
    document.location.href='../index.php';
  </script>
  <?php
}else{

}
include "boots.php";
?>
<body>
<div class="container">
  <nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="#"><img src="../images/2.png" width="60" alt=""> BUKU TAMU UKS SISWA</a>
        </li>
        
      </ul>
      <form class="d-flex" role="search" action="cari.php" method="post" target="konten">
        <input class="form-control me-2" type="search" name="cari"  placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light text-white" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
   
    <div class="row mt-3">
      <div class="col-3">
        <ul class="list-group">
        <li class="list-group-item"><a href="input.php" target="konten" class="text-decoration-none text-dark"><i class="bi bi-pencil-square"></i> Input Data Siswa</a></li>
            <li class="list-group-item"><a href="tampilan.php" target="konten" class="text-decoration-none text-dark"><i class="bi bi-card-checklist"></i> Data Siswa</a></li>
          <li class="list-group-item"><a href="rekap.php" target="konten" class="text-decoration-none text-dark"><i class="bi bi-printer"></i></i> Rekap</a></li></li>
          <!-- <li class="list-group-item"><a href="dash.php" target="konten" class="text-decoration-none text-dark"><i class="bi bi-printer"></i></i> Dashboard</a></li></li> -->
          <li class="list-group-item"><a href="logout.php" target="" class="text-decoration-none text-dark"><i class="bi bi-box-arrow-left"></i> Logout</a></li></li>
          
        </ul>
      </div>
      <div class="col-9">
        <iframe src="input.php" id="konten" frameborder="0" name="konten" width="950" height="800"></iframe>
      </div>
    </div>
    </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script>
    function loadContent(url) {
      document.getElementById("konten").src = url;
    }
  </script>
</body>

</html>