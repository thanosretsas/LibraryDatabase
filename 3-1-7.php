<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>3.1.7</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
   	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="GlobalAdmin_layout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Home</a>
	  <a class="navbar-brand" href="logout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Logout</a>
	</nav>	  
    <section>
      <h2 style="text-align: center;">AUTHORS with 5 books less than AUTHOR with most BOOKS</h2>
      <div class="container">
        <div class="row">
          <div class="col">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Author ID</th>
                  <th>Author Name</th>
                  <th>Book Count</th>
                </tr>
              </thead>
              <tbody>

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
                  $query = "SELECT a.id, CONCAT(a.first_name, ' ', a.last_name) AS author_name, COUNT(*) AS book_count
                            FROM author a
                            JOIN book_author ba ON a.id = ba.author_id
                            GROUP BY a.id, author_name
                            HAVING COUNT(*) <= (
                                SELECT COUNT(*) - 5
                                FROM book_author
                                GROUP BY author_id
                                ORDER BY COUNT(*) DESC
                                LIMIT 1
                            )";
                  $result = mysqli_query($conn, $query);
				  
				  
				  
				  //Where?? echo "<h3>Most Books from an Author: " . $row['book_count'] . "</h3>";

                  // Fetch the results and generate the table rows
                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      $authorID = $row['id'];
                      $authorName = $row['author_name'];
                      $bookCount = $row['book_count'];

                      // Generate the table row
                      echo "<tr>";
                      echo "<td>$authorID</td>";
                      echo "<td>$authorName</td>";
                      echo "<td>$bookCount</td>";
                      echo "</tr>";
                    }
                  } else {
                    echo "<tr><td colspan='3'>No authors found.</td></tr>";
                  }

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
