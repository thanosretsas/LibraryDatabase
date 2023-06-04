<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>3.1.5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
   	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="GlobalAdmin_layout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Home</a>
	  <a class="navbar-brand" href="logout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Logout</a>
	</nav>	  
    <section>
      <h2 style="text-align: center;">3.1.5 Local Administrators with same Book Loans in a year, Loans &gt 20</h2>
      <div class="container">
        <div class="row">
          <div class="col">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Local Admin 1 ID</th>
                  <th>Local Admin 1 First Name</th>
                  <th>Local Admin 1 Last Name</th>
                  <th>Local Admin 2 ID</th>
                  <th>Local Admin 2 First Name</th>
                  <th>Local Admin 2 Last Name</th>
                  <th>Loan Count</th>
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
                  $query = "SELECT u1.id AS local_admin1_id, u1.first_name AS local_admin1_first_name, u1.last_name AS local_admin1_last_name,
                                u2.id AS local_admin2_id, u2.first_name AS local_admin2_first_name, u2.last_name AS local_admin2_last_name,
                                COUNT(DISTINCT l1.id) AS loan_count
                            FROM user u1
                            JOIN user u2 ON u1.id < u2.id AND u1.role = 'local_admin' AND u2.role = 'local_admin'
                            JOIN loan l1 ON u1.id = l1.local_admin_id
                            JOIN loan l2 ON u2.id = l2.local_admin_id
                            WHERE l1.loan_date >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)
                              AND l2.loan_date >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)
                            GROUP BY u1.id, u1.first_name, u1.last_name, u2.id, u2.first_name, u2.last_name
                            HAVING loan_count > 2
                               AND COUNT(DISTINCT l1.id) = COUNT(DISTINCT l2.id)";
                  $result = mysqli_query($conn, $query);

                  // Fetch the results and generate the table rows
                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      $localAdmin1ID = $row['local_admin1_id'];
                      $localAdmin1FirstName = $row['local_admin1_first_name'];
                      $localAdmin1LastName = $row['local_admin1_last_name'];
                      $localAdmin2ID = $row['local_admin2_id'];
                      $localAdmin2FirstName = $row['local_admin2_first_name'];
                      $localAdmin2LastName = $row['local_admin2_last_name'];
                      $loanCount = $row['loan_count'];

                      // Generate the table row
                      echo "<tr>";
                      echo "<td>$localAdmin1ID</td>";
                      echo "<td>$localAdmin1FirstName</td>";
                      echo "<td>$localAdmin1LastName</td>";
                      echo "<td>$localAdmin2ID</td>";
                      echo "<td>$localAdmin2FirstName</td>";
                      echo "<td>$localAdmin2LastName</td>";
                      echo "<td>$loanCount</td>";
                      echo "</tr>";
                    }
                  } else {
                    echo "<tr><td colspan='7'>No local administrators found.</td></tr>";
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
