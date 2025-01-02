<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "aplikasi-proposal-makrab-prodi";

$koneksi = mysqli_connect($host, $user, $password, $database);

if (mysqli_connect_errno()) {
    echo "Gagal tersambung ke Database", mysqli_connect_error();
}

else {
    echo "<script> console.log('Berhasil tersambung ke Database: $database') </script>";
}

?>