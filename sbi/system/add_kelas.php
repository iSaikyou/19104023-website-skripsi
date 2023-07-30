<?php
session_start(); // Start the session first

require_once('app.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama_kelas = $_POST['nama_kelas'];
    $bagian = $_POST['bagian'];
    $tanggal = date('Y-m-d');
    $conn->query("INSERT INTO kelas (nama_kelas, bagian, tanggal) VALUES ('$nama_kelas', '$bagian', '$tanggal')");
    $status = 'Tambah kelas berhasil';
    $_SESSION['status'] = $status;

    header('Location: ../walikelas/tambah-kelas.php');
    exit;
}
?>
