<?php
require_once 'includes/auth.php';
require_once 'includes/functions.php';

if (!isset($_GET['id'])) {
    redirect('dashboard.php');
}

$id = $_GET['id'];

// Hapus data
$stmt = $conn->prepare("DELETE FROM penjualan WHERE id = ?");
$stmt->execute([$id]);

redirect('dashboard.php');
?>