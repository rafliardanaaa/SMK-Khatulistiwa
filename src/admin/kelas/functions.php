<?php
    $conn = mysqli_connect("localhost", "root", "", "db_khatulistiwa");

    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)) {
            $rows [] = $row;
        }
        return $rows;
    }

    function tambahKelas($data) {
        global $conn;
        $nama_kelas = htmlspecialchars($data['nama_kelas']);

        $query = "INSERT INTO kelas VALUES('', '$nama_kelas')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function editKelas($data) {
        global $conn;
        $id_kelas = $data['id_kelas'];
        $nama_kelas = htmlspecialchars($data['nama_kelas']);

        $query = "UPDATE kelas SET 
                nama_kelas = '$nama_kelas'
                WHERE id_kelas = '$id_kelas'";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function hapusKelas($id_kelas) {
        global $conn;

        mysqli_begin_transaction($conn);

        mysqli_query($conn, "DELETE FROM kelas WHERE id_kelas = '$id_kelas'");
        $mysqli_affected_rows = mysqli_affected_rows($conn);

        if($mysqli_affected_rows > 0) {
            mysqli_commit($conn);
        } else {
            mysqli_rollback($conn);
        }

        return $mysqli_affected_rows;
    }
?>