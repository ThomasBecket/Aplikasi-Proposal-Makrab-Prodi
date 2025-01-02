<?php

// Memasukkan koneksi ke database
require_once '../../backend/koneksi.php';

// Mengambil data dari tabel header
$query = "SELECT logo, nama_web, informasi_web, alamat_lokasi FROM header LIMIT 1";
$result = mysqli_query($koneksi, $query);

// Cek jika query gagal
if (!$result) {
    die("Query gagal: " . mysqli_error($koneksi));
}

// Menyimpan data dari hasil query
$header = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Header</title>

        <style>

            header {
                width: 100%;
                height: auto;
                background-color: pink;
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 10px 15px;
                box-sizing: border-box;
            }

            .header-left {
                display: flex;
                align-items: center;
            }

            .header-left img {
                height: 100px;
                margin-right: 10px;
            }

            .header-left h3 {
                font-size: 1.5rem;
                margin: 0;
            }

            .header-left p {
                margin: 2px 0;
                font-size: 1rem;
                color: #666;
            }

        </style>

    </head>

    <body>

        <header>

            <div class="header-left">

                <!-- Logo -->
                <?php if ($header && $header['logo']) : ?>
                    <img src="data:image/png;base64,<?= base64_encode($header['logo']) ?>" alt="Logo">
                <?php endif; ?>

                <div>
                    <!-- Nama, Informasi, Alamat Lokasi Web -->
                    <h3><?= htmlspecialchars($header['nama_web']) ?></h3>
                    <p><?= htmlspecialchars($header['informasi_web']) ?></p>
                    <p><?= htmlspecialchars($header['alamat_lokasi']) ?></p>
                </div>

            </div>

        </header>

    </body>

</html>
