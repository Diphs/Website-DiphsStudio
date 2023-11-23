<?php
    $output = shell_exec('python3 removebg.py');
    echo "<pre>$output</pre>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>DiphsStudio</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="container nav-wrapper">
                <div class="menu-wrapper">
                    <ul class="menu">
                        <li class="menu-item"><a href="guide.php" class="menu-link">Cara penggunaan</a></li>
                        <li class="menu-item"><a href="about.php" class="menu-link">Tentang</a></li>
                        <li class="menu-item"><a href="contact.php" class="menu-link">Kontak</a></li>
                    </ul>
                </div>
                <div class="menu-toggle bx bxs-grid-alt">
            </div>
            <a href="index.php" class="logo">Diphs<span>Studio</span></a>
        </nav>
    </header>

    <div class="home">
        <div class="up-img">
            <div class="drag-area" id="dragArea">
                <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                    <div class='iconcam bx bxs-camera'></div>
                    <button onclick="uploadFile()">Unggah Gambar</button>
                    <p>Atau seret gambar ke sini</p>
                <input type="file" name="file" id="file" accept="image/*" hidden onchange="handleFile()">
            </div>

            <div class="no-img">
                <div class="label-noimg">
                    <p class="label-asknoimg">Tidak ada gambar?</p>
                    <p class="label-tryimg">Coba contoh berikut:</p>
                </div>
                <div class="sample-img">
                    <div class="sample-img1" onclick="sendSampleImage('sample-mobil.jpg')">
                        <img src="assets/gambar/sample-mobil.jpg" alt="">
                    </div>
                    <div class="sample-img2" onclick="sendSampleImage('sample-orang.jpg')">
                        <img src="assets/gambar/sample-orang.jpg" alt="">
                    </div>
                    <div class="sample-img3" onclick="sendSampleImage('sample-hewan.jpg')">
                        <img src="assets/gambar/sample-hewan.jpg" alt="">
                    </div>
                    <div class="sample-img4" onclick="sendSampleImage('sample-sepatu.jpg')">
                        <img src="assets/gambar/sample-sepatu.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="label-banner">
            <div class="label-judul">
                <p><span>Penghapus</span> latar belakang yang cepat dan sederhana untuk semua orang</p>
            </div>

            <div class="main-banner">
                <img src="assets/gambar/main_banner 1.png" alt="">
            </div>
        </div>
    </div>

    <script src="assets/js/navbar.js"></script>
    <script src="assets/js/home.js"></script>
</body>
</html>