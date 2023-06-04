<?php
session_start();

// Check if the user is logged in as a local admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'local_admin') {
	// Redirect the user to the login page or display an error message
	header('Location: login.php');
	exit();
}

require_once "conn.php";
$schoolId = $_SESSION['school_id'];
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
<section>
    <h2 style="text-align: center;">View, Update, Delete USERS</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">School ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Birth Date</th>
                        <th scope="col">Role</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    //select school users but without local_admin so that he can't delete himself 
					$query = "SELECT * FROM user WHERE school_id = $schoolId AND role != 'local_admin'";

                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {

                            $Id = $row['id'];
                            $schoolId = $row['school_id'];
                            $firstName = $row['first_name'];
                            $lastName = $row['last_name'];
                            $username = $row['username'];
                            $password = $row['password'];
                            $phone = $row['phone'];
                            $email = $row['email'];
                            $birthDate = $row['birth_date'];
                            $role = $row['role'];
                            $status = $row['status'];
                    ?>

					<tr class="trow">
						<td><?php echo $Id; ?></td>
						<td><?php echo $schoolId; ?></td>
						<td><?php echo $firstName; ?></td>
						<td><?php echo $lastName; ?></td>
						<td><?php echo $username; ?></td>
						<td><?php echo $password; ?></td>
						<td><?php echo $phone; ?></td>
						<td><?php echo $email; ?></td>
						<td><?php echo $birthDate; ?></td>
						<td><?php echo $role; ?></td>
						<td><?php echo $status; ?></td>
						<td><a href="LA-updateUser.php?id=<?php echo $Id; ?>" class="btn btn-primary">Edit</a></td>
						<td><a href="LA-deleteUser.php?id=<?php echo $Id; ?>" class="btn btn-danger">Delete</a></td>
					</tr>

					<?php
                        }
                    } else {
                        echo "<tr><td colspan='8'>No users found.</td></tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
</body>
</html>
