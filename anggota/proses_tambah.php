<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: tambah.php');
    exit;
}

$no_anggota = trim($_POST['no_anggota'] ?? '');
$nama       = trim($_POST['nama'] ?? '');
$email      = trim($_POST['email'] ?? '');

if (empty($no_anggota) || empty($nama) || empty($email)) {
    $_SESSION['flash'] = [
        'type' => 'error',
        'pesan' => 'Semua bidang wajib diisi!'
    ];
    header('Location: tambah.php');
    exit;
}

$_SESSION['anggota'][] = [
    'no_anggota' => $no_anggota,
    'nama'       => $nama,
    'email'      => $email
];

$_SESSION['flash'] = [
    'type' => 'success',
    'pesan' => 'Anggota berhasil ditambahkan.'
];

header('Location: list.php');
exit;