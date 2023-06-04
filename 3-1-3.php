<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>3.1.3</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  </head>
  <body>
 	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="GlobalAdmin_layout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Home</a>
	  <a class="navbar-brand" href="logout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Logout</a>
	</nav>	
  
    <div class="container">
      <h2 style="text-align: center;">Teachers under 40 assorted by number of borrowed Boooks</h2>

      <?php
	  // Check if the user is logged in as a Global Administrator
	  session_start();
	  if ($_SESSION['role'] !== 'global_admin') {
		// Redirect to login page or display an error message
		header("Location: login.php");
		exit();
	  }			  
	  
      // Include the necessary files and establish a database connection
      require_once 'conn.php';

      // Execute the query
      $query = "SELECT u.id, u.Username, COUNT(l.id) AS loan_count
                FROM user u
                JOIN loan l ON u.id = l.user_id
                WHERE u.role = 'teacher'
                  AND TIMESTAMPDIFF(YEAR, u.birth_date, CURDATE()) < 40
                GROUP BY u.id, u.Username
                ORDER BY loan_count DESC";
      $result = mysqli_query($conn, $query);

      // Check if any results are returned
      if (mysqli_num_rows($result) > 0) {
        echo '<div class="table-responsive mt-3">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Username</th>
                      <th>Loan Count</th>
                    </tr>
                  </thead>
                  <tbody>';

        // Loop through the rows and display the data
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<tr>
                  <td>' . $row['id'] . '</td>
                  <td>' . $row['Username'] . '</td>
                  <td>' . $row['loan_count'] . '</td>
                </tr>';
        }

        echo '</tbody>
              </table>
            </div>';
      } else {
        echo '<p class="mt-3">No results found.</p>';
      }

      // Close the database connection
      mysqli_close($conn);
      ?>

    </div>
  </body>
</html>


