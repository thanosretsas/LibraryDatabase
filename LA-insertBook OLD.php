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
	// Get the form data from LA-addBook.php  
	$title = $_POST['title'];
	$date = $_POST['date'];
	$isbn = $_POST['isbn'];
	$language = $_POST['language'];
	$page_num = $_POST['page_num'];
	$image = $_POST['image'];
	$keywords = $_POST['keywords'];
	$summary = $_POST['summary'];
	$author_first_names = $_POST['author_first_name'];
	$author_last_names = $_POST['author_last_name'];
	$categories = $_POST['categories'];
	$copies_owned = $_POST['copies_owned'];
	$school_id = $_SESSION['school_id'];
  
	// Insert the book into the 'book' table
	$insert_book_query = "INSERT INTO book (title, date, ISBN, language, page_num, image, keywords, summary)
						  VALUES ('$title', '$date', '$isbn', '$language', '$page_num', '$image', '$keywords', '$summary')";
	$result = mysqli_query($conn, $insert_book_query);

	if ($result) {  
  
      $book_id = mysqli_insert_id($conn); // Get the auto-generated book ID

      // Insert authors into the 'author' table and create book_author relationships
      $author_first_names = $_POST['author_first_name'];
      $author_last_names = $_POST['author_last_name'];

      for ($i = 0; $i < count($author_first_names); $i++) {
        $first_name = $author_first_names[$i];
        $last_name = $author_last_names[$i];

		// Only insert the author if first and last name are not empty
		if ((!empty($first_name)) && (!empty($last_name))) {

			// Check if author already exists in the 'author' table
			$author_query = "SELECT id FROM author WHERE first_name = '$first_name' AND last_name = '$last_name'";
			$author_result = mysqli_query($conn, $author_query);

			if (mysqli_num_rows($author_result) > 0) {
			  $author_row = mysqli_fetch_assoc($author_result);
			  $author_id = $author_row['id'];
			} else {
			  // Insert new author into the 'author' table
			  $insert_author_query = "INSERT INTO author (first_name, last_name) VALUES ('$first_name', '$last_name')";
			  mysqli_query($conn, $insert_author_query);
			  $author_id = mysqli_insert_id($conn);
			}

			// Create book_author relationship
			$insert_book_author_query = "INSERT INTO book_author (book_id, author_id) VALUES ('$book_id', '$author_id')";
			mysqli_query($conn, $insert_book_author_query); 		  
		}	  
	  }

      // Insert book categories into the 'book_category' table
	  foreach ($categories as $category_id) {
        $insert_book_category_query = "INSERT INTO book_category (book_id, category_id)
                                       VALUES ('$book_id', '$category_id')";
        $result = mysqli_query($conn, $insert_book_category_query);
        if (!$result) {
            // Handle the error and rollback the transaction if needed
            // Display an error message or redirect back to the form
			echo "Error inserting book-category: " . mysqli_error($conn);
        }
      }

      // Insert the book-school relationship into the 'book_school' table
      $insert_book_school_query = "INSERT INTO book_school (book_id, school_id, copies, copies_available)
                                   VALUES ('$book_id', '$school_id', '$copies_owned', '$copies_owned')";
      $result = mysqli_query($conn, $insert_book_school_query);
      if (!$result) {
          // Handle the error and rollback the transaction if needed
          // Display an error message or redirect back to the form
		  echo "Error inserting book-school: " . mysqli_error($conn);
      }





      echo "Book inserted successfully!";
    } else {
      echo "Error inserting book: " . mysqli_error($conn);
    }
  }

  mysqli_close($conn);
?>
