<?php
require 'dbConnect.php';

if (isset($_GET['school_id_number'])) {
    $id = $_GET['school_id_number'];

    $stmt = $pdo->prepare("DELETE FROM scholars WHERE school_id_number = :school_id_number");
    $stmt->execute(['school_id_number' => $id]);

    header("Location: admindash.php");
}
?>
