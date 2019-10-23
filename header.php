
<!DOCTYPE html>
<?php session_start();?>
<html>	  <!-- sidan för ribriken som hämtas av alla de andra sidorna -->
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="header.css">
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Arima+Madurai" rel="stylesheet">	<!-- test font for the new new web -->
        <link href="https://fonts.googleapis.com/css?family=Merienda:700" rel="stylesheet"> 	<!-- font for the new web -->
		<link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">	<!-- font for the old web -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">	<!-- font for the placeholder -->
		<link href="https://fonts.googleapis.com/css?family=Righteous|Russo+One" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">	<!-- font for the error text -->
        <link href="https://fonts.googleapis.com/css?family=Ovo" rel="stylesheet">          <!-- font for the recipes -->
	</head>
	<body>
		<div id="change" class="irak">
			<div class="head">
				<ul>
				  	<li><a id="home" href="index.php">Home</a></li>

				  	<li><a id="menu" href="index.php#food">Menu</a></li>

					<?php if (isset($_SESSION['user_aid'])) { ?>

					  	<li><a id="admin" href="admin.php" style="border-right: 1px solid black; padding-right: 70px;">Admin</a></li>

					<?php } elseif (isset($_SESSION['user_uid'])) { ?>

						<li><a id="myreservations" href="login.php" style="border-right: 1px solid black; padding-right: 70px;">My Reservations</a></li>

					<?php } else { ?>

				  		<li><a id="reserve" href="index.php#book" style="border-right: 1px solid black; padding-right: 70px;">Reserve</a></li> 

				  	<?php } ?>

					<?php if ((isset($_SESSION['user_uid'])) OR (isset($_SESSION['user_aid']))) { ?>
								<li><div><a href="includes/logout.inc.php"><?php echo "Log Out: &nbsp;<b>{$_SESSION['user_name']}</b>"; ?> </div></a></li>

					<?php }  else { ?>
								<li><a href="login.php"> Log In </a></li>
								
					<?php } ?>

				</ul> 
			</div>
		</div>
	</body>
</html>

	
