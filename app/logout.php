<?php
session_start();
session_destroy();
?>
<script>
    alert("apakah anda yakin ingin keluar");
    document.location.href = '../index.php';
    </script>