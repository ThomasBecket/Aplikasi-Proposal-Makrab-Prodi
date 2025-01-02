<?php

// Mulai Session
session_start();

// Include koneksi database
require_once '../../backend/koneksi.php';

// Redirect ke halaman login jika belum login
if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'mahasiswa') {
    header("Location: ../../frontend/halaman-mahasiswa/index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>List Pengajuan</title>
    </head>

    <body>

        <!-- Sertakan header.php di sini -->
        <?php include('../../frontend/komponen/header.php'); ?>

        <a href="../../backend/fungsi-logout.php">Logout</a>

        <!-- Sertakan header.php di sini -->
        <?php include('../../frontend/komponen/footer.php'); ?>
        
    </body>

</html>