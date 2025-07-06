<?php
session_start();
require_once("database.php");

$errorMessage = "";

function authenticateUser($conn, $username, $password) {
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row["password"])) {
            return $row;
        }
    }
    return false;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = $_POST["password"];

    $user = authenticateUser($conn, $username, $password);

    if ($user) {
        $_SESSION["username"] = $user["username"];
        header("Location: homepage.php");
        exit();
    } else {
        $errorMessage = "Invalid username or password.";
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css"> <!-- Optional external CSS -->
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <?php if (!empty($errorMessage)) : ?>
            <div class="error"><?= htmlspecialchars($errorMessage) ?></div>
        <?php endif; ?>
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
            <label>Username:</label>
            <input type="text" name="username" required>

            <label>Password:</label>
            <input type="password" name="password" required>

            <input type="submit" value="Login">
            <a href="index.php"> Don't Have Account?</a>
        </form>
    </div>
</body>
</html>
