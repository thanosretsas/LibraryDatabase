<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add New Book</</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="LocalAdmin_layout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Home</a>
	  <a class="navbar-brand" href="logout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Logout</a>
  </nav>
  <div class="container">
    <h2 style="text-align: center;">Add New Book</h2>
    <form action="LA-insertBook.php" method="post">

	  <div class="row">
		  <div class="col-md-6">	  
		    <div class="form-group">
			  <label for="title">Title:</label>
			  <input type="text" class="form-control" id="title" name="title" required>
		    </div>	  
		  </div>	   	  
		  <div class="col-md-2">
			<div class="form-group">
			  <label for="isbn">ISBN:</label>
			  <input type="text" class="form-control" id="isbn" name="isbn" required>
			</div>
		  </div>
		  <div class="col-md-2">
			<div class="form-group">
			  <label for="page_num">Page Number:</label>
			  <input type="number" class="form-control" id="page_num" name="page_num" required>
			</div>
		  </div>
		  <div class="col-md-2">
			<div class="form-group">
			  <label for="copies_owned">Copies Owned:</label>
			  <input type="number" class="form-control" id="copies_owned" name="copies_owned" required>
			</div>
		  </div>
	  </div>
	  
	  <div class="row">
		  <div class="col-md-3">
			<div class="form-group">
			  <label for="date">Date:</label>
			  <input type="date" class="form-control" id="date" name="date" required>
			</div>
		  </div>
		  <div class="col-md-3">
			<div class="form-group">
			  <label for="language">Language:</label>
			  <input type="text" class="form-control" id="language" name="language" required>
			</div>
		  </div>

		  <div class="col-md-3">
			<div class="form-group">
			  <label for="image">Image File:</label>
			  <input type="text" class="form-control" id="image" name="image">
			</div>
		  </div>
		  <div class="col-md-3">
			<div class="form-group">
			  <label for="keywords">Keywords:</label>
			  <input type="text" class="form-control" id="keywords" name="keywords">
			</div>
		  </div>
	  </div>

      <div class="form-group">
        <label for="summary">Summary:</label>
        <textarea class="form-control" id="summary" name="summary"></textarea>
      </div>

	  <div class="form-group">
			  <h3>Authors:</h3>
			  <div class="row">
				<div class="col-md-3">
				  <div class="mb-3">
					<label for="author1_first_name">Author 1 First Name (Required):</label>
					<input type="text" class="form-control" id="author1_first_name" name="author_first_name[]" required>
				  </div>
				</div>
				<div class="col-md-3">
				  <div class="mb-3">
					<label for="author1_last_name">Author 1 Last Name (Required):</label>
					<input type="text" class="form-control" id="author1_last_name" name="author_last_name[]" required>
				  </div>
				</div>
			  </div>

			  <div class="row">
				<div class="col-md-3">
				  <div class="mb-3">
					<label for="author2_first_name">Author 2 First Name (Optional):</label>
					<input type="text" class="form-control" id="author2_first_name" name="author_first_name[]">
				  </div>
				</div>
				<div class="col-md-3">
				  <div class="mb-3">
					<label for="author2_last_name">Author 2 Last Name (Optional):</label>
					<input type="text" class="form-control" id="author2_last_name" name="author_last_name[]">
				  </div>
				</div>
			  	<div class="col-md-3">
				  <div class="mb-3">
					<label for="author3_first_name">Author 3 First Name (Optional):</label>
					<input type="text" class="form-control" id="author3_first_name" name="author_first_name[]">
				  </div>
				</div>
				<div class="col-md-3">
				  <div class="mb-3">
					<label for="author3_last_name">Author 3 Last Name (Optional):</label>
					<input type="text" class="form-control" id="author3_last_name" name="author_last_name[]">
				  </div>
				</div>
			  </div>
			</div>

      <div class="form-group">
        <h3>Categories:</h3>

		<div class="row">
		  <div class="col-md-4">
			<div class="mb-3">
			  <label for="category1">Category 1 (Required):</label>
			  <select class="form-select" id="category1" name="categories[]" required>
				<option value="">Select a category</option>
				<option value="fiction">Fiction</option>
				<option value="sci-fi">Sci-Fi</option>
				<option value="non-fiction">Non-Fiction</option>
				<option value="mystery">Mystery</option>
				<option value="poetry">Poetry</option>
				<option value="other">Other</option>
			  </select>
			</div>
		  </div>
		  
		  <div class="col-md-4">
			<div class="mb-3">
			  <label for="category2">Category 2 (Optional):</label>
			  <select class="form-select" id="category2" name="categories[]">
				<option value="">Select a category</option>
				<option value="fiction">Fiction</option>
				<option value="sci-fi">Sci-Fi</option>
				<option value="non-fiction">Non-Fiction</option>
				<option value="mystery">Mystery</option>
				<option value="poetry">Poetry</option>
				<option value="other">Other</option>
			  </select>
			</div>
		  </div>
		  
		  <div class="col-md-4">
			<div class="mb-3">
			  <label for="category3">Category 3 (Optional):</label>
			  <select class="form-select" id="category3" name="categories[]">
				<option value="">Select a category</option>
				<option value="fiction">Fiction</option>
				<option value="sci-fi">Sci-Fi</option>
				<option value="non-fiction">Non-Fiction</option>
				<option value="mystery">Mystery</option>
				<option value="poetry">Poetry</option>
				<option value="other">Other</option>
			  </select>
			</div>
		  </div>
		</div>

      <button type="submit" class="btn btn-primary">Add Book</button>
    </form>
  </div>

</body>
</html>














