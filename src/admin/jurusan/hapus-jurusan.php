<?php
    require 'functions.php';

    $id_jurusan = $_GET['id'];

    if(hapusJurusan($id_jurusan) > 0) {
        echo "<script>
                alert('Berhasil menghapus data.');
                document.location.href = 'data-jurusan.php';
            </script>";
    } else {
        echo "<script>
            alert('Gagal menghapus data.');
            document.location.href = 'data-jurusan.php';
        </script>";
    }
?>