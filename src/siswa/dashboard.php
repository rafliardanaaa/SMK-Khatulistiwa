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
                    <a href="">
                        <div class="bg-sky-700 border-white text-white px-10 py-3 font-semibold">
                            <p>Dashboard</p>
                        </div>
                    </a>
                    <a href="lihat-nilai.php">
                        <div class="text-slate-300 px-10 py-3 font-semibold hover:text-white">
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
        </main>
    </div>
</body>
</html>