<?php
  $host = "localhost";
  $username = "root";
  $password = "";     
  $database = "undangan";

  $connection = new mysqli($host,$username,$password,$database);

  if($connection->connect_error) {
    echo "Koneksi gagal :(";
  }

include 'koneksi.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = @$_POST['nama'];
    $ucapan = @$_POST['ucapan'];
    $keterangan = @$_POST['keterangan'];

    $sql = "INSERT INTO bukutamu (nama,ucapan,keterangan) VALUES ('$nama','$ucapan','$keterangan')";
    $connection->query($sql);

    header("Location:http://localhost/tugas-undangan-Geyzhakey/index.php");
}
$SQL2 = "SELECT * FROM bukutamu ORDER BY id DESC";
$Hasil = $connection->query($SQL2);