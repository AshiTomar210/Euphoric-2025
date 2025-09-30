<?php
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = trim($_POST['name']);
    $email    = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm  = $_POST['confirm_password'];
    $role     = $_POST['role'];

    // Basic validation
    if ($password !== $confirm) {
        die("Passwords do not match.");
    }
    if (!in_array($role, ['student', 'coordinator', 'admin'])) {
        die("Invalid role selected.");
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database
    $db = new Database();
    $conn = $db->getConnection();

    $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
    try {
        $stmt->execute([$name, $email, $hashedPassword, $role]);
        header("Location: login.html?signup=success");
        exit;
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            die("Email already registered.");
        }
        die("Signup error: " . $e->getMessage());
    }
}
?>