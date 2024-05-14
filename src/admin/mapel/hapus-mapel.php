<?php
    require 'functions.php';

    $id_mapel = $_GET['id'];

    if(hapusMapel($id_mapel) > 0) {
        echo "<script>
                alert('Berhasil menghapus data.');
                document.location.href = 'data-mapel.php';
            </script>";
    } else {
        echo "<script>
            alert('Gagal menghapus data.');
            document.location.href = 'data-mapel.php';
        </script>";
    }
?>