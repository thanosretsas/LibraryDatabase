<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Include the database connection file
    require_once "conn.php";

    // Check the selected role and perform the corresponding login logic
    if ($role === 'global_admin') {
        // Prepare the SQL statement to retrieve the Global Administrator record
        $sql = "SELECT * FROM global_administrator WHERE username = ? AND password = ?";

        // Create a prepared statement
        $stmt = mysqli_prepare($conn, $sql);

        // Bind the parameters and execute the statement
        mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
        mysqli_stmt_execute($stmt);

        // Get the result
        $result = mysqli_stmt_get_result($stmt);

        // Check if the login credentials are valid
        if (mysqli_num_rows($result) === 1) {
            // Set the session variable for role
            $_SESSION['role'] = 'global_admin';

            // Redirect to GlobalAdmin_layout.php
            header("Location: GlobalAdmin_layout.php");
            exit();
        } else {
            // Invalid credentials
            echo "Invalid username or password for Global Administrator.";
        }
    } elseif ($role === 'local_admin') {
        // Prepare the SQL statement to retrieve the Local Administrator record
        $sql = "SELECT * FROM user WHERE username = ? AND password = ? AND role = 'local_admin'";

        // Create a prepared statement
        $stmt = mysqli_prepare($conn, $sql);

        // Bind the parameters and execute the statement
        mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
        mysqli_stmt_execute($stmt);

        // Get the result
        $result = mysqli_stmt_get_result($stmt);

        // Check if the login credentials are valid
        if (mysqli_num_rows($result) === 1) {
			// Fetch the user record
            $row = mysqli_fetch_assoc($result);
	
			// Set the session variable for user id
			$_SESSION['user_id'] = $row['id'];
            // Set the session variable for role
            $_SESSION['role'] = 'local_admin';
			// Set the session variable for school id
            $_SESSION['school_id'] = $row['school_id'];

            // Redirect to LocalAdmin_layout.php
            header("Location: LocalAdmin_layout.php");
            exit();
        } else {
            // Invalid credentials
            echo "Invalid username or password for Local Administrator.";
        }
    } elseif ($role === 'teacher') {
        // Prepare the SQL statement to retrieve the Teacher record
        $sql = "SELECT * FROM user WHERE username = ? AND password = ? AND (role = 'teacher' OR role = 'local_admin')";

        // Create a prepared statement
        $stmt = mysqli_prepare($conn, $sql);

        // Bind the parameters and execute the statement
        mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
        mysqli_stmt_execute($stmt);

        // Get the result
        $result = mysqli_stmt_get_result($stmt);

        // Check if the login credentials are valid
        if (mysqli_num_rows($result) === 1) {
            // Fetch the user record
            $row = mysqli_fetch_assoc($result);

            // Set the session variable for user id
			$_SESSION['user_id'] = $row['id'];
			// Set the session variable for role
            $_SESSION['role'] = $row['role'];
			// Set the session variable for school id
            $_SESSION['school_id'] = $row['school_id'];

            // Redirect to User_layout.php
            header("Location: User_layout.php");
            exit();
        } else {
            // Invalid credentials
            echo "Invalid username or password for Teacher.";
        }
    } elseif ($role === 'student') {
        // Prepare the SQL statement to retrieve the Student record
        $sql = "SELECT * FROM user WHERE username = ? AND password = ? AND role = 'student'";

        // Create a prepared statement
        $stmt = mysqli_prepare($conn, $sql);

        // Bind the parameters and execute the statement
        mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
        mysqli_stmt_execute($stmt);

        // Get the result
        $result = mysqli_stmt_get_result($stmt);

        // Check if the login credentials are valid
        if (mysqli_num_rows($result) === 1) {
			// Fetch the student record
            $row = mysqli_fetch_assoc($result);
			
            // Set the session variable for user id
			$_SESSION['user_id'] = $row['id'];
			// Set the session variable for role
            $_SESSION['role'] = 'student';
			// Set the session variable for school id
            $_SESSION['school_id'] = $row['school_id'];

            // Redirect to User_layout.php
            header("Location: User_layout.php");
            exit();
        } else {
            // Invalid credentials
            echo "Invalid username or password for Student.";
        }
    } else {
        // Invalid role selection
        echo "Invalid role selection.";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!-- HTML login form goes here -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
<body>
    <div class="container">
        <h2 style="text-align: center">Login to School Library System</h2>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="role">Role:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="role" id="student" value="student" checked>
                    <label class="form-check-label" for="student">Student</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="role" id="teacher" value="teacher">
                    <label class="form-check-label" for="teacher">Teacher</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="role" id="local-admin" value="local_admin">
                    <label class="form-check-label" for="local-admin">Local Administrator</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="role" id="global-admin" value="global_admin">
                    <label class="form-check-label" for="global-admin">Global Administrator</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>

