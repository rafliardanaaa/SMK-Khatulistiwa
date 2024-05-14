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

    function beriNilai($data) {
        global $conn;
        $id_kelas = $data['kelas'];
        $nis = $data['nis'];
        $id_jurusan = $data['jurusan'];
        $id_mapel = $data['mapel'];
        $id_guru = $data['guru'];
        $uh = $data['uh'];
        $uts = $data['uts'];
        $uas = $data['uas'];
        $na = (($uh + $uts + $uas) / 3);

        mysqli_begin_transaction($conn);

        $query = "INSERT INTO nilai VALUES('', '$id_kelas', '$nis', '$id_jurusan', '$id_mapel', '$id_guru', '$uh', '$uts', '$uas', '$na')";
        mysqli_query($conn, $query);
        $mysqli_affected_rows = mysqli_affected_rows($conn);

        if($mysqli_affected_rows > 0) {
            mysqli_commit($conn);
        } else {
            mysqli_rollback($conn);
        }

        return $mysqli_affected_rows;
    }
?>