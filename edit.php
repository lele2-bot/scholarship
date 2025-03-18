<?php
require 'dbConnect.php';

if (isset($_GET['school_id_number'])) {
    $id = $_GET['school_id_number'];
    $stmt = $pdo->prepare("SELECT * FROM scholars WHERE school_id_number = :school_id_number");
    $stmt->execute(['school_id_number' => $id]);
    $scholar = $stmt->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['update'])) {
    $id = $_POST['school_id_number'];
    $first_name = $_POST['firstname'];   
    $middle_name = $_POST['middlename'];  
    $last_name = $_POST['lastname'];  
    $maiden_name = $_POST['maidenname'];  
    $email = $_POST['email'];
    $mobile_number = $_POST['mobilenumber'];
    $status = $_POST['status'];


    $stmt = $pdo->prepare("UPDATE scholars SET firstname = :firstname, middlename = :middlename, lastname = :lastname,
    maidenname = :maidenname, mobilenumber = :mobilenumber, email = :email, status = :status WHERE school_id_number = :school_id_number");
    $stmt->execute(['firstname' => $first_name,'middlename' => $middle_name,'lastname' => $last_name,'maidenname' => $maiden_name, 
    'mobilenumber' => $mobile_number,'email' => $email, 'status' => $status, 'school_id_number' => $id]);

    header("Location: admindash.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Scholar</title>
    <style>
        /* General styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 600px; /* Increased width for 4 columns */
        }

        h3 {
            text-align: center;
            color: #333;
        }

        /* Form styling */
        form {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .form-group {
            flex: 1 1 calc(25% - 10px); /* 4 columns in a row */
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input, select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            transition: 0.3s ease;
        }

        input:focus, select:focus {
            border-color: #007bff;
            outline: none;
        }

        /* Button styling */
        .form-buttons {
            display: flex;
            justify-content: space-between; /* Pushes buttons to opposite sides */
            width: 100%; /* Adjust width as needed */
            padding: 10px;
        }
        

        .btn {
            background: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: 0.3s ease;
        }

        .btn:hover {
            background: #0056b3;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-group {
                flex: 1 1 calc(50% - 10px); /* 2 columns for smaller screens */
            }
        }

        @media (max-width: 480px) {
            .form-group {
                flex: 1 1 100%; /* 1 column for mobile */
            }
        }

        /* Success & error messages */
        .success-msg, .error-msg {
            text-align: center;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
        }

        .success-msg {
            background: #d4edda;
            color: #155724;
        }

        .error-msg {
            background: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>

<div class="container">
    <h3>Edit Scholar</h3>
    <form method="post">
        <input type="hidden" name="school_id_number" value="<?php echo htmlspecialchars($scholar['school_id_number'] ?? ''); ?>">

        <div class="form-group">
            <label>First Name:</label>
            <input type="text" name="firstname" value="<?php echo htmlspecialchars($scholar['firstname'] ?? ''); ?>" required>
        </div>
        
        <div class="form-group">
            <label>Middle Name:</label>
            <input type="text" name="middlename" value="<?php echo htmlspecialchars($scholar['middlename'] ?? ''); ?>" required>
        </div>
        <div class="form-group">
            <label>Last Name:</label>
            <input type="text" name="lastname" value="<?php echo htmlspecialchars($scholar['lastname'] ?? ''); ?>" required>
        </div>
        <div class="form-group">
            <label>Maiden Name:</label>
            <input type="text" name="maidenname" value="<?php echo htmlspecialchars($scholar['maidenname'] ?? ''); ?>">
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($scholar['email'] ?? ''); ?>" required>
        </div>
        <div class="form-group">
            <label>Number:</label>
            <input type="mobilenumber" name="mobilenumber" value="<?php echo htmlspecialchars($scholar['mobilenumber'] ?? ''); ?>" required>
        </div>

        <div class="form-group">
            <label>Status:</label>
            <select name="status">
                <option value="Active" <?php if (($scholar['status'] ?? '') == "Active") echo "selected"; ?>>Active</option>
                <option value="Inactive" <?php if (($scholar['status'] ?? '') == "Inactive") echo "selected"; ?>>Inactive</option>
            </select>
        </div>
       
        <div  class="form-buttons">
        <button   type="button" class="btn" onclick="window.location.href='admindash.php'">Back</button>
        
        <button  onclick="alert('Changes Applied')" type="submit" class="btn" name="update">Update</button>
           
           
        </div>
    </form>
</div>

</body>
</html>