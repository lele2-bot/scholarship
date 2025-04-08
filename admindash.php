<?php
session_start();
require 'dbConnect.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $school_id = $_POST["school_id_number"];
    $typeofscholarship = $_POST["type_of_scholarship"];
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
    $coe_cor = $_POST["COE_COR"];
    $certofindigency = $_POST["cert_of_indigency"];
    $applicationstatus = $_POST["status"];

    try {
        // Use a prepared statement to prevent SQL injection
        $sql = "INSERT INTO scholars 
            (school_id_number, type_of_scholarship, firstname, middlename, lastname, maidenname, dob, street_and_brgy, 
            town_city_municipality, province, zipcode, street_and_brgy1, town_city_municipality1, 
            province1, sex, type_of_disability, citizenship, mobilenumber, email, tribal_member, 
            school_last_attended, school_address, year_level, school_sector, fathers_name, 
            mothers_name, fathers_address, mothers_address, fathers_occupation, mothers_occupation, 
            gross_income, no_of_siblings, other_educational_assistance, customfieldid, COE_COR, cert_of_indigency, status) 
            VALUES (:school_id, :typeofscholarship, :first_name, :middle_name, :last_name, :maiden_name, :dob, :streetandbrgy, 
            :towncitymunicipality, :province, :zipcode, :streetandbrgy1, :towncitymunicipality1, 
            :province1, :sex, :typeofdisability, :citizenship, :mobilenumber, :email, :tribalmember, 
            :schoollastattended, :schooladdress, :yearlevel, :schoolsector, :fathersname, 
            :mothersname, :fathersaddress, :mothersaddress, :fathersoccupation, :mothersoccupation, 
            :grossincome, :noofsiblings, :othereducationalassistance, :customfieldid, :coe_cor, :certofindigency, :status)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':school_id' => $school_id,
            ':typeofscholarship'=> $typeofscholarship,
            ':first_name' => $first_name,
            ':middle_name' => $middle_name,
            ':last_name' => $last_name,
            ':maiden_name' => $maiden_name,
            ':dob' => $dob,
            ':streetandbrgy' => $streetandbrgy,
            ':towncitymunicipality' => $towncitymunicipality,
            ':province' => $province,
            ':zipcode' => $zipcode,
            ':streetandbrgy1' => $streetandbrgy1,
            ':towncitymunicipality1' => $towncitymunicipality1,
            ':province1' => $province1,
            ':sex' => $sex,
            ':typeofdisability' => $typeofdisability,
            ':citizenship' => $citizenship,
            ':mobilenumber' => $mobilenumber,
            ':email' => $email,
            ':tribalmember' => $tribalmember,
            ':schoollastattended' => $schoollastattended,
            ':schooladdress' => $schooladdress,
            ':yearlevel' => $yearlevel,
            ':schoolsector' => $schoolsector,
            ':fathersname' => $fathersname,
            ':mothersname' => $mothersname,
            ':fathersaddress' => $fathersaddress,
            ':mothersaddress' => $mothersaddress,
            ':fathersoccupation' => $fathersoccupation,
            ':mothersoccupation' => $mothersoccupation,
            ':grossincome' => $grossincome,
            ':noofsiblings' => $noofsiblings,
            ':othereducationalassistance' => $othereducationalassistance,
            ':customfieldid' => $customfieldid,
            ':coe_cor' => $coe_cor,
            ':certofindigency' => $certofindigency, 
            ':status' => $applicationstatus
        ]);

        echo "<script>alert('Your application was submitted successfully.'); window.location.href='admindash.php';</script>";
    } catch (PDOException $e) {
        echo "Unable to submit application: " . $e->getMessage();
    }
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/JPEG" href="img/mow.JPEG">
	<title>Admin Dashboard</title>
