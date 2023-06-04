<?php
/*
DONE		ADD SCHOOL AND ITS LOCAL ADMIN	
DONE        CRUD Operations in SCHOOL

DONE		UPDATE user role LOCAL ADMIN in USER, UPDATE OLD role to TEACHER

???DONE		BACKUP DB

???DONE		RESTORE DB

-------------QUERIES------------
DONE		3.1.1 LOANS per SCHOOL (per month, year)
DONE		3.1.2 AUTHORS in Book CATEGORY
					TEACHERS borrowed from Book CATEGORY this year
DONE		3.1.3 TEACHERS under 40 assorted by NUMBER OF borrowed BOOKS
DONE		3.1.4 AUTHORS with NO BOOK LOAN
DONE		3.1.5 LOCAL ADMINS with same Book LOANS in a year, LOANS MORE THAN 20
DONE		3.1.6 TOP 3 pairs of (2) CATEGORIES with most borrowed BOOKS 
DONE		3.1.7 AUTHORS with number of BOOKS + 5 less than AUTHOR's with most BOOKS
*/ 
?>     

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GLOBAL ADMIN page</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
  	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="GlobalAdmin_layout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Home</a>
	  <a class="navbar-brand" href="logout.php" style="background-color: lightgray; padding: 5px; margin: 2px;">Logout</a>
	</nav>

	<section>
        <h2 style="text-align: center;margin: 30px 0;">Welcome GLOBAL ADMINISTRATOR</h2>
        <div class="container">
		    <div class="row">
				<div class="col-sm-2 text-center">
					<a class="btn btn-primary btn-lg" href="GA-addSchool.php" role="button">Add a School</a>
				</div>
				<div class="col-sm-3 text-center">
					<a class="btn btn-primary btn-lg" href="GA-handleSchools.php" role="button">Handle Schools</a>
				</div>		
				<div class="col-sm-3 text-center">
					<a class="btn btn-primary btn-lg" href="GA-LocalAdministrator.php" role="button">Handle Local Administrators</a>
				</div>
				<div class="col-sm-2 text-center">
					<a class="btn btn-primary btn-lg" href="GA-Backup.php" role="button">Backup</a>
				</div>
				<div class="col-sm-2 text-center">
					<a class="btn btn-primary btn-lg" href="GA-Restore.php" role="button">Restore</a>
				</div>
			</div>	
			
			<div class="row mt-5">
				<a class="btn btn-primary btn-lg" href="3-1-1.php" role="button">3.1.1 SCHOOL LOANS(per month, year)</a>
			</div>
			<div class="row mt-3">
				<a class="btn btn-primary btn-lg" href="3-1-2.php" role="button">3.1.2 AUTHORS with loaned books and TEACHERS with loans (per category)</a>
			</div>
			<div class="row mt-3">
				<a class="btn btn-primary btn-lg" href="3-1-3.php" role="button">3.1.3 TEACHERS under 40 assorted by NUMBER OF borrowed BOOKS</a>
			</div>
			<div class="row mt-3">
				<a class="btn btn-primary btn-lg" href="3-1-4.php" role="button">3.1.4 AUTHORS with NO BOOK LOANS</a>
			</div>
			<div class="row mt-3">
				<a class="btn btn-primary btn-lg" href="3-1-5.php" role="button">3.1.5 LOCAL ADMINS with same Book LOANS in a year, LOANS &gt 20</a>
			</div>
			<div class="row mt-3">
				<a class="btn btn-primary btn-lg" href="3-1-6.php" role="button">3.1.6 TOP 3 pairs of CATEGORIES with most borrowed BOOKS</a>
			</div>
			<div class="row mt-3">
				<a class="btn btn-primary btn-lg" href="3-1-7.php" role="button">3.1.7 AUTHORS with 5 books less than AUTHOR with most BOOKS</a>
			</div>
        </div>
    </section>
  </body>
</html>