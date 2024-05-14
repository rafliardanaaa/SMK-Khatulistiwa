<?php
    session_start();

    if(isset($_SESSION['siswa'])) {
        unset($_SESSION['siswa']);
        header("location:../index.php");
    }
?>