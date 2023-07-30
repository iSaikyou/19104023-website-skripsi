<?php
session_start(); // Start the session first

require_once('app.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $conn->query("DELETE FROM siswa WHERE id_siswa = '$id'");
    $status = 'Hapus siswa berhasil';
    $_SESSION['status'] = $status;

    header('Location: ../walikelas/kelola-siswa.php');
    exit;
}
?>