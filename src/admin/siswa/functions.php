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

    function tambahSiswa($data) {
        global $conn;
        $nis = $data['nis'];
        $nama_siswa = htmlspecialchars($data['nama_siswa']);
        $jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
        $alamat = htmlspecialchars($data['alamat']);
        $id_kelas = $data['kelas'];
        $id_jurusan = $data['jurusan'];

        mysqli_begin_transaction($conn);

        $query = "INSERT INTO murid VALUES('$nis', '$nama_siswa', '$jenis_kelamin', '$alamat', '$id_kelas', '$id_jurusan')";
        mysqli_query($conn, $query);
        $mysqli_affected_rows = mysqli_affected_rows($conn);

        if($mysqli_affected_rows > 0) {
            mysqli_commit($conn);
        } else {
            mysqli_rollback($conn);
        }

        return $mysqli_affected_rows;
    }

    function editSiswa($data) {
        global $conn;
        $nis = $data['nis'];
        $nama_siswa = htmlspecialchars($data['nama_siswa']);
        $jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
        $alamat = htmlspecialchars($data['alamat']);
        $id_kelas = $data['kelas'];
        $id_jurusan = $data['jurusan'];

        mysqli_begin_transaction($conn);

        $query = "UPDATE murid SET 
                nama_siswa = '$nama_siswa',
                jk = '$jenis_kelamin',
                alamat = '$alamat',
                id_kelas = '$id_kelas',
                id_jurusan = '$id_jurusan'
                WHERE nis = '$nis'";
        mysqli_query($conn, $query);
        $mysqli_affected_rows = mysqli_affected_rows($conn);

        if($mysqli_affected_rows > 0) {
            mysqli_commit($conn);
        } else {
            mysqli_rollback($conn);
        }

        return $mysqli_affected_rows;
    }

    function hapusSiswa($nis) {
        global $conn;

        mysqli_begin_transaction($conn);

        mysqli_query($conn, "DELETE FROM murid WHERE nis = '$nis'");
        $mysqli_affected_rows = mysqli_affected_rows($conn);

        if($mysqli_affected_rows > 0) {
            mysqli_commit($conn);
        } else {
            mysqli_rollback($conn);
        }

        return $mysqli_affected_rows;
    }

    function tambahJadwal($data) {
        global $conn;
        $id_guru = $data['guru'];
        $id_mapel = $data['mapel'];
        $id_jurusan = $data['jurusan'];
        $id_kelas = $data['kelas'];

        $query = "INSERT INTO mengajar VALUES('', '$id_guru', '$id_mapel', '$id_jurusan', '$id_kelas')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function editJadwal($data) {
        global $conn;
        $id_mengajar = $data['id_mengajar'];
        $id_guru = $data['guru'];
        $id_mapel = $data['mapel'];
        $id_jurusan = $data['jurusan'];
        $id_kelas = $data['kelas'];

        $query = "UPDATE mengajar SET 
                id_guru = '$id_guru',
                id_mapel = '$id_mapel',
                id_jurusan = '$id_jurusan',
                id_kelas = '$id_kelas'
                WHERE id_mengajar = '$id_mengajar'";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
?>