<?php 

require_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data (very important!)
    $scholarship_type = $conn->real_escape_string($_POST["scholarshiptype"]);
    $school_id = $conn->real_escape_string($_POST["schoolid"]);
    $department = $conn->real_escape_string($_POST["dept"]);
    $course = $conn->real_escape_string($_POST["course"]);
    $first_name = $conn->real_escape_string($_POST["firstname"]);
    $middle_name = $conn->real_escape_string($_POST["middlename"]);
    $last_name = $conn->real_escape_string($_POST["lastname"]);
    $perm_add = $conn->real_escape_string($_POST["peradd"]);
    $pre_add = $conn->real_escape_string($_POST["preadd"]);
    $dob = $conn->real_escape_string($_POST["dob"]);
    $gender = $conn->real_escape_string($_POST["gender"]);
    $contact_number = $conn->real_escape_string($_POST["contactnumber"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $fathers_name = $conn->real_escape_string($_POST["fathername"]);
    $fathers_address = $conn->real_escape_string($_POST["fadd"]);
    $fathers_contact = $conn->real_escape_string($_POST["fcontactno"]);
    $mothers_name = $conn->real_escape_string($_POST["mothername"]);
    $mothers_address = $conn->real_escape_string($_POST["madd"]);
    $mothers_contact = $conn->real_escape_string($_POST["mcontactno"]);
    $guardian_name = $conn->real_escape_string($_POST["guardianname"]);
    $guardian_address = $conn->real_escape_string($_POST["gadd"]);
    $guardian_contact = $conn->real_escape_string($_POST["gcontactno"]);
    $guardian_relation = $conn->real_escape_string($_POST["relation"]);

    // Basic validation (add more robust validation as needed)
    if (empty($first_name) || empty($last_name) || empty($email)) {
        echo "Please fill in all required fields.";
    } else {
        // Prepare and execute SQL query (use prepared statements to prevent SQL injection!)
        $stmt = $conn->prepare("INSERT INTO scholars (scholarshiptype, schoolid, dept, course, firstname, middlename, lastname, dob, gender, contactnumber, email, fathername, fadd, fcontactno, mothername, madd, mcontactno, guardianname, gadd, gcontactno,relation) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt("", $scholarship_type, $school_id, $department, $course, $first_name, $middle_name, $last_name, $dob, $gender, $contact_number, $email, $fathers_name, $fathers_address, $fathers_contact, $mothers_name, $mothers_address, $mothers_contact, $guardian_name, $guardian_address, $guardian_contact, $guardian_relation);

        if ($stmt->execute()) {
            echo "Signup successful!";
            header("Location: login.php"); // Redirect to login page
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}


?>



<!DOCTYPE html>
<html>
<head>
    <title>Scholarship System - Sign Up</title>
    <style>
     
        form {
            width: 800px;
            margin: 0 auto;
            
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="password"], input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 15px;
            background-color: #4CAF50; 
            color: white;
            border: none;
            cursor: pointer;
        }
        .sign{
        background-color:rgb(255, 255, 255);
        }
        .form{
            background-color: pink;
        }
        
    </style>
</head>
<body>
    <h1>Scholarship System - Sign Up</h1>
    <div class="container">
    <form class = "form" method="POST" > 
        
    <div class="container">
   
    <table>
    <label for="scholarship-type">Type of Scholarship <span class="text-danger"></span></label>
                <select class="form-control" id="scholarship-type" name="scholarship-Type">
                    <option value="none">--SELECT--</option>
                    <option value="TDC">TDC</option>
                    <option value="PDC">PDC</option>
                    <option value="Non-Professional">Non-Professional</option>
                    <option value="Professional">Professional</option>
                </select>
                <tr><td><p>School Details</p></td></tr>
                <tr>
                    <td>
                        <label for="school_id">School Id:</label>
                        <input type="text" id="school_id" name="school_id" required>
                    </td>

                    <td>
                        <label for="course">Course:</label>
                        <select class="form-control" id="scholarship-type" name="scholarship-Type">
                    <option value="none">--SELECT--</option>
                    <option value="TDC">Bachelor of Science in Hospitality Management</option>
                    <option value="TDC">Bachelor of Elementary Education</option>
                    <option value="TDC">Bachelor of Secondary Education Major in English</option>
                    <option value="TDC">Bachelor of Secondary Education Major in Mathematics</option>
                    <option value="TDC">Bachelor of Secondary Education Major in Science</option>
                    <option value="TDC">Bachelor of Science in Information Technology</option>
                    <option value="TDC">Bachelor of Science in Agriculture</option>
                    <option value="TDC">Bachlor of Science in Industrial Technology Major in Architechture Technology</option>
                    <option value="TDC">Bachlor of Science in Industrial Technology Major in Automotive Technology</option>
                    <option value="TDC">Bachlor of Science in Industrial Technology Major in Electronics Technology</option>
                    
                    </td>

                    <td>
                        <label for="department">Department:</label>
                        <select class="form-control" id="scholarship-type" name="scholarship-Type">
                    <option value="none">--SELECT--</option>
                    <option value="HTM">HTM</option>
                    <option value="TED">TED</option>
                    <option value="ICT">ICT</option>
                    <option value="AGRI">AGRI</option>
                    <option value="ITD">ITD</option>

                    </td>
                   
                    
                </tr>
                <tr>
                    <tr><td><p>Personal Information</p></td></tr>
                    <td>
                        <label for="first_name">First Name:</label>
                        <input type="text" id="first_name" name="first_name" required>
                    </td>
                    <td>
                        <label for="middle_name">Middle Name:</label>
                        <input type="text" id="middle_name" name="middle_name">
                    </td>
                    <td>
                        <label for="last_name">Last Name:</label>
                        <input type="text" id="last_name" name="last_name" required>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="dob">Date Of Birth:</label>
                        <input type="date" id="dob" name="dob" required>
                    </td>
                    <td>
                        <label for="gender">Gender:</label>
                        <select class="form-control" id="gender" name="gender">
                            <option value="none">--SELECT--</option>
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                            <option value="Others">Others</option>
                        </select>
                    </td>
                    <td>
                        <label for="contact_number">Contact Number:</label>
                        <input type="text" id="contact_number" name="contact_number" required>
                    </td>
                    <td>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </td>
                </tr>
                <tr><td><p>Parents Information</p></td></tr>
                <tr>
                    <td>
                        <label for="fathers_name">Fathers Name:</label>
                        <input type="text" id="fathers_name" name="fathers_name" required>
                    </td>
                    <td>
                        <label for="fathers_address">Address:</label>
                        <input type="text" id="fathers_address" name="fathers_address">
                    </td>
                    <td>
                        <label for="fathers_contact">Contact Number:</label>
                        <input type="text" id="fathers_contact" name="fathers_contact" required>
                    </td>
                </tr>
                <tr>
                <td>
                        <label for="mothers_name">Mothers Name:</label>
                        <input type="text" id="mothers_name" name="mothers_name" required>
                    </td>
                    <td>
                        <label for="mothers_address">Address:</label>
                        <input type="text" id="mothers_address" name="mothers_address" required>
                    </td>
                    <td>
                        <label for="mothers_contact">Contact Number:</label>
                        <input type="text" id="mothers_contact" name="mothers_contact" >
                    </td>
                </tr>

                <tr>
                <td>
                        <label for="guardians_name">Guardians Name:</label>
                        <input type="text" id="guardians_name" name="guardians_name" required>
                    </td>
                    <td>
                        <label for="guardians_address">Address:</label>
                        <input type="text" id="guardians_address" name="guardians_address" required>
                    </td>
                    <td>
                        <label for="guardians_contact">Contact Number:</label>
                        <input type="text" id="guardians_contact" name="guardians_contact" >
                    </td>

                    <td>
                        <label for="relation">Relation:</label>
                        <input type="text" id="relation" name="relation" >
                    </td>
                </tr>
                    
    <tr>
    <td>
        <button type="submit">Sign Up</button>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </td>
</tr>

    


    </table>
    </form>
    
    </div>
  
</body>
</html>