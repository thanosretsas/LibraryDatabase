<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Handle SCHOOLS</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>   
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="GlobalAdmin_layout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Home</a>
  <a class="navbar-brand" href="logout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Logout</a>
</nav>

<section>
    <h2 style="text-align: center;">View, Update, Delete SCHOOLS</h2>

    <?php
	// Check if the user is logged in as a Global Administrator
	session_start();
	if ($_SESSION['role'] !== 'global_admin') {
		// Redirect to login page or display an error message
		header("Location: login.php");
		exit();
	}
	require_once "conn.php";
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped">
                    <thead>
                      <tr>
						<th scope="col">Id</th>
						<th scope="col">School Name</th>
						<th scope="col">Address</th>
						<th scope="col">City</th>
						<th scope="col">Phone</th>
						<th scope="col">Email</th>					
						<th scope="col">Principal Name</th>
						<th scope="col">Principal Surname</th>
						<th scope="col">LocalAdmin</th>					
						<th scope="col">Edit</th>
						<th scope="col">Delete</th>				  
					  </tr>
					</thead>
					<tbody>
						<?php 
						$query = "SELECT * FROM school";
						if ($result = mysqli_query($conn, $query)) {
							while($row = mysqli_fetch_array($result)) {
							
								$Id = $row['id'];
								$name = $row['name'];
								$address = $row['address'];
								$city = $row['city'];
								$phone = $row['phone'];
								$email = $row['email'];
								$principalname = $row['principal_first_name'];
								$principalsurname = $row['principal_last_name'];								
								$localadmin = $row['admin_id'];		
								
								?>
						
								<tr class="trow">
									<td><?php echo $Id; ?></td>
									<td><?php echo $name; ?></td>
									<td><?php echo $address; ?></td>
									<td><?php echo $city; ?></td>
									<td><?php echo $phone; ?></td>
									<td><?php echo $email; ?></td>
									<td><?php echo $principalname; ?></td>
									<td><?php echo $principalsurname; ?></td>					
									<td><?php echo $localadmin; ?></td>						
									
									
									<td><a href="GA-updateSchool.php?id=<?php echo $Id; ?>" class="btn btn-primary">Edit</a></td>
									<td><a href="GA-deleteSchool.php?id=<?php echo $Id; ?>" class="btn btn-danger">Delete</a></td>
								</tr>

						<?php
								}
							} else {
								echo "<tr><td colspan='8'>No schools found.</td></tr>";
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
