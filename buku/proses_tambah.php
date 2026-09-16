<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: tambah.php');
    exit;
}

$judul     = trim($_POST['judul'] ?? '');
$pengarang = trim($_POST['pengarang'] ?? '');
$tahun     = $_POST['tahun'] ?? '';
$stok      = $_POST['stok'] ?? '';

if (empty($judul) || empty($pengarang) || !is_numeric($tahun) || !is_numeric($stok)) {
    $_SESSION['flash'] = [
        'type' => 'error',
        'pesan' => 'Semua bidang wajib diisi dengan benar!'
    ];
    header('Location: tambah.php');
    exit;
}

$_SESSION['buku'][] = [
    'judul'     => $judul,
    'pengarang' => $pengarang,
    'tahun'     => (int) $tahun,
    'stok'      => (int) $stok
];

$_SESSION['flash'] = [
    'type' => 'success',
    'pesan' => 'Buku berhasil ditambahkan.'
];

header('Location: list.php');
exit;