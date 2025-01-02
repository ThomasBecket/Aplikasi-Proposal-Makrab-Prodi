<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Approver</title>
    <link rel="stylesheet" href="css/login.css">

</head>

<body>

    <div class="login-container">
        
        <h2>Login</h2>

        <hr />
        <br />

        <form action="../../backend/fungsi-login.php" method="POST">

            <div class="input-group">
            <input type="hidden" name="role" value="approver">
                <label for="user">ID Approver</label>
                <input type="text" id="user" name="user" required>
            </div>
            
            <br />

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <br />

            <button type="submit" class="login-button">Login</button>

        </form>

    </div>

</body>

</html>
