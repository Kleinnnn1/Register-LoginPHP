<?php 
    session_start();
    if (!isset($_SESSION["username"])) {
        header("Location: login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS -->
</head>
<body>

    <div class="login-container">
        <h1>Welcome, <?= htmlspecialchars($_SESSION["username"]) ?>!</h1>
        <p style="text-align: center; font-size: 16px;">You are successfully logged in.</p>

        <div style="text-align: center; margin-top: 30px;">
            <a href="logout.php" class="logout-button">Logout</a>
        </div>
    </div>

</body>
</html>
