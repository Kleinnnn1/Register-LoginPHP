<?php
include("database.php");

$errorMessage = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($username)) {
        $errorMessage = "Please enter username";
    } elseif (empty($password)) {
        $errorMessage = "Please enter password";
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $username, $hash);

        try {
            mysqli_stmt_execute($stmt);
            $successMessage = "You have successfully registered!";
        } catch (mysqli_sql_exception) {
            $errorMessage = "That username is taken";
        }
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="login-container">
        <h1>Register Account</h1>

        <?php if (!empty($errorMessage)) : ?>
            <div class="error"><?= htmlspecialchars($errorMessage) ?></div>
        <?php endif; ?>

        <?php if (!empty($successMessage)) : ?>
            <div class="success" style="color: green; text-align: center;"><?= htmlspecialchars($successMessage) ?></div>
        <?php endif; ?>

        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
            <label>Username:</label>
            <input type="text" name="username" required>

            <label>Password:</label>
            <input type="password" name="password" required>

            <input type="submit" name="submit" value="Register">
        </form>

        <a href="login.php">Already have an account?</a>
    </div>
</body>

</html>
