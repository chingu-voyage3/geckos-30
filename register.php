<!DOCTYPE html>

<?php
	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");
	$account = new Account($con);

	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");

	function getInputValue($name){
		if(isset($_POST[$name])){
			echo $_POST[$name];
		}
	}

?>

<html>
<head>
	<title>Welcome to Slotify!</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/register.js"></script>
</head>
<body>
	<?php

	if(isset($_POST['registerButton'])){
		echo '
		<script type="text/javascript">
		$(document).ready(function(){
			$("#loginForm").hide();
			$("#registerForm").show();
		});
		</script>';
	}
	else{
		echo '
		<script type="text/javascript">
		$(document).ready(function(){
			$("#loginForm").show();
			$("#registerForm").hide();
		});
		</script>';
	}

	?>
	
	<div id="background">

		<div id="loginContainer">

			<div id="inputContainer">
				<form id="loginForm" action="register.php" method="POST">
					<h2>Login to your account</h2>
					<p>
						<span class ="errorMessage">
						<?php echo $account->getError(Constants::$loginFailed); ?> 
						</span>
						<label for ="loginUsername">Username</label>
							<input id = "loginUsername" type="text" name="loginUsername" value="<?php getInputValue('loginUsername') ?>" required>	
					</p>
					<p>
						<label for ="loginPassword">Password</label>
							<input id = "loginPassword" type="password" name="loginPassword" required>	
					</p>
					<button type="submit" name="loginButton">LOG IN</button>

					<div class="hasAccountText">
						<span id="hideLogin">Don't have an account? Register here.</span>
					</div>

				</form>

				<form id="registerForm" action = "register.php" method="POST">
					<h2>Create free account</h2>
					<p>
						<span class="errorMessage">
						<?php echo $account-> getError(Constants::$usernameCharacters); ?>
						<?php echo $account-> getError(Constants::$usernameTaken); ?>
						</span>

						<label for="username">Username</label>
						<input type="text" name="username" id="username" value="<?php getInputValue('username') ?>" required>
					</p>
					<p>
						<span class="errorMessage">
						<?php echo $account-> getError(Constants::$firstNameCharacters); ?>
						</span>
						<label for="firstName">First name</label>
						<input type="text" name="firstName" value="<?php getInputValue('firstName') ?>" id ="firstName" required>
					</p>
					<p>
						<span class="errorMessage">
						<?php echo $account-> getError(Constants::$lastNameCharacters); ?>
						</span>
						<label for="lastName">Last name</label>
						<input type="text" name="lastName" value="<?php getInputValue('lastName') ?>" id="lastName" required>
					</p>
					<p>
						<span class="errorMessage">
						<?php echo $account-> getError(Constants::$emailsDoNotMatch); ?>
						<?php echo $account-> getError(Constants::$emailInvalid); ?>
						<?php echo $account-> getError(Constants::$emailTaken); ?>
						</span>
						<label for="email">Email</label>
						<input type="email" name="email" value="<?php getInputValue('email') ?>" id="email" required>
					</p>
					<p>
						
						<label for="email2">Confirm Email</label>
						<input type="email" name="email2" value="<?php getInputValue('email2') ?>" id ="email2" required>
					</p>
					<p>
						<span class="errorMessage">
						<?php echo $account-> getError(Constants::$passwordsDoNotMatch); ?>
						<?php echo $account-> getError(Constants::$passwordNotAlphanumeric); ?>
						<?php echo $account-> getError(Constants::$passwordCharacters); ?>
						</span>
						<label for="password">Password</label>
						<input type="password" id="password" name="password" required>
					</p>
					<p>
						<label for="password2">Confirm password</label>
						<input type="password" name="password2" id="password2" required>
					</p>
					<button type="submit" name="registerButton">CREATE ACCOUNT</button>

					<div class="hasAccountText">
						<span id="hideRegister">Already have an account? Log in here.</span>
					</div>

				</form>
			</div>

			<div id="loginText">
				<h1>Get great music, right now</h1>
				<h2>Listen to loads of songs for free</h2>
				<ul>
					<li>Discover music you'll fall in love with</li>
					<li>Create your own playlists</li>
					<li>Follow artists to keep up to date</li>
				</ul>
			</div>

		</div>
    </div>
</body>
</html>