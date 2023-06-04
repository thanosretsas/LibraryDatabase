<?php
session_start();

// Check if the user is logged in as a student or teacher or local_admin
if (!isset($_SESSION['user_id']) || ($_SESSION['role'] !== 'student' && $_SESSION['role'] !== 'teacher' && $_SESSION['role'] !== 'local_admin')) {
    // Redirect the user to the login page or display an error message
    header('Location: login.php');
    exit();
}

require_once 'conn.php';

// Retrieve the user's school ID
$schoolID = $_SESSION['school_id'];

// Retrieve the search criteria from the form submission
$searchTitle = isset($_POST['searchTitle']) ? $_POST['searchTitle'] : '';
$searchCategory = isset($_POST['searchCategory']) ? $_POST['searchCategory'] : '';
$searchAuthorFirstName = isset($_POST['searchAuthorFirstName']) ? $_POST['searchAuthorFirstName'] : '';
$searchAuthorLastName = isset($_POST['searchAuthorLastName']) ? $_POST['searchAuthorLastName'] : '';

// Construct the query based on the search criteria
$sql = "SELECT bs.id AS book_school_id, b.title, b.date, b.ISBN, b.language, b.page_num, GROUP_CONCAT(DISTINCT CONCAT(a.first_name, ' ', a.last_name) SEPARATOR ', ') AS authors, GROUP_CONCAT(DISTINCT c.name SEPARATOR ', ') AS categories
        FROM book_school bs
        INNER JOIN book b ON bs.book_id = b.id
        LEFT JOIN book_author ba ON b.id = ba.book_id
        LEFT JOIN author a ON ba.author_id = a.id
        LEFT JOIN book_category bc ON b.id = bc.book_id
        LEFT JOIN category c ON bc.category_id = c.id
        WHERE bs.school_id = $schoolID";

if (!empty($searchTitle)) {
    $sql .= " AND b.title LIKE '%$searchTitle%'";
}

if (!empty($searchCategory)) {
    $sql .= " AND c.name = '$searchCategory'";
}

if (!empty($searchAuthorFirstName)) {
    $sql .= " AND a.first_name LIKE '%$searchAuthorFirstName%'";
}

if (!empty($searchAuthorLastName)) {
    $sql .= " AND a.last_name LIKE '%$searchAuthorLastName%'";
}

$sql .= " GROUP BY b.id";

$result = mysqli_query($conn, $sql);

// Check if the query was successful
if (!$result) {
    // Query error
    echo "Error: " . mysqli_error($conn);
    exit();
}

// Fetch all books that match the search criteria
$books = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Close the database connection
mysqli_close($conn);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BookReservations</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
<body>	
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="User_layout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Home</a>
	  <a class="navbar-brand" href="logout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Logout</a>
	</nav>

    <div class="container">
        <h2 style="text-align: center;">Select and Reserve Books</h2>
        <form method="POST" action="U-BookReservations.php">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="searchTitle">Search by Title</label>
                        <input type="text" class="form-control" id="searchTitle" name="searchTitle" value="<?php echo $searchTitle; ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="searchCategory">Search by Category</label>
                        <select class="form-control" id="searchCategory" name="searchCategory">
                            <option value="">Select a category</option>
                            <option value="fiction" <?php echo ($searchCategory === 'fiction') ? 'selected' : ''; ?>>Fiction</option>
                            <option value="sci-fi" <?php echo ($searchCategory === 'sci-fi') ? 'selected' : ''; ?>>Sci-Fi</option>
                            <option value="non-fiction" <?php echo ($searchCategory === 'non-fiction') ? 'selected' : ''; ?>>Non-Fiction</option>
                            <option value="mystery" <?php echo ($searchCategory === 'mystery') ? 'selected' : ''; ?>>Mystery</option>
                            <option value="poetry" <?php echo ($searchCategory === 'poetry') ? 'selected' : ''; ?>>Poetry</option>
                            <option value="other" <?php echo ($searchCategory === 'other') ? 'selected' : ''; ?>>Other</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="searchAuthorFirstName">Search by Author First Name</label>
                        <input type="text" class="form-control" id="searchAuthorFirstName" name="searchAuthorFirstName" value="<?php echo $searchAuthorFirstName; ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="searchAuthorLastName">Search by Author Last Name</label>
                        <input type="text" class="form-control" id="searchAuthorLastName" name="searchAuthorLastName" value="<?php echo $searchAuthorLastName; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </div>
        </form>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Date</th>
                    <th>ISBN</th>
                    <th>Language</th>
                    <th>Page Number</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book) : ?>
                    <tr>
                        <td><?php echo $book['title']; ?></td>
                        <td><?php echo $book['date']; ?></td>
                        <td><?php echo $book['ISBN']; ?></td>
                        <td><?php echo $book['language']; ?></td>
                        <td><?php echo $book['page_num']; ?></td>
                        <td><?php echo $book['authors']; ?></td>
                        <td><?php echo $book['categories']; ?></td>
                        <td><a href="U-insertReservation.php?book_school_id=<?php echo $book['book_school_id']; ?>" class="btn btn-primary">Reserve</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
