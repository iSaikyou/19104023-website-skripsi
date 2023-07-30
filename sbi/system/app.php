<?php
    $tabel = 'sbi';
    $user = 'root';
    $pass = '';

    $conn = new PDO('mysql:host=localhost;dbname='.$tabel, $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>