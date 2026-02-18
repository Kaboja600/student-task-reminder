<?php
include "db.php";

if (isset($_POST["login"])) {
    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user_id"]  = $user["id"];
        $_SESSION["username"] = $user["username"];
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Wrong username or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login – TaskFlow</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="auth-page">

    <div class="auth-card">
        <a href="landing.php" class="brand-link">Task<span>Flow</span></a>
        <h2>Welcome Back</h2>
        <p class="subtitle">Log in to your account</p>

        <form method="POST">
            <input type="text" name="username" placeholder="Username" required autocomplete="username">
            <input type="password" name="password" placeholder="Password" required autocomplete="current-password">
            <button type="submit" name="login">Log In</button>
        </form>

        <?php if (isset($error)): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <p class="auth-link">
            Don't have an account?
            <a href="register.php">Create one</a>
        </p>
    </div>

</body>

</html>