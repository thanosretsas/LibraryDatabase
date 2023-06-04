<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>3.1.1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <section>
  	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="GlobalAdmin_layout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Home</a>
	  <a class="navbar-brand" href="logout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Logout</a>
	</nav>	
      <h2 style="text-align: center;">School Loans (per month, year)</h2>
      <div class="container">
        <!-- Section for search parameters -->
		<div class="row">
          <div class="col">
            <form method="GET">
				<div class="row">				
					<div class="form-group col-lg-3">
						<label for="month" class="form-label">Month:</label>
						<input type="number" class="form-control" id="month" name="month" min="1" max="12">
					</div>
					<div class="form-group col-lg-3">
						<label for="year" class="form-label">Year:</label>
						<input type="number" class="form-control" id="year" name="year" min="1900" max="9999">
					</div>
				</div>
				<button type="submit" class="btn btn-primary mt-2">Search</button>
            </form>
          </div>
        </div>
		<!-- Section for search results -->	
        <div class="row mt-3">
          <div class="col">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>School ID</th>
                  <th>School Name</th>
                  <th>Total Loans</th>
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
                
				$month = '';
                $year = '';
				//Retrieve the search parameters
                if (isset($_GET['month']) && isset($_GET['year'])) {
                    $month = mysqli_real_escape_string($conn, $_GET['month']);
                    $year = mysqli_real_escape_string($conn, $_GET['year']);
                }
								
				// Prepare and execute the query
				$query = "SELECT s.id AS school_id, s.name AS school_name, COUNT(*) AS total_loans
						  FROM school s
						  JOIN book_school bs ON s.id = bs.school_id
						  JOIN loan l ON bs.id = l.book_school_id";
				// Handle the case where month or year is empty
				if (!empty($month) || !empty($year)) {
					$query .= " WHERE";
					if (!empty($month)) {
						$query .= " MONTH(l.loan_date) = $month";
					}
					if (!empty($month) && !empty($year)) {
						$query .= " AND";
					}
					if (!empty($year)) {
						$query .= " YEAR(l.loan_date) = $year";
					}
				}

				$query .= " GROUP BY s.id, s.name
							ORDER BY s.id";

				$result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      $schoolID = $row['school_id'];
                      $schoolName = $row['school_name'];
                      $totalLoans = $row['total_loans'];

                      echo "<tr>";
                      echo "<td>$schoolID</td>";
                      echo "<td>$schoolName</td>";
                      echo "<td>$totalLoans</td>";
                      echo "</tr>";
                    }
                  } else {
                    echo "<tr><td colspan='3'>No loans found.</td></tr>";
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
