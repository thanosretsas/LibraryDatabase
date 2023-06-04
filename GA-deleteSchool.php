<?php
	// Check if the user is logged in as a Global Administrator
	session_start();
	if ($_SESSION['role'] !== 'global_admin') {
		// Redirect to login page or display an error message
		header("Location: login.php");
		exit();
	}

    require_once "conn.php";
    $id = $_GET["id"];
    $query = "DELETE FROM school WHERE id = '$id'";
    if (mysqli_query($conn, $query)) {
        echo "School successfuly deleted. WARNING: Deleted school's users and books need handling.";
    } else {
        //echo "Something went wrong. Please try again later.";
		echo "Error deleting data: " . mysqli_error($conn);
    }
?>
