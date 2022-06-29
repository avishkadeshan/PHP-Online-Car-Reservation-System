
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		label {
			font-size: 18px
		}
	</style>
</head>
<body>
	<div class="container">
		<form action="connect.php" method="post" id="signup" >
			<div class="row">
				<label for="username" class="col-sm-2 col-form-label col-md-offset-4">Username</label>

			<div class="col-md-3 ">
			<div class="form-group">
				<input type="text" class="form-control" id="username" placeholder="Username" aria-describedby="userHB"  >
				<small id="userHB" class="form-text text-muted">
  Your username must be 8-15 characters long, contain letters and numbers Only!</small>

			</div>
			</div>
			<div class="col-md-3">
			<p id="status"></p>
			</div>
</div>

		<div class="row">
			<label for="fullname" class="col-sm-2 col-form-label col-md-offset-4">Fullname</label>
			<div class="col-md-3">
			<div class="form-group">
				<input type="text" class="form-control" id="fullname" placeholder="Fullname"  >
			</div>
			</div>
		</div>

		<div class="row">
			<label for="licenceno" class="col-sm-2 col-form-label col-md-offset-4">Licence Number</label>
			<div class="col-md-3 ">
			<div class="form-group">
				
				<input type="Number" class="form-control" id="licenceno" placeholder="Licence Number">
			</div>
			</div>
		</div>

		<div class="row">
			<label for="phno" class="col-sm-2 col-form-label col-md-offset-4">Phone Number</label>
			<div class="col-md-3 ">
			<div class="form-group">
				
				<input type="Number" class="form-control" id="phno" placeholder="Phone Number">
			</div>
			</div>
		</div>

		<div class="row">
			<label for="age" class="col-sm-2 col-form-label col-md-offset-4">Age</label>
			<div class="col-md-3 ">
			<div class="form-group">
	
				<input type="Number" class="form-control" id="age" placeholder="Age">
			</div>
			</div>
		</div>
		
		<div class="row">
			<label for="email" class="col-sm-2 col-form-label col-md-offset-4">Email ID</label>
			<div class="col-md-3 ">
			<div class="form-group">
				
				<input type="email" class="form-control" id="email" placeholder="Email ID">
			</div>
			</div>
		</div>
		<div class="row">
			<label for="password" class="col-sm-2 col-form-label col-md-offset-4">Password</label>
			
			<div class="col-md-3 ">
			<div class="form-group">
				<input type="password" class="form-control" id="password" placeholder="Password" aria-describedby="passwordHelpInline">
				<small id="passwordHelpBlock" class="form-text text-muted">
  Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.</small>
			</div>
			</div>
		</div>
		<div class="row">
			<label for="confirmpass" class="col-sm-2 col-form-label col-md-offset-4">Confirm Password</label>
			<div class="col-md-3 ">
			<div class="form-group">
				
				<input type="password" class="form-control" id="confirmpass" placeholder="Confirm Password">
			</div>
			</div>
		</div>
			
		 <div class=" row">
    <!--<div class="col-md-2">Checkbox</div>-->
    <div class="col-md-3 col-md-offset-4">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck1">
        <label class="form-check-label" for="gridCheck1">
          <a href="#" style="text-decoration: none;"><span style="color:red;">Terms and conditions</span></a>
        </label>
      </div>
     
    <div class="row">
			<div class="col-md-2 ">
			<div class="form-group">
				 <button type="submit" class="btn btn-primary" name="signup">Signup</button>
			</div>
			</div>
		</div>	
  </div>
	</form>
</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="../login/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../login/js/script.js"></script>


</body>
</html>