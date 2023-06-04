<?php
  session_start();

  // Check if the user is logged in as a local admin
  if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'local_admin') {
    // Redirect the user to the login page or display an error message
    header('Location: login.php');
    exit();
  }

  require_once 'conn.php';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the approval button is clicked
    if (isset($_POST['approve'])) {
      // Get the rating ID from the form
      $ratingId = $_POST['rating_id'];

      // Update the rating's approval status to 'yes'
      $query = "UPDATE rating SET approved = 'yes' WHERE id = $ratingId";
      $result = mysqli_query($conn, $query);

      if (!$result) {
        echo "Error approving rating: " . mysqli_error($conn);
      } else {
        // Rating approved successfully
        header('Location: LA-ratings.php');
        exit();
      }
    }

    // Check if the rejection button is clicked
    if (isset($_POST['reject'])) {
      // Get the rating ID from the form
      $ratingId = $_POST['rating_id'];

      // Delete the rating from the table
      $query = "DELETE FROM rating WHERE id = $ratingId";
      $result = mysqli_query($conn, $query);

      if (!$result) {
        echo "Error rejecting rating: " . mysqli_error($conn);       
      } else {
        // Rating rejected successfully
		header('Location: LA-ratings.php');
        exit();
      }
    }
  }
?>
