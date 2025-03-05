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
        h1{
            position:center;
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
   
    <form> 

    <h1>Welcome</h1>
    <h2>pumili ng isa</h2>
    <button type="submit">tdc</button><br>
    <br>
    <button type="submit">lbc</button><br>
    <br>
    <button type="submit">pdc</button><br>
    <br>
    <button type="submit">meow</button><br>
    <br>
    <br>
   
        

        <button type="submit">Login</button>
        <p>Forgot Password?<a href="signup.php">Sign Up</a></p>
    </form>
   </div>
</body>
</html>