<?php
$conn = new mysqli("localhost", "root", "", "task_app");
if ($conn->connect_error) {
    die("Database connection failed.");
}
session_start();