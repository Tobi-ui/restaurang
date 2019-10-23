<?php
	include_once 'header.php';
	include_once 'includes/message.inc.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Pomodoro - Contact</title>
		<meta charset="utf-8">
        <link rel="shortcut icon" href="img/ico-p-logo.png">
		<link rel="stylesheet" type="text/css" href="contact.css">
	</head>
	<body>
		<div class="restaurant-p">
			<img src="img/p-logo1.png" draggable="false">	
			<div class="desc">Restaurant Pomodoro</div>
		</div>

		<div class="message">
			<form method="post" action="contact.php">
					<table><caption>Do you have anything in your mind to tell us? <br> Please don't hesitate to get in touch to us via our contact form.</caption>
						<?php
							if (isset($_GET['name'])) {
								$name = $_GET['name'];
								echo "<tr>
										<td>
											<div class='group'> 
												<input type='text' name='name' placeholder='" . $name . "' required>
											    <span class='highlight'></span>
											    <span class='bar'></span>
											    <label>Name</label>
											 </div>
										</td>";
							}else{
								echo "<tr>
										<td>
											<div class='group'> 
												<input type='text' name='name' required>
											    <span class='highlight'></span>
											    <span class='bar'></span>
											    <label>Name</label>
											 </div>
									    </td>";
							}

							if (isset($_GET['email'])) {
								$email = $_GET['email'];
								echo "
										<td>
											<div class='group'> 
												<input type='text' name='email' placeholder='" . $email . "' required>
											    <span class='highlight'></span>
											    <span class='bar'></span>
											    <label>Email</label>
											 </div>
										</td>
									</tr>";
							}else{
								echo "
										<td>
											<div class='group'> 
												<input type='text' name='email' required>
											    <span class='highlight'></span>
											    <span class='bar'></span>
											    <label>Email</label>
											 </div>
										</td>
									</tr>";
							}

							if (isset($_GET['subject'])) {
								$subject = $_GET['subject'];
								echo "<tr><td colspan='2'><textarea name='subject' placeholder='" . $subject . "' required></textarea></td></tr>";
							}else{
								echo "<tr>
										<td colspan='2'>
											<div class='group'> 
												<textarea name='subject' required></textarea>
											    <span class='highlight'></span>
											    <span class='bar'></span>
											    <label>Message</label>
											</div>
										</td>
									</tr>";
							}
						?>
						<tr><td colspan="2"><input id="myBtn" type="submit" name="submit" value="Send"></td></tr>
					</table>
			</form>
		</div>

		<?php 
			$dbServername = "localhost";
			$dbUsername = "root";
			$dbPassword = "";
			$dbName = "restaurang";
			$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);					

			if (isset($_POST['submit'])){		// har man tryckt på submit knappen gör nedanstående
				$message_name = $_POST['name'];	
				$message_email = $_POST['email'];
				$message_subject = $_POST['subject'];
				$message_date = date('Y-m-d-H:i:s');
				if (empty($message_name) || empty($message_email) || empty($message_subject)) {	// kollar om man har glömt att skriva på i något fält
					header("Location: contact.php");
					exit();

				} else {								
					$ins = "INSERT INTO message VALUES ('', '$message_name', '$message_email', '$message_subject', '$message_date')";		// lägg in datan i databasen
					$resins= mysqli_query($conn, $ins) or die("Failed".mysqli_error($conn));	
					header("Location: ../restaurang/contact.php?message=sended");
				}
			}

			if (!isset($_GET['message'])) {

			}else{
				$signupCheck = $_GET['message'];

				if ($signupCheck == "sended") {
					echo "<script> 
								    document.getElementById('myBtn').value = 'Message Sended';
								
							</script>";
				}
			}

		?>

		<div class="contact">
			<table>
				<tr><th>Phone number:</th><td>+39 308 1187331</td></tr>
				<tr><th>E-mail:</th><td><a href="mailto:toel1501@student.miun.se?Subject=Hello%20again" target="_top">info@pomodoro.com</a></td></tr>
				<tr><th>Find us:</th><td>Corso Alcide de Gasperi, Castellammare di Stabia, Italy</td></tr>
			</table>
		</div>

		<div id="map"></div>

		<script>		// hämtar en google maps in i sidan
			function myMap() {
				var myCenter = new google.maps.LatLng(40.70919657564947,14.481545141757806);
				var mapCanvas = document.getElementById("map");
				var mapOptions = {center: myCenter, zoom: 10, 
				};
				var map = new google.maps.Map(mapCanvas, mapOptions);
				var marker = new google.maps.Marker({position:myCenter});
				marker.setMap(map);
			}
		</script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKt_ctY0OEqmrV5iIFHZoQ5cuzDi1rjjY&callback=myMap"></script>
		<script> document.getElementById("contact").style.color = "#559E54"; </script>

	</body>
</html>

<?php
	include_once 'footer.php';
?>