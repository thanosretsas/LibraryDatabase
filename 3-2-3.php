<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>3.2.3 - Average Rating per User and Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
   	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="LocalAdmin_layout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Home</a>
		<a class="navbar-brand" href="logout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Logout</a>
	</nav> 
    <section>
        <div class="container">
            <h2 style="text-align: center;">Average Rating per User and Category</h2>

            <div class="row mt-3">
                <form method="GET" action="3-2-3.php">
 
				<div class="row">				
						<div class="form-group col-lg-5">
                        <label for="first_name" class="form-label">First Name:</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name">
						</div>
						<div class="form-group col-lg-5">
                        <label for="last_name" class="form-label">Last Name:</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter last name">
						</div>
						<div class="form-group col-lg-2">
                        <label for="category" class="form-label">Category:</label>
                        <select class="form-select" id="category" name="category">
                            <option value="">All Categories</option>
                            <option value="fiction">Fiction</option>
                            <option value="sci-fi">Sci-Fi</option>
                            <option value="non-fiction">Non-Fiction</option>
                            <option value="mystery">Mystery</option>
                            <option value="poetry">Poetry</option>
                            <option value="other">Other</option>
                        </select>
						</div>
					</div>
                    <button type="submit" class="btn btn-primary mt-2">Search</button> 
                </form>
            </div>

            <div class="row mt-5">
                <h3 style="text-align: center;">Search Results</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Category</th>
                            <th>Average Rating</th>
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
						//Retrieve the search parameters
                        $first_name = isset($_GET['first_name']) ? $_GET['first_name'] : null;
                        $last_name = isset($_GET['last_name']) ? $_GET['last_name'] : null;
                        $category = isset($_GET['category']) ? $_GET['category'] : null;

                        // Prepare and execute the query based on the search criteria
                        $query = "SELECT u.id AS user_id, u.first_name, u.last_name, c.name AS category, AVG(r.likert) AS avg_rating
                                FROM user u
                                JOIN rating r ON u.id = r.user_id
                                JOIN book b ON r.book_id = b.id
                                JOIN book_category bc ON b.id = bc.book_id
                                JOIN category c ON bc.category_id = c.id
                                WHERE (u.first_name LIKE '%" . $first_name . "%' OR '" . $first_name . "' IS NULL)
                                AND (u.last_name LIKE '%" . $last_name . "%' OR '" . $last_name . "' IS NULL)
                                AND (c.name ='$category' OR '" . $category . "' IS NULL)
                                GROUP BY u.id, c.name
                                ORDER BY u.id";
                        $result = mysqli_query($conn, $query);

						if (mysqli_num_rows($result) > 0) {

							// Display the search results
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<tr>";
								echo "<td>" . $row['user_id'] . "</td>";
								echo "<td>" . $row['first_name'] . "</td>";
								echo "<td>" . $row['last_name'] . "</td>";
								echo "<td>" . $row['category'] . "</td>";
								echo "<td>" . round($row['avg_rating']) . "</td>";
								echo "</tr>";
							}
						} else {
							echo "<tr><td colspan='8'>No ratings found.</td></tr>";
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
