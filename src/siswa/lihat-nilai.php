<?php
    session_start();

    if(!isset($_SESSION['siswa'])) {
        header("location:../index.php");
        exit;
    }

    require 'functions.php';

    $nis = $_SESSION['siswa'];

    $siswa = mysqli_query($conn, "SELECT * FROM murid WHERE nis = '$nis'");

    $data_siswa = mysqli_fetch_assoc($siswa);

    $nilai= query("SELECT nilai.*, mapel.*, guru.* FROM nilai
            INNER JOIN mapel ON nilai.id_mapel = mapel.id_mapel
            INNER JOIN guru ON nilai.id_guru = guru.id_guru
            WHERE nis = '$nis'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../output.css" rel="stylesheet">
    <title>Halaman Siswa</title>
</head>
<body class="bg-slate-100">
    <div class="flex">
        <aside class="bg-sky-600 h-screen w-72 rounded-r-2xl shadow-lg">
            <div class="py-6 text-center">
                <a href="" class="text-white py-6 text-center text-lg font-semibold select-none">Halaman Siswa</a>
            </div>
            <div class="py-6 font-semibold">
                <div class="mt-40">
                    <a href="dashboard.php">
                        <div class="text-slate-300 px-10 py-3 font-semibold hover:text-white">
                            <p>Dashboard</p>
                        </div>
                    </a>
                    <a href="">
                        <div class="bg-sky-700 border-white text-white px-10 py-3 font-semibold">
                            <p>Lihat Nilai</p>
                        </div>
                    </a>
                    <a href="logout.php">
                        <div class="text-slate-300 px-10 py-3 font-semibold hover:text-white">
                            <p>Logout</p>
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
                <p class="text-sky-600"><?= $data_siswa['nama_siswa']; ?></p>    
            </nav>
            <div class="px-8">
                <div class="w-full grid grid-cols-2 gap-4">
                    <?php foreach($nilai as $row): ?>
                    <div class="bg-white p-4 rounded-md shadow-md">
                        <p class="font-semibold"><?= $row['nama_mapel']; ?></p>
                        <p class="text-sm">Guru Mata Pelajaran: <?= $row['nama_guru']; ?></p>
                        
                        <div class="mt-4">
                            <table class="w-full">
                                <tr>
                                    <th>Ulangan Harian</th>
                                    <th>Ulangan Tengah Semester</th>
                                    <th>Ulangan Akhir Semester</th>
                                    <th>Rata-rata</th>
                                </tr>
                                <tr class="text-center">
                                    <td><?= $row['uh']; ?></td>
                                    <td><?= $row['uts']; ?></td>
                                    <td><?= $row['uas']; ?></td>
                                    <td><?= round($row['na']); ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </main>
    </div>
</body>
</html>