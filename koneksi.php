<?php
    //koneksi ke database
    $host = "localhost";
    $username = "root";
    $password = "";     
    $database = "undangan";

    $connection = new mysqli($host, $username, $password, $database);

    if ($connection->connect_error) {
        echo "koneksi gagal :(";
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nama = @$_POST['nama'];
        $ucapan = @$_POST['ucapan'];
        $keterangan = @$_POST['keterangan'];

        if ($nama != "" and $ucapan != "" and $keterangan != "") {
            var_dump($_POST);
        $sql = "INSERT INTO bukutamu (nama,ucapan,keterangan) VALUES ('$nama','$ucapan','$keterangan')";
        $connection->query($sql);
        }

        header("Location: http://localhost/php-ucapan");

    }
?>