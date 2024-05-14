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

    $id_guru = $data_guru['id_guru'];

    $mengajar = mysqli_query($conn, "SELECT mengajar.*, guru.*, mapel.*, kelas.*, jurusan.* FROM mengajar
                INNER JOIN guru ON mengajar.id_guru = guru.id_guru
                INNER JOIN mapel ON mengajar.id_mapel = mapel.id_mapel
                INNER JOIN kelas ON mengajar.id_kelas = kelas.id_kelas
                INNER JOIN jurusan ON mengajar.id_jurusan = jurusan.id_jurusan
                WHERE mengajar.id_guru = '$id_guru'");
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
                    <a href="daftar-nilai.php">
                        <div class="bg-sky-700 border-white text-white px-10 py-3 font-semibold">
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
                <div class="grid grid-cols-2 gap-4 rounded-lg">
                    <?php foreach($mengajar as $row): ?>
                    <div class="bg-white p-4">
                        <p class="text-lg font-semibold"><?= $row['nama_mapel']; ?></p>
                        <p><?= $row['nama_kelas']; ?></p>
                        <a href="daftar-siswa.php?id=<?= $row['id_mengajar']; ?>.php">Cek</a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </main>
    </div>
</body>
</html>