<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./output.css" rel="stylesheet">
    <title>SMK Khatulistiwa</title>
</head>
<body class="bg-slate-100">
    <nav class="bg-sky-600 flex justify-center items-center">
        <img src="../smk.png" alt="" class="h-56 text-center">
    </nav>
    <div class="bg-sky-700 h-10 px-10 flex justify-center items-center">
        <a href="?view=login-admin" class="text-white text-sm">Admin</a>
        <a href="?view=login-guru" class="mx-10 text-white text-sm">Guru</a>
        <a href="?view=login-siswa" class="text-white text-sm">Siswa</a>
    </div>
    <div class="h-[680px] flex justify-center items-center">
        <div class="bg-white border-sky-600 border h-1/2 w-1/4 p-8 rounded-lg">
            <?php
                if(isset($_GET['view'])) {
                    $view = $_GET['view'];
                    include_once "{$view}.php";
                } else {
                    echo "Silahkan login terlebih dahulu";
                }
            ?>
        </div>  
    </div>
</body>
</html>