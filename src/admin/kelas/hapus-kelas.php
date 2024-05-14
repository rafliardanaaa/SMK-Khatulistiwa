<?php
    require 'functions.php';

    $id_kelas = $_GET['id'];

    if(hapusKelas($id_kelas) > 0) {
        echo "<script>
                alert('Berhasil menghapus data.');
                document.location.href = 'data-kelas.php';
            </script>";
    } else {
        echo "<script>
            alert('Gagal menghapus data.');
            document.location.href = 'data-kelas.php';
        </script>";
    }
?>