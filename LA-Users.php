<?php
session_start();

// Check if the user is logged in as a teacher, student, or local admin
if (!isset($_SESSION['user_id']) || ($_SESSION['role'] !== 'teacher' && $_SESSION['role'] !== 'student' && $_SESSION['role'] !== 'local_admin')) {
    // Redirect the user to the login page or display an error message
    header('Location: login.php');
    exit();
}

require_once 'conn.php';

// Retrieve the user's information
$userID = $_SESSION['user_id'];
$sql = "SELECT * FROM user WHERE id = $userID";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    // Fetch the user record
    $user = mysqli_fetch_assoc($result);
} else {
    // Query error
    echo "Error: " . mysqli_error($conn);
}


// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update the user's information in the database
    $updatedFirstName = $_POST['firstName'];
    $updatedLastName = $_POST['lastName'];
    $updatedUsername = $_POST['username'];
    $updatedPassword = $_POST['password'];
    $updatedPhone = $_POST['phone'];
    $updatedEmail = $_POST['email'];
    $updatedBirthDate = $_POST['birthDate'];
    
    // Perform the update query
    $updateQuery = "UPDATE user SET first_name = '$updatedFirstName', last_name = '$updatedLastName', username = '$updatedUsername', password = '$updatedPassword', phone = '$updatedPhone', email = '$updatedEmail', birth_date = '$updatedBirthDate' WHERE id = $userID";
    
    if (mysqli_query($conn, $updateQuery)) {
        // Update successful
        echo "User information updated successfully.";
    } else {
        // Update error
        echo "Error updating user information: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Profile</</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="LocalAdmin_layout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Home</a>
	  <a class="navbar-brand" href="logout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Logout</a>
	</nav>

    <div class="container">
	
        <h2 style="text-align: center;">Update Profile</h2>
        <form method="POST" action="LA-Users.php">
			<div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $user['first_name']; ?>" <?php echo ($_SESSION['role'] !== 'student') ? '' : 'readonly'; ?>>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $user['last_name']; ?>" <?php echo ($_SESSION['role'] !== 'student') ? '' : 'readonly'; ?>>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?>" <?php echo ($_SESSION['role'] !== 'student') ? '' : 'readonly'; ?>>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" <?php echo ($_SESSION['role'] !== 'student') ? '' : 'readonly'; ?>>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="schoolID">School ID</label>
                        <input type="text" class="form-control" id="schoolID" name="schoolID" value="<?php echo $user['school_id']; ?>" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $user['phone']; ?>" <?php echo ($_SESSION['role'] !== 'student') ? '' : 'readonly'; ?>>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="birthDate">Birth Date</label>
                        <input type="date" class="form-control" id="birthDate" name="birthDate" value="<?php echo $user['birth_date']; ?>" <?php echo ($_SESSION['role'] !== 'student') ? '' : 'readonly'; ?>>
                    </div>
                </div>
				<div class="col">
					<div class="form-group">
						<label for="role">Role</label>
						<input type="text" class="form-control" id="role" name="role" value="<?php echo $_SESSION['role']; ?>" readonly>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label for="status">Status</label>
						<input type="text" class="form-control" id="status" name="status" value="<?php echo $user['status']; ?>" readonly>
					</div>
				</div>
            </div>		
			<button type="submit" class="btn btn-primary mt-2">Update</button>
        </form>
    </div>
</body>
</html>

