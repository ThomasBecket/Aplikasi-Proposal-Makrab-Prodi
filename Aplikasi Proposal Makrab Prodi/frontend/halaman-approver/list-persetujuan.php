<?php

// Mulai Session
session_start();

// Redirect ke halaman login jika belum login
if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'approver') {
    header("Location: ../../frontend/halaman-approver/index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>List Pengesahan</title>
    </head>

    <body>

        <a href="../../backend/fungsi-logout.php">Logout</a>
        
    </body>

</html>