<?php
session_start();

// Check if the user is logged in as a local admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'local_admin') {
  // Redirect the user to the login page or display an error message
  header('Location: login.php');
  exit();
}

require_once 'conn.php';

// Get the school_id of the logged-in local admin
$school_id = $_SESSION['school_id'];

// Query the ratings with an approval status of 'no' and matching school_id
$query = "SELECT * FROM rating WHERE approved = 'no' AND user_id IN (SELECT id FROM user WHERE school_id = '$school_id')";
$result = mysqli_query($conn, $query);

// Check if the query executed successfully
if (!$result) {
  echo "Error retrieving ratings: " . mysqli_error($conn);  
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Local Admin Ratings</</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="LocalAdmin_layout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Home</a>
	  <a class="navbar-brand" href="logout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Logout</a>
  </nav>
  <div class="container">
    <h2 style="text-align: center;">Approve or Reject Ratings</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Rating ID</th>
          <th>User ID</th>
          <th>Book ID</th>
          <th>Review</th>
          <th>Likert</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['user_id']; ?></td>
            <td><?php echo $row['book_id']; ?></td>
            <td><?php echo $row['review']; ?></td>
            <td><?php echo $row['likert']; ?></td>
            <td>
              <form method="post" action="LA-ratingsAction.php">
                <input type="hidden" name="rating_id" value="<?php echo $row['id']; ?>">
                <button type="submit" name="approve" class="btn btn-success">Approve</button>
                <button type="submit" name="reject" class="btn btn-danger">Reject</button>
              </form>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>
</html>
