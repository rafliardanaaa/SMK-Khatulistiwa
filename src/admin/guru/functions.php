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

    function tambahGuru($data) {
        global $conn;
        $nip = $data['nip'];
        $nama_guru = htmlspecialchars($data['nama_guru']);
        $jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
        $alamat = htmlspecialchars($data['alamat']);

        mysqli_begin_transaction($conn);

        $query = "INSERT INTO guru VALUES('', '$nip', '$nama_guru', '$jenis_kelamin', '$alamat')";
        mysqli_query($conn, $query);
        $mysqli_affected_rows = mysqli_affected_rows($conn);

        if($mysqli_affected_rows > 0) {
            mysqli_commit($conn);
        } else {
            mysqli_rollback($conn);
        }

        return $mysqli_affected_rows;
    }

    function editGuru($data) {
        global $conn;
        $nip = $data['nip'];
        $nama_guru = htmlspecialchars($data['nama_guru']);
        $jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
        $alamat = htmlspecialchars($data['alamat']);

        mysqli_begin_transaction($conn);

        $query = "UPDATE guru SET 
                nama_guru = '$nama_guru',
                jk = '$jenis_kelamin',
                alamat = '$alamat'
                WHERE nip = '$nip'";
        mysqli_query($conn, $query);
        $mysqli_affected_rows = mysqli_affected_rows($conn);

        if($mysqli_affected_rows > 0) {
            mysqli_commit($conn);
        } else {
            mysqli_rollback($conn);
        }

        return $mysqli_affected_rows;
    }

    function hapusGuru($nip) {
        global $conn;

        mysqli_begin_transaction($conn);

        mysqli_query($conn, "DELETE FROM guru WHERE nip = '$nip'");
        $mysqli_affected_rows = mysqli_affected_rows($conn);

        if($mysqli_affected_rows > 0) {
            mysqli_commit($conn);
        } else {
            mysqli_rollback($conn);
        }

        return $mysqli_affected_rows;
    }
?>