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
            max-width: 1300px;
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
            text-align: center;
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
            @media print {
        body * {
            visibility: hidden;
        }
        #print-section, #print-section * {
            visibility: visible;
        }
        #print-section {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }
        .back-btn, button {
            display: none; /* Hide buttons when printing */
        }
        }
    </style>
</head>
<body>

<div id="print-section">
    <div class="container">
    <h2>Scholar Details</h2>


  
    <table>
        <tr>Personal Information </tr>
        <tr>
            <td>Name</td>
            <td><b><?php echo htmlspecialchars($scholar['lastname']); ?></b><br><label>Last Name</label></td>
            <td><b><?php echo htmlspecialchars($scholar['firstname']); ?></b><br><label>First Name</label></td>
            <td><b><?php echo htmlspecialchars($scholar['middlename']); ?></b><br><label>Middle Name</label></td>
            <td><b><?php echo htmlspecialchars($scholar['maidenname']); ?></b><br><label>Maiden Name</label></td>
        </tr>
        <tr>
            <td><b><?php echo htmlspecialchars($scholar['dob']); ?></b><br><label>Date of Birth</label></td>
            <td><b><?php echo htmlspecialchars($scholar['street_and_brgy'].",".$scholar['town_city_municipality']. ",". $scholar['province']); ?></b><br><label>Permanent Address</label></td>
            <td><b><?php echo htmlspecialchars($scholar['citizenship']); ?></b><br><label>Citizenship</label></td></td>
            <td><b><?php echo htmlspecialchars($scholar['tribal_member']); ?></b><br><label>Tribal Member</label></td>
            <td><b><?php echo htmlspecialchars($scholar['type_of_disability']); ?></b><br><label>Type Of Disability</label></td>
        </tr>
        <tr>
            <td><b><?php echo htmlspecialchars($scholar['street_and_brgy1'].",".$scholar['town_city_municipality1']. ",". $scholar['province1']); ?></b><br><label>Place Of Birth</label></td>
            <td><b><?php echo htmlspecialchars($scholar['sex']); ?></b><br><label>Sex</label></td>
            <td><b><?php echo htmlspecialchars($scholar['mobilenumber']); ?></b><br><label>Mobile Number</label></td>
            <td><b><?php echo htmlspecialchars($scholar['email']); ?></b><br><label>Email</label></td>
            <td></td>
        </tr>
       

        <tr>
            <td><b><?php echo htmlspecialchars($scholar['school_last_attended']); ?></b><br><label>Name of School Last Attended</label></td>
            <td><b><?php echo htmlspecialchars($scholar['school_address']); ?></b><br><label>School Address</label></td>
            <td><b><?php echo htmlspecialchars($scholar['year_level']); ?></b><br><label>Year Level</label></td>
            <td><b><?php echo htmlspecialchars($scholar['school_sector']); ?></b><br><label>School Sector</label></td>
            <td><b><?php echo htmlspecialchars($scholar['school_id_number']); ?></b><br><label>School ID</label></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Family Background</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
        <td></td>
            <td>Mother</td>
            <td></td>
            <td>Father</td>
            <td></td>
        </tr>
        <tr>
            <td>Name:</td>
            <td><b><?php echo htmlspecialchars($scholar['mothers_name']); ?></b><br></td>
            <td></td>
            <td><b><?php echo htmlspecialchars($scholar['fathers_name']); ?></b></td>
            <td></td>
        </tr>
        <tr>
            <td>Address:</td>
            <td><b><?php echo htmlspecialchars($scholar['mothers_address']); ?></b><br></td>
            <td></td>
            <td><b><?php echo htmlspecialchars($scholar['fathers_address']); ?></b></td>
            <td></td>
        </tr>
        <tr>
            <td>Occupation:</td>
            <td><b><?php echo htmlspecialchars($scholar['mothers_occupation']); ?></b><br></td>
            <td></td>
            <td><b><?php echo htmlspecialchars($scholar['fathers_occupation']); ?></b></td>
            <td></td>
        </tr>
        <tr>
            <td>Total Parents Gross Income:</td>
            <td><b><?php echo htmlspecialchars($scholar['gross_income']); ?></b><br></td>
            <td></td>
            <td><label>No. of siblings in the Family:   </label><b><?php echo htmlspecialchars($scholar['no_of_siblings']); ?></b></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td><b><?php echo htmlspecialchars($scholar['other_educational_assistance']); ?></b><br><label>Enjoying Other Educational Assistance?</label></td>
            <td></td>
            <td><b><?php echo htmlspecialchars($scholar['financial_assistance']); ?></b><br><label>Other Educationl Assistance</label></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>2x2 id</td>
            <td>COR/COE</td>
            <td>Indigency</td>
            <td><b><?php echo htmlspecialchars($scholar['status']); ?></b><br><label>Status</label></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

    </table>

    <a href="admindash.php" class="back-btn">Back to List</a>
    <button onclick="printSection()" class="back-btn" style="margin-left: 10px;">Print</button>
    
</div>
</div>

</body>
</html>
<script>
function printSection() {
    var printContents = document.getElementById('print-section').innerHTML;
    var w = window.open('', '', 'height=600,width=800');
    w.document.write('<html><head><title>Print</title></head><body>');
    w.document.write(printContents);
    w.document.write('</body></html>');
    w.document.close();
    w.print();
}
</script>