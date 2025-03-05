<?php 
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data (very important!)
   
    $school_id =$_POST["schoolid"];
    $department = $_POST["dept"];
    $course = $_POST["course"];
    $first_name = $_POST["firstname"];
    $middle_name =$_POST["middlename"];
    $last_name =$_POST["lastname"];
    $perm_add = $_POST["permadd"];
    $pre_add = $_POST["preadd"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $contact_number = $_POST["contactnumber"];
    $email = $_POST["email"];
    $fathers_name =$_POST["fathername"];
    $fathers_address = $_POST["fadd"];
    $fathers_contact = $_POST["fcontactno"];
    $mothers_name = $_POST["mothername"];
    $mothers_address =$_POST["madd"];
    $mothers_contact =$_POST["mcontactno"];
    $guardian_name =$_POST["guardian"];
    $guardian_address = $_POST["gadd"];
    $guardian_contact =$_POST["gcontactno"];
    $guardian_relation = $_POST["relation"] ;

    // Basic validation (add more robust validation as needed)
   
        // Prepare and execute SQL query (use prepared statements to prevent SQL injection!)
        $sql = "INSERT INTO scholars (schoolid, dept, course, firstname, middlename, lastname, permadd, preadd, dob, gender, contactnumber, email, fathername, fadd, fcontactno, mothername, madd, mcontactno, guardian, gadd, gcontactno,relation) VALUES 
        ('$school_id', '$department', '$course', '$first_name', '$middle_name', '$last_name','$perm_add', '$pre_add', '$dob', '$gender', '$contact_number', '$email', '$fathers_name', '$fathers_address', '$fathers_contact', '$mothers_name', '$mothers_address', '$mothers_contact', '$guardian_name', '$guardian_address', '$guardian_contact', '$guardian_relation')";

       

        if ($conn->query($sql) === true) {
			$submitted = true;
			$msg = "Your application submitted successfuly. ";
		} else {
			$errormsg = "Unable to submit application";
		}
       
    }



?>



<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <form action = "index.php"  method="POST" > 
        
    <div class="container">
   
    <table>
    
                
                <tr><td><p>School Details</p></td></tr>
                <tr>
                    <td>
                        <label for="schoolid">School Id:</label>
                        <input type="text" id="schoolid" name="schoolid" required>
                    </td>

                    <td>
                        <label for="course">Course:</label>
                        <select class="form-control" id="course" name="course">
                    <option value="none">--SELECT--</option>
                    <option value="BSHM">Bachelor of Science in Hospitality Management</option>
                    <option value="BEED">Bachelor of Elementary Education</option>
                    <option value="BSED-ENG">Bachelor of Secondary Education Major in English</option>
                    <option value="BSED-MATH">Bachelor of Secondary Education Major in Mathematics</option>
                    <option value="BSIT">Bachelor of Science in Information Technology</option>
                    <option value="BSA">Bachelor of Science in Agriculture</option>
                    <option value="BSIT-ARCHI">Bachlor of Science in Industrial Technology Major in Architechture Technology</option>
                    <option value="BSIT-AUTO">Bachlor of Science in Industrial Technology Major in Automotive Technology</option>
                    <option value="BSIT-ELEC">Bachlor of Science in Industrial Technology Major in Electronics Technology</option>
                    
                    </td>
                    <span></span>
                    <td>
                        <label for="department">Department:</label>
                        <select class="form-control" id="dept" name="dept">
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
                        <input type="text" id="firstname" name="firstname" required>
                    </td>
                    <td>
                        <label for="middle_name">Middle Name:</label>
                        <input type="text" id="middlename" name="middlename">
                    </td>
                    <td>
                        <label for="last_name">Last Name:</label>
                        <input type="text" id="lastname" name="lastname" required>
                    </td>
                </tr>
                <tr>
                    <td>
                    <label for="perm_add">Permanent Address:</label>
                    <input type="text" id="permadd" name="permadd">
                    </td>

                    <td>
                    <label for="pre_add">Present Address:</label>
                    <input type="text" id="preadd" name="preadd">
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
                        <input type="text" id="contactnumber" name="contactnumber" required>
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
                        <input type="text" id="fathername" name="fathername" required>
                    </td>
                    <td>
                        <label for="fathers_address">Address:</label>
                        <input type="text" id="fadd" name="fadd">
                    </td>
                    <td>
                        <label for="fathers_contact">Contact Number:</label>
                        <input type="text" id="fcontactno" name="fcontactno" required>
                    </td>
                </tr>
                <tr>
                <td>
                        <label for="mothers_name">Mothers Name:</label>
                        <input type="text" id="mothername" name="mothername" required>
                    </td>
                    <td>
                        <label for="mothers_address">Address:</label>
                        <input type="text" id="madd" name="madd" required>
                    </td>
                    <td>
                        <label for="mothers_contact">Contact Number:</label>
                        <input type="text" id="mcontactno" name="mcontactno" >
                    </td>
                </tr>

                <tr>
                <td>
                        <label for="guardians_name">Guardians Name:</label>
                        <input type="text" id="guardians" name="guardian" required>
                    </td>
                    <td>
                        <label for="guardians_address">Address:</label>
                        <input type="text" id="gadd" name="gadd" required>
                    </td>
                    <td>
                        <label for="guardians_contact">Contact Number:</label>
                        <input type="text" id="gcontactno" name="gcontactno" >
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