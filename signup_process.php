<?php
require_once 'config/database.php';
require_once 'config/db_operations.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $role = trim($_POST['role']);

    // Check password match
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match!'); window.history.back();</script>";
        exit;
    }

    $db = new DbOperations();

    // Check if user already exists
    $exists = $db->exists("SELECT * FROM users WHERE email = ?", [$email]);
    if ($exists) {
        echo "<script>alert('Email already registered! Please login.'); window.location.href='login.php';</script>";
        exit;
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert user
    $insert = $db->insert("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)", [
        $name, $email, $hashed_password, $role
    ]);

    if ($insert) {
        echo "<script>alert('Registration successful! Please login.'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('Something went wrong! Try again.'); window.history.back();</script>";
    }
}
?>
