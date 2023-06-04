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

	<h2 style="text-align: center;">Insert a SCHOOL</h2>
    <section>
		
        <div class="container">
            <form action="GA-insertSchool.php" method="post">
				<h3>SCHOOL INFO</h3>
				<div class="row mt-3" >			   		   			   
                    <div class="form-group col-lg-3">
                        <label for="">School Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
					<div class="form-group col-lg-3">
                        <label for="">Address</label>
                        <input type="text" name="address" id="address" class="form-control" required>
                    </div>
					<div class="form-group col-lg-3">
                        <label for="">City</label>
                        <input type="text" name="city" id="city" class="form-control" required>
                    </div>
					<div class="form-group col-lg-3">
                        <label for="">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" required>
                    </div>
				</div>	
				<div class="row mt-2">

					<div class="form-group col-lg-3">
						<label for="">Email</label>
						<input type="email" name="email" id="email" class="form-control" placeholder="Enter email" required>
					</div>
					<div class="form-group col-lg-3">
                        <label for="">Principal First Name</label>
                        <input type="text" name="principalname" id="principalname" class="form-control" required>
                    </div>
					<div class="form-group col-lg-3">
                        <label for="">Principal Last Name</label>
                        <input type="text" name="principalsurname" id="principalsurname" class="form-control" required>
                    </div>					
				</div>
				<div class="row">
					<h3 class="mt-4">LOCAL ADMINISTRATOR INFO</h3>	
				</div>
				<div class="row mt-3">
					<div class="form-group col-lg-3">
						<label for="">First Name</label>
						<input type="text" name="firstName" id="firstName" class="form-control" required>
					</div>
					<div class="form-group col-lg-3">
						<label for="">Last Name</label>
						<input type="text" name="lastName" id="lastName" class="form-control" required>
					</div>
					<div class="form-group col-lg-3">
						<label for="">Username</label>
						<input type="text" name="username" id="username" class="form-control" required>
					</div>
					<div class="form-group col-lg-3">
						<label for="">Password</label>
						<input type="password" name="password" id="password" class="form-control" required>
					</div>
				</div>
				<div class="row">				
					<div class="form-group col-lg-3">
						<label for="">Email</label>
						<input type="email" name="emailLA" id="emailLA" class="form-control" required>
					</div>
					<div class="form-group col-lg-3">
						<label for="">Phone</label>
						<input type="text" name="phone" id="phone" class="form-control" required>
					</div>
					
					<div class="form-group col-lg-2">
						<label for="">Birth Date</label>
						<input type="date" name="birthDate" id="birthDate" class="form-control" required>
					</div>										
				</div>								
																				
                <div class="form-group col-lg-2" style="display: grid;align-items:  flex-end;">
                        <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Insert">
                </div>
            </form>
        </div>
    </section>
  </body>
</html>
