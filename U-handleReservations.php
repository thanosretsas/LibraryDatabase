<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect the user to the login page or display an error message
    header('Location: login.php');
    exit();
}

// Retrieve the user's ID
$userId = $_SESSION['user_id'];

// Include the database connection
require_once 'conn.php';

// Fetch the user's reservations
$sql = "SELECT r.id, b.title, r.reserve_date, r.status
		FROM book_school bs
		JOIN reservation r ON r.book_school_id = bs.id
		JOIN book b ON b.id = bs.book_id
		WHERE r.user_id = $userId";

$result = mysqli_query($conn, $sql);

// Check if the query was successful
if (!$result) {
    // Query error
    echo "Error: " . mysqli_error($conn);
    exit();
}

// Fetch all reservations for the user
$reservations = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Close the database connection
mysqli_close($conn);
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reservations</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="User_layout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Home</a>
	  <a class="navbar-brand" href="logout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Logout</a>
	</nav>

    <div class="container">
        <h2 style="text-align: center;">Handle Reservations</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Reservation Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservations as $reservation) : ?>
                    <tr>
						<td><?php echo $reservation['title']; ?></td>                        
						<td><?php echo $reservation['reserve_date']; ?></td>                      
                        <td><?php echo $reservation['status']; ?></td>
                        <td>
                            <form action="U-deleteReservation.php" method="POST">
                                <input type="hidden" name="reservation_id" value="<?php echo $reservation['id']; ?>">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
