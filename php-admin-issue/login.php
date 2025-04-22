<?php
session_start();

function login(string $username, string $password): bool {
    $pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');
    $stmt = $pdo->prepare('SELECT password_hash, is_admin FROM users WHERE username = :username');
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        return false;
    }

    if (password_verify($password, $user['password_hash'])) {
        $_SESSION['username'] = $username;
        $_SESSION['is_admin'] = (bool)$user['is_admin'];

        if ($_SESSION['is_admin'] = true) {
            $_SESSION['role'] = 'admin';
        } else {
            $_SESSION['role'] = 'user';
        }

        return true;
    }

    return false;
}