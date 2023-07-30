<?php
session_start(); // Start the session first

require_once('app.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $conn->query("DELETE FROM kelas WHERE id = '$id'");
    $status = 'Hapus kelas berhasil';
    $_SESSION['status'] = $status;

    header('Location: ../walikelas/kelola-kelas.php');
    exit;
}