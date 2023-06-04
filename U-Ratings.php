<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}

// Include the database connection file
require_once "conn.php";

// Retrieve the user's role from the session
$role = $_SESSION['role'];

// Function to determine the default approved value based on the user's role
function getDefaultApprovedValue($role)
{
    if ($role === 'student') {
        return 'no';
    } else {
        return 'yes';
    }
}

// Inserting a Rating
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $bookTitle = $_POST['book_title'];
    $review = $_POST['review'];
    $likert = $_POST['likert'];

    // Fetch the book ID based on the provided title
    $selectBookSql = "SELECT id FROM book WHERE title = '$bookTitle'";
    $selectBookResult = mysqli_query($conn, $selectBookSql);
    $book = mysqli_fetch_assoc($selectBookResult);

    if ($book) {
        $bookId = $book['id'];

        // Determine the approved value based on the user's role
        $approved = getDefaultApprovedValue($role);

        // Insert the rating into the database
        $insertSql = "INSERT INTO rating (user_id, book_id, review, likert, approved) VALUES ('{$_SESSION['user_id']}', '$bookId', '$review', '$likert', '$approved')";

        $insertResult = mysqli_query($conn, $insertSql);

        // Check if the rating was inserted successfully
        if ($insertResult) {
            echo "Rating inserted successfully.";
        } else {
            echo "Failed to insert the rating.";
        }
    } else {
        echo "Book with the provided title not found.";
    }
}

// Deleting a Rating
if (isset($_GET['delete']) && $_GET['delete'] === 'true' && isset($_GET['rating_id'])) {
    $ratingId = $_GET['rating_id'];

    // Delete the rating from the database
    $deleteSql = "DELETE FROM rating WHERE id = '$ratingId' AND user_id = '{$_SESSION['user_id']}'";

    $deleteResult = mysqli_query($conn, $deleteSql);

    // Check if the rating was deleted successfully
    if ($deleteResult) {
        echo "Rating deleted successfully.";
    } else {
        echo "Failed to delete the rating.";
    }
}

// Retrieve the user's ratings
$userId = $_SESSION['user_id'];
$selectSql = "SELECT rating.id, book.title, rating.review, rating.likert, rating.approved FROM rating JOIN book ON rating.book_id = book.id WHERE rating.user_id = '$userId'";

$selectResult = mysqli_query($conn, $selectSql);

// Close the database connection
mysqli_close($conn);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Ratings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="User_layout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Home</a>
	  <a class="navbar-brand" href="logout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Logout</a>
	</nav>
    <div class="container">
        <h2 style="text-align: center;">User Ratings</h2>

        <!-- Rating Form -->
        <div class="mt-4">
            <h3>Add a Rating</h3>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="row">				
					<div class="form-group col-lg-10">
						<label for="book_title">Book Title:</label>
						<input type="text" name="book_title" class="form-control" required>
					</div>
					<div class="form-group col-lg-2">
						<label for="likert">Likert Rating:</label>
						<input type="number" name="likert" class="form-control" min="1" max="5" required>
					</div>
				</div>
                <div class="form-group">
                    <label for="review">Review:</label>
                    <textarea name="review" class="form-control" required></textarea>
                </div>
                				

                <button type="submit" class="btn btn-primary mt-2">Submit</button>
            </form>
        </div>

        <!-- User Ratings List -->
        <div class="mt-4">
            <h3>Your Ratings</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Book Title</th>
                        <th>Review</th>
                        <th>Likert Rating</th>
                        <th>Approved</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($selectResult)) : ?>
                        <tr>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['review']; ?></td>
                            <td><?php echo $row['likert']; ?></td>
                            <td><?php echo $row['approved']; ?></td>
                            <td>
                                <a href="U-Ratings.php?delete=true&rating_id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                                <a href="U-updateRating.php?rating_id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
