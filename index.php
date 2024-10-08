<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Undangan Pernikahan</title>
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Grey+Qo&display=swap" rel="stylesheet">

</head>
<body>
    <div class="container">
        <header>
            <h1 class="grey-qo-regular">undangan Pernikahan digital</h1>
            <h2 class="grey-qo-regular">Asuna & riri</h2>
            <p>Dengan penuh rasa syukur, kami mengundang Anda untuk hadir dalam acara pernikahan kami</p>
            <div class="carousel">
                <div class="carousel-inner">
                    <img src="1.jpg" alt="image 1" class="active">
                    <img src="2.jpg" alt="image 2">
                    <img src="3.jpg" alt="image 3">
                </div>
                <button class="prev">prev</button>
                <button class="next">next</button>
            </div>
        <section class="details">
            <h2 class="tulis">tempat Nikah</h2>
            <p><strong style="color: black;">Tanggal:</strong> 20 Agustus 2024</p>
            <p><strong style="color: black;">Waktu:</strong> 09:00 WIB</p>
            <p><strong style="color: black;">Tempat:</strong> Masjid Al-Hikmah, Jl. cendana No. 100, Samarinda</p>
        </section>
        <section class="details">
            <h2 class="tulis">Resepsi</h2>
            <p><strong style="color: black;">Tanggal:</strong> 21 Agustus 2024</p>
            <p><strong style="color: black;">Waktu:</strong> 18:00 WIB</p>
            <p><strong style="color: black;">Tempat:</strong> Hotel Grand, Jl. cendana No. 100, Samarinda</p>
        </section>
            
        <iframe width="425" height="350" src="https://www.openstreetmap.org/export/embed.html?bbox=117.11165070533754%2C-0.5064802964118255%2C117.12441802024843%2C-0.49922788256245365&amp;layer=hot" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/#map=17/-0.50285/117.11803&amp;layers=H">lokasi pernikahan</a></small>
        
        </header>
        <section class="rsvp">
            <div class="center">
            <h2 class="tulis">Konfirmasi Kehadiran</h2>
            <p>Silakan konfirmasi kehadiran Anda dengan mengisi form berikut</p>
            <form method="POST" action="insert.php" id="rsvp">
                <label style="font-weight:bold;">Nama:  </label>
                <input type="text" id="name" name="nama" placeholder="masukkan nama" required style="height: 20px;">
                <label style="font-weight: bold;">Ucapan: </label>
                <textarea name="ucapan" cols="30" rows="4" placeholder="ucapan" required></textarea>
                <label style="font-weight: bold;">konfirmasi kehadiran</label>
            <select name="keterangan" style="display: block;" required>
                <option value="0" selected disabled hidden required>Konfirmasi kehadiran</option>
                <option value="1">Ya </option>    
                <option value="2">Tidak hadir </option>
                <option value="3">Tidak tau </option>
            </select>
                <button type="submit" id="button">Kirim</button>
        </section>
            </form>
            <?php 
            $host = "localhost";
            $username = "root";
            $password = "";     
            $database = "undangan";

            $connection = new mysqli($host, $username, $password, $database);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nama = @$_POST['nama'];
                $ucapan = @$_POST['ucapan'];
                $keterangan = @$_POST['keterangan'];

            $sql = "INSERT INTO bukutamu ( nama, ucapan, keterangan ) VALUES ('$nama','$ucapan','$keterangan')";

            if ($connection->query($sql) === TRUE) {
                echo "Data berhasil dikirim.<br>";
            } else {
                echo "Error: " . $sql . "<br>" . $connection->error;
            }
        
        }

        $SQL2 = "SELECT * FROM bukutamu ORDER BY id DESC";
        $hasil = $connection->query($SQL2);
            
        ?>

        <div style="margin:auto; text-align:center; height: 200px; width: 200px; overflow:scroll">

        <?php

        while ($baris = $hasil->fetch_row()) {
        
        ?>
        <div style="border-style:solid; border-color:black; margin: 5px; padding: 5px; ">
            <p>nama:<?= $baris[1] ?></p>
            <p>ucapan:<?= $baris[2] ?></p>
            <p>keterangan:<?= $baris[3] ?></p>
        </div>
        <?php   
        }
        $hasil->free_result();
        $connection->close();
        ?>

            <p id="response-message"></p>
    </div> 
            </div>
    <script src="index.js"></script>
    <div class="music">
    <audio controls>    
        <source src="usagi.ogg" type="audio/ogg" />
        <source src="usagi.mp3" type="audio/mp3" />
        <source src="usagi.wav" type="audio/wav" />
      </audio>
    </div>
</body>
</html>
