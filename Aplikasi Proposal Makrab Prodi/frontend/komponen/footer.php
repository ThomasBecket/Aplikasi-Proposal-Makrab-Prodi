<?php

// Memasukkan koneksi ke database
require_once '../../backend/koneksi.php';

// Memulai sesi untuk mendapatkan informasi login
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Mengambil data mahasiswa jika sudah login
$mahasiswa = null;
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {

    // Mengambil data mahasiswa berdasarkan NIM yang tersimpan dalam session
    if (isset($_SESSION['nim'])) {
        $nim = $_SESSION['nim']; // Pastikan nim disimpan dalam session saat login

        // Query untuk mengambil informasi sosial media mahasiswa berdasarkan nim
        $info_mahasiswa = "
            SELECT i.akun_x, i.akun_facebook, i.akun_instagram, i.nama_mahasiswa
            FROM info_mahasiswa AS i
            INNER JOIN akun_mahasiswa a ON a.nim = i.nim
            WHERE i.nim = '$nim'
        ";
        
        $result_mahasiswa = mysqli_query($koneksi, $info_mahasiswa);

        // Memastikan query berhasil
        if ($result_mahasiswa && mysqli_num_rows($result_mahasiswa) > 0) {
            $mahasiswa = mysqli_fetch_assoc($result_mahasiswa);
        }
        
        else {
            // Jika data mahasiswa tidak ditemukan
            $mahasiswa = null;
        }

    }
}

// Mengambil data dari tabel footer
$query_footer = "SELECT nama_web, informasi_web, copyright FROM footer LIMIT 1";
$result_footer = mysqli_query($koneksi, $query_footer);

// Memastikan query berhasil
if ($result_footer && mysqli_num_rows($result_footer) > 0) {
    $footer = mysqli_fetch_assoc($result_footer);
}

else {
    $footer = null;  // Menangani jika data footer tidak ditemukan
}

?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Footer</title>

        <style>

            footer {
                width: 100%;
                background-color: lightgray;
                padding: 5px 10px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                flex-wrap: wrap;
                box-sizing: border-box;
            }

            .footer-left, .footer-center, .footer-right {
                flex: 1;
                text-align: center;
                padding: 5px;
            }

            .footer-left {
                text-align: left;
            }

            .footer-right {
                text-align: right;
            }

            .footer-center p {
                margin: 5px 0;
                font-size: 0.9rem;
                color: #333;
            }

        </style>

    </head>

    <body>

        <footer>

            <!-- Left: Info Akun -->
            <div class="footer-left">
                <?php if ($mahasiswa): ?>
                    <p>Twitter: <a href="https://x.com/<?= htmlspecialchars($mahasiswa['akun_x']) ?>" target="_blank">@<?= htmlspecialchars($mahasiswa['akun_x']) ?></a></p>
                    <p>Facebook: <a href="https://facebook.com/<?= htmlspecialchars($mahasiswa['akun_facebook']) ?>" target="_blank">@<?= htmlspecialchars($mahasiswa['akun_facebook']) ?></a></p>
                    <p>Instagram: <a href="https://instagram.com/<?= htmlspecialchars($mahasiswa['akun_instagram']) ?>" target="_blank">@<?= htmlspecialchars($mahasiswa['akun_instagram']) ?></a></p>
                <?php else: ?>
                    <p>Informasi sosial media tidak tersedia.</p>
                <?php endif; ?>
            </div>

            <!-- Center: Copyright -->
            <div class="footer-center">
                <h><b><?= htmlspecialchars($footer['copyright'] ?? 'No copyright info available') ?></b></p>
            </div>

            <!-- Right: Nama Web -->
            <div class="footer-right">
                <h3><?= htmlspecialchars($footer['nama_web'] ?? 'Nama Web') ?></h3>
                <p><?= htmlspecialchars($footer['informasi_web'] ?? 'Informasi Web tidak tersedia') ?></p>
            </div>

        </footer>

    </body>

</html>

