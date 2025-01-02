<?php

// Mulai session jika belum dimulai
session_start();

// Mengganti ID session untuk menghindari sesi lama
session_regenerate_id(true);

// Periksa role pengguna yang sedang logout
if (isset($_SESSION['role'])) {

    if ($_SESSION['role'] === 'admin') {
        // Hapus data admin dari session
        unset($_SESSION['admin']);
    }
    
    elseif ($_SESSION['role'] === 'mahasiswa') {
        // Hapus data mahasiswa dari session
        unset($_SESSION['mahasiswa']);
    }
    
    elseif ($_SESSION['role'] === 'approver') {
        // Hapus data approver dari session
        unset($_SESSION['approver']);
    }
}

// Redirect ke halaman login yang sesuai dengan role
if (isset($_SESSION['role'])) {

    if ($_SESSION['role'] === 'admin') {
        header("Location: ../frontend/halaman-admin/index.php");  // Halaman login admin
    }
    
    elseif ($_SESSION['role'] === 'mahasiswa') {
        header("Location: ../frontend/halaman-mahasiswa/index.php");  // Halaman login mahasiswa
    }
    
    elseif ($_SESSION['role'] === 'approver') {
        header("Location: ../frontend/halaman-approver/index.php");  // Halaman login approver
    }

}

// Hancurkan session
session_destroy();

exit;

?>
