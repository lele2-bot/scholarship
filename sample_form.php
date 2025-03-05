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
            display: flex;
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
            border-bottom: 1px solid black; /* Horizontal line */
        }
        .form-group div {
            flex: 1 1 calc(20% - 10px);
          
        }
        label {
            display: block;
           
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
            text-align: center;

        }
        
    </style>
</head>
<body>
    
    <div class="container">
        <h2>Sample Ched Form</h2>
        <form action="index.php" method="POST">
            <h4>PERSONAL INFORMATION</h4>
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
                
                <div>
                <label for="permanent_address">Permanent Address</label>
                <input type="date" id="dob" name="dob" required>
                </div>
                </div>
                <div>
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender">
                        <option value="none">--SELECT--</option>
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div>
                   
                    <label for="schoolid">School Id:</label>
                    <input type="text" id="schoolid" name="schoolid" required>
                </div>
                <div>
                    <label for="course">Course:</label>
                    <select id="course" name="course">
                        <option value="none">--SELECT--</option>
                        <option value="BSHM">Bachelor of Science in Hospitality Management</option>
                        <option value="BEED">Bachelor of Elementary Education</option>
                        <option value="BSED-ENG">Bachelor of Secondary Education Major in English</option>
                        <option value="BSED-MATH">Bachelor of Secondary Education Major in Mathematics</option>
                        <option value="BSIT">Bachelor of Science in Information Technology</option>
                    </select>
                </div>
                <div>
                    <label for="dept">Department:</label>
                    <select id="dept" name="dept">
                        <option value="none">--SELECT--</option>
                        <option value="HTM">HTM</option>
                        <option value="TED">TED</option>
                        <option value="ICT">ICT</option>
                        <option value="AGRI">AGRI</option>
                        <option value="ITD">ITD</option>
                    </select>
                </div>
            </div>
            
            <h4>Personal Information</h4>
           
            
            <div class="form-group">
                <div>
                    <label for="contactnumber">Contact Number:</label>
                    <input type="text" id="contactnumber" name="contactnumber" required>
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
            </div>
            
            <h4>Guardian Information</h4>
            <div class="form-group">
                <div>
                    <label for="guardian">Guardian's Name:</label>
                    <input type="text" id="guardian" name="guardian" required>
                </div>
                <div>
                    <label for="gadd">Address:</label>
                    <input type="text" id="gadd" name="gadd" required>
                </div>
                <div>
                    <label for="gcontactno">Contact Number:</label>
                    <input type="text" id="gcontactno" name="gcontactno">
                </div>
                <div>
                    <label for="relation">Relation:</label>
                    <input type="text" id="relation" name="relation">
                </div>
            </div>
            
            <div class="btn-container">
                <button type="submit">Sign Up</button>
                <p>Already have an account? <a href="login.php">Login</a></p>
            </div>
        </form>
    </div>
  
</body>
</html>