<?php
    session_start();

    if(!isset($_SESSION['guru'])) {
        header("location:../index.php");
        exit;
    }

    require 'functions.php';

    $nis = $_GET['nis'];

    $nip = $_SESSION['guru'];

    $guru = query("SELECT * FROM guru WHERE nip = '$nip'");

    foreach($guru as $row) {
        $id_guru = $row['id_guru'];
    }

    $nilai = mysqli_query($conn, "SELECT nilai.*, murid.* FROM nilai
            INNER JOIN murid ON nilai.nis = murid.nis
            WHERE id_guru = '$id_guru' AND nilai.nis = '$nis'"); 
            
    $mengajar = mysqli_query($conn, "SELECT * FROM mengajar WHERE id_guru = '$id_guru'");

    $data_mengajar = mysqli_fetch_assoc($mengajar);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Guru</title>
</head>
<body>
    <a href="daftar-siswa.php?id=<?= $data_mengajar['id_mengajar']; ?>">Kembali</a>
    <table>
        <tr>
            <th>Nama Siswa</th>
            <th>Ulangan Harian</th>
            <th>Ulangan Tengah Semester</th>
            <th>Ulangan Akhir Semester</th>
            <th>Rata-rata</th>
        </tr>
        <?php foreach($nilai as $row): ?>
        <tr>
            <td><?= $row['nama_siswa']; ?></td>
            <td><?= $row['uh']; ?></td>
            <td><?= $row['uts']; ?></td>
            <td><?= $row['uas']; ?></td>
            <td><?= $row['na']; ?></td>
        </tr>
        <?php endforeach ?>
    </table>
</body>
</html>
