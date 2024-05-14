<?php
    session_start();

    if(!isset($_SESSION['admin'])) {
        header("location:../../index.php");
        exit;
    }

    require 'functions.php';

    if(isset($_POST['simpan'])) {
        if(tambahSiswa($_POST) > 0) {
            echo "<script>
                alert('Data berhasil ditambahkan.');
                document.location.href = 'data-siswa.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal ditambahkan.');
                document.location.href = 'data-siswa.php';
            </script>";
        }
    }

    $nip = $_SESSION['admin'];

    $guru = mysqli_query($conn, "SELECT * FROM guru WHERE nip = '$nip'");

    $data_guru = mysqli_fetch_assoc($guru);

    $kelas = query("SELECT * FROM kelas");

    $jurusan = query("SELECT * FROM jurusan");
?>
<?php?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../output.css" rel="stylesheet">
    <title>Halaman Admin</title>
</head>
<body>
<div class="flex">
        <aside class="bg-sky-600 h-screen w-72 rounded-r-2xl shadow-lg">
            <div class="py-6 text-center">
                <a href="" class="text-white py-6 text-center text-lg font-semibold select-none">Halaman Admin</a>
            </div>
            <div class="py-6 font-semibold">
                <div class="mt-40">
                    <a href="../dashboard.php">
                        <div class="text-slate-300 px-10 py-3 font-semibold hover:text-white">
                            <p>Dashboard</p>
                        </div>
                    </a>
                    <a href="">
                        <div class="bg-sky-700 border-white text-white px-10 py-3 font-semibold">
                            <p>Kelola Siswa</p>
                        </div>
                    </a>
                    <a href="../guru/data-guru.php">
                        <div class="text-slate-300 px-10 py-3 font-semibold hover:text-white">
                            <p>Kelola Guru</p>
                        </div>
                    </a>
                    <a href="../mapel/data-mapel.php">
                        <div class="text-slate-300 px-10 py-3 font-semibold hover:text-white">
                            <p>Kelola Mapel</p>
                        </div>
                    </a>
                    <a href="../kelas/data-kelas.php">
                        <div class="text-slate-300 px-10 py-3 font-semibold hover:text-white">
                            <p>Kelola Kelas</p>
                        </div>
                    </a>
                    <a href="../jurusan/data-jurusan.php">
                        <div class="text-slate-300 px-10 py-3 font-semibold hover:text-white">
                            <p>Kelola Jurusan</p>
                        </div>
                    </a>
                    <a href="../jadwal/data-jadwal.php">
                        <div class="text-slate-300 px-10 py-3 font-semibold hover:text-white">
                            <p>Kelola Jadwal</p>
                        </div>
                    </a>
                    <a href="../nilai/data-nilai.php">
                        <div class="text-slate-300 px-10 py-3 font-semibold hover:text-white">
                            <p>Kelola Nilai</p>
                        </div>
                    </a>
                    <a href="../logout.php">
                        <div class="text-slate-300 px-10 py-3 font-semibold hover:text-white">
                            <p>Keluar</p>
                        </div>
                    </a>
                </div>
            </div>
        </aside>
        <main class="h-screen w-screen">
            <nav class="h-20 px-12 flex justify-between items-center">
                <div class="flex justify-center items-center">
                    <p class="text-sky-600 font-bold">SMK Khatulistiwa</p>
                </div>
                <p class="text-sky-600"><?= $data_guru['nama_guru']; ?></p>     
            </nav>
            <div class="px-8">
                <form action="" method="post">
                    <select name="kelas">
                        <?php foreach($kelas as $row): ?>
                        <option value="<?= $row['id_kelas']; ?>"><?= $row['nama_kelas']; ?></option>
                        <?php endforeach; ?>
                    </select> <br>
                    <select name="jurusan">
                        <?php foreach($jurusan as $row): ?>
                        <option value="<?= $row['id_jurusan']; ?>"><?= $row['nama_jurusan']; ?></option>
                        <?php endforeach; ?>
                    </select> <br>
                    <label for="">NIS</label> <br>
                    <input type="text" name="nis" required> <br>
                    <label for="">Nama Siswa</label> <br>
                    <input type="text" name="nama_siswa" required> <br>
                    <label for="">Jenis Kelamin</label> <br>
                    <input type="radio" name="jenis_kelamin" value="L">
                    <label for="">Laki-laki</label> <br>
                    <input type="radio" name="jenis_kelamin" value="P">
                    <label for="">Perempuan</label> <br>
                    <label for="">Alamat</label> <br>
                    <textarea name="alamat" cols="30" rows="10" required></textarea> <br>
                    <button type="submit" name="simpan">Tambah</button>
                </form>
            </div>
        </main>
    </div>
</body>
</html>