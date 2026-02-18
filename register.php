<?php
include "db.php";

$error = "";

if (isset($_POST["register"])) {
    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    if (strlen($username) < 3) {
        $error = "Username must be at least 3 characters.";
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters.";
    } else {
        // Check if username already exists
        $check = $conn->prepare("SELECT id FROM users WHERE username=?");
        $check->bind_param("s", $username);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $error = "Username already taken. Please choose another.";
        } else {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $hashed);
            if ($stmt->execute()) {
                header("Location: index.php?registered=1");
                exit();
            } else {
                $error = "Registration failed. Please try again.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register – TaskFlow</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="auth-page">

    <div class="auth-card">
        <a href="landing.php" class="brand-link">Task<span>Flow</span></a>
        <h2>Create Account</h2>
        <p class="subtitle">Get started for free — no card needed</p>

        <form method="POST">
            <input type="text" name="username" required placeholder="Username (min. 3 chars)" autocomplete="username">
            <input type="password" name="password" required placeholder="Password (min. 6 chars)"
                autocomplete="new-password">
            <button type="submit" name="register">Create Account</button>
        </form>

        <?php if ($error): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <p class="auth-link">
            Already have an account?
            <a href="index.php">Log In</a>
        </p>
    </div>

</body>

</html>