<?php

session_start(); // Mulai sesi

require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['user'];
    $password = $_POST['password'];
    $role = $_POST['role'] ?? '';

    if ($role === 'admin') {
        $query = "SELECT * FROM akun_admin WHERE username = '$user'";
    }
    
    elseif ($role === 'mahasiswa') {
        $query = "SELECT * FROM akun_mahasiswa WHERE nim = '$user'";
    }
    
    elseif ($role === 'approver') {
        $query = "SELECT * FROM akun_approver WHERE id_approver = '$user'";
    }
    
    else {
        echo "Peran tidak valid!";
        exit;
    }

    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        if ($password === $user['password']) { // Ganti dengan hashing jika perlu

            session_regenerate_id(true); // Regenerasi ID session untuk mencegah session hijacking

            session_start();  // Start session dengan nama yang sudah diubah

            $_SESSION['loggedin'] = true;
            $_SESSION['user'] = $user;
            $_SESSION['role'] = $role;
            $_SESSION['nim'] = $user['nim'];  // Simpan NIM ke session untuk Mahasiswa

            if ($role === 'admin') {
                header("Location: ../frontend/halaman-admin/list-mahasiswa.php");
            }
            
            elseif ($role === 'mahasiswa') {
                header("Location: ../frontend/halaman-mahasiswa/list-pengajuan.php");
            }
            
            elseif ($role === 'approver') {
                header("Location: ../frontend/halaman-approver/list-persetujuan.php");
            }

            exit;
        }
        
        else {
            echo "Password salah.";
        }
    }
    
    else {
        echo "User tidak ditemukan.";
    }
}

?>
