<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>3.1.6</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
   	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="GlobalAdmin_layout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Home</a>
	  <a class="navbar-brand" href="logout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Logout</a>
	</nav>	  
    <section>
      <h2 style="text-align: center;">TOP 3 pairs of Categories with most borrowed books</h1>
      <div class="container">
        <div class="row">
          <div class="col">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Category 1</th>
                  <th>Category 2</th>
                  <th>Loan Count</th>
                </tr>
              </thead>
              <tbody>
                <!-- Loop through the query result and generate table rows -->
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
                  $query = "SELECT c1.name AS category1, c2.name AS category2, COUNT(*) AS loan_count
                            FROM book_category bc1
                            JOIN book_category bc2 ON bc1.book_id = bc2.book_id AND bc1.category_id <> bc2.category_id
                            JOIN loan l ON bc1.book_id = l.book_school_id
                            JOIN category c1 ON bc1.category_id = c1.id
                            JOIN category c2 ON bc2.category_id = c2.id
                            GROUP BY bc1.category_id, bc2.category_id
                            ORDER BY loan_count DESC
                            LIMIT 3";
                  $result = mysqli_query($conn, $query);

                  // Fetch the results and generate the table rows
                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      $category1 = $row['category1'];
                      $category2 = $row['category2'];
                      $loanCount = $row['loan_count'];

                      // Generate the table row
                      echo "<tr>";
                      echo "<td>$category1</td>";
                      echo "<td>$category2</td>";
                      echo "<td>$loanCount</td>";
                      echo "</tr>";
                    }
                  } else {
                    echo "<tr><td colspan='3'>No results found.</td></tr>";
                  }

                  // Close the database connection
                  mysqli_close($conn);
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
