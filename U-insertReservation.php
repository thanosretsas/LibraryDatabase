<?php
session_start();

// Check if the user is logged in as a student, teacher, or local_admin
if (!isset($_SESSION['user_id']) || ($_SESSION['role'] !== 'student' && $_SESSION['role'] !== 'teacher' && $_SESSION['role'] !== 'local_admin')) {
    // Redirect the user to the login page or display an error message
    header('Location: login.php');
    exit();
}

require_once 'conn.php';

// Retrieve the user's ID
$userId = $_SESSION['user_id'];

// Retrieve the book_school ID from the request
$bookSchoolId = isset($_GET['book_school_id']) ? $_GET['book_school_id'] : '';

// Retrieve the current date
$currentDate = date('Y-m-d');

// Check Condition 1: No late loan for user
$sql = "SELECT COUNT(*) AS count FROM loan WHERE user_id = $userId AND return_date IS NULL AND due_date < CURDATE()";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if ($row['count'] > 0) {
    echo "You have a late loan and are not eligible to make a reservation.";
    exit();
}

// Check Condition 2: Number of reservations with user ID < maxReservationLimit
// Fetch user role based on the provided user ID
$userRoleQuery = "SELECT role FROM user WHERE id = $userID";
$userRoleResult = mysqli_query($conn, $userRoleQuery);
if (!$userRoleResult || mysqli_num_rows($userRoleResult) == 0) {
    echo "Failed to retrieve user role.";
    exit();
}
$userRole = mysqli_fetch_assoc($userRoleResult)['role'];
$maxReservationLimit = ($userRole === 'student') ? 2 : 1;

$rsrvCountQuery = "SELECT COUNT(*) AS count FROM reservation WHERE user_id = $userId AND status = 'active'";
$rsrvCountResult = mysqli_query($conn, $rsrvCountQuery);
$row = mysqli_fetch_assoc($rsrvCountResult);
if ($row['count'] >= $maxReservationLimit) {
    echo "You have reached the maximum number of reservations allowed.";
    exit();
}

// Check Condition 3: No loan with return date NULL for the same book_school_id
$sql = "SELECT COUNT(*) AS count FROM loan WHERE user_id = $userId AND book_school_id = $bookSchoolId AND return_date IS NULL";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if ($row['count'] > 0) {
    echo "You currently have this book on loan and cannot reserve it.";
    exit();
}

// Check Condition 4: No active or pending reservation for the same book_school_id
$sql = "SELECT COUNT(*) AS count FROM reservation WHERE user_id = $userId AND book_school_id = $bookSchoolId AND status IN ('active', 'pending')";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if ($row['count'] > 0) {
    echo "You have already reserved this book.";
    exit();
}

// Check if there are available copies for the book_school_id
$sql = "SELECT COUNT(*) AS count FROM book_school WHERE id = $bookSchoolId AND copies_available > 0";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$availableCopies = $row['count'];

// Insert the reservation based on availability
$status = ($availableCopies > 0) ? 'active' : 'pending';
$reserveDate = ($status === 'active') ? $currentDate : NULL;

$insertSql = "INSERT INTO reservation (book_school_id, user_id, reserve_date, status) VALUES ($bookSchoolId, $userId, '$reserveDate', '$status')";

if (mysqli_query($conn, $insertSql)) {
    echo "Reservation created successfully.";
} else {
    echo "Error creating reservation: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
