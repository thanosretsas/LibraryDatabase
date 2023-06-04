<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>3.1.2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
 	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="GlobalAdmin_layout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Home</a>
	  <a class="navbar-brand" href="logout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Logout</a>
	</nav>	
    <section>
      <h2 style="text-align: center;">AUTHORS with loaned books and TEACHERS with loans (per category)</h2>
      <div class="container">
        <div class="row">
          <div class="col">
            <!-- Form for entering the search parameter -->
            <form method="GET">
              <div class="mb-3">
                <label for="category" class="form-label">Category Name:</label>
                <select class="form-select" id="category" name="category" required>
                  <option value="">Select Category</option>
                  <option value="fiction">Fiction</option>
                  <option value="sci-fi">Sci-Fi</option>
                  <option value="non-fiction">Non-Fiction</option>
                  <option value="mystery">Mystery</option>
                  <option value="poetry">Poetry</option>
                  <option value="other">Other</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Search</button>
            </form>
          </div>
        </div>
		<?php 
		// Check if the user is logged in as a Global Administrator
		session_start();
		if ($_SESSION['role'] !== 'global_admin') {
			// Redirect to login page or display an error message
			header("Location: login.php");
			exit();
		}			  
		require_once 'conn.php'; 
		$category = '';
		
		//Retrieve the search parameter
		if (isset($_GET['category'])) {
		  $category = mysqli_real_escape_string($conn, $_GET['category']);
		}			
		?>
		
		
        <div class="row mt-3">
		  <?php echo "<h2>Category: " . $category . "</h2>";?>
		
          <div class="col">
            <h2>Authors:</h2>
            <ul>
			  <?php 
				//Execute the query
                $query = "SELECT DISTINCT CONCAT(a.first_name, ' ', a.last_name) AS author_name
                          FROM author a
                          JOIN book_author ba ON a.id = ba.author_id
                          JOIN book_category bc ON ba.book_id = bc.book_id
                          JOIN book b ON bc.book_id = b.id
                          JOIN loan l ON b.id = l.book_school_id
                          JOIN user u ON l.user_id = u.id
                          JOIN category c ON bc.category_id = c.id
                          WHERE c.name = '$category'
                          GROUP BY a.id, author_name";

                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    $authorName = $row['author_name'];
                    echo "<li>$authorName</li>";
                  }
                } else {
                  echo "<li>No authors found</li>";
                }


              ?>
            </ul>
          </div>
          <div class="col">
            <h2>Teachers:</h2>
            <ul>

              <?php
                // Execute the query
				$query = "SELECT DISTINCT CONCAT(u.first_name, ' ', u.last_name) AS teacher_name
                          FROM author a
                          JOIN book_author ba ON a.id = ba.author_id
                          JOIN book_category bc ON ba.book_id = bc.book_id
                          JOIN book b ON bc.book_id = b.id
                          JOIN loan l ON b.id = l.book_school_id
                          JOIN user u ON l.user_id = u.id
                          JOIN category c ON bc.category_id = c.id
                          WHERE c.name = '$category'
                            AND u.role = 'teacher'
                            AND l.loan_date >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)
                          GROUP BY u.id, teacher_name";

                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    $teacherName = $row['teacher_name'];
                    echo "<li>$teacherName</li>";
                  }
                } else {
                  echo "<li>No teachers found</li>";
                }

                mysqli_close($conn);
              ?>
            </ul>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>

