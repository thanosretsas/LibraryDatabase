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

// Initialize variables
$bookId = null;
$bookSchoolId = null;
$copiesAvailable = 0;
$userInfo = null;

// Check if the search form is submitted
if (isset($_POST['search'])) {
    $userId = $_POST['user_id'];

    // Retrieve the user's information
    $userQuery = "SELECT id, first_name, last_name, school_id FROM user WHERE id = $userId";
    $userResult = mysqli_query($conn, $userQuery);
    $userRow = mysqli_fetch_assoc($userResult);

    // Check if a user is found and the user belongs to the school
    if ($userRow && $userRow['school_id'] == $_SESSION['school_id']) {
        $userInfo = $userRow['last_name'] . ', ' . $userRow['first_name'];

        $bookTitle = $_POST['book_title'];

        // Retrieve the book ID for the given title
        $bookIdQuery = "SELECT id FROM book WHERE title = '$bookTitle'";
        $bookIdResult = mysqli_query($conn, $bookIdQuery);
        $bookIdRow = mysqli_fetch_assoc($bookIdResult);
        $bookId = $bookIdRow['id'];

        // Check if a book ID is found
        if ($bookId) {
            $schoolId = $_SESSION['school_id'];

            // Retrieve book-school information
            $bookSchoolQuery = "SELECT bs.id, bs.copies_available, bs.copies, b.title
                                FROM book_school bs
                                JOIN book b ON b.id = bs.book_id
                                WHERE bs.book_id = $bookId AND bs.school_id = $schoolId";
            $bookSchoolResult = mysqli_query($conn, $bookSchoolQuery);
            $bookSchoolRow = mysqli_fetch_assoc($bookSchoolResult);
			if ($bookSchoolRow) {
				$bookSchoolId = $bookSchoolRow['id'];
				$copiesAvailable = $bookSchoolRow['copies_available'];
				$copies = $bookSchoolRow['copies'];
				$bookTitle = $bookSchoolRow['title'];
			} else {
				$userInfo = "Book not found in school library.";
			}	
        } else {
			$userInfo = "Book title not found.";
		}
		
    } else {
        $userInfo = "User ID does not belong to the school.";
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Loan Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="LocalAdmin_layout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Home</a>
	  <a class="navbar-brand" href="logout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Logout</a>
	</nav>
    <div class="container">
        <h2 style="text-align: center;">Handle a Loan</h2>

        <!-- Search Form -->
        <form action="LA-Loans.php" method="POST">
            <div class="mb-3">
                <label for="user_id" class="form-label">User ID:</label>
                <input type="text" class="form-control" id="user_id" name="user_id" required>
            </div>
            <div class="mb-3">
                <label for="book_title" class="form-label">Book Title:</label>
                <input type="text" class="form-control" id="book_title" name="book_title" required>
            </div>
            <button type="submit" name="search" class="btn btn-primary">Search</button>
        </form>

        <?php if ($userInfo) : ?>
            <h2>User Information:</h2>
            <p><?php echo $userInfo; ?></p>
        <?php endif; ?>

		<!-- Book Info Table -->
		<?php if ($bookSchoolId) : ?>
			<h2>Book Information:</h2>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Book Title</th>
						<th>Copies</th>
						<th>Copies Available</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $bookTitle; ?></td>
						<td><?php echo $copies; ?></td>
						<td><?php echo $copiesAvailable; ?></td>
						<td>
							<?php if ($copiesAvailable === 0) : ?>
								<button type="button" class="btn btn-success" disabled>Loan</button>
								<div class="alert alert-warning" role="alert">
									No copies of this book are currently available.
								</div>
							<?php else : ?>
								<form action="LA-insertLoan.php" method="POST">
									<input type="hidden" name="user_id" value="<?php echo $_POST['user_id']; ?>">
									<input type="hidden" name="book_school_id" value="<?php echo $bookSchoolId; ?>">
									<button type="submit" class="btn btn-success">Loan</button>
								</form>
							<?php endif; ?>
						</td>
					</tr>
				</tbody>
			</table>
		<?php endif; ?>
    </div>
</body>
</html>