<?php

// Mulai Session
session_start();

// Redirect ke halaman login jika belum login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../../frontend/halaman-mahasiswa/index.php");
    exit;
}

?>