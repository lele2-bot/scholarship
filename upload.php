<?php
if (isset($_POST["submit"])) {
    $target_dir = "scholarship/img"; // Ensure this folder exists in `htdocs`
    
    // Ensure the file is set
    if (!isset($_FILES["image"])) {
        die("No file uploaded.");
    }

    // Get file details
    $file_name = basename($_FILES["image"]["name"]);
    $target_file = $target_dir . $file_name;

    // Allowed file types
    $allowed_types = ["jpg", "jpeg", "png", "gif"];
    $file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if the file type is valid
    if (!in_array($file_extension, $allowed_types)) {
        die("Invalid file type.");
    }

    // Move file to `htdocs/image/`
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "File uploaded successfully!";
        // Redirect to display the image
        header("Location: view.php?image=" . urlencode($file_name));
        exit();
    } else {
        echo "File upload failed.";
    }
}
?>