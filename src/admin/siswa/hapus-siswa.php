<?php
    require 'functions.php';

    $nis = $_GET['nis'];

    if(hapusSiswa($nis) > 0) {
        echo "<script>
                alert('Berhasil menghapus data.');
                document.location.href = 'data-siswa.php';
            </script>";
    } else {
        echo "<script>
            alert('Gagal menghapus data.');
            document.location.href = 'data-siswa.php';
        </script>";
    }
?>