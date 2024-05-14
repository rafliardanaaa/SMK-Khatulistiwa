<?php
    session_start();

    if(!isset($_SESSION['admin'])) {
        header("location:../../index.php");
        exit;
    }

    require 'functions.php';

    if(isset($_POST['simpan'])) {
        if(editKelas($_POST) > 0) {
            echo "<script>
                alert('Berhasil mengubah data.');
                document.location.href = 'data-kelas.php';
            </script>";
        } else {
            echo "<script>
                alert('Gagal mengubah data.');
                document.location.href = '';
            </script>";
        }
    }

    $id_kelas = $_GET['id'];

    $kelas = mysqli_query($conn, "SELECT * FROM kelas WHERE id_kelas = '$id_kelas'");

    $data_kelas = mysqli_fetch_assoc($kelas);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../output.css" rel="stylesheet">
    <title>Halaman Admin</title>
</head>
<body class="bg-slate-100">
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
                    <a href="data-siswa.php">
                        <div class="text-slate-300 px-10 py-3 font-semibold hover:text-white">
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
                    <a href="../jurusan/data-jurusan">
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
                <a href="">Nama admin</a>     
            </nav>
            <div class="px-8">
            <form action="" method="post">
        <input type="hidden" name="id_kelas" value="<?= $data_kelas['id_kelas']; ?>">
        <label for="">Kelas</label> <br>
        <input type="text" name="nama_kelas" value="<?= $data_kelas['nama_kelas']; ?>"> <br>
        <button type="submit" name="simpan">Simpan</button>
    </form>
            </div>
        </main>
    </div>
</body>
</html>