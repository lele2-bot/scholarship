<?php
session_start();
require 'connection.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Scholarship System - Login</title>
    <style>
        /* Basic styling - you'll want to improve this */
        form {
            position:static;

            width: 300px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 15px;
            background-color: #4CAF50; /* Example color */
            color: white;
            border: none;
            cursor: pointer;
        }
        header {
    background-color: pink; /* Example background color */
    position: fixed; /* Stick to the top */
    top: 0;
    left: 0;
    width: 100%;
    padding: 10px;
    z-index: 100; /* Ensure header is above other content */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Optional: Add a subtle shadow */
  }
    </style>
</head>
<body>

   <div     >
    <h1>Scholarship System - Login</h1>
    <form action="process_login.php" method="post">  <label for="username">School ID:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Login</button>
        <p>Forgot Password?<a href="signup.php">Sign Up</a></p>
    </form>
   </div>
</body>
</html>