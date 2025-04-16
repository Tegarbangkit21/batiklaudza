<?php 
require_once 'includes/auth.php';
require_once 'includes/functions.php';

// Ambil data penjualan
$stmt = $conn->query("SELECT * FROM penjualan ORDER BY tanggal_keluar DESC");
$penjualan = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Hitung total keseluruhan
$total_keseluruhan = 0;
foreach ($penjualan as $item) {
    $total_keseluruhan += $item['harga_satuan'] * $item['jumlah_barang'];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Laudza Batik</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>
</head>
<body>
    <header>
        <div class="container">
            <h1>Dashboard Admin</h1>
            <a href="logout.php" class="btn btn-logout">Logout</a>
        </div>
    </header>

    <main class="container">
        <div class="admin-actions">
            <a href="add.php" class="btn btn-primary">Tambah Data</a>
            <button id="print-pdf" class="btn btn-secondary">Cetak ke PDF</button>
        </div>

        <div class="table-responsive">
            <table id="sales-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Barang</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah Barang</th>
                        <th>Tanggal Keluar</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($penjualan as $index => $item): 
                        $total_harga = $item['harga_satuan'] * $item['jumlah_barang'];
                    ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td><?php echo htmlspecialchars($item['jenis_barang']); ?></td>
                        <td><?php echo formatRupiah($item['harga_satuan']); ?></td>
                        <td><?php echo $item['jumlah_barang']; ?></td>
                        <td><?php echo date('d/m/Y', strtotime($item['tanggal_keluar'])); ?></td>
                        <td><?php echo formatRupiah($total_harga); ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $item['id']; ?>" class="btn btn-edit">Edit</a>
                            <a href="delete.php?id=<?php echo $item['id']; ?>" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <!-- Baris Total -->
                    <tr class="total-row">
                        <td colspan="5" style="text-align: right;"><strong>Total Keseluruhan</strong></td>
                        <td><strong><?php echo formatRupiah($total_keseluruhan); ?></strong></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>