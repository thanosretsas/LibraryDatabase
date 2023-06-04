<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LA Loans & Reservations</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="LocalAdmin_layout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Home</a>
    <a class="navbar-brand" href="logout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Logout</a>
  </nav>

  <section>
    <h2 style="text-align: center;">Local Administrator - Loans & Reservations</h2>
    <div class="container">
      <div class="row">
        <div class="col">
          <form method="POST">
            <div class="form-group">
              <label for="user_id">User ID:</label>
              <input type="number" class="form-control" id="user_id" name="user_id" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>

 <?php
session_start();

// Check if the user is logged in as a Local Administrator
if ($_SESSION['role'] !== 'local_admin') {
    // Redirect to login page or display an error message
    header("Location: login.php");
    exit();
}

require_once 'conn.php';

// Check if the form is submitted
if (isset($_POST['user_id'])) {
    // Retrieve the submitted user_id and localAdminSchoolId
    $submittedUserId = $_POST['user_id'];
    $localAdminSchoolId = $_SESSION['school_id'];

    // Check if the submitted user_id is in the Local Administrator's school
    $checkUserQuery = "SELECT * FROM user WHERE id = $submittedUserId AND school_id = $localAdminSchoolId";
    $checkUserResult = mysqli_query($conn, $checkUserQuery);

    // Check for query execution errors
    if (!$checkUserResult) {
        die('Error executing query: ' . mysqli_error($conn));
    }

    if (mysqli_num_rows($checkUserResult) === 0) {
        echo "<div class='row'><div class='col'><p>User not found or not in the local administrator's school.</p></div></div>";
    } else {
        // Retrieve the user's loan information
        $loanQuery = "SELECT u.id AS user_id, b.title AS book_title, l.loan_date
                      FROM loan l
                      JOIN user u ON l.user_id = u.id
                      JOIN book_school bs ON l.book_school_id = bs.id
                      JOIN book b ON bs.book_id = b.id
                      WHERE u.id = $submittedUserId";

        $loanResult = mysqli_query($conn, $loanQuery);

        // Retrieve the user's reservation information
        $reservationQuery = "SELECT u.id AS user_id, b.title AS book_title, r.reserve_date
                             FROM reservation r
                             JOIN user u ON r.user_id = u.id
                             JOIN book_school bs ON r.book_school_id = bs.id
                             JOIN book b ON bs.book_id = b.id
                             WHERE u.id = $submittedUserId";

        $reservationResult = mysqli_query($conn, $reservationQuery);

        echo "<div class='row'><div class='col'>";
        if (mysqli_num_rows($loanResult) > 0) {
            echo "<h3>Loans</h3>";
            echo "<table class='table table-striped'>";
            echo "<thead><tr><th>User ID</th><th>Book Title</th><th>Loan Date</th></tr></thead>";
            echo "<tbody>";
            while ($loanRow = mysqli_fetch_assoc($loanResult)) {
                $userId = $loanRow['user_id'];
                $bookTitle = $loanRow['book_title'];
                $loanDate = $loanRow['loan_date'];

                echo "<tr><td>$userId</td><td>$bookTitle</td><td>$loanDate</td></tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<p>No loan records found for the user.</p>";
        }
        echo "</div></div>";

        echo "<div class='row'><div class='col'>";
        if (mysqli_num_rows($reservationResult) > 0) {
            echo "<h3>Reservations</h3>";
            echo "<table class='table table-striped'>";
            echo "<thead><tr><th>User ID</th><th>Book Title</th><th>Reservation Date</th></tr></thead>";
            echo "<tbody>";
            while ($reservationRow = mysqli_fetch_assoc($reservationResult)) {
                $userId = $reservationRow['user_id'];
                $bookTitle = $reservationRow['book_title'];
                $reservationDate = $reservationRow['reserve_date'];

                echo "<tr><td>$userId</td><td>$bookTitle</td><td>$reservationDate</td></tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<p>No reservation records found for the user.</p>";
        }
        echo "</div></div>";
    }
}
?>

    </div>
  </section>
</body>
</html>
