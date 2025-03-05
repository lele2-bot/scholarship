
<?php 
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $school_id = $_POST["school_id_number"];
    $first_name = $_POST["firstname"];
    $middle_name = $_POST["middlename"];
    $last_name = $_POST["lastname"];
    $maiden_name = $_POST["maidenname"];
    $dob = $_POST["dob"];
    $streetandbrgy = $_POST["street_and_brgy"];
    $towncitymunicipality = $_POST["town_city_municipality"];
    $province = $_POST["province"];
    $zipcode = $_POST["zipcode"];
    $streetandbrgy1 = $_POST["street_and_brgy1"];
    $towncitymunicipality1 = $_POST["town_city_municipality1"];
    $province1 = $_POST["province1"];
    $sex = $_POST["sex"];
    $typeofdisability = $_POST["type_of_disability"];
    $citizenship = $_POST["citizenship"];
    $mobilenumber = $_POST["mobilenumber"];
    $email = $_POST["email"];
    $tribalmember = $_POST["tribal_member"];
    $schoollastattended = $_POST["school_last_attended"];
    $schooladdress = $_POST["school_address"];
    $yearlevel = $_POST["year_level"];
    $schoolsector = $_POST["school_sector"];
    $fathersname = $_POST["fathers_name"];
    $mothersname = $_POST["mothers_name"];
    $fathersaddress = $_POST["fathers_address"];
    $mothersaddress = $_POST["mothers_address"];
    $fathersoccupation = $_POST["fathers_occupation"];
    $mothersoccupation = $_POST["mothers_occupation"];
    $grossincome = $_POST["gross_income"];
    $noofsiblings = $_POST["no_of_siblings"];
    $othereducationalassistance = $_POST["other_educational_assistance"];
    $customfieldid = $_POST["customfieldid"];

    // Use Prepared Statements to prevent SQL Injection
    $sql = "INSERT INTO scholars 
        (school_id_number, firstname, middlename, lastname, maidenname, dob, street_and_brgy, 
        town_city_municipality, province, zipcode, street_and_brgy1, town_city_municipality1, 
        province1, sex, type_of_disability, citizenship, mobilenumber, email, tribal_member, 
        school_last_attended, school_address, year_level, school_sector, fathers_name, 
        mothers_name, fathers_address, mothers_address, fathers_occupation, mothers_occupation, 
        gross_income, no_of_siblings, other_educational_assistance, customfieldid) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("issssssssisssssssssssssssssssiiss", 
        $school_id, $first_name, $middle_name, $last_name, $maiden_name, $dob, $streetandbrgy,
        $towncitymunicipality, $province, $zipcode, $streetandbrgy1, $towncitymunicipality1,
        $province1, $sex, $typeofdisability, $citizenship, $mobilenumber, $email, $tribalmember,
        $schoollastattended, $schooladdress, $yearlevel, $schoolsector, $fathersname,
        $mothersname, $fathersaddress, $mothersaddress, $fathersoccupation, $mothersoccupation,
        $grossincome, $noofsiblings, $othereducationalassistance, $customfieldid
    );

        if ($stmt->execute()) {
            $submitted = true;
            $msg = "Your application was submitted successfully.";
        } else {
            $errormsg = "Unable to submit application: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        $errormsg = "Error preparing statement: " . $conn->error;
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Scholarship System - Sign Up</title>
    <style>
     body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display:flex;
            justify-content: center;
            
        }
        .container {
            width: 80%;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            border: 2px solid black; /* Outer border */
        }
        h2, h4 {
            text-align: center;
        
        }
        .form-group {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 15px;
            padding-bottom: 15px;
            
        }
        .form-group div {
            flex: 1 1 calc(20% - 10px);
          
        }
        label {
            display: block;
           margin-top: 5px;
            margin-bottom: 5px;
        }
        input, select {
            width:270px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn-container {
            text-align: center;
            margin-top: 20px;
        }
        button {
            padding: 10px 20px;
            background: blue;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: darkblue;
        }
        .p1{
            font-weight: bold;
            text-align: center;
            border: 1px solid #ccc;
             border-radius: 5px;
       
        }
        .p2{
            font-weight: bold;
            text-align: center;
        }
        .p3{
            font-weight: bold;
          
            align-items:start;
            gap: 10px;
            
        }
        .p4{
            font-weight: bold;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 5px;
            
            
        }
        
        
        
        
    </style>
</head>
<body>
    
    <div class="container">
        <h2>Header</h2>
        <form action="" method="POST">
        <hr>
            <h4>PERSONAL INFORMATION</h4>
        <hr>
            <div class="form-group" >
                <div class ="p1">
                    <p>Name</p>
                </div>    
                <div>
                    <label for="firstname">First Name</label>
                    <input type="text" id="firstname" name="firstname" required>
                </div>
                <div>
                    <label for="middlename">Middle Name</label>
                    <input type="text" id="middlename" name="middlename">
                </div>
                <div>
                    <label for="lastname">Last Name</label>
                    <input type="text" id="lastname" name="lastname" required>
                </div>
                <div>
                    <label for="maidenname">Maiden Name (for Married Women):</label>
                    <input type="text" id="maidenname" name="maidenname">
                </div>
               
            </div>
            <div class ="p2">
                     <p>Permanent Address</p>
            </div>  
            
            <div class = "form-group">
                <div>
                    <label for="dob">Date Of Birth</label>
                    <input type="date" id="dob" name="dob" required>
               </div>
            
                <div>
                    <label for="StreetandBrgy">Street and Baranggay</label>
                    <input type="text" id="street_and_brgy" name="street_and_brgy" required>
                </div>
                <div>
                    <label for="TownCityMunicipality">Town/City/Municipality</label>
                    <input type="text" id="town_city_municipality" name="town_city_municipality" required>
                </div>
                <div>
                    <label for="Province">Province</label>
                    <input type="text" id="province" name="province" required>
                </div>
                <div>
                    <label for="Zip">Zip Code</label>
                    <input type="text" id="zipcode" name="zipcode" required>
                </div>
            </div>

            <div class="form-group">
                <div class ="p1">
                    <p>Place of Birth</p>
                </div>  
                <div>
                    <label for="StreetandBrgy">Street and Baranggay</label>
                    <input type="text" id="street_and_brgy1" name="street_and_brgy1" required>
                </div>
                <div>
                    <label for="TownCityMunicipality">Town/City/Municipality</label>
                     <input type="text" id="town_city_municipality1" name="town_city_municipality1" required>
                </div>
                <div>
                    <label for="Province">Province</label>
                     <input type="text" id="province1" name="province1" required>
                </div>
            <div>
                    <label for="Sex">Sex:</label>
                         <select id="sex" name="sex" required> 
                             <option value="none">--SELECT--</option>
                             <option value="Female">Female</option>
                             <option value="Male">Male</option>
                        </select>
                </div>
            </div>

            <div class="form-group">
                <div>
                    <label for="TypeOfDisablity">Type of Disability (If applicable)</label>
                    <input type="text" id="type_of_disability" name="type_of_disability">
                </div>
                <div>
                    <label for="Citizenship">Citizenship</label>
                    <input type="text" id="citizenship" name="citizenship" required>
                </div>
                <div>
                    <label for="MobileNumber">Mobile Number</label>
                    <input type="text" id="mobilenumber" name="mobilenumber" required>
                </div>
                <div>
                    <label for="Email">Email</label>
                    <input type="text" id="email" name="email" required>
                </div>
                <div>
                    <label for="TribalMember">Tribal Membership (If applicable)</label>
                    <input type="text" id="tribal_member" name="tribal_member">
                </div>
            </div>

            <div class="form-group">
                <div>
                    <label for="SchoolLastAttended">Name of School Last Attended</label>
                    <input type="text" id="school_last_attended" name="school_last_attended" required>
                </div>

                <div>
                    <label for="SchoolIDNumber">School ID Number</label>
                    <input type="text" id="school_id_number" name="school_id_number" required>
                </div>

                <div>
                    <label for="SchoolAddress">School Address</label>
                    <input type="text" id="school_address" name="school_address" required>
                </div>

                <div>
                    <label for="YearLevel">Year Level</label>
                    <select id="year_level" name="year_level" required> 
                        <option value="none">--SELECT--</option>
                        <option value="1st Year">1st Year</option>
                        <option value="2nd Year">2nd Year</option>
                        <option value="3rd Year">3rd Year</option>
                        <option value="4th Year">4th Year</option>
                        
                    </select>
                </div>

                <div>
                    <label for="SchoolSector">School Sector:</label>
                    <select id="school_sector" name="school_sector" required> 
                        <option value="none">--SELECT--</option>
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                        
                    </select>
                </div> 
                
            </div>
            <hr>
            <h4>Family Background</h4>
        
            <div class="form-group">
                <div>

                </div>
                  
                 <div class ="p3">
                    <label>Father:</label>
                </div> 

                <div class ="p3">
                    <label>Mother:</label>
                </div> 

                
            </div>
            
            <div class="form-group">
             
                <div class ="p4">
                <label>Name</label>
                </div>
                <div class = "input1">
                    <input type="text" id="fathers_name" name="fathers_name" required>
                </div>
                <div>
                    <input type="text" id="mothers_name" name="mothers_name" required>
                </div>
                
            </div>

            <div class="form-group">
                <div class ="p4">
                <label>Address</label>

                </div>
                <div>
                    <input type="text" id="fathers_address" name="fathers_address" required>
                </div>
                <div>
                    <input type="text" id="mothers_address" name="mothers_address" required>
                </div>
                
            </div>

            <div class="form-group">
                <div class ="p4">
                <label>Occupation</label>
                </div>
                <div>
                    <input type="text" id="fathers_occupation" name="fathers_occupation" required>
                </div>
                <div>
                    <input type="text" id="mothers_occupation" name="mothers_occupation" required>
                </div>
                
            </div>

            <div class="form-group">
                <div>
                </div> 
                <div>
                    <label for="GrossIncome">Total Parents Gross Income</label>
                    <input type="text" id="gross_income" name="gross_income" required>
                </div>
                <div>
                    <label for="NoOfSIblings">No. of Siblings in the family</label>
                    <input type="text" id="no_of_siblings" name="no_of_siblings" required>
                </div>
                
            </div>
            <hr>
            <div class="form-group">
                <div class ="p4">
                <label>Are you enjoying other educational financial assistance?</label>
                </div>
                <div>
                    <select id="other_educational_assistance" name="other_educational_assistance" required> 
                        <option value="none">--SELECT--</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                        
                    </select>
                </div>
                <div>

                </div>
                
            </div>
            <div class="form-group">
                <div class ="p4">
                    <label>Upload a 2x2 ID Picture</label>
                    </div>
                <div>
                    <input type="file" class="custom-file-label" id="customfieldid" name="customfieldid" onchange="displayImg(this,$(this))" accept="image/png, image/jpeg">                            
                </div>
                <div>

                </div>
            </div>
           <hr>
           
            
            <div class="btn-container">
                <button type="submit">Register</button>
                <p>Already have an account? <a href="login.php">Login</a></p>
            </div>
        </form>
    </div>
  
</body>
</html>