<?php
include "db.php";
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}

$error = "";
$success = "";

// ADD TASK
if (isset($_POST["add"])) {
    $task = trim($_POST["task"]);
    $date = $_POST["date"];
    $time = $_POST["time"];
    $uid  = $_SESSION["user_id"];

    if ($task === "" || $date === "" || $time === "") {
        $error = "Please fill in all fields.";
    } else {
        $stmt = $conn->prepare(
            "INSERT INTO tasks (user_id, task, task_date, task_time) VALUES (?, ?, ?, ?)"
        );
        $stmt->bind_param("isss", $uid, $task, $date, $time);
        if ($stmt->execute()) {
            $success = "Task added successfully!";
        } else {
            $error = "Failed to add task. Please try again.";
        }
    }
}

// ARCHIVE TASK — fixed: use prepared statement (no SQL injection)
if (isset($_GET["archive"])) {
    $id  = (int)$_GET["archive"];
    $uid = (int)$_SESSION["user_id"];
    $stmt = $conn->prepare("UPDATE tasks SET is_archived=1 WHERE id=? AND user_id=?");
    $stmt->bind_param("ii", $id, $uid);
    $stmt->execute();
    header("Location: dashboard.php");
    exit();
}

// FETCH ACTIVE TASKS
$uid  = (int)$_SESSION["user_id"];
$stmt = $conn->prepare("SELECT * FROM tasks WHERE user_id=? AND is_archived=0 ORDER BY task_date ASC, task_time ASC");
$stmt->bind_param("i", $uid);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard – TaskFlow</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="auth-page">

    <div class="dashboard-card">

        <div class="top-bar">
            <h2>Hello, <?= htmlspecialchars($_SESSION["username"]) ?> 👋</h2>
            <a class="logout-btn" href="logout.php">Logout</a>
        </div>

        <form method="POST" class="task-form">
            <input name="task" placeholder="Enter task..." required>
            <input type="date" name="date" required>
            <input type="time" name="time" required>
            <button name="add" type="submit">+ Add Task</button>
        </form>

        <?php if ($error):   ?><div class="error"><?= htmlspecialchars($error) ?></div><?php endif; ?>
        <?php if ($success): ?><div class="success"><?= htmlspecialchars($success) ?></div><?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $rows = $result->fetch_all(MYSQLI_ASSOC);
                if (empty($rows)):
                ?>
                <tr>
                    <td colspan="4" class="empty-state">No tasks yet. Add one above! 🎯</td>
                </tr>
                <?php else: foreach ($rows as $row): ?>
                <tr>
                    <td data-label="Task"><?= htmlspecialchars($row["task"]) ?></td>
                    <td data-label="Date"><?= htmlspecialchars($row["task_date"]) ?></td>
                    <td data-label="Time"><?= htmlspecialchars($row["task_time"]) ?></td>
                    <td data-label="Action">
                        <a class="archive-btn" href="?archive=<?= (int)$row["id"] ?>">Archive</a>
                    </td>
                </tr>
                <?php endforeach; endif; ?>
            </tbody>
        </table>

    </div>

</body>

</html>