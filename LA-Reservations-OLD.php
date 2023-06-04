<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOCAL ADMIN - Reservations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
            background-color: #f5f5f5;
            padding: 10px;
            border-radius: 5px;
        }

        h1 {
            margin-top: 40px;
        }
    </style>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="GlobalAdmin_layout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Home</a>
	  <a class="navbar-brand" href="logout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Logout</a>
	</nav>
    <section>
        <div class="container">
            <div class="row mt-3">
                <div class="col-sm-12">
                    <h1>All Reservations and Loans</h1>
                    <ul>
                        <?php
                        session_start();

                        // Check if the user is logged in as a local_admin
                        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'local_admin') {
                            // Redirect the user to the login page or display an error message
                            header('Location: login.php');
                            exit();
                        }

                        require_once 'conn.php';

                        // Replace <local_admin_id> with the actual ID of the local admin
                        $local_admin_id = $_SESSION['user_id'];

                        // Fetch users with reservations and loans
                        $query = "SELECT DISTINCT u.id, u.first_name, u.last_name, r.title AS reservation_title, l.title AS loan_title
                                  FROM user u
                                  LEFT JOIN (
                                      SELECT r.user_id, b.title
                                      FROM reservation r
                                      JOIN book_school bs ON r.book_school_id = bs.id
                                      JOIN book b ON bs.book_id = b.id
                                      WHERE r.status = 'active'
                                  ) AS r ON u.id = r.user_id
                                  LEFT JOIN (
                                      SELECT l.user_id, b.title
                                      FROM loan l
                                      JOIN book_school bs ON l.book_school_id = bs.id
                                      JOIN book b ON bs.book_id = b.id
                                      WHERE l.return_date IS NULL
                                  ) AS l ON u.id = l.user_id
                                  JOIN school s ON u.school_id = s.id
                                  WHERE s.admin_id = '$local_admin_id'
                                  AND (r.title IS NOT NULL OR l.title IS NOT NULL)";

                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $firstName = $row["first_name"];
                                $lastName = $row["last_name"];
                                $reservationTitle = $row["reservation_title"];
                                $loanTitle = $row["loan_title"];

                                echo "<li>";
                                echo "<strong>$firstName $lastName</strong><br>";
                                echo "Reservation: ";
                                echo $reservationTitle ? $reservationTitle : "-";
                                echo "<br>";
                                echo "Loan: ";
                                echo $loanTitle ? $loanTitle : "-";
                                echo "</li>";
                            }
                        } else {
                            echo "<li>No users found with reservations or loans.</li>";
                        }

                        // Close the database connection
                        mysqli_close($conn);
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

</html>