</head>
<body>

	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Admin Dashboard</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
		</ul>
        <ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">meow</span>
				</a>
		</ul>
        
		<ul class="side-menu">
			<li>
				<a href="#" id="openSettingsModal">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
            
			<li>
				<a href="index.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="img/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn-scholarship" id="openModal">
					<i class='bx bxs-graduation'></i>
					<span>Add New Scholar</span>
				</a>
			</div>

            <?php
          $sql = "SELECT COUNT(*) AS total_scholars FROM scholars";
          $stmt = $pdo->query($sql);
          $row = $stmt->fetch();
          $total_scholars = $row['total_scholars'];
          
          ?>
          <?php

            // Count for CHED Scholarship
            $sqlched = "SELECT COUNT(*) AS ched_scholarship FROM scholars WHERE type_of_scholarship = 'CHED'";
            $sqlched = $pdo->query($sqlched);
            $rowched = $sqlched->fetch();
            $ched_scholarship = $rowched['ched_scholarship'];

            // Count for TDP Scholarship
            $sqltdp = "SELECT COUNT(*) AS tdp_scholarship FROM scholars WHERE type_of_scholarship = 'TDP'";
            $sqltdp = $pdo->query($sqltdp);
            $rowtdp = $sqltdp->fetch();
            $tdp_scholarship = $rowtdp['tdp_scholarship'];

             // Count for full Scholarship
             $sqlFull = "SELECT COUNT(*) AS full_scholarship FROM scholars WHERE type_of_scholarship = 'Full'";
             $stmtFull = $pdo->query($sqlFull);
             $rowFull = $stmtFull->fetch();
             $full_scholarship = $rowFull['full_scholarship'];

              // Count for Partial  Scholarship
              $sqlPartial = "SELECT COUNT(*) AS partial_scholarship FROM scholars WHERE type_of_scholarship = 'Partial Scholarship'";
              $sqlPartial = $pdo->query($sqlPartial);
              $rowPartial = $sqlPartial->fetch();
              $partial_scholarship = $rowPartial['partial_scholarship'];
            ?>

          
          <ul class="box-info">
              <li>
                  <i class='bx bxs-graduation'></i>
                  <span class="text">
                      <h3><?php echo htmlspecialchars($total_scholars); ?></h3>
                      <p>Total Number of Scholars</p>
                  </span>
              </li>
          </ul>
          <ul class="box-info">
              
              <li>
                  <i class='bx bxs-graduation'></i>
                  <span class="text">
                      <h3><?php echo htmlspecialchars($tdp_scholarship); ?></h3>
                      <p>TDP Scholars</p>
                  </span>
              </li>
              <li>
                  <i class='bx bxs-graduation'></i>
                  <span class="text">
                      <h3><?php echo htmlspecialchars($ched_scholarship); ?></h3>
                      <p>CHED Scholars</p>
                  </span>
              </li>
              <li>
                  <i class='bx bxs-graduation'></i>
                  <span class="text">
                      <h3><?php echo htmlspecialchars($full_scholarship); ?></h3>
                      <p>Pakapak Scholars</p>
                  </span>
              </li>
              <li>
                  <i class='bx bxs-graduation'></i>
                  <span class="text">
                      <h3><?php echo htmlspecialchars($partial_scholarship); ?></h3>
                      <p>Claire Scholars</p>
                  </span>
              </li>

              
          </ul>
          

          


          <?php
$sql = "SELECT school_id_number, type_of_scholarship, firstname, middlename, lastname, email, mobilenumber, year_level, status FROM scholars";
$stmt = $pdo->query($sql);
$scholars = $stmt->fetchAll();
?>
<br>
<hr>
<h2>Full List of Scholars</h2>

<table border="1">
    <thead>
        <tr>
            <th>School ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Mobile Number</th>
            <th>Year Level</th>
            <th>Type Of Scholarship</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($scholars)): ?>
            <?php foreach ($scholars as $scholar): ?>
                <tr>
                    <td><?php echo htmlspecialchars($scholar['school_id_number']); ?></td>
                    <td><?php echo htmlspecialchars($scholar['firstname'] . " " . $scholar['middlename'] . " " . $scholar['lastname']); ?></td>
                    <td><?php echo htmlspecialchars($scholar['email']); ?></td>
                    <td><?php echo htmlspecialchars($scholar['mobilenumber']); ?></td>
                    <td><?php echo htmlspecialchars($scholar['year_level']); ?></td>
                    <td><?php echo htmlspecialchars($scholar['type_of_scholarship']); ?></td>
                    <td><?php echo htmlspecialchars($scholar['status']); ?></td>
                    <td>
                    <a href="view.php?school_id_number=<?php echo htmlspecialchars($scholar['school_id_number']); ?>">View</a> | 
                    <a href="edit.php?school_id_number=<?php echo htmlspecialchars($scholar['school_id_number']); ?>" id="openEditModal">Edit</a> | 
                    <a href="delete.php?school_id_number=<?php echo htmlspecialchars($scholar['school_id_number']); ?>" 
                    onclick="return confirm('Are you sure you want to delete this scholar?');">Delete</a>
                </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="8">No scholars found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

	<!-- SCHOLARSHIP APPLICATION MODAL -->
	<div id="scholarshipModal" class="modal">
	<div class="modal-content">
    <span class="close" id="closeModal">&times;</span>
        <h2>Header</h2>
        <form action="" method="POST">
        <hr>
            <h4>PERSONAL INFORMATION</h4>
        <hr>
        <div class="form-group" >
		<div>
                    <label for="type_of_scholarship">Choose Scholarship:</label>
                    <select id="type_of_scholarship" name="type_of_scholarship" required> 

                        <option value="none">--SELECT--</option>
                        <option value="Full Scholarship">Full Scholarship</option>
                        <option value="Partial Scholarship">Partial Scholarship</option>
                        <option value="TDP">TDP</option>
                        <option value="CHED">CHED</option>
                        
                    </select>
                </div>
        </div>
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
                    <input type="text" id="mobilenumber"  name="mobilenumber" pattern="^[0-9]{11}$" placeholder="0922-992-2119" required>
                </div>
                <div>
                    <label for="Email">Email</label>
                    <input type="text" id="email" name="email" pattern ="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" placeholder="someone@gmail.com"required>
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
                    <input type="text" id="school_id_number" name="school_id_number"  pattern="\d{4}-\d{4}-[A-Z]{2}" placeholder="2025-1234-AB" required>
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
        <hr>
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
                <div> <label for="financial_assistance_details">If yes, please specify:</label>
                </div>
                <div>
                <input type="text" id="financial_assistance_details" name="financial_assistance_details"></div>
                <div>


                </div>
                
            </div>
            <div class="form-group">
                <div class ="p4">
                    <label>Upload a 2x2 ID Picture</label>
                    </div>
                <div>
                    <input type="file"  id="customfieldid" name="customfieldid"  accept="image/png, image/jpeg, image/jpg, application/pdf" required>                            
                    
                </div>
                <div>

                </div>
            </div>
           <hr>
           <h4>Documentary Requirements</h4>
           <hr>
           <div class="form-group">
                <div class ="p4">
                    <label>Upload Certificate of Enrollment or Certificate of Registration (COE/COR)</label>
                    </div>
                <div>
                    <input type="file"  id="COE_COR" name="COE_COR"  accept="image/png, image/jpeg, image/jpg, application/pdf" required>                            
                    
                </div>
                <div class ="p4">
                    <label>Upload Certificate of Indigency</label>
                    </div>
                <div>
                    <input type="file"  id="cert_of_indigency" name="cert_of_indigency"  accept="image/png, image/jpeg, image/jpg, application/pdf" required>                            
                    
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
	</div>

	<!-- SETTINGS MODAL -->
