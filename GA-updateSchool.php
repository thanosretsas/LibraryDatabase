<?php
require_once "conn.php";

if(isset($_POST['submit'])){
	$id = $_POST['id'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$principalname = $_POST['principalname'];
	$principalsurname = $_POST['principalsurname'];		
	$localadmin = $_POST['localadmin'];		


    if($name != "" && $address != "" && $city != "" && $phone != "" && $email != "" && $principalname != "" && $principalsurname != "" && $localadmin != ""){
		$sql = "UPDATE school SET name='$name', address='$address', city='$city', phone='$phone', email='$email', principal_first_name='$principalname', principal_last_name='$principalsurname', admin_id='$localadmin' WHERE id='$id'";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			 // Data updated successfully
			echo "School data updated successfully.";
		} else {
			 echo "Error updating school data: " . mysqli_error($conn);
		}
	}else{
		echo "Fields cannot be empty!";
	}
	
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve the data from the database for the selected ID
    $sql = "SELECT * FROM school WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
		$name = $row['name'];
		$address = $row['address'];
		$city = $row['city'];
		$phone = $row['phone'];
		$email = $row['email'];
		$principalname = $row['principal_first_name'];
		$principalsurname = $row['principal_last_name'];								
		$localadmin = $row['admin_id'];	
						
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update School</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="GlobalAdmin_layout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Home</a>
	  <a class="navbar-brand" href="logout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Logout</a>
	</nav>

    <section>
        <h2 style="text-align: center;">Update a SCHOOL</h2>
        <div class="container">
            <form action="GA-updateSchool.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="row">
					<div class="form-group col-lg-3">
                        <label for="">School Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $name; ?>" required>
                    </div>
					<div class="form-group col-lg-3">
                        <label for="">Address</label>
                        <input type="text" name="address" id="address" class="form-control" value="<?php echo $address; ?>" required>
                    </div>
					<div class="form-group col-lg-3">
                        <label for="">City</label>
                        <input type="text" name="city" id="city" class="form-control" value="<?php echo $city; ?>" required>
                    </div>
					<div class="form-group col-lg-3">
                        <label for="">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $phone; ?>" required>
                    </div>
				</div>	
				<div class="row">
					<div class="form-group col-lg-3">
						<label for="">Email</label>
						<input type="email" name="email" id="email" class="form-control"  value="<?php echo $email; ?>" required>
					</div>
					<div class="form-group col-lg-3">
                        <label for="">Principal First Name</label>
                        <input type="text" name="principalname" id="principalname" class="form-control" value="<?php echo $principalname; ?>" required>
                    </div>	
					<div class="form-group col-lg-3">
                        <label for="">Principal Last Name</label>
                        <input type="text" name="principalsurname" id="principalsurname" class="form-control" value="<?php echo $principalsurname; ?>" required>
                    </div>										
				
					<div class="form-group col-lg-3">
                        <label for="">LocalAdmin</label>
                        <input type="text" name="localadmin" id="localadmin" class="form-control" value="<?php echo $localadmin; ?>" required>
                    </div>										
				</div>	
				
                <div class="form-group col-lg-2 mt-2" style="display: grid;align-items:  flex-end;">
					<input type="submit" name="submit" id="submit" class="btn btn-primary" value="Update">
                </div>
            </form>
        </div>
    </section>
  </body>
</html>

<?php
    } else {
        echo "No record found.";
    }
}

?>
