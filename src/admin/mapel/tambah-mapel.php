<?php
    session_start();

    if(!isset($_SESSION['admin'])) {
        header("location:../../index.php");
        exit;
    }

    require 'functions.php';

    if(isset($_POST['simpan'])) {
        if(tambahMapel($_POST) > 0) {
            echo "<script>
                alert('Data berhasil ditambahkan.');
                document.location.href = 'data-mapel.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal ditambahkan.');
                document.location.href = 'data-mapel.php';
            </script>";
        }
    }
?>
<?php?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Kode</label> <br>
        <input type="text" name="kode_mapel" required> <br>
        <label for="">Mata Pelajaran</label> <br>
        <input type="text" name="nama_mapel" required> <br>
        <button type="submit" name="simpan">Tambah</button>
    </form>
</body>
</html>