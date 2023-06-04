<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect the user to the login page or display an error message
    header('Location: login.php');
    exit();
}

// Check if the reservation ID is provided
if (!isset($_POST['reservation_id'])) {
    // Redirect the user or display an error message
    header('Location: U-Reservations.php');
    exit();
}

// Retrieve the reservation ID from the POST data
$reservationId = $_POST['reservation_id'];

// Include the database connection
require_once 'conn.php';

// Delete the reservation from the database
$sql = "DELETE FROM reservation WHERE id = $reservationId";

$result = mysqli_query($conn, $sql);

// Check if the deletion was successful
if ($result) {
    // Reservation deleted successfully
    // Redirect the user or display a success message
    header('Location: U-Reservations.php');
    exit();
} else {
    // Deletion failed
    // Display an error message
    echo "Error: " . mysqli_error($conn);
    exit();
}

// Close the database connection
mysqli_close($conn);
?>
