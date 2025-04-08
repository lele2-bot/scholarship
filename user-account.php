<?php
require_once 'dbConnect.php';
session_start();

$errors = [];

// User Registration
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
    $school_id = trim($_POST['school_id']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $created_at = date('Y-m-d H:i:s');

    // Validate School ID format (e.g., 2020-1080-AB)
    if (!preg_match('/^\d{4}-\d{4}-[A-Z]{2}$/', $school_id)) {
        $errors['school_id'] = 'Invalid School ID format (e.g., 2020-1080-AB)';
    }

    // Password validation
    if (strlen($password) < 8) {
        $errors['password'] = 'Password must be at least 8 characters long.';
    }
    if ($password !== $confirmPassword) {
        $errors['confirm_password'] = 'Passwords do not match';
    }

    // Check if School ID is already registered
    $stmt = $pdo->prepare("SELECT id FROM users WHERE school_id = :school_id");
    $stmt->execute(['school_id' => $school_id]);
    if ($stmt->fetch()) {
        $errors['user_exist'] = 'School ID is already registered';
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header('Location: register.php');
        exit();
    }

    // Secure password hashing
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $stmt = $pdo->prepare("INSERT INTO users (school_id, password, created_at) VALUES (:school_id, :password, :created_at)");
    $stmt->execute([
        'school_id' => $school_id,
        'password' => $hashedPassword,
        'created_at' => $created_at
    ]);

    // Success message and redirect
    $_SESSION['success'] = "You've registered successfully!";
    header('Location: index.php');
    exit();
}

// User Login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signin'])) {
    $school_id = trim($_POST['school_id']);
    $password = $_POST['password'];

    if (empty($school_id)) {
        $errors['school_id'] = 'School ID is required';
    }
    if (empty($password)) {
        $errors['password'] = 'Password cannot be empty';
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header('Location: index.php');
        exit();
    }

    // Check user credentials
    $stmt = $pdo->prepare("SELECT school_id, password, created_at FROM users WHERE school_id = :school_id");
    $stmt->execute(['school_id' => $school_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Store session data
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['school_id'] = $user['school_id'];
        $_SESSION['created_at'] = $user['created_at'];

        header('Location: userdash.php'); // Redirect to user dashboard
        exit();
    } else {
        $errors['login'] = 'Invalid School ID or password';
        $_SESSION['errors'] = $errors;
        header('Location: index.php'); // Redirect back to login page
        exit();
    }
}
?>