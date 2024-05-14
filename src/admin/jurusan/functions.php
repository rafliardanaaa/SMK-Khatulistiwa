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

    function tambahJurusan($data) {
        global $conn;
        $kode_jurusan = htmlspecialchars($data['kode_jurusan']);
        $nama_jurusan = htmlspecialchars($data['nama_jurusan']);

        $query = "INSERT INTO jurusan VALUES('', '$kode_jurusan', '$nama_jurusan')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function editJurusan($data) {
        global $conn;
        $id_jurusan = $data['id_jurusan'];
        $kode_jurusan = htmlspecialchars($data['kode_jurusan']);
        $nama_jurusan = htmlspecialchars($data['nama_jurusan']);

        $query = "UPDATE jurusan SET 
                kode_jurusan = '$kode_jurusan',
                nama_jurusan = '$nama_jurusan'
                WHERE id_jurusan = '$id_jurusan'";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function hapusJurusan($id_jurusan) {
        global $conn;

        mysqli_begin_transaction($conn);

        mysqli_query($conn, "DELETE FROM jurusan WHERE id_jurusan = '$id_jurusan'");
        $mysqli_affected_rows = mysqli_affected_rows($conn);

        if($mysqli_affected_rows > 0) {
            mysqli_commit($conn);
        } else {
            mysqli_rollback($conn);
        }

        return $mysqli_affected_rows;
    }
?>