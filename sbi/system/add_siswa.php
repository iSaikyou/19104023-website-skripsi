<?php
session_start(); // Start the session first

require_once('app.php');

if (isset($_POST['submit'])) {
    $id_siswa = $_POST['id_siswa'];
    $nama_siswa = $_POST['nama_siswa'];
    $email_siswa = $_POST['email_siswa'];
    $kelas_siswa = $_POST['kelas_siswa'];
    $jk = $_POST['jk'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $nama_ayah = $_POST['nama_ayah'];
    $nama_ibu = $_POST['nama_ibu'];
    $no_hp = $_POST['no_hp'];
    $hp_alternatif = $_POST['hp_alternatif'];
    $alamat = $_POST['alamat'];
    $update_at = date("Y-m-d");
    $foto = $_FILES['foto_siswa']['name'];
    $tmp = $_FILES['foto_siswa']['tmp_name'];
    $path = "../assets/img".$foto;
    if (move_uploaded_file($tmp, $path)) {
        $sql = "INSERT INTO siswa (id_siswa, nama_siswa, email_siswa, kelas_siswa, jk, tgl_lahir, nama_ayah, nama_ibu, no_hp, hp_alternatif, alamat,update_at, foto_siswa) VALUES ('$id_siswa', '$nama_siswa', '$email_siswa', '$kelas_siswa', '$jk', '$tgl_lahir', '$nama_ayah', '$nama_ibu', '$no_hp', '$hp_alternatif', '$alamat','$update_at', '$foto')";
        $query = $conn->prepare($sql);
        $query->execute();
        header("location: ../walikelas/tambah-siswa.php");
    } else {
        echo "Gagal";
    }
}