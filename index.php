<?php
require_once 'dbConnect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signin'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errors']['email'] = "Invalid email format.";
        header("Location: index.php");
        exit();
    }

    // Query the database for the user
    $stmt = $pdo->prepare("SELECT school_id, email, name, password FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verify password and login
    if ($user && password_verify($password, $user['password'])) {
        // Regenerate session to prevent session fixation attacks
        session_regenerate_id(true);
        
        $_SESSION['user_id'] = $user['school_id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_email'] = $user['email'];
        
        header("Location: userdash.php");
        exit();
    } else {
        $_SESSION['errors']['login'] = "Invalid email or password.";
        header("Location: index.php");
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register & Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container" id="signIn">
  <h1 class="form-title">Sign In</h1>

  <?php if (!empty($sessionErrors['login'])): ?>
    <div class="error-main"><p><?= htmlspecialchars($sessionErrors['login']) ?></p></div>
  <?php endif; ?>

  <form method="POST" action="">
    <div class="input-group">
      <i class="fas fa-envelope"></i>
      <input type="email" name="email" id="email" placeholder="Email" required>
      <?php if (!empty($sessionErrors['email'])): ?>
        <div class="error"><p><?= htmlspecialchars($sessionErrors['email']) ?></p></div>
      <?php endif; ?>
    </div>

    <div class="input-group password">
      <i class="fas fa-lock"></i>
      <input type="password" name="password" id="password" placeholder="Password" required>
      <i id="eye" class="fa fa-eye"></i>
      <?php if (!empty($sessionErrors['password'])): ?>
        <div class="error"><p><?= htmlspecialchars($sessionErrors['password']) ?></p></div>
      <?php endif; ?>
    </div>

    <p class="recover"><a href="#">Recover Password</a></p>
    <input type="submit" class="btn" value="Sign In" name="signin">
  </form>

  <div class="links">
    <p>Don't have an account yet?</p>
    <a href="register.php">Sign Up</a>
  </div>
</div>

<script src="script.js"></script>
</body>
</html>
