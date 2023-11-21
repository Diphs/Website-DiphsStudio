<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>DiphsStudio - Kontak</title>
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

    <div class="container-contact">
        <div class="img-contact">
            <img src="assets/gambar/undraw_personal_email_re_4lx7 1.png" alt="">
        </div>
        <div class="email-contact">
            <div class="form-email">
                <form action="" autocomplete="off">
                    <h2>Hubungi Kami :</h2>
                    <div class="input-container">
                        <label for="">Nama</label>
                        <input type="text" name="name" class="input" placeholder="Masukkan Namamu" required>
                    </div>
                    <div class="input-container">
                        <label for="">Email</label>
                        <input type="email" name="email" class="input" placeholder="Masukkan Email" required>
                    </div>
                    <div class="input-container textarea">
                        <label for="">Pesan</label>
                        <textarea name="message" class="input" placeholder="Masukkan Pesan" required></textarea>
                    </div>
                    <input type="submit" value="Kirim" class="btn">
                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/navbar.js"></script>
</body>
</html>