<?php
    session_start();

    if(isset($_SESSION['guru'])) {
        unset($_SESSION['guru']);
        header("location:../index.php");
    }
?>