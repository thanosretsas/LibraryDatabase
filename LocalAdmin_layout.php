<?php
/*
???DONE			CRUD Operations in BOOK, BOOK-SCHOOL

VIEW LOANS, RESERVATIONS (per USER)
VIEW late LOANS (currentDate GREATER THAN dueDate in LOAN)
???DONE			HANDLE book return (UPDATE returnDate in LOAN)
???DONE			HANDLE pending RESERVATIONS after book return
???DONE			INSERT LOAN after RESERVATION (check constraints: less than 2(1) loans, no late book)
				(DELETE RESERVATION)
???DONE			INSERT LOAN without RESERVATION (search user, book title)
								(check constraints: less than 2(1) loans, no late book, 
								?no same book reservation/loan?, book copy available)


DONE			CRUD Operations in USER (update user status)
DONE			PRINT Loan Card 

?DONE			VIEW pending RATINGS - UPDATE approved



-------------QUERIES------------
DONE		3.2.1 VIEW Title, Author in BOOK, BOOK-SCHOOL (search book title, category, author, copies)
DONE		3.2.2 USERS late LOANS (search first-name, last-name, days-late)
DONE		3.2.3 Average RATING per USER and CATEGORY (search user, category)
*/
?>      



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOCAL ADMIN page</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="LocalAdmin_layout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Home</a>
	  <a class="navbar-brand" href="logout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Logout</a>
	</nav>
	<section>
        <h2 style="text-align: center;margin: 30px 0;">Welcome LOCAL ADMINISTRATOR</h2>
        <div class="container">
		    <div class="row">
				<div class="col-sm-3 text-center">
					<a class="btn btn-primary btn-lg" href="LA-Loans.php" role="button">Make Loan</a>
				</div>
				<div class="col-sm-3 text-center">
					<a class="btn btn-primary btn-lg" href="LA-LoansReservations.php" role="button">View Loans and Reservations</a>
				</div>
				<div class="col-sm-3 text-center">
					<a class="btn btn-primary btn-lg" href="LA-returnBook.php" role="button">Book Returns</a>
				</div>
				<div class="col-sm-3 text-center">
					<a class="btn btn-primary btn-lg" href="LA-Ratings.php" role="button">Handle Ratings</a>
				</div>
			</div>
		    <div class="row mt-5">			
				<div class="col-sm-3 text-center">
					<a class="btn btn-primary btn-lg" href="LA-addUser.php" role="button">Add a User</a>
				</div>
				<div class="col-sm-3 text-center">
					<a class="btn btn-primary btn-lg" href="LA-handleUsers.php" role="button">Handle existing Users</a>
				</div>
				<div class="col-sm-3 text-center">
					<a class="btn btn-primary btn-lg" href="LA-addBook.php" role="button">Add a Book</a>
				</div>

				<div class="col-sm-3 text-center">
					<a class="btn btn-primary btn-lg" href="LA-Users.php" role="button">My Profile</a>
				</div>
			</div>										
			<div class="row mt-5">
				<a class="btn btn-primary btn-lg" href="3-2-1.php" role="button">3.2.1 VIEW Books WITH Search Criteria</a>
			</div>
			<div class="row mt-3">
				<a class="btn btn-primary btn-lg" href="3-2-2.php" role="button">3.2.2 USERS with late LOANS</a>
			</div>
			<div class="row mt-3">
				<a class="btn btn-primary btn-lg" href="3-2-3.php" role="button">3.2.3 Average RATING per USER and CATEGORY</a>
			</div>
					   		   			   		
        </div>
    </section>
  </body>
</html>