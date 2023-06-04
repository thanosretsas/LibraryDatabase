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
        <h2 style="text-align: center">Assign a new LOCAL ADMINISTRATOR from school teachers</h2>
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

if (isset($_POST['change_role'])) {
	$user_id = $_POST['user_id'];
	$school_id = $_POST['school_id'];
	
	// Retrieve all teachers of the same school
	$select_sql = "SELECT * FROM user WHERE role = 'teacher' AND school_id = $school_id";
	$result = mysqli_query($conn, $select_sql);	


	// Display the table of teachers
	if (mysqli_num_rows($result) > 0) {
		echo '<table class="table table-striped">';
		echo '<thead>';
		echo '<tr>';
		echo '<th>User ID</th>';
		echo '<th>First Name</th>';
		echo '<th>Last Name</th>';
		echo '<th>Assign</th>';
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';

		while ($row = mysqli_fetch_assoc($result)) {
			echo '<tr>';
			echo '<td>' . $row['id'] . '</td>';
			echo '<td>' . $row['first_name'] . '</td>';
			echo '<td>' . $row['last_name'] . '</td>';

			// Create the Assign button for each teacher user
			echo '<td>';
			echo '<form action="GA-changeRoleLA.php" method="POST">';
			echo '<input type="hidden" name="user_id" value="' . $row['id'] . '">';
			echo '<input type="submit" class="btn btn-primary" name="assign_role" value="Assign">';
			echo '</form>';
			echo '</td>';

			echo '</tr>';
		}

		echo '</tbody>';
		echo '</table>';
	} else {
		echo "No teachers found for this school.";
	}
}

// Check if the form has been submitted
if (($_SERVER['REQUEST_METHOD'] === 'POST') && (isset($_POST['assign_role']))) {
    // Retrieve the user ID and new role from the form
    $user_id = $_POST['user_id'];

    // Begin a transaction
    mysqli_begin_transaction($conn);

    try {
        // Get the school ID of the selected user
        $select_sql = "SELECT school_id FROM user WHERE id = ?";
        $select_stmt = mysqli_prepare($conn, $select_sql);
        mysqli_stmt_bind_param($select_stmt, 'i', $user_id);
        mysqli_stmt_execute($select_stmt);
        mysqli_stmt_bind_result($select_stmt, $school_id);
        mysqli_stmt_fetch($select_stmt);
        mysqli_stmt_close($select_stmt);

        // Update the current local_admin to teacher
        $update_sql = "UPDATE user SET role = 'teacher' WHERE role = 'local_admin' AND school_id = ?";
        $update_stmt = mysqli_prepare($conn, $update_sql);
        mysqli_stmt_bind_param($update_stmt, 'i', $school_id);
        mysqli_stmt_execute($update_stmt);

        // Update the selected teacher to local_admin
        $update_sql = "UPDATE user SET role = 'local_admin' WHERE id = ?";
        $update_stmt = mysqli_prepare($conn, $update_sql);
        mysqli_stmt_bind_param($update_stmt, 'i', $user_id);
        mysqli_stmt_execute($update_stmt);

        // Commit the transaction
        mysqli_commit($conn);

        // Redirect back to the GA-LocalAdministrator.php page
        header("Location: GA-LocalAdministrator.php");
        exit();
    } catch (Exception $e) {
        // Rollback the transaction in case of an error
        mysqli_rollback($conn);
        echo "Error occurred: " . $e->getMessage();
    }
}

// Close the database connection
mysqli_close($conn);
?>
		</div>
    </section>
  </body>
</html>