<?php
    session_start();

    if(!isset($_SESSION['guru'])) {
        header("location:../index.php");
        exit;
    }

    require 'functions.php';

    $nip = $_SESSION['guru'];

    $guru = mysqli_query($conn, "SELECT * FROM guru WHERE nip = '$nip'");

    $data_guru = mysqli_fetch_assoc($guru);

    $id_mengajar = $_GET['id'];

    $mengajar = query("SELECT * FROM mengajar WHERE id_mengajar = '$id_mengajar'");

    foreach($mengajar as $row) {
        $id_jurusan = $row['id_jurusan'];
        $id_kelas = $row['id_kelas'];
    }

    $siswa = mysqli_query($conn, "SELECT murid.*, kelas.*, jurusan.* FROM murid
            INNER JOIN kelas ON murid.id_kelas = kelas.id_kelas
            INNER JOIN jurusan ON murid.id_jurusan = jurusan.id_jurusan
            WHERE murid.id_kelas = '$id_kelas'");    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../output.css" rel="stylesheet">
    <title>Halaman Guru</title>
</head>
<body class="bg-slate-100">
    <div class="flex">
        <aside class="bg-sky-600 h-screen w-72 rounded-r-2xl shadow-lg">
            <div class="py-6 text-center">
                <a href="" class="text-white py-6 text-center text-lg font-semibold select-none">Halaman Guru</a>
            </div>
            <div class="py-6 font-semibold">
                <div class="mt-40">
                    <a href="dashboard.php">
                        <div class="text-slate-300 px-10 py-3 font-semibold hover:text-white">
                            <p>Dashboard</p>
                        </div>
                    </a>
                    <a href="jadwal.php">
                        <div class="text-slate-300 px-10 py-3 font-semibold hover:text-white">
                            <p>Jadwal Mengajar</p>
                        </div>
                    </a>
                    <a href="logout.php">
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
            <table border="1" cellpadding="10">
        <tr>
            <th>Mapel</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Beri Nilai</th>
        </tr>
        <?php foreach($siswa as $row): ?>
        <tr>
            <td><?= $row['nama_siswa']; ?></td>
            <td><?= $row['nama_siswa']; ?></td>
            <td><?= $row['nama_kelas']; ?></td>
            <td><?= $row['nama_jurusan']; ?></td>
            <td>
                <a href="form-nilai.php?nis=<?= $row['nis']; ?>">Berikan</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
            </div>
        </main>
    </div>
</body>
</html>