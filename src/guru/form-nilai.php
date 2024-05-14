<?php
    session_start();

    if(!isset($_SESSION['guru'])) {
        header("location:../index.php");
        exit;
    }

    require 'functions.php';

    if(isset($_POST['simpan'])) {
        if(beriNilai($_POST) > 0) {
            echo "
                <script>
                    alert('Berhasil');
                    document.location.href = 'dashboard.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Gagal');
                    document.location.href = 'dashboard.php';
                </script>
            ";
        }
    }

    $nis = $_GET['nis'];

    $siswa = query("SELECT * FROM murid WHERE nis = '$nis'");

    foreach($siswa as $row) {
        $id_kelas = $row['id_kelas'];
    }

    $nip = $_SESSION['guru'];

    $guru = query("SELECT * FROM guru WHERE nip = '$nip'");

    foreach ($guru as $row) {
        $guru_id = $row['id_guru'];
    }

    $mengajar = mysqli_query($conn, "SELECT mengajar.*, guru.*, mapel.*, jurusan.*, kelas.* FROM mengajar
                INNER JOIN guru ON mengajar.id_guru = guru.id_guru
                INNER JOIN mapel ON mengajar.id_mapel = mapel.id_mapel
                INNER JOIN jurusan ON mengajar.id_jurusan = jurusan.id_jurusan
                INNER JOIN kelas ON mengajar.id_kelas = kelas.id_kelas 
                WHERE mengajar.id_guru = $guru_id AND mengajar.id_kelas = '$id_kelas'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Guru</title>
</head>
<body>
    <form action="" method="post">
        <?php foreach($siswa as $row): ?>
        <label for="">NIS</label> <br>
        <input type="text" name="nis" value="<?= $row['nis'] ?>" disabled> <br>
        <input type="hidden" name="nis" value="<?= $row['nis'] ?>"> <br>
        <label for="">Nama Siswa</label> <br>
        <input type="text" value="<?= $row['nama_siswa'] ?>" disabled> <br>
        <?php endforeach; ?>
        <?php foreach($mengajar as $row): ?>
        <input type="hidden" name="guru" value="<?= $row['id_guru'] ?>">
        <label for="">Mapel</label> <br>
        <input type="text" value="<?= $row['nama_mapel'] ?>" disabled> <br>
        <input type="hidden" name="mapel" value="<?= $row['id_mapel'] ?>"> 
        <label for="">Kelas</label> <br>
        <input type="text" value="<?= $row['nama_kelas'] ?>" disabled> <br>
        <input type="hidden" name="kelas" value="<?= $row['id_kelas'] ?>"> 
        <label for="">Jurusan</label> <br>
        <input type="text" value="<?= $row['nama_jurusan'] ?>" disabled> <br>
        <input type="hidden" name="jurusan" value="<?= $row['id_jurusan'] ?>"> 
        <label for="">Nilai Ulangan Harian</label> <br>
        <input type="text" name="uh"> <br>
        <label for="">Nilai Ulangan Tengah Semester</label> <br>
        <input type="text" name="uts"> <br>
        <label for="">Nilai Akhir Semester</label> <br>
        <input type="text" name="uas"> <br>
        <?php endforeach; ?>
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>