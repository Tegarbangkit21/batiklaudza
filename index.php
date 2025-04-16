<?php require_once 'includes/config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laudza Batik - Kain Batik Berkualitas</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Font Awesome (untuk icon IG, WA, Email) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- <style>
        body {
            background-image: url('assets/image/bg-image.jpg'); /* Ganti dengan path gambar yang diinginkan */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    </style> -->
</head> 
<body>
    
    <header>
        <div class="container">
            <h1>Laudza Batik</h1>
            <p class="subtitle">Kain Batik Berkualitas sejak 1985</p>
            <a href="login.php" class="btn btn-admin">Login</a>
        </div>
    </header>

    <main class="container">
        <section class="gallery">
            <h2>Koleksi Batik Kami</h2>
            <div class="products">
                <div class="product">
                    <img src="assets/batik_tulis.png"alt="Batik Tulis">
                    <h3>Batik Tulis</h3>
                    <p>Dibuat secara tradisional dengan tangan</p>
                </div>
                <div class="product">
                    <img src="assets/batik_tulis.png" alt="Batik Cap">
                    <h3>Batik Cap</h3>
                    <p>Motif indah dengan teknik cap</p>
                </div>
                <div class="product">
                    <img src="assets/batik_tulis.png" alt="Batik Kombinasi">
                    <h3>Batik Kombinasi</h3>
                    <p>Perpaduan tulis dan cap</p>
                </div>
                <div class="product">
                    <img src="assets/batik_tulis.png" alt="Batik Kombinasi">
                    <h3>Batik Kombinasi</h3>
                    <p>Perpaduan tulis dan cap</p>
                </div>
                <div class="product">
                    <img src="assets/batik_tulis.png" alt="Batik Kombinasi">
                    <h3>Batik Kombinasi</h3>
                    <p>Perpaduan tulis dan cap</p>
                </div>
                <div class="product">
                    <img src="assets/batik_tulis.png" alt="Batik Kombinasi">
                    <h3>Batik Kombinasi</h3>
                    <p>Perpaduan tulis dan cap</p>
                </div>
            </div>
        </section>
    </main>
    <section class="contact-us-full">
    <div class="container">
        <h2>Hubungi Kami</h2>
        <p>Silakan hubungi kami untuk pemesanan atau pertanyaan lebih lanjut.</p>
        <ul>
        <ul>
            <li><i class="fas fa-envelope"></i> Email: <a href="mailto:info@laudzabatik.com">info@laudzabatik.com</a></li>
            <li><i class="fab fa-whatsapp"></i> WhatsApp: <a href="https://wa.me/6281234567890" target="_blank">+62 812-3456-7890</a></li>
            <li><i class="fab fa-instagram"></i> Instagram: <a href="https://instagram.com/laudzabatik" target="_blank">@laudzabatik</a></li>
        </ul>
        <hr style="margin: 30px 0; border: 0; border-top: 1px solid #ddd;">
        <p class="copyright">&copy; <?php echo date('Y'); ?> Laudza Batik. All rights reserved.</p>
    </div>
    </section>
</body>
</html>