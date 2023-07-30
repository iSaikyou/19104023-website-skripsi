<?php
session_start(); // Start the session first

require_once('app.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $conn->query("DELETE FROM pengumuman WHERE id = '$id'");
    $status = 'Hapus pengumuman berhasil';
    $_SESSION['status'] = $status;

    header('Location: ../walikelas/pengumuman.php');
    exit;
}
?>