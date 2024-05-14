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

    function tambahMapel($data) {
        global $conn;
        $kode_mapel = htmlspecialchars($data['kode_mapel']);
        $nama_mapel = htmlspecialchars($data['nama_mapel']);

        mysqli_begin_transaction($conn);

        $query = "INSERT INTO mapel VALUES('', '$kode_mapel', '$nama_mapel')";
        mysqli_query($conn, $query);
        $mysqli_affected_rows = mysqli_affected_rows($conn);

        if($mysqli_affected_rows > 0) {
            mysqli_commit($conn);
        } else {
            mysqli_rollback($conn);
        }

        return $mysqli_affected_rows;
    }

    function editMapel($data) {
        global $conn;
        $id_mapel = $data['id_mapel'];
        $kode_mapel = htmlspecialchars($data['kode_mapel']);
        $nama_mapel = htmlspecialchars($data['nama_mapel']);

        mysqli_begin_transaction($conn);

        $query = "UPDATE mapel SET 
                kode_mapel = '$kode_mapel',
                nama_mapel = '$nama_mapel'
                WHERE id_mapel = '$id_mapel'";
        mysqli_query($conn, $query);
        $mysqli_affected_rows = mysqli_affected_rows($conn);

        if($mysqli_affected_rows > 0) {
            mysqli_commit($conn);
        } else {
            mysqli_rollback($conn);
        }

        return $mysqli_affected_rows;
    }

    function hapusMapel($id_mapel) {
        global $conn;

        mysqli_begin_transaction($conn);

        mysqli_query($conn, "DELETE FROM mapel WHERE id_mapel = '$id_mapel'");
        $mysqli_affected_rows = mysqli_affected_rows($conn);

        if($mysqli_affected_rows > 0) {
            mysqli_commit($conn);
        } else {
            mysqli_rollback($conn);
        }

        return $mysqli_affected_rows;
    }
?>