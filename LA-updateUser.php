<?php
require_once "conn.php";

if(isset($_POST['submit'])){
	$id = $_POST['id'];
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$schoolId = $_POST['schoolId'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$birthDate = $_POST['birthDate'];
	$role = $_POST['role'];
	$status = $_POST['status'];

    if($firstName != "" && $lastName != "" && $schoolId != "" && $username != "" && $password != "" && $phone != "" && $email != "" && $birthDate != "" && $role != "" && $status != ""){
		$sql = "UPDATE user SET first_name='$firstName', last_name='$lastName', school_id='$schoolId', username='$username', password='$password', phone='$phone', email='$email', birth_date='$birthDate', role='$role', status='$status' WHERE id='$id'";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			 // Data updated successfully
			header("location: LA-Users.php");
			exit();
		} else {
			 echo "Error updating data: " . mysqli_error($conn);
		}
	}else{
		echo "Fields cannot be empty!";
	}
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve the data from the database for the selected ID
    $sql = "SELECT * FROM user WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
		$firstName = $row['first_name'];
		$lastName = $row['last_name'];
		$schoolId = $row['school_id'];
		$username = $row['username'];
		$password = $row['password'];
		$phone = $row['phone'];
		$email = $row['email'];
		$birthDate = $row['birth_date'];
		$role = $row['role'];
		$status = $row['status'];						
?>
<!-- HTML code for the update user form -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="LocalAdmin_layout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Home</a>
	  <a class="navbar-brand" href="logout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Logout</a>
	</nav>
    <section>
        <h2 style="text-align: center;margin: 50px 0;">Update a USER</h2>
        <div class="container">
            <form action="LA-updateUser.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="row">
                    <div class="form-group col-lg-3">
                        <label for="">First Name</label>
                        <input type="text" name="firstName" id="firstName" class="form-control" value="<?php echo $firstName; ?>" required>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="">Last Name</label>
                        <input type="text" name="lastName" id="lastName" class="form-control" value="<?php echo $lastName; ?>" required>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="">School ID</label>
                        <input type="text" name="schoolId" id="schoolId" class="form-control" value="<?php echo $schoolId; ?>" required>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="<?php echo $username; ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-3">
                        <label for="">Password</label>
                        <input type="password" name="password" id="password" class="form-control" value="<?php echo $password; ?>" required>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $phone; ?>" required>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?php echo $email; ?>" required>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="">Birth Date</label>
                        <input type="text" name="birthDate" id="birthDate" class="form-control" value="<?php echo $birthDate; ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-3">
                        <label for="">Role</label>
                        <input type="text" name="role" id="role" class="form-control" value="<?php echo $role; ?>" required>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="">Status</label>
                        <input type="text" name="status" id="status" class="form-control" value="<?php echo $status; ?>" required>
                    </div>
                </div>
                <div class="form-group col-lg-2" style="display: grid;align-items:  flex-end;">
                    <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Update">
                </div>
            </form>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>


<?php
    } else {
        echo "No record found.";
    }
}

if (isset($_POST['submit'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $schoolId = $_POST['schoolId'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $birthDate = $_POST['birthDate'];
    $role = $_POST['role'];
    $status = $_POST['status'];

    if ($firstName != "" && $lastName != "" && $schoolId != "" && $username != "" && $password != "" && $phone != "" && $email != "" && $birthDate != "" && $role != "" && $status != "") {
        $sql = "UPDATE user SET first_name='$firstName', last_name='$lastName', school_id='$schoolId', username='$username', password='$password', phone='$phone', email='$email', birth_date='$birthDate', role='$role', status='$status' WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            // Data updated successfully
            header("location: LA-User.php");
            exit();
        } else {
            echo "Error updating data: " . mysqli_error($conn);
        }
    } else {
        echo "Fields cannot be empty!";
    }
}

?>
