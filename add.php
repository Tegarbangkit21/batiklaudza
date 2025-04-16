<?php
require_once 'includes/auth.php';
require_once 'includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jenis_barang = $_POST['jenis_barang'];
    $harga_satuan = (int)str_replace(['Rp', '.', ' ', ','], '', $_POST['harga_satuan']);
    $jumlah_barang = $_POST['jumlah_barang'];
    $tanggal_keluar = $_POST['tanggal_keluar'];

    // Validasi harga
    if($harga_satuan <= 0) {
        $error = "Harga harus lebih dari 0";
    } else {
        $stmt = $conn->prepare("INSERT INTO penjualan (jenis_barang, harga_satuan, jumlah_barang, tanggal_keluar) VALUES (?, ?, ?, ?)");
        $stmt->execute([$jenis_barang, $harga_satuan, $jumlah_barang, $tanggal_keluar]);
        redirect('dashboard.php');
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data - Laudza Batik</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
</head>
<body>
    <header>
        <div class="container">
            <h1>Tambah Data Penjualan</h1>
            <a href="dashboard.php" class="btn btn-back">Kembali</a>
        </div>
    </header>

    <main class="container">
        <?php if(isset($error)): ?>
            <div class="alert alert-error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form method="POST" class="form-container">
            <div class="form-group">
                <label for="jenis_barang">Jenis Barang</label>
                <input type="text" id="jenis_barang" name="jenis_barang" required>
            </div>
            <div class="form-group">
                <label for="harga_satuan">Harga Satuan</label>
                <div class="input-wrapper">
                    <span class="prefix-inside">Rp</span>
                    <input type="text" id="harga_satuan" name="harga_satuan" class="rupiah-input" required>
                </div>
                </div>

            <div class="form-group">
                <label for="jumlah_barang">Jumlah Barang</label>
                <input type="number" id="jumlah_barang" name="jumlah_barang" min="1" required>
            </div>
            <div class="form-group">
                <label for="tanggal_keluar">Tanggal Keluar</label>
                <input type="date" id="tanggal_keluar" name="tanggal_keluar" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </main>

    <script>
        // Format input harga sebagai Rupiah dengan konfigurasi lengkap
        new Cleave('.rupiah-input', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand',
            numeralDecimalScale: 0, // Tidak ada desimal
            numeralIntegerScale: 12, // Maksimal 12 digit (triliunan)
            prefix: '',
            noImmediatePrefix: true,
            rawValueTrimPrefix: true,
            onValueChanged: function(e) {
                // Untuk debugging
                console.log('Nilai input:', e.target.value);
                console.log('Nilai raw:', e.target.rawValue);
            }
        });

        // Validasi sebelum submit
        document.querySelector('form').addEventListener('submit', function(e) {
            const hargaInput = document.getElementById('harga_satuan');
            const numericValue = hargaInput.value.replace(/[^0-9]/g, '');
            
            if(!numericValue || parseInt(numericValue) <= 0) {
                alert('Harga tidak valid! Harus lebih dari 0');
                e.preventDefault();
                hargaInput.focus();
            }
        });
    </script>
</body>
</html>