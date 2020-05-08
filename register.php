	<?php include('server.php') ?>
	<!DOCTYPE html>
	<html>
	<head>
	
	  <title>Registration system PHP and MySQL</title>
	  <link rel="stylesheet" type="text/css" href="css/signp.css">
		<link rel="icon" href="pics/logo.jpg"/> 
		<script src="SignUp.js"></script>
	<script src =" https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>

		<script>
	 $(document).ready(function(){
	   $(".login-form").hide();
	   $(".login").css("background","none");
	  $(".login").click(function() {
	   $(".signup-form").hide();
	   $(".login-form").show();
	   $(".signup").css("background","none");
	   $(".login").css("background","#fff");
	  });
	  
	  $(".signup").click(function() {
	   $(".signup-form").show();
	   $(".login-form").hide();
	   $(".signup").css("background","#fff");
	   $(".login").css("background","none");
	  });
	  });
	  </script>
	</head>
	<body style="background-image: url('pics/login.jpg');">
	 <div class="wrapper">
		<div class="container">
			 
		  <div class="signup">Sign Up</div>
		  <div class="login">Log In</div>
		
	  <form method="post" action="register.php">
		<div class="signup-form">
			<input type="text" name="usernames" placeholder="Choose a Username" class="input" value="<?php echo $username; ?>"><br />
			  <input type="text" name="email" placeholder="Your Email Address" class="input" value="<?php echo $email; ?>"><br />
			  <input type="password" name="password_1" placeholder="Choose a Password" class="input"><br />
			<input type="password" name="password_2" placeholder="Confirm Passowrd" class="input">
			 <button type="submit" class="btn" name="reg_user">Register</button>
		   </div>
		   
		  <div class="login-form">
			  <input type="text" name="username" placeholder="Email or Username" class="input"><br />
			  <input type="password" name="password" placeholder="Password" class="input"><br />
			  <button  type="submit" class="btn" name="login_user">Login</button>
			  <span><a  href="register.php"> Not a member? </a></span>
		  </div>
		  </form>
			<?php include('errors.php'); ?>
		</div>
	  </div>
		   <input class ="goback" type="button" value="Go Back!" onclick="history.back(-1)" />

	  </form>
	</body>
	</html>