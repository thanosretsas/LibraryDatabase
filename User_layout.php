<?php
/*
DONE			UPDATE password in USER
DONE			VIEW/SELECT in BOOK, BOOK-SCHOOL
DONE			INSERT in RESERVATION(check constraints: less than 2(1) loans, no late book, no same book loan/reservation)
DONE			VIEW, DELETE in RESERVATION(with USER ID)
Automatic Cancellation ?how? of RESERVATION(after 7 days)

DONE			INSERT in RATING
DONE			UPDATE, DELETE in RATING


DONE			TEACHER USER: 	UPDATE * in USER
DONE			STUDENT USER: 	VIEW * in USER
	
	
-------------QUERIES------------
3.3.1 VIEW Title, Author in BOOK, BOOK-SCHOOL (search book title, category, author, copies)		
	  SELECT book, INSERT RESERVATION
DONE			3.3.2 VIEW Book Title from LOANS with USER ID
*/
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>USER page</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
	  
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="User_layout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Home</a>
	  <a class="navbar-brand" href="logout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Logout</a>
	</nav>

	<section>
        <h2 style="text-align: center;margin: 30px 0;">Welcome USER</h2>
        <div class="container">
		    <div class="row">
				<div class="col-sm-3 text-center">
					<a class="btn btn-primary btn-lg" href="U-BookReservations.php" role="button">View and Reserve Books</a>
				</div>
				<div class="col-sm-3 text-center">
					<a class="btn btn-primary btn-lg" href="U-handleReservations.php" role="button">Handle Reservations</a>
				</div>
				<div class="col-sm-3 text-center">
					<a class="btn btn-primary btn-lg" href="U-Ratings.php" role="button">Ratings</a>
				</div>
				<div class="col-sm-3 text-center">
					<a class="btn btn-primary btn-lg" href="U-Users.php" role="button">User Profile</a>
				</div>
				
			</div>				
			
			
			<div class="row mt-5">
				<a class="btn btn-primary btn-lg" href="U-BookReservations.php" role="button">3.3.1 VIEW, SELECT and RESERVE Books</a>
			</div>
			<div class="row mt-3">
				<a class="btn btn-primary btn-lg" href="3-3-2.php" role="button">3.3.2 VIEW loaned Book Titles</a>
			</div>
					   		   			   		
        </div>
    </section>
  </body>
</html>