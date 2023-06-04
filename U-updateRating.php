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

// Retrieve the rating ID from the query parameters
if (isset($_GET['rating_id'])) {
    $ratingId = $_GET['rating_id'];

    // Retrieve the rating details from the database
    $selectSql = "SELECT rating.id, rating.book_id, book.title, rating.review, rating.likert, rating.approved FROM rating JOIN book ON rating.book_id = book.id WHERE rating.id = '$ratingId' AND rating.user_id = '{$_SESSION['user_id']}'";
    $selectResult = mysqli_query($conn, $selectSql);
    $rating = mysqli_fetch_assoc($selectResult);
} else {
    // If the rating ID is not provided, redirect to U-Ratings.php
    header("Location: U-Ratings.php");
    exit();
}

// Updating a Rating
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_rating'])) {
    $review = $_POST['review'];
    $likert = $_POST['likert'];

    // Determine the approved value based on the user's role
    $approved = getDefaultApprovedValue($role);

    // Update the rating in the database
    $updateSql = "UPDATE rating SET review = '$review', likert = '$likert', approved = '$approved' WHERE id = '$ratingId' AND user_id = '{$_SESSION['user_id']}'";

    $updateResult = mysqli_query($conn, $updateSql);

    // Check if the rating was updated successfully
    if ($updateResult) {
        header("Location: U-Ratings.php");
    } else {
        echo "Failed to update the rating.";
    }
}

// Function to determine the default approved value based on the user's role
function getDefaultApprovedValue($role)
{
    if ($role === 'student') {
        return 'no';
    } else {
        return 'yes';
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
    <title>Update Rating</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
	
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="User_layout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Home</a>
	  <a class="navbar-brand" href="logout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Logout</a>
	</nav>


    <div class="container mt-4">
        <h2>Update Rating</h2>

        <!-- Rating Form -->
        <div class="mt-4">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'] . '?rating_id=' . $ratingId; ?>">
                <div class="form-group">
                    <label for="book_title">Book Title:</label>
                    <input type="text" name="book_title" class="form-control" value="<?php echo $rating['title']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="review">Review:</label>
                    <textarea name="review" class="form-control" required><?php echo $rating['review']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="likert">Likert Rating:</label>
					<div class="col-sm-1">
						<input type="number" name="likert" class="form-control" min="1" max="5" value="<?php echo $rating['likert']; ?>" required>
					</div>
                </div>
                <button type="submit" name="update_rating" class="btn btn-primary mt-2">Update Rating</button>
            </form>
        </div>
    </div>

</body>
</html>
