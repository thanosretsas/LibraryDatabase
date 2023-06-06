<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>3.2.1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="LocalAdmin_layout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Home</a>
		<a class="navbar-brand" href="logout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Logout</a>
	</nav>
    <section>
       <div class="container">
            <h2 style="text-align: center;">Books per Title and Author</h2>

            <!-- Section for Search -->
            <div class="row mt-3">
                <form method="GET" action="3-2-1.php">
					<div class="row">
					
						<div class="form-group col-lg-5">
							<label for="title" class="form-label">Title:</label>
							<input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
						</div>
						<div class="form-group col-lg-5">
							<label for="author" class="form-label">Author:</label>
							<input type="text" class="form-control" id="author" name="author" placeholder="Enter author">
						</div>
						<div class="form-group col-lg-2">
							<label for="copies" class="form-label">Copies:</label>
							<input type="number" class="form-control" id="copies" name="copies" placeholder="Enter copies">
						</div>
					</div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
		
            <!-- Section for search results -->
            <div class="row mt-5">
                <h3 style="text-align: center;">Search Results</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    <?php 
					session_start();

					// Check if the user is logged in as a local admin
					if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'local_admin') {
						// Redirect the user to the login page or display an error message
						header('Location: login.php');
						exit();
					}						
					require_once 'conn.php'; 
					// Get the search criteria from the form
					$title = isset($_GET['title']) ? $_GET['title'] : null;
					$author = isset($_GET['author']) ? $_GET['author'] : null;
					$copies = isset($_GET['copies']) ? $_GET['copies'] : null;

					// Prepare and execute the query based on the search criteria
					$query = "SELECT  DISTINCT b.title, CONCAT(a.first_name, ' ', a.last_name) AS author_name
							FROM book b
							JOIN book_author ba ON b.id = ba.book_id
							JOIN author a ON ba.author_id = a.id
							JOIN book_school bs ON b.id = bs.book_id
							WHERE (b.title LIKE '%$title%' OR '$title' IS NULL)
								AND (CONCAT(a.first_name, ' ', a.last_name) LIKE '%$author%' OR '$author' IS NULL)
								AND (bs.copies >= '$copies' OR '$copies' IS NULL)";
					$result = mysqli_query($conn, $query);
					
					if (mysqli_num_rows($result) > 0) {

						// Display the search results
						while ($row = mysqli_fetch_assoc($result)) {
							echo "<tr>";
							echo "<td>" . $row['title'] . "</td>";
							echo "<td>" . $row['author_name'] . "</td>";
							echo "</tr>";
						}
				  
					} else {
						echo "<tr><td colspan='8'>No books found.</td></tr>";
					}						
					// Close the database connection
					mysqli_close($conn);
					?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
  </body>
</html>
