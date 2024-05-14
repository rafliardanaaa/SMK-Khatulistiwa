<?php
    session_start();

    if(!isset($_SESSION['guru'])) {
        header("location:../index.php");
        exit;
    }

    require 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Guru</title>
</head>
<body>
    <a href="dashboard.php">Kembali</a>
</body>
</html>