<?php
    require 'functions.php';

    $nip = $_GET['nip'];

    if(hapusGuru($nip) > 0) {
        echo "<script>
                alert('Berhasil menghapus data.');
                document.location.href = 'data-guru.php';
            </script>";
    } else {
        echo "<script>
            alert('Gagal menghapus data.');
            document.location.href = 'data-guru.php';
        </script>";
    }
?>