<!-- SETTINGS MODAL -->
<div id="settingsModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeSettingsModal">&times;</span>
        <h2>Update Account</h2>
        <form action="update_account.php" method="POST">
            <label for="email">New Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">New Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Update Account</button>
        </form>
    </div>
</div>
<!-- EDIT MODAL -->


	<!-- STYLES -->
	<style>
	    .modal {
	        display: none;
	        position: fixed;
	        z-index: 1000;
	        left: 0;
	        top: 0;
	        width: 100%;
	        height: 100%;
	        background-color: rgba(0, 0, 0, 0.5);
	        display: flex;
	        justify-content: center;
	        align-items: center;
			overflow-y:auto;
	    }
	    .modal-content {

            z-index: 1100;
            background: #fff;
            padding: 20px;
            width: 80%;
            max-width: 80%;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            position: relative;
            animation: fadeIn 0.3s ease-in-out;
            
            /* Makes the modal scrollable */
            max-height: 80vh;
            overflow-y: auto;
	    }

        /* Scrollbar Styling (for better UI) */
        .modal-content::-webkit-scrollbar {
            width: 6px;
        }

        .modal-content::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }

        .modal-content::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

	    .close {
	        float: right;
	        font-size: 24px;
	        cursor: pointer;
	    }
	    input, textarea {
	        width: 100%;
	        padding: 8px;
	        margin-top: 5px;
	        border: 1px solid #ccc;
	        border-radius: 5px;
	    }
	    button {
	        margin-top: 10px;
	        padding: 10px;
	        background-color: #28a745;
	        color: white;
	        border: none;
	        cursor: pointer;
	        width: 100%;
	        border-radius: 5px;
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 15px;
            text-align: left;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f4f4f4;
        }
        
        p{
            font-size: 15   px;
        }
	</style>

	<!-- JAVASCRIPT -->
	<script>
    document.addEventListener("DOMContentLoaded", function () {
        var settingsModal = document.getElementById("settingsModal");
        var openSettingsBtn = document.getElementById("openSettingsModal");
        var closeSettingsBtn = document.getElementById("closeSettingsModal");

        // Ensure modal is hidden when page loads
        settingsModal.style.display = "none";

        // Open modal only when button is clicked
        openSettingsBtn.addEventListener("click", function(event) {
            event.preventDefault();
            settingsModal.style.display = "flex"; // Show modal
        });

        // Close modal when clicking the close button (X)
        closeSettingsBtn.addEventListener("click", function() {
            settingsModal.style.display = "none"; // Hide modal
        });

        // Close modal when clicking outside the modal content
        window.addEventListener("click", function(event) {
            if (event.target === settingsModal) {
                settingsModal.style.display = "none"; // Hide modal
            }
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var modal = document.getElementById("scholarshipModal");
        var openModalBtn = document.getElementById("openModal");
        var closeModalBtn = document.getElementById("closeModal");

        // Ensure modal is hidden when page loads
        modal.style.display = "none";

        // Open modal only when button is clicked
        openModalBtn.addEventListener("click", function(event) {
            event.preventDefault();
            modal.style.display = "flex"; // Show modal
        });

        // Close modal when clicking the close button (X)
        closeModalBtn.addEventListener("click", function() {
            modal.style.display = "none"; // Hide modal
        });

        // Close modal when clicking outside the modal content
        window.addEventListener("click", function(event) {
            if (event.target === modal) {
                modal.style.display = "none"; // Hide modal
            }
        });
    });
</script>

	<script src="scripts.js"></script>
</body>
</html>
