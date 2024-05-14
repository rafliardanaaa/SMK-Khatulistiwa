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
    <title>Halaman Guru</title>
</head>
<body>
    <form action="" method="post">
        <p class="text-lg font-semibold">Login Guru</p>
        <p class="text-sm">Selamat datang Guru, ini adalah form login</p>
        <div class="my-4">
            <label for="">NIP</label> <br>
            <input type="text" name="nip" class="border-sky-600 border w-full my-2 px-1.5 py-1 rounded focus:outline-none" required>
            <label for="">Nama Guru</label>
            <input type="text" name="nama_guru" class="border-sky-600 border w-full my-2 px-1.5 py-1 rounded focus:outline-none" required>
        </div>
        <button type="submit" name="login" class="bg-sky-600 px-6 py-1 text-white rounded-md">Masuk</button>
        <?php
            if(isset($_POST['login'])) {
                $nip = $_POST['nip'];
                $nama_guru = $_POST['nama_guru'];

                $query = mysqli_query($conn, "SELECT * FROM guru WHERE nip = '$nip' AND nama_guru = '$nama_guru'");
                $check = mysqli_fetch_assoc($query);
                if($check) {
                    $_SESSION['guru'] = $nip;
                    header("location:guru/dashboard.php");
                } else {
                    echo"<script>
                        alert('NIP Anda tidak terdaftar!');
                    </script>";
                }
            }
        ?>
    </form>
</body>
</html>