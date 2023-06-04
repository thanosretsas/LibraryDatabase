<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>3.3.2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="User_layout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Home</a>
	  <a class="navbar-brand" href="logout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Logout</a>
	</nav>

    <section>
        <h2 style="text-align: center;">VIEW loaned Book Titles</h2>
        <div class="container">
            <div class="row mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
						session_start();

						// Check if the user is logged in as a local admin
						if (!isset($_SESSION['user_id'])) {
						  // Redirect the user to the login page or display an error message
						  header('Location: login.php');
						  exit();
						}						
						
						require_once 'conn.php'; 

                        //Get the logged in user's ID 
                        $user_id = $_SESSION['user_id'];

                        // Prepare and execute the query 
                        $query = "SELECT b.title
								FROM book_school bs
								JOIN loan l ON l.book_school_id = bs.id
								JOIN book b ON b.id = bs.book_id
								WHERE l.user_id = $user_id";
						$result = mysqli_query($conn, $query);

                        // Display the book titles
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['title'] . "</td>";
                            echo "</tr>";
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
