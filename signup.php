<?php
	include_once 'header.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Pomodoro - Signup</title>
		<meta charset="utf-8">
        <link rel="shortcut icon" href="img/ico-p-logo.png">
		<link rel="stylesheet" type="text/css" href="signup.css">
	</head>
	<body>
		<div id='box-signup'>
			<img src="img/p-logo.png" draggable="false">	
			<dir class="create">Create Your Acount</dir>
			<form class='signup-form' action="includes/signup.inc.php" method='POST'>	<!-- skickas till signup för att kontroleras -->
				<?php
					if (isset($_GET['first'])) {
						$first = $_GET['first'];
						echo "<div class='group'>
								<input type='text' maxlength='25' name='first' required value='". $first. "' >
								<span class='highlight'></span>
								<span class='bar'></span>
								<label>First Name</label>
							</div>";
					}else{
						echo "<div class='group'> 
								<input type='text' maxlength='25' name='first' required>
								<span class='highlight'></span>
								<span class='bar'></span>
								<label id='error'>First Name</label>
							</div>";
					}

					if (isset($_GET['last'])) {
						$last = $_GET['last'];
						echo "<div class='group'>
								<input type='text' maxlength='25' name='last' required value='". $last. "' >
								<span class='highlight'></span>
								<span class='bar'></span>
								<label>Last Name</label>
							</div>";
					}else{
						echo "<div class='group'> 
								<input type='text' maxlength='25' name='last' required>
								<span class='highlight'></span>
								<span class='bar'></span>
								<label id='error'>Last Name</label>
							</div>";
					}

					if (isset($_GET['tel'])) {
						$tel = $_GET['tel'];
						echo "<div class='group'>
								<input type='text' maxlength='15' name='tel' required value='". $tel. "' >
								<span class='highlight'></span>
								<span class='bar'></span>
								<label>Phone Number</label>
							</div>";
					}else{
						echo "<div class='group'> 
								<input type='text' maxlength='15' name='tel' required>
								<span class='highlight'></span>
								<span class='bar'></span>
								<label id='error'>Phone Number</label>
							</div>";
					}

					if (isset($_GET['email'])) {
						$email = $_GET['email'];
						echo "<div class='group'>
								<input type='text' maxlength='35' name='email' required value='". $email. "' >
								<span class='highlight'></span>
								<span class='bar'></span>
								<label>E-mail</label>
							</div>";
					}else{
						echo "<div class='group'> 
								<input type='text' maxlength='35' name='email' required>
								<span class='highlight'></span>
								<span class='bar'></span>
								<label id='error'>E-mail</label>
							</div>";
					}

					if (isset($_GET['uid'])) {
						$uid = $_GET['uid'];
						echo "<div class='group'>
								<input type='text' maxlength='20' name='uid' required value='". $uid. "' >
								<span class='highlight'></span>
								<span class='bar'></span>
								<label>Username</label>
							</div>";
					}else{
						echo "<div class='group'> 
								<input type='text' maxlength='20' name='uid' required>
								<span class='highlight'></span>
								<span class='bar'></span>
								<label id='error'>Username</label>
							</div>";
					}
				?>
				<div class='group'> 
					<input type='password' maxlength='20' name='pwd' required>
					<span class='highlight'></span>
					<span class='bar'></span>
					<label id='error'>Password</label>
				</div>
				<div class='group'> 
					<input type='password' maxlength='20' name='cpwd' required>
					<span class='highlight'></span>
					<span class='bar'></span>
					<label id='errorr'>Confirm Password</label>
				</div>

				<button type='submit' name='submit'>Sign Up</button>
				
				<?php
					if (!isset($_GET['signup'])) {

					}else{
						$signupCheck = $_GET['signup'];

						if ($signupCheck == "empty") {
							echo "<div class='empty'>You did not fill in all fields</div>";
							echo "<script> document.getElementById('error').style.color = 'red';</script>";
							

						}elseif ($signupCheck == "firstlast") {
							echo "<div class='empty'>Use your real name</div>";
							echo "<script> document.getElementById('error').style.color = 'red';</script>";
							

						}elseif ($signupCheck == "tel") {
							echo "<script> document.getElementById('error').style.color = 'red';</script>";
							
								
						}elseif ($signupCheck == "email") {
							echo "<script> document.getElementById('error').style.color = 'red';</script>";
							

						}elseif ($signupCheck == "uid") {
							$tuid = 'That username is taken';
							echo "<div class='empty'>" . $tuid . "</div>";
							echo "<script> document.getElementById('error').style.color = 'red';</script>";
							
						
						}elseif ($signupCheck == "pwd") {
							echo "<div class='empty'>The passwords does not match</div>";
							echo "<script> document.getElementById('error').style.color = 'red';</script>";
							echo "<script> document.getElementById('errorr').style.color = 'red';</script>";
							
						}
					}
				?>
			</form>	
		</div>
		<div class="policy">* By signing up, you agree to our <a href="../restaurang/terms-of-use.php" target="_blank">Terms of Use</a>, <a href="../restaurang/privacy-policy.php" target="_blank">Privacy Policy</a> and to receive Pomodoro emails, newsletters & updates. <br> You also acknowledge that Pomodoro uses cookies to give the best user experience.</div>
		<script> document.getElementById("signup").style.color = "#559E54"; </script>
	</body>
</html>
<?php
	include_once 'footer.php';
?>