<?php
require_once 'includes/auth.php';
require_once 'includes/functions.php';

if (!isset($_GET['id'])) {
    redirect('dashboard.php');
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM penjualan WHERE id = ?");
$stmt->execute([$id]);
$data = $stmt->fetch();

if (!$data) {
    redirect('dashboard.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jenis_barang = $_POST['jenis_barang'];
    $harga_satuan = str_replace(['Rp', '.', ' '], '', $_POST['harga_satuan']);
    $jumlah_barang = $_POST['jumlah_barang'];
    $tanggal_keluar = $_POST['tanggal_keluar'];

    $stmt = $conn->prepare("UPDATE penjualan SET jenis_barang = ?, harga_satuan = ?, jumlah_barang = ?, tanggal_keluar = ? WHERE id = ?");
    $stmt->execute([$jenis_barang, $harga_satuan, $jumlah_barang, $tanggal_keluar, $id]);

    redirect('dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data - Laudza Batik</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Gunakan salah satu dari ini -->
    <link rel="stylesheet" href="../assets/css/style.css"> <!-- Jika folder assets sejajar dengan includes -->
    <!-- ATAU -->
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Jika file ada di root -->
    <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
</head>
<body>
    <header>
        <div class="container">
            <h1>Edit Data Penjualan</h1>
            <a href="dashboard.php" class="btn btn-back">Kembali</a>
        </div>
    </header>

    <main class="container">
        <form method="POST" class="form-container">
            <div class="form-group">
                <label for="jenis_barang">Jenis Barang</label>
                <input type="text" id="jenis_barang" name="jenis_barang" value="<?php echo htmlspecialchars($data['jenis_barang']); ?>" required>
            </div>
            <div class="form-group">
                <label for="harga_satuan">Harga Satuan</label>
                <input type="text" id="harga_satuan" name="harga_satuan" 
                onkeydown="return allowOnlyNumbers(event)" 
                oninput="formatRupiah(this)" required>
            </div>
            <div class="form-group">
                <label for="jumlah_barang">Jumlah Barang</label>
                <input type="number" id="jumlah_barang" name="jumlah_barang" min="1" value="<?php echo $data['jumlah_barang']; ?>" required>
            </div>
            <div class="form-group">
                <label for="tanggal_keluar">Tanggal Keluar</label>
                <input type="date" id="tanggal_keluar" name="tanggal_keluar" value="<?php echo $data['tanggal_keluar']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </main>

    <script>
        // Format input harga sebagai Rupiah
        new Cleave('.rupiah-input', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand',
            prefix: 'Rp ',
            noImmediatePrefix: true,
            rawValueTrimPrefix: true
        });
    </script>
</body>
</html>