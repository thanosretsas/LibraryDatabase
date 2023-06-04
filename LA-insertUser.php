<?php
session_start();

// Check if the user is logged in as a local_admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'local_admin') {
    // Redirect the user to the login page or display an error message
    header('Location: login.php');
    exit();
}

require_once "conn.php";

if(isset($_POST['submit'])){
    $first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];
	//use Local Admin's school_id
    $school_id = $_SESSION['school_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $birth_date = $_POST['birthDate'];
    $role = $_POST['role'];
    $status = $_POST['status'];

    if($first_name != "" && $last_name != "" && $school_id != "" && $username != "" && $password != "" && $phone != "" && $email != "" && $birth_date != "" && $role != "" && $status != ""){
        $sql = "INSERT INTO user (first_name, last_name, school_id, username, password, phone, email, birth_date, role, status) VALUES ('$first_name', '$last_name', '$school_id', '$username', '$password', '$phone', '$email', '$birth_date', '$role', '$status')";
        if (mysqli_query($conn, $sql)) {
			// Retrieve the newly created user ID
            $userId = mysqli_insert_id($conn); 
			echo "New User successfully inserted.";
            // HTML code for the card
            ?>
			<!doctype html>
			<html lang="en">
			<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<title>Handle USERS</title>
				<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
			</head>
			<body>
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
			  <a class="navbar-brand" href="LocalAdmin_layout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Home</a>
			  <a class="navbar-brand" href="logout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Logout</a>
			</nav>			
			
			<div class="row justify-content-center align-items-center" style="height: 100vh;">
				<div class="col-3">
					<div class="card text-white bg-success">
						<div class="card-body">
							<h3 class="card-title">Loan Card</h3>
							<div class="card-text">
								<p><strong>User ID:</strong> <?php echo $userId; ?></p>
								<p><strong>First Name:</strong> <?php echo $first_name; ?></p>
								<p><strong>Last Name:</strong> <?php echo $last_name; ?></p>
								<p><strong>School ID:</strong> <?php echo $school_id; ?></p>
								<p><strong>Username:</strong> <?php echo $username; ?></p>
								<p><strong>Phone:</strong> <?php echo $phone; ?></p>
								<p><strong>Email:</strong> <?php echo $email; ?></p>
								<p><strong>Birth Date:</strong> <?php echo $birth_date; ?></p>
								<p><strong>Role:</strong> <?php echo $role; ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>

            <?php
        } else {
            echo "Error inserting user data: " . mysqli_error($conn);
        }
    } else {
        echo "Fields cannot be empty!";
    }
}
?>

</body>
</html>
