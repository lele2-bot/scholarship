<?php
require 'dbConnect.php'; // Ensure this connects to your database

if (isset($_GET['school_id_number'])) {
    $school_id = $_GET['school_id_number'];

    $sql = "SELECT * FROM scholars WHERE school_id_number = :school_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['school_id' => $school_id]);
    $scholar = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$scholar) {
        echo "<p style='color: red; text-align: center;'>Scholar not found!</p>";
        exit;
    }
} else {
    echo "<p style='color: red; text-align: center;'>Invalid request!</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholar Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color:rgb(136, 30, 223);
            color: white;
        }

        td {
            background-color: #f9f9f9;
        }

        .back-btn {
            display: inline-block;
            padding: 10px 15px;
            background:rgb(195, 8, 247);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .back-btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Scholar Details</h2>
    <table>
        <tr>
            <th>School ID</th>
            <td><?php echo htmlspecialchars($scholar['school_id_number']); ?></td>
        </tr>
        <tr>
            <th>Full Name</th>
            <td><?php echo htmlspecialchars($scholar['firstname'] . " " . $scholar['middlename'] . " " . $scholar['lastname']); ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo htmlspecialchars($scholar['email']); ?></td>
        </tr>
        <tr>
            <th>Mobile Number</th>
            <td><?php echo htmlspecialchars($scholar['mobilenumber']); ?></td>
        </tr>
        <tr>
            <th>Year Level</th>
            <td><?php echo htmlspecialchars($scholar['year_level']); ?></td>
        </tr>
        <tr>
            <th>Type of Scholarship</th>
            <td><?php echo htmlspecialchars($scholar['type_of_scholarship']); ?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td><?php echo htmlspecialchars($scholar['status']); ?></td>
        </tr>
    </table>

    <a href="admindash.php" class="back-btn">Back to List</a>
</div>

</body>
</html>
