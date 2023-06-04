<?php
// Check if the user is logged in as a Global Administrator
session_start();
if ($_SESSION['role'] !== 'global_admin') {
    // Redirect to login page or display an error message
    header("Location: login.php");
    exit();
}
require_once "conn.php";
if(isset($_POST['submit'])){
	
	//Handle School Insertion
	$name = $_POST['name'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$principalname = $_POST['principalname'];
	$principalsurname = $_POST['principalsurname'];		
	$localadmin = NULL; 	
	
	if($name != "" && $address != "" && $city != "" && $phone != "" && $email != "" && $principalname != "" && $principalsurname != ""){
		$insertSchoolQuery = "INSERT INTO school (`name`, `address`, `city`, `phone`, `email`, `principal_first_name`, `principal_last_name`, `admin_id`) VALUES ('$name', '$address', '$city', '$phone', '$email', '$principalname', '$principalsurname', '$localadmin')";
		if (mysqli_query($conn, $insertSchoolQuery)) {
			// Retrieve the newly created school ID
			$school_id = mysqli_insert_id($conn); 
			
			//Handle Local Administrator Insertion
			$first_name = $_POST['firstName'];
			$last_name = $_POST['lastName'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$phone = $_POST['phone'];
			$emailLA = $_POST['emailLA'];
			$birth_date = $_POST['birthDate'];
			$role = 'local_admin';
			$status = 'active';

			if($first_name != "" && $last_name != "" && $school_id != "" && $username != "" && $password != "" && $phone != "" && $emailLA != "" && $birth_date != "" && $role != "" && $status != ""){
				$insertLAQuery = "INSERT INTO user (first_name, last_name, school_id, username, password, phone, email, birth_date, role, status) VALUES ('$first_name', '$last_name', '$school_id', '$username', '$password', '$phone', '$emailLA', '$birth_date', '$role', '$status')";
				if (mysqli_query($conn, $insertLAQuery)) {
					// Retrieve the newly created user ID
					$localadmin = mysqli_insert_id($conn);
					
					// Update the school table entry with the admin_id
					$updateQuery = "UPDATE school SET admin_id = '$localadmin' WHERE id = '$school_id'";
					if (mysqli_query($conn, $updateQuery)) {
						echo "New Local Administrator User successfully inserted and school updated.";
					} else {
						echo "Error updating school data: " . mysqli_error($conn);
					}
				} else {
					echo "Error inserting Local Administrator user data: " . mysqli_error($conn);
				}
			} else {
				echo "Fields cannot be empty!";
			}
		} else {
			echo "Error inserting school data: " . mysqli_error($conn);
		}
	}else{
		echo "Fields cannot be empty!";
	}
}
?>
