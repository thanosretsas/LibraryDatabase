<?php
session_start();

// Check if the user is logged in as a local_admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'local_admin') {
    // Redirect the user to the login page or display an error message
    header('Location: login.php');
    exit();
}

require_once 'conn.php';

// Retrieve data from the form submission
$userID = $_POST['user_id'];
$bookSchoolID = $_POST['book_school_id'];

// Check Condition 1: No late loan for user
$lateLoanQuery = "SELECT COUNT(*) AS count FROM loan WHERE user_id = $userID AND return_date IS NULL AND due_date < CURDATE()";
$lateLoanResult = mysqli_query($conn, $lateLoanQuery);
$lateLoanCount = mysqli_fetch_assoc($lateLoanResult)['count'];

if ($lateLoanCount > 0) {
    echo "The user has a late loan and is not eligible for a new loan.";
    exit();
}

// Check Condition 2: Number of loans with user ID < maxLoanLimit
// Fetch user role based on the provided user ID
$userRoleQuery = "SELECT role FROM user WHERE id = $userID";
$userRoleResult = mysqli_query($conn, $userRoleQuery);
if (!$userRoleResult || mysqli_num_rows($userRoleResult) == 0) {
    echo "Failed to retrieve user role.";
    exit();
}
$userRole = mysqli_fetch_assoc($userRoleResult)['role'];
$maxLoanLimit = ($userRole === 'student') ? 2 : 1;

$loanCountQuery = "SELECT COUNT(*) AS count FROM loan WHERE user_id = $userID";
$loanCountResult = mysqli_query($conn, $loanCountQuery);
$loanCount = mysqli_fetch_assoc($loanCountResult)['count'];

if ($loanCount >= $maxLoanLimit) {
	echo "  The user has reached the maximum number of loans allowed.";
    exit();
}

// Check Condition 3: No loan with return date NULL for the same book_school_id
$existingLoanQuery = "SELECT COUNT(*) AS count FROM loan WHERE user_id = $userID AND book_school_id = $bookSchoolID AND return_date IS NULL";
$existingLoanResult = mysqli_query($conn, $existingLoanQuery);
$existingLoanCount = mysqli_fetch_assoc($existingLoanResult)['count'];

if ($existingLoanCount > 0) {
    echo "The user already has this book on loan.";
    exit();
}

// Check Condition 4: No pending reservation for the same book_school_id
$pendingReservationQuery = "SELECT COUNT(*) AS count FROM reservation WHERE user_id = $userID AND book_school_id = $bookSchoolID AND status = 'pending'";
$pendingReservationResult = mysqli_query($conn, $pendingReservationQuery);
$pendingReservationCount = mysqli_fetch_assoc($pendingReservationResult)['count'];

if ($pendingReservationCount > 0) {
    echo "The user has a pending reservation for this book.";
    exit();
}

// Retrieve book information
$bookInfoQuery = "SELECT b.title, bs.copies_available FROM book_school bs
                  JOIN book b ON b.id = bs.book_id
                  WHERE bs.id = $bookSchoolID";
$bookInfoResult = mysqli_query($conn, $bookInfoQuery);
if (!$bookInfoResult || mysqli_num_rows($bookInfoResult) == 0) {
    echo "The book information is not available.";
    exit();
}
$bookInfo = mysqli_fetch_assoc($bookInfoResult);
$bookTitle = $bookInfo['title'];
$copiesAvailable = $bookInfo['copies_available'];

// Check if copies are available for the book
if ($copiesAvailable > 0) {
	
	// Check if there is an active reservation for the same book_school_id
    $activeReservationQuery = "SELECT id FROM reservation WHERE user_id = $userID AND book_school_id = $bookSchoolID AND status = 'active'";
    $activeReservationResult = mysqli_query($conn, $activeReservationQuery);
	
	if (!$activeReservationResult || mysqli_num_rows($activeReservationResult) == 0) {
		// No active reservation found
		$activeReservationID = null;
	} else {
		// Fetch the active reservation ID
		$activeReservationID = mysqli_fetch_assoc($activeReservationResult)['id'];
	}
	// Start the transaction
	mysqli_autocommit($conn, false);

	if ($activeReservationID) {
		// Delete the corresponding active reservation
		$deleteReservationQuery = "DELETE FROM reservation WHERE id = $activeReservationID";
		$deleteReservationResult = mysqli_query($conn, $deleteReservationQuery);

		if (!$deleteReservationResult) {
			mysqli_rollback($conn);
			echo "Error occurred while deleting the reservation.";
			exit();
		}
	}

	// Insert a new loan
	$loanDate = date('Y-m-d');
	$dueDate = date('Y-m-d', strtotime('+7 days'));
	$localAdminID = $_SESSION['user_id'];

	$insertLoanQuery = "INSERT INTO loan (book_school_id, user_id, local_admin_id, loan_date, due_date, return_date)
						VALUES ($bookSchoolID, $userID, $localAdminID, '$loanDate', '$dueDate', NULL)";
	$insertLoanResult = mysqli_query($conn, $insertLoanQuery);

	if (!$insertLoanResult) {
		mysqli_rollback($conn);
		echo "Error occurred while creating the loan.";
		exit();
	}

	// Commit the transaction
	mysqli_commit($conn);

    echo "Loan created successfully for book '$bookTitle'.";
} else {
    echo "No copies of this book are currently available.";
}

mysqli_close($conn);
?>
