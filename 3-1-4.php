<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>3-1-4</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  </head>
  <body>
 	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="GlobalAdmin_layout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Home</a>
	  <a class="navbar-brand" href="logout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Logout</a>
	</nav>	  
    <div class="container">
      <h2 style="text-align: center;">Authors with no Book Loans</h2>

      <?php
	  // Check if the user is logged in as a Global Administrator
	  session_start();
	  if ($_SESSION['role'] !== 'global_admin') {
		// Redirect to login page or display an error message
		header("Location: login.php");
		exit();
	  }			  
      require_once 'conn.php';

      // Execute the query
      $query = "SELECT DISTINCT a.id, a.first_name, a.last_name
                FROM author a
                LEFT JOIN book_author ba ON a.id = ba.author_id
                LEFT JOIN book_school bs ON ba.book_id = bs.id
                LEFT JOIN loan l ON bs.id = l.book_school_id
                WHERE l.id IS NULL";
      $result = mysqli_query($conn, $query);

      // Check if any results are returned
      if (mysqli_num_rows($result) > 0) {
        echo '<div class="table-responsive mt-3">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                    </tr>
                  </thead>
                  <tbody>';

        // Loop through the rows and display the data
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<tr>
                  <td>' . $row['id'] . '</td>
                  <td>' . $row['first_name'] . '</td>
                  <td>' . $row['last_name'] . '</td>
                </tr>';
        }

        echo '</tbody>
              </table>
            </div>';
      } else {
        echo '<p class="mt-3">No authors found.</p>';
      }

      // Close the database connection
      mysqli_close($conn);
      ?>

    </div>
  </body>
</html>
