<?php
    session_start();

    require 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./output.css" rel="stylesheet">
    <title>Halaman Siswa</title>
</head>
<body>
    <form action="" method="post">
        <p class="text-lg font-semibold">Login Siswa</p>
        <p class="text-sm">Selamat datang Siswa, ini adalah form login</p>
        <div class="my-4">
            <label for="">NIS</label> <br>
            <input type="text" name="nis" class="border-sky-600 border w-full my-2 px-1.5 py-1 rounded focus:outline-none" required>
            <label for="">Nama Siswa</label>
            <input type="text" name="nama_siswa" class="border-sky-600 border w-full my-2 px-1.5 py-1 rounded focus:outline-none" required>
        </div>
        <button type="submit" name="login" class="bg-sky-600 px-6 py-1 text-white rounded-md">Masuk</button>
        <?php
            if(isset($_POST['login'])) {
                $nis = $_POST['nis'];
                $nama_siswa = $_POST['nama_siswa'];

                $query = mysqli_query($conn, "SELECT * FROM murid WHERE nis = '$nis' AND nama_siswa = '$nama_siswa'");
                $check = mysqli_fetch_assoc($query);
                if($check) {
                    $_SESSION['siswa'] = $nis;
                    header("location:siswa/dashboard.php");
                } else {
                    echo 'gagal';
                }
            }
        ?>
    </form>
</body>
</html>