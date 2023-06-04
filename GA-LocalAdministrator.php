<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Handle LAs</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="GlobalAdmin_layout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Home</a>
	  <a class="navbar-brand" href="logout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Logout</a>
	</nav>

    <section>
        <h2 style="text-align: center;">Assign a new LOCAL ADMINISTRATOR</h2>
        <div class="container">

<?php
// Check if the user is logged in as a Global Administrator
session_start();
if ($_SESSION['role'] !== 'global_admin') {
    // Redirect to login page or display an error message
    header("Location: login.php");
    exit();
}

// Include the database connection file
require_once "conn.php";

// Retrieve all local_admin users
$sql = "SELECT * FROM user WHERE role = 'local_admin'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo '<table class="table table-striped">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>User ID</th>';
    echo '<th>School ID</th>';
    echo '<th>First Name</th>';
    echo '<th>Last Name</th>';
    echo '<th>Username</th>';
    echo '<th>Action</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['school_id'] . '</td>';
        echo '<td>' . $row['first_name'] . '</td>';
        echo '<td>' . $row['last_name'] . '</td>';
        echo '<td>' . $row['username'] . '</td>';

        // Create the Change button for each local_admin user
        echo '<td>';
        echo '<form action="GA-changeRoleLA.php" method="POST">';
        echo '<input type="hidden" name="user_id" value="' . $row['id'] . '">';
		echo '<input type="hidden" name="school_id" value="' . $row['school_id'] . '">';
        echo '<input type="submit" class="btn btn-primary" name="change_role" value="Change">';
        echo '</form>';
        echo '</td>';

        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo "No local_admin users found.";
}

// Close the database connection
mysqli_close($conn);
?>
		</div>
    </section>
  </body>
</html>