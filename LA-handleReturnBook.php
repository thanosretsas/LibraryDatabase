<?php
session_start();

// Check if the user is logged in as a local admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'local_admin') {
    // Redirect the user to the login page or display an error message
    header('Location: login.php');
    exit();
}

// Include the database connection
require_once 'conn.php';

// Check if the form is submitted
if (isset($_POST['return'])) {
    $bookSchoolId = $_POST['book_school_id'];
    $userId = $_POST['user_id'];
    $loanId = $_POST['loan_id'];

    // Update the loan table with the return date
    $returnDate = date('Y-m-d');
    $updateLoanQuery = "UPDATE loan SET return_date = '$returnDate' WHERE id = $loanId";
    mysqli_query($conn, $updateLoanQuery);

    // Check if there are any pending reservations for the same book_school_id
    $pendingReservationQuery = "SELECT id FROM reservation WHERE book_school_id = $bookSchoolId AND status = 'pending'";
    $pendingReservationResult = mysqli_query($conn, $pendingReservationQuery);

    if (mysqli_num_rows($pendingReservationResult) > 0) {
        // If pending reservations are found, update the first entry to active and set reserve date
        $firstReservationRow = mysqli_fetch_assoc($pendingReservationResult);
        $firstReservationId = $firstReservationRow['id'];

        $updateReservationQuery = "UPDATE reservation SET status = 'active', reserve_date = '$returnDate' WHERE id = $firstReservationId";
        mysqli_query($conn, $updateReservationQuery);
    } else {
        // If no pending reservations are found, increase copies_available in book-school table
        $increaseCopiesQuery = "UPDATE book_school SET copies_available = copies_available + 1 WHERE id = $bookSchoolId";
        mysqli_query($conn, $increaseCopiesQuery);
    }

    // Display a success message
    echo "Book return processed successfully.";
    exit();
}

// Close the database connection
mysqli_close($conn);
?>
