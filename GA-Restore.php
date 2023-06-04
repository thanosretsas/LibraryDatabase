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

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the path to the backup file
    $backup_file = $_POST['backup_file'];

    // Define the mysql command
    $mysql_cmd = "C:\xampp\mysql\bin\mysql --host=" . DB_SERVER . " --user=" . DB_USERNAME .  " " . DB_NAME . " < " . $backup_file;

    // Execute the mysql command
    exec($mysql_cmd, $output, $return_value);

    // Check if the restore was successful
    if ($return_value === 0) {
        echo "Database restore completed successfully.";
    } else {
        echo "Error restoring database. Please try again.";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restore DB</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="GlobalAdmin_layout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Home</a>
	  <a class="navbar-brand" href="logout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Logout</a>
	</nav>

    <h2 style="text-align: center">Restore Database</h2>
    <form method="POST" action="">
    
		<div class="form-group">
			<label for="backup_file">Backup File:</label>
			<input type="text" class="form-control" name="backup_file" id="backup_file" required>
        </div>
		<div class="form-group col-lg-2 mt-2" style="display: grid;align-items:  flex-end;">
			<input type="submit" name="submit" id="submit" class="btn btn-primary" value="Restore">
		</div>	
						
    </form>
</body>
</html>